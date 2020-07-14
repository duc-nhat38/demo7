<?php
require_once "models/DBConnection.php";
require_once "models/CustomerDB.php";
require_once "models/CartDB.php";
require_once "models/BillDB.php";
require_once "models/ProductDB.php";

class AdminController
{
    public $cartDB;
    public $customerDB;
    public $BillDB;
    public $ProductDB;

    public function __construct()
    {
        $this->cartDB = new CartDB(DbConnection::make());
        $this->customerDB = new CustomerDB(DbConnection::make());
        $this->BillDB = new BilDB(DbConnection::make());
        $this->ProductDB = new ProductDB(DbConnection::make());
    }

    public function Admin()
    {
        if ($_SESSION["customer"]["is_admin"] == 1) {
            $countUser = $this->customerDB->countUser();

            $countProduct = $this->ProductDB->countProduct();
            $date = date("Y-m-d");
            $countPayMonth = $this->BillDB->countPay($date);
            $countPayYear = $this->BillDB->countPay();
            return view("admin", [
                "countUser" => $countUser[0]["countUser"],
                "countProduct" => $countProduct[0]["countProduct"],
                "sumProduct" => $countProduct[0]["sumCount"],
                "countPayMonth" => $countPayMonth[0]["countPay"],
                "countPayYear" => $countPayYear[0]["countPay"]
            ]);
        } else {
            return redirect("cart");
        }
    }
    public function UserManagement()
    {
        $listUser = $this->customerDB->getAllUser();
        return view("UserManagement", ["listUser" => $listUser]);
    }

    public function ProductManagement()
    {
        $product = $this->ProductDB->select();
        return view("ProductManagement", ["product" => $product]);
    }
}
