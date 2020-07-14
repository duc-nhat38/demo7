<?php
require_once "models/DBConnection.php";
require_once "models/CartDB.php";
require_once "models/CartDetail.php";
require_once "models/ProductDB.php";
require_once "models/CustomerDB.php";
class CartController
{
    public function addCart()
    {
        if (isset($_SESSION['customer'])) {
            $product_ID = $_GET['id'];
            $countDetail = $_GET['quantity'];
            $user_ID = $_SESSION['customer']['user_ID'];
            $CartDB = new CartDB(DbConnection::make());
            if (empty($CartDB->getCart($user_ID))) {
                $CartDB->addCart($user_ID);
                $cart_ID = $CartDB->getCart($user_ID);
            }
            $cart_ID = $CartDB->getCart($user_ID);
            $cartDetail = new CartDetail($product_ID, $cart_ID[0]['cart_ID'], $countDetail);
            $CartDB->addDetail($cartDetail);
            $ProductDB = new ProductDB(DbConnection::make());
            $ProductDB->addHot($product_ID);
            $_SESSION['countCart'] += $countDetail;
            if ($_GET['submit'] === "add") {
                return redirect('');
            }
            if($_GET['submit'] === "paynow"){
                return redirect('cart');
            }
        } else {
            return redirect("formLogin");
        }
    }
    public function getCart()
    {
        if (isset($_SESSION['customer'])) {
            $user_ID = $_SESSION['customer']['user_ID'];
            $CartDB = new CartDB(DbConnection::make());
            $cart_ID = $CartDB->getCart($user_ID);
            $productCart = $CartDB->getCartDetail($cart_ID[0]['cart_ID']);

            $customerDetail = $_SESSION["customerDetail"];
            return view("cart", ["productCart" => $productCart, "customerDetail" => $customerDetail]);
        } else {
            return redirect("formLogin");
        }
    }
    public function increaseQuantity()
    {
        $input = $_GET['quantity'];
        $original = $_GET["original"];
        $product_ID = $_GET['id'];
        $countDetail = $input - $original;
        $user_ID = $_SESSION['customer']['user_ID'];
        $CartDB = new CartDB(DbConnection::make());
        $cart_ID = $CartDB->getCart($user_ID);
        if ($countDetail > 0) {
            $cartDetail = new CartDetail($product_ID, $cart_ID[0]['cart_ID'], $countDetail);
            $CartDB->addDetail($cartDetail);
            $_SESSION['countCart'] += $countDetail;
            $ProductDB = new ProductDB(DbConnection::make());
            $ProductDB->addHot($product_ID);
        } else {
            $count = abs($countDetail);
            return redirect("delCart?id=$product_ID&cart_ID=$cart_ID&count=$count");
        }

        return redirect('cart');
    }
    public function delCart()
    {
        $cart_ID = $_GET["cart_ID"];
        $count = $_GET["count"];
        $CartDB = new CartDB(DbConnection::make());
        if (isset($_GET['id'])) {
            $product_ID = $_GET['id'];
            $CartDB->delCart($cart_ID, $product_ID);
        } else {
            $CartDB->delCart($cart_ID);
        }
        $_SESSION['countCart'] -= $count;
        if ($_SESSION['countCart'] < 0) {
            $_SESSION['countCart'] = 0;
        }
        return $this->getCart();
    }
}
