<?php
class Images{
    public $image_ID;
    public $imageName;
    public $typeImage_ID;

    public  function __construct($image_ID, $imageName, $typeImage_ID)
    {
        $this->image_ID = $image_ID;
        $this->imageName = $imageName;
        $this->typeImage_ID = $typeImage_ID;

    }

}
?>