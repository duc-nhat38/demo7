<?php
class CustomerDB
{
    public $connect;
    public function __construct($connect)
    {
        $this->connect = $connect;
    }
    public function getUser($customer)
    {
        $sql = "SELECT
       `customers`.`user_ID`,
    `customers`.`userName`,
    `customers`.`password`,
    `customers`.`is_admin`,
    `customers`.`customer_ID`
    FROM `demo6`.`customers`
    WHERE `userName` = ? AND `password` = ?";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $customer->username);
        $statement->bindParam(2, $customer->password);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function isAdmin($customer)
    {
        $sql = "SELECT
        `customers`.`userName`,
        `customers`.`password`
    FROM `demo6`.`customers`;
    WHERE `is_admin` != 0;";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $customer->userName);
        $statement->bindParam(2, $customer->password);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function registration($customer, $regis_ID)
    {

        $sql = "INSERT INTO `demo6`.`customers`
        (`userName`,
        `password`,
        `customer_ID`)
        VALUES
        (?,?,?);";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $customer->username);
        $statement->bindParam(2, $customer->password);
        $statement->bindParam(3, $regis_ID);
        return $statement->execute();
    }
    public function addDetail($customerDetail)
    {
        $sql = "INSERT INTO `demo6`.`customerdetails`
                (`fullName`,
                `address`,
                `email`,
                `phone`,
                `image`)
                VALUES
                (?,?,?,?,?);";

        $statement = $this->connect->prepare($sql);
        $statement->bindParam(1, $customerDetail->fullName);
        $statement->bindParam(2, $customerDetail->address);
        $statement->bindParam(3, $customerDetail->email);
        $statement->bindParam(4, $customerDetail->phone);
        $statement->bindParam(5, $customerDetail->image);
        return $statement->execute();
    }
    public function getDetail($customer_ID = null)
    {
        if ($customer_ID === null) {
            $sql = "SELECT `customerdetails`.`customer_ID`,
        `customerdetails`.`fullName`,
        `customerdetails`.`address`,
        `customerdetails`.`email`,
        `customerdetails`.`phone`,
        `customerdetails`.`image`
        FROM `demo6`.`customerdetails`
        ORDER BY `customer_ID` DESC LIMIT 1";
            $statement = $this->connect->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "SELECT `customerdetails`.`customer_ID`,
        `customerdetails`.`fullName`,
        `customerdetails`.`address`,
        `customerdetails`.`email`,
        `customerdetails`.`phone`,
        `customerdetails`.`image`
        FROM `demo6`.`customerdetails`
        WHERE `customer_ID` = ? ;";
            $statement = $this->connect->prepare($sql);
            $statement->bindParam(1, $customer_ID);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function countUser()
    {
        $sql = "SELECT count(`user_ID`) AS countUser FROM `demo6`.`customers` where `is_admin` != 1;";
        $statement = $this->connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getAllUser()
    {
        $sql = "SELECT `customers`.`user_ID`,
        `customers`.`userName`,
        `customers`.`password`,
        `customerdetails`.`customer_ID`,
        `customerdetails`.`fullName`,
        `customerdetails`.`address`,
        `customerdetails`.`email`,
        `customerdetails`.`phone`,
        `customerdetails`.`image`
    FROM `demo6`.`customers`
    INNER JOIN `demo6`.`customerdetails` ON `customerdetails`.`customer_ID` =`customers`.`customer_ID`
    WHERE `is_admin` = 0;";
        $statement = $this->connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
