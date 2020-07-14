<?php
class CartDetail {
    public $date;
    public $countDetail;
    public $product_ID;
    public $cart_ID;

    public function __construct($product_ID, $cart_ID, $countDetail)
    {
        date_default_timezone_set("Aisa/Ho_Chi_Minh");
        $this->date = date("Y-m-d");
        $this->countDetail = $countDetail;
        $this->product_ID = $product_ID;
        $this->cart_ID = $cart_ID;
    }
}
?>