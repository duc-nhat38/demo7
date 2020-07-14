<?php
require_once "models/DBConnection.php";
require_once "models/CartDB.php";
require_once "models/ProductDB.php";
require_once "models/BillDB.php";
require_once "models/Bill.php";
require_once "models/BillDetail.php";
class PayController
{
    public $CartDB;
    public $BillDB;
    public function __construct()
    {
        $this->CartDB = new CartDB(DbConnection::make());
        $this->BillDB = new BilDB(DbConnection::make());
    }
    public function addBill()
    {
        $fullName = $_GET['fullName'];
        $phone =  $_GET['phone'];
        $email =  $_GET['email'];
        $address =  $_GET['address'];
        $status = null;
        if(isset($_GET["status"])){
            $status = $_GET["status"];
        }
        $user_ID = $_SESSION["customer"]['user_ID'];
        $customer_ID = $_SESSION["customer"]['customer_ID'];
        // die(var_dump($_SESSION['customerDetail']));
        if (!in_array($fullName, $_SESSION['customerDetail'] )) {
            $_SESSION['customerDetail']['fullName'] = $fullName;
        }
        if (!in_array($phone, $_SESSION['customerDetail'])) {
            $_SESSION['customerDetail']['phone'] = $phone;
        }
        if (!in_array($email, $_SESSION['customerDetail'])) {
            $_SESSION['customerDetail']['email'] = $email;
        }
        if (!in_array($address, $_SESSION['customerDetail'])) {
            $_SESSION['customerDetail']['address'] = $address;
        }
        $Cart_ID = $this->CartDB->getCart($user_ID);
        
        $CartDetail = $this->CartDB->getCartDetail($Cart_ID[0]["cart_ID"]);
        $sumPrice = 0;
        foreach ($CartDetail as $value) {
            $sumPrice += $value["sumPrice"];
        }
        $Bill = new Bill($sumPrice, $_SESSION['customer']["user_ID"], $status);
        $this->BillDB->addBill($Bill);
        $getBill = $this->BillDB->getBill($_SESSION['customer']["user_ID"]);
        for ($i = 0; $i < count($CartDetail); $i++) {
            $BillDetail = new BillDetail($CartDetail[$i]["count"], $sumPrice, $getBill[0]['bill_ID'], $CartDetail[$i]["product_ID"]);
            $this->BillDB->addBillDetail($BillDetail);
        }
        $this->CartDB->delCart($Cart_ID[0]["cart_ID"]);
        $_SESSION['countCart'] = 0;
        return view("pay", ["InfoBill" => $CartDetail]);
    }

    public function getBill(){
        $user_ID = $_SESSION["customer"]['user_ID'];
        // die(var_dump($user_ID));
        $InfoBill = $this->BillDB->getAllBill($user_ID);
        return view("pay", ["InfoBill" => $InfoBill]);
    }

    // public function order(){
     
    // }
}
