<?php
require_once "models/DBConnection.php";
require_once "models/ImageDB.php";
require_once "models/Images.php";
require_once "models/ProductDB.php";

class HomePage {

    public function home(){

        $ImageDB = new ImageDB(DbConnection::make());
        $arrayImage = $ImageDB->select(2);

        $Products = new ProductDB(DbConnection::make());
        $productNews = $Products->isNew();
        $productHots = $Products->isHot();
        $productSales = $Products->isSale();
        return view("home",["arrayImage" => $arrayImage, "productNews" => $productNews,
         "productHots"=> $productHots, "productSales"=>$productSales]);

    }
    public function search(){
        $ImageDB = new ImageDB(DbConnection::make());
        $arrayImage = $ImageDB->select(2);
        $input  = $_GET['input'];
        $note = "Vui lòng nhập từ bạn cần tìm.";
        if(empty($input)){
            return view("search", ["arrayImage" => $arrayImage, "note"=> $note]);
        }else{
        $key = "%$input%";
        $Products = new ProductDB(DbConnection::make());
        $productSearch = $Products->search($key);
        return view("search", ["productSearch"=>$productSearch]);
        }   
    }
}
?>