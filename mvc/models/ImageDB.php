<?php
class ImageDB
{
    public $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }
    public function select($condition = null)
    {
        if (empty($condition)) {
            $sql = "SELECT * FROM `demo6`.`containerimage`;";
            $statement = $this->connect->prepare($sql);
            $statement->execute();
            $arrayImage = $statement->fetchALL(PDO::FETCH_ASSOC);
        } else {
            $sql = "SELECT * FROM `demo6`.`containerimage`
        WHERE typeImage_ID = ?";
            $statement = $this->connect->prepare($sql);

            $statement->bindParam(1, $condition);
            $statement->execute();
            $arrayImage = $statement->fetchALL(PDO::FETCH_ASSOC);
        }

        return $arrayImage;
    }
}