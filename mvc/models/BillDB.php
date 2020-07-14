<?php
class BilDB
{
    public $connect;

    public function __construct($connect)
    {
        $this->connect  = $connect;
    }

    public function addBill($bill)
    {
        $sql = "INSERT INTO `demo6`.`bills`
        (`date`,
        `note`,
        `sumPrice`,
        `is_pay`,
        `user_ID`)
        VALUES
        (?,?,?,?,?);";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $bill->date);
        $statement->bindParam(2, $bill->note);
        $statement->bindParam(3, $bill->sumPrice);
        $statement->bindParam(4, $bill->isPay);
        $statement->bindParam(5, $bill->user_ID);
        return $statement->execute();
    }
    public function getBill($user_ID)
    {
        $sql = "SELECT `bills`.`bill_ID`,
        `bills`.`date`,
        `bills`.`note`,
        `bills`.`sumPrice`,
        `bills`.`is_pay`,
        `bills`.`user_ID`
    FROM `demo6`.`bills`
    WHERE `user_ID` = ?;";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $user_ID);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function addBillDetail($BillDetail)
    {
        $sql = "INSERT INTO `demo6`.`billdetail`
        (`count`,
        `price`,
        `bill_ID`,
        `product_ID`)
        VALUES
        (?,?,?,?)";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $BillDetail->count);
        $statement->bindParam(2, $BillDetail->price);
        $statement->bindParam(3, $BillDetail->bill_ID);
        $statement->bindParam(4, $BillDetail->product_ID);
        return $statement->execute();
    }

    public function getBillDetail($bill_ID)
    {
        $sql = "SELECT `billdetail`.`detail_ID`,
        `billdetail`.`count`,
        `billdetail`.`price`,
        `billdetail`.`bill_ID`,
        `billdetail`.`product_ID`
    FROM `demo6`.`billdetail`
    WHERE `bill_ID` = ?;";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $bill_ID);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllBill($user_ID)
    {
        $sql = "SELECT `bills`.`bill_ID`,
        `bills`.`date`,
        `bills`.`note`,
        `bills`.`sumPrice`,
        `bills`.`is_pay`,
        `bills`.`user_ID`,
        `billdetail`.`count`,
        `billdetail`.`price`,
        `billdetail`.`product_ID`,
        `products`.`productName`,
        `containerimage`.`imageName`
    FROM `demo6`.`bills`
    INNER JOIN `demo6`.`billdetail` ON `billdetail`.`bill_ID` = `bills`.`bill_ID`
    INNER JOIN `demo6`.`products` ON `products`.`product_ID` = `billdetail`.`product_ID`
    INNER JOIN `demo6`.`containerimage` ON `containerimage`.`image_ID` = `products`.`image_ID`
    WHERE  `user_ID` = ?;";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $user_ID);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function addOrder($Order)
    {
        $sql = "INSERT INTO `demo6`.`order`
        (`status`,
        `sentDate`,
        `received`,
        `bill_ID`)
        VALUES
        (?,?,?,?);";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $Order->status);
        $statement->bindParam(2, $Order->sentDate);
        $statement->bindParam(3, $Order->received);
        $statement->bindParam(4, $Order->bill_ID);
        return $statement->execute();
    }
    public function getProductDelivery($user_ID)
    {
        $sql = "SELECT `bills`.`bill_ID`,
        `bills`.`date`,
        `bills`.`note`,
        `bills`.`sumPrice`,
        `bills`.`is_pay`,
        `bills`.`user_ID`,
        `billdetail`.`count`,
        `billdetail`.`price`,
        `billdetail`.`product_ID`,
        `products`.`productName`,
        `containerimage`.`imageName`
    FROM `demo6`.`bills`
    INNER JOIN `demo6`.`billdetail` ON `billdetail`.`bill_ID` = `bills`.`bill_ID`
    INNER JOIN `demo6`.`products` ON `products`.`product_ID` = `billdetail`.`product_ID`
    INNER JOIN `demo6`.`containerimage` ON `containerimage`.`image_ID` = `products`.`image_ID`
    WHERE  `user_ID` = ? AND `is_pay` = 0;";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $user_ID);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getProductBought($user_ID){
        $sql = "SELECT `bills`.`bill_ID`,
        `bills`.`date`,
        `bills`.`note`,
        `bills`.`sumPrice`,
        `bills`.`is_pay`,
        `bills`.`user_ID`,
        `billdetail`.`count`,
        `billdetail`.`price`,
        `billdetail`.`product_ID`,
        `products`.`productName`,
        `containerimage`.`imageName`
    FROM `demo6`.`bills`
    INNER JOIN `demo6`.`billdetail` ON `billdetail`.`bill_ID` = `bills`.`bill_ID`
    INNER JOIN `demo6`.`products` ON `products`.`product_ID` = `billdetail`.`product_ID`
    INNER JOIN `demo6`.`containerimage` ON `containerimage`.`image_ID` = `products`.`image_ID`
    WHERE  `user_ID` = ? AND `is_pay` = 1;";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $user_ID);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function countPay($date = null){
        if(empty($date)){
            $sql = "SELECT count(`bill_ID`) AS countPay FROM `demo6`.`bills`;";
        $statement = $this->connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $sql = "SELECT count(`bill_ID`) AS countPay FROM `demo6`.`bills` where month(`date`) = month(?);";
            $statement = $this->connect->prepare($sql);
            $statement->bindParam(1, $date);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $result;
    }
}
