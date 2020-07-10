<?php


class DbConnection
{
    public static function make()
    {
        try {
            return new PDO('mysql:host=localhost;dbname=demo6;charset=utf8', 'root', 'duc123', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>