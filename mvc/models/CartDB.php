<?php
class CartDB
{
    public $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }
    public function addCart($user_ID)
    {
        $sql = "INSERT INTO `demo6`.`carts`(`user_ID`) VALUES (?);";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $user_ID);
        return $statement->execute();
    }
    public function addDetail($cartDetail)
    {
        $sql = "INSERT INTO `demo6`.`cartdetails`
        (
        `date`,
        `countDetails`,
        `product_ID`,
        `cart_ID`)
        VALUES
        (?,?,?,?)
        ;";
        $statement = $this->connect->prepare($sql);

        $statement->bindParam(1, $cartDetail->date);
        $statement->bindParam(2, $cartDetail->countDetail);
        $statement->bindParam(3, $cartDetail->product_ID);
        $statement->bindParam(4, $cartDetail->cart_ID);
        return $statement->execute();
    }
    public function getCart($user_ID)
    {
        $sql = "SELECT `carts`.`cart_ID`
        FROM `demo6`.`carts`
        WHERE `user_ID` = ?;";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $user_ID);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getCartDetail($cart_ID)
    {
        $sql = "SELECT   `cartdetails`.`carDetails_ID`,
        `cartdetails`.`cart_ID`,
        `products`.`product_ID`,
         `products`.`productName`,
         `containerimage`.`imageName`,
         sum(`countDetails`) AS count,
         `products`.`price`,
         `discount`.`discount`,
         `products`.`price`* sum(`countDetails`) AS sumPrice 
        FROM `demo6`.`cartdetails`
        INNER JOIN `demo6`.`products`
        ON `products`.`product_ID` = `cartdetails`.`product_ID`
        INNER JOIN `demo6`.`discount`
        ON `products`.`discount_ID` = `discount`.`discount_ID`
        INNER JOIN `demo6`.`containerimage`
        ON `products`.`image_ID` = `containerimage`.`image_ID`
        WHERE `cart_ID` = ?
        GROUP BY `product_ID`";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $cart_ID);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getCountCart($user_ID)
    {
        $cart_ID = $this->getCart($user_ID);
        $sql = "SELECT sum(`countDetails`) AS count
        FROM `demo6`.`cartdetails`
        WHERE `cart_ID` =  ? ;";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $cart_ID[0]['cart_ID']);
        $statement->execute();
        $count = $statement->fetchALL(PDO::FETCH_ASSOC);
        return $count;
    }
    public function delCart($cart_ID, $product_ID = null)
    {
        if (empty($product_ID)) {
            $sql = "DELETE FROM `demo6`.`cartdetails`
                    WHERE `cart_ID` = ? ;";
            $statement = $this->connect->prepare($sql);
            $statement->bindParam(1, $cart_ID);
        } else {
            $sql = "DELETE FROM `demo6`.`cartdetails`
                    WHERE `cart_ID` = ? and `product_ID` = ?;";
            $statement = $this->connect->prepare($sql);
            $statement->bindParam(1, $cart_ID);
            $statement->bindParam(2, $product_ID);
        }
        return $statement->execute();
    }
}
