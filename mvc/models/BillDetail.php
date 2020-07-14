<?php
class BillDetail
{
    public  $count;
    public $price;
    public $bill_ID;
    public $product_ID;

    public function __construct($count, $price, $bill_ID, $product_ID)
    {
        $this->count = $count;
        $this->price = $price;
        $this->bill_ID = $bill_ID;
        $this->product_ID = $product_ID;
    }
}
