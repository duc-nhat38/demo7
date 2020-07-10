<?php
class CustomerDetail{
    public $fullName;
    public $address;
    public $email;
    public $phone;
    public $image;
    public function __construct($fullName = null, $address = null, $email = null, $phone = null, $image = null)
    {
        $this->fullName = $fullName;
        $this->address  = $address;
        $this->email = $email;
        $this->phone = $phone;
        $image = $image;
    }
}
?>