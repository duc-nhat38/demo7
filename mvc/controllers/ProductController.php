<?php
require_once "models/DBConnection.php";
require_once "models/ProductDB.php";

class ProductController
{
    public $productDB;

    public function __construct()
    {
        $this->productDB = new ProductDB(DBConnection::make());
    }
    public function getProduct()
    {
        $id = $_GET["id"];
        $ProductInfo = $this->productDB->select($id);
        $ProductBrand = $this->productDB->getProductBrand($ProductInfo[0]["brand_ID"]);
        return view("productInfo", ["ProductInfo" => $ProductInfo, "ProductBrand" => $ProductBrand]);
    }

    public function getProductBrand(){
        $name = $_GET["name"];
       $brand = $this->productDB->getBrand($name);
       $ProductBrand = $this->productDB->getProductBrand($brand[0]["brand_ID"]);
       return view("productBrand", [ "ProductBrand" => $ProductBrand, "brandName" => $brand[0]["brandName"]]);
    }
    public function getProductHot(){
        $productHots = $this->productDB->isHot();
        return view("isHot", ["productHots" => $productHots]);
    }
    public function getProductNew(){
        $productNews = $this->productDB->isNew();
        return view("isNew", ["productNews" => $productNews]);
    }
}
