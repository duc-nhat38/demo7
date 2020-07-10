<?php
require_once "models/DBConnection.php";
require_once "models/CartDB.php";
require_once "models/CartDetail.php";
class CartController {
    public function addCart(){
        if(isset($_SESSION['customer'])){
            $product_ID = $_GET['id'];
            $user_ID = $_SESSION['customer']['user_ID'];
            $CartDB = new CartDB(DbConnection::make());
            if(empty($CartDB->getCart($user_ID))){
                $CartDB->addCart($user_ID);
                $cart_ID = $CartDB->getCart($user_ID);
            } 
            $cart_ID = $CartDB->getCart($user_ID);
            $cartDetail = new CartDetail($product_ID, $cart_ID[0]['cart_ID']);
            $CartDB->addDetail($cartDetail);

            $_SESSION['countCart'][0]['count'] += 1;
            
            return redirect('');

        }else{
            return redirect("formLogin");
        }
    }
    public function getCart(){
        if(isset($_SESSION['customer'])){
            $user_ID = $_SESSION['customer']['user_ID'];
            $CartDB = new CartDB(DbConnection::make());
            $cart_ID = $CartDB->getCart($user_ID);        
            $productCart = $CartDB->getCartDetail($cart_ID[0]['cart_ID']);
            return view("cart", ["productCart" => $productCart]);
        }else{
            return redirect("formLogin");
        }
    }
    // public function increaseQuantity(){
    //     $id = $_GET["id"];
    //     $input = $_GET['quantity'];
    //     $increase = $input - $_SESSION["countCart"][0]['count'];

    // }
}
?>