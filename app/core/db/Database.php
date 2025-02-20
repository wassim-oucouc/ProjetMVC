<?php

class Database
{
    private $dsn = "mysql:host=localhost;dbname=projetmvc;charset=UTF8";
    private $username = 'root';
    private $password;

    public function connection()
    {
        try
        {
            $conn = new PDO($this->dsn,$this->username,$this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            echo'connection done with no issues';
            return $conn;
        }
        catch(PDOException $error)
        {
            throw new Exception($error->getmessage());
        }
    }
}



?>