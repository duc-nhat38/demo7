<?php

class ProductDB
{
    public $connect;
    public function __construct($connect)
    {
        $this->connect = $connect;
    }
    public function create($products)
    {
        $sql = "INSERT INTO INSERT INTO `demo6`.`products`
        (`product_ID`,
        `productName`,
        `description`,
        `price`,
        `count`,
        `brand_ID`,
        `discount_ID`,
        `information_ID`,
        `image_ID`,
        `typeproduct_ID`)
        VALUES
        (?,?,?,?,?,?,?,?,?);";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $products->productName);
        $statement->bindParam(2, $products->description);
        $statement->bindParam(3, $products->price);
        $statement->bindParam(4, $products->count);
        $statement->bindParam(5, $products->brand_ID);
        $statement->bindParam(6, $products->discount_ID);
        $statement->bindParam(7, $products->information_ID);
        $statement->bindParam(8, $products->image_ID);
        $statement->bindParam(9, $products->typeproduct_ID);
        return $statement->execute();
    }
    public function select($id = null)
    {
        if (empty($id)) {
            $sql = "SELECT `products`.`product_ID`,
            `products`.`productName`,
            `products`.`price`,
            `products`.`count`,    
            `containerimage`.`imageName`
        FROM `demo6`.`products`
        inner join `demo6`.`containerimage` ON `containerimage`.`image_ID` = `products`.`image_ID` 
        ";
            $statement = $this->connect->prepare($sql);
            $statement->execute();
            $arrayProduct = $statement->fetchALL(PDO::FETCH_ASSOC);
        } else {
            $sql = "SELECT `products`.`product_ID`,
            `products`.`productName`,
            `products`.`description`,
            `products`.`price`,
            `products`.`count`,
            `brand`.`brandName`,
            `brand`.`brand_ID`,
            `discount`.`discount`,
             `informations`.`cpu`,
            `informations`.`ram`,
            `informations`.`hardDrive`,
            `informations`.`screen`,
            `informations`.`screenCard`,
            `informations`.`connector`,
            `informations`.`operatingSystem`,
            `informations`.`design`,
            `informations`.`size`,
            `informations`.`yearManufacture`,
            `containerimage`.`imageName`,
            `typeproduct`.`typeName`,
            `products`.`is_Hot`
        FROM `demo6`.`products`
        INNER JOIN  `demo6`.`discount` ON `discount`.`discount_ID` = `products`.`discount_ID`
        INNER JOIN `demo6`.`brand` ON `brand`.`brand_ID` = `products`.`brand_ID`
        INNER JOIN `demo6`.`informations` ON `informations`.`information_ID` = `products`.`information_ID`
        INNER JOIN `demo6`.`containerimage` ON `containerimage`.`image_ID` = `products`.`image_ID`
        INNER JOIN `demo6`.`typeproduct` ON `typeproduct`.`typeproduct_ID` = `products`.`typeproduct_ID`
        WHERE product_ID = ?";
            $statement = $this->connect->prepare($sql);
            $statement->bindParam(1, $id);
            $statement->execute();
            $arrayProduct = $statement->fetchALL(PDO::FETCH_ASSOC);
        }

        return $arrayProduct;
    }
    public function getBrand($brandName)
    {
        $sql = "SELECT `brand`.`brand_ID`,
        `brand`.`brandName`
    FROM `demo6`.`brand`
    WHERE `brandName` = upper(?);";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $brandName);
        $statement->execute();
        $array = $statement->fetchALL(PDO::FETCH_ASSOC);
        return $array;
    }
    public function getProductBrand($brand_ID)
    {
        $sql = "SELECT `products`.`product_ID`,
        `products`.`productName`,
        `products`.`price`,
        `discount`.`discount`,
        `informations`.`cpu`,
        `brand`.`brandName`,
        `containerimage`.`imageName`
        FROM `demo6`.`products`
        INNER JOIN `demo6`.`informations`
        ON `products`.`information_ID` = `informations`.`information_ID` 
        INNER JOIN `demo6`.`containerimage` 
        ON `containerimage`.`image_ID` = `products`.`image_ID`
        INNER JOIN `demo6`.`discount` 
        ON `discount`.`discount_ID` = `products`.`discount_ID`
        INNER JOIN `demo6`.`brand` 
        ON `brand`.`brand_ID` = `products`.`brand_ID`
        WHERE `products`.`brand_ID` = ? ";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $brand_ID);
        $statement->execute();
        $productBrand = $statement->fetchALL(PDO::FETCH_ASSOC);
        return $productBrand;
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $sql = "DELETE FROM `demo6`.`products` WHERE product_ID = ?;";
            $statement = $this->connect->prepare($sql);
            $statement->bindParam(1, $id);
            return $statement->execute();
        }
    }
    public function update($id = null, $products)
    {
        if (empty($id)) {
            $sql = "UPDATE `demo6`.`products`
            SET
            `productName` = ?,
            `description` = ?,
            `price` = ?,
            `count` = ?,
            `brand_ID` = ?,
            `discount_ID` = ?,
            `information_ID` = ?,
            `image_ID` = ?,
            `typeproduct_ID` = ?;
            ";
            $statement = $this->connect->prepare($sql);

            $statement->bindParam(1, $products->productName);
            $statement->bindParam(2, $products->description);
            $statement->bindParam(3, $products->price);
            $statement->bindParam(4, $products->count);
            $statement->bindParam(5, $products->brand_ID);
            $statement->bindParam(6, $products->discount_ID);
            $statement->bindParam(7, $products->information_ID);
            $statement->bindParam(8, $products->image_ID);
            $statement->bindParam(9, $products->typeproduct_ID);
        } else {
            $sql = "UPDATE `demo6`.`products`
            SET
            `productName` = ?,
            `description` = ?,
            `price` = ?,
            `count` = ?,
            `brand_ID` = ?,
            `discount_ID` = ?,
            `information_ID` = ?,
            `image_ID` = ?,
            `typeproduct_ID` = ?
            WHERE `product_ID` = ?;
            ";
            $statement = $this->connect->prepare($sql);
            $statement->bindParam(1, $products->productName);
            $statement->bindParam(2, $products->description);
            $statement->bindParam(3, $products->price);
            $statement->bindParam(4, $products->count);
            $statement->bindParam(5, $products->brand_ID);
            $statement->bindParam(6, $products->discount_ID);
            $statement->bindParam(7, $products->information_ID);
            $statement->bindParam(8, $products->image_ID);
            $statement->bindParam(9, $products->typeproduct_ID);
            $statement->bindParam(10, $id);
        }
        return $statement->execute();
    }
    public function isNew()
    {
        $sql = "SELECT `products`.`product_ID`,
        `products`.`productName`,
        `products`.`price`,
        `discount`.`discount`,
        `informations`.`cpu`,
        `informations`.`yearManufacture`,
        `containerimage`.`imageName`
        FROM `demo6`.`products`
        INNER JOIN `demo6`.`informations`
        ON `products`.`information_ID` = `informations`.`information_ID` 
        INNER JOIN `demo6`.`containerimage` 
        ON `containerimage`.`image_ID` = `products`.`image_ID`
        INNER JOIN `demo6`.`discount` 
        ON `discount`.`discount_ID` = `products`.`discount_ID`
        WHERE `yearManufacture` = 2020 
        ORDER BY `product_ID` DESC LIMIT 8;";
        $statement = $this->connect->prepare($sql);
        $statement->execute();
        $productNews = $statement->fetchALL(PDO::FETCH_ASSOC);
        return $productNews;
    }
    public function isHot()
    {
        $sql = "SELECT `products`.`product_ID`,
        `products`.`productName`,
        `products`.`price`,
        `products`.`is_Hot`,
        `discount`.`discount`,
        `informations`.`cpu`,
        `informations`.`yearManufacture`,
        `containerimage`.`imageName`
        FROM `demo6`.`products`
        INNER JOIN `demo6`.`informations`
        ON `products`.`information_ID` = `informations`.`information_ID` 
        INNER JOIN `demo6`.`containerimage` 
        ON `containerimage`.`image_ID` = `products`.`image_ID`
        INNER JOIN `demo6`.`discount` 
        ON `discount`.`discount_ID` = `products`.`discount_ID`
        ORDER BY `is_Hot` DESC LIMIT 8;";
        $statement = $this->connect->prepare($sql);
        $statement->execute();
        $productHots = $statement->fetchALL(PDO::FETCH_ASSOC);
        return $productHots;
    }
    public function isSale()
    {
        $sql = "SELECT `products`.`product_ID`,
        `products`.`productName`,
        `products`.`price`,
        `discount`.`discount`,
        `informations`.`cpu`,
        `containerimage`.`imageName`
        FROM `demo6`.`products`
        INNER JOIN `demo6`.`informations`
        ON `products`.`information_ID` = `informations`.`information_ID` 
        INNER JOIN `demo6`.`containerimage` 
        ON `containerimage`.`image_ID` = `products`.`image_ID`
        INNER JOIN `demo6`.`discount` 
        ON `discount`.`discount_ID` = `products`.`discount_ID`
	    WHERE `discount` != 0";
        $statement = $this->connect->prepare($sql);
        $statement->execute();
        $productSales = $statement->fetchALL(PDO::FETCH_ASSOC);
        return $productSales;
    }
    public function search($search)
    {
        $sql = "SELECT `products`.`product_ID`,
        `products`.`productName`,
        `products`.`price`,
        `discount`.`discount`,
        `informations`.`cpu`,
        `containerimage`.`imageName`
        FROM `demo6`.`products`
        INNER JOIN `demo6`.`informations`
        ON `products`.`information_ID` = `informations`.`information_ID` 
        INNER JOIN `demo6`.`containerimage` 
        ON `containerimage`.`image_ID` = `products`.`image_ID`
        INNER JOIN `demo6`.`discount` 
        ON `discount`.`discount_ID` = `products`.`discount_ID`
        WHERE `productName` LIKE ?
        OR `description` LIKE ?
        ;";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $search);
        $statement->bindParam(2, $search);
        $statement->execute();
        $array1 = $statement->fetchALL(PDO::FETCH_ASSOC);
        $sql2 = "SELECT 
    `products`.`product_ID`,
     `products`.`productName`,
     `products`.`price`,
     `discount`.`discount`,
     `informations`.`cpu`,
     `containerimage`.`imageName`
     FROM `demo6`.`brand`
     INNER JOIN `demo6`.`products` ON `products`.`brand_ID` = `brand`.`brand_ID`
     INNER JOIN `demo6`.`informations`
     ON `products`.`information_ID` = `informations`.`information_ID` 
     INNER JOIN `demo6`.`containerimage` 
     ON `containerimage`.`image_ID` = `products`.`image_ID`
     INNER JOIN `demo6`.`discount` 
     ON `discount`.`discount_ID` = `products`.`discount_ID`
     WHERE `brandName` LIKE ?;";
        $statement2 = $this->connect->prepare($sql2);
        $statement2->bindParam(1, $search);
        $statement2->execute();
        $array2 = $statement2->fetchALL(PDO::FETCH_ASSOC);
        $sql3 = "SELECT 
    
     `products`.`product_ID`,
      `products`.`productName`,
      `products`.`price`,
      `discount`.`discount`,
      `informations`.`cpu`,
      `containerimage`.`imageName`
      FROM `demo6`.`informations`
      INNER JOIN `demo6`.`products`
      ON `products`.`information_ID` = `informations`.`information_ID` 
      INNER JOIN `demo6`.`containerimage` 
      ON `containerimage`.`image_ID` = `products`.`image_ID`
      INNER JOIN `demo6`.`discount` 
      ON `discount`.`discount_ID` = `products`.`discount_ID`
      WHERE `cpu` LIKE ?
      OR `ram` LIKE ?
      OR `hardDrive`  LIKE ?
      OR `screen` LIKE ?
      OR `screenCard` LIKE ?
      OR `yearManufacture` LIKE ?";
        $statement3 = $this->connect->prepare($sql3);
        $statement3->bindParam(1, $search);
        $statement3->bindParam(2, $search);
        $statement3->bindParam(3, $search);
        $statement3->bindParam(4, $search);
        $statement3->bindParam(5, $search);
        $statement3->bindParam(6, $search);
        $statement3->execute();
        $array3 = $statement3->fetchALL(PDO::FETCH_ASSOC);
        $result = array_merge($array1, $array2, $array3);

        return array_unique($result, SORT_REGULAR);
    }
    public function addHot($product_ID)
    {
        $sql = "UPDATE `demo6`.`products` SET `is_Hot` =  `is_Hot` + 1
        WHERE `product_ID` = ? ;";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $product_ID);
        return $statement->execute();
    }

    public function countProduct(){
        $sql = "SELECT count(product_ID) AS countProduct,
        sum(count) AS sumCount
         FROM demo6.products ;";
        $statement = $this->connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        // die(var_dump($result));
        return $result;
    }
}
