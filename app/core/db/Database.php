<?php

class Database
{
    private $dsn = "mysql:host=localhost;dbname=projetmvc;charset=UTF8";
    private $username = 'root';
    private $password = "";


    public function connection()


    {
        try
        {
            $conn = new PDO(static::$dsn,static::$username,static::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $error)
        {
            throw new Exception($error->getmessage());
        }
    }
}



?>

