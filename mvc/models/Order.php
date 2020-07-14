<?php
class Order{
    public $sentDate;
    public $received;
    public $status;
    public $bill_ID;

    public function __construct($sentDate, $received, $status = null ,$bill_ID)
    {
        $this->sentDate = $sentDate;
        $this->received = $received;
        $this->status = $status;
        $this->bill_ID = $bill_ID;
    }
}
?>