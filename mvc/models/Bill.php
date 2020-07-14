<?php
class Bill {
    public $date;
    public $note;
    public $sumPrice;
    public $isPay;
    public $user_ID;

    public function __construct($sumPrice, $user_ID, $note = null, $isPay = 0)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $this->date = date("Y-m-d H:i:s");
        $this->note = $note;
        $this->isPay = $isPay;
        $this->sumPrice = $sumPrice;
        $this->user_ID = $user_ID;
    }
}
?>