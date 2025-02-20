<?php


class Database
{
    private $dsn = "mysql:host=localhost;dbname=projetmvc;charset=UTF8";



    private $username = 'root';
    private $password = 'Jaafar@27';

    public function connection()
    {
        try
        {
            $conn = new PDO($this->dsn,$this->username,$this->password);
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

