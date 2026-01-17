<?php

class Database
{
    public static function connect(): PDO
    {
        try {
            $bdd = new PDO('mysql: host=localhost; dbname=ajax', 'root', '');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $bdd;
    }
}
