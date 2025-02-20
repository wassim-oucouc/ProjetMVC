<?php
namespace app\core\db;


class Database {
    private static $servername = "localhost";
    private static $port = "5555";
    private static $username= "postgres";
    private static $password = "123123";
    private static $dbname = "sokoworksxdb";
    private static $connexion;
    private static $instance;
   
    private function __construct(){
        if (!self::$connexion) {
            try {
                self::$connexion = new PDO("pgsql:host=".self::$servername.";port=".self::$port." dbname=".self::$dbname.";",self::$username,self::$password);
                self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo("connexion done with no issues");
            } catch (PDOException $e) {
                echo'Error:'.$e;
            }
        }
        
    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Database();
        }
            return self::$instance ;
        }
        
        public function getConnection(){
            return self::$connexion;
        }

       
}

Database::getInstance()->getConnection();
