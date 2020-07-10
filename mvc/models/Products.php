<?php
class Products{
    public $productName;
    public $description;
    public $price;
    public $count;
    public $brand_ID;
    public $discount_ID;
    public $information_ID;
    public $image_ID;
    public $typeproduct_ID;

    public function __construct($productName, $description, $price, $count,$brand_ID, $discount_ID, $information_ID, $image_ID, $typeproduct_ID)
    {
        $this->productName = $productName;
        $this->description = $description;
        $this->price = $price;
        $this->count = $count;
        $this->brand_ID = $brand_ID;
        $this->discount_ID = $discount_ID;
        $this->information_ID = $information_ID;
        $this->image_ID = $image_ID;
        $this->typeproduct_ID = $typeproduct_ID;
    }

}