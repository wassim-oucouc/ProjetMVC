<?php

include('../core/db/Database.php');

class Utilisateur{

    private int $ID;
    private string $NOM;
    private string $Email;
    private string $Password;
    private PDO $PDO;
    /**
     * @param int $ID
     */
    public function __construct()
    {
        $this-> PDO = new Database();
    }


    public function getID(): int
    {
        return $this->ID;
    }

    public function setID(int $ID): void
    {
        $this->ID = $ID;
    }

    public function getNOM(): string
    {
        return $this->NOM;
    }

    public function setNOM(string $NOM): void
    {
        $this->NOM = $NOM;
    }

    public function getEmail(): string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): void
    {
        $this->Email = $Email;
    }

    public function getPassword(): string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): void
    {
        $this->Password = $Password;
    }

    public function Create($Nom,$Email,$Password){
        try{
        $query = ' INSERT INTO Utilisateurs (NOM,Email,Password) VALUES ('.$Nom.','.$Email.','.$Password.'); ';
        
        $stmt = Database::connection() -> prepare($query);
        $stmt -> execute();
        }catch(PDOException $e){
            echo'Error'.$e;
        }
    }

        public function getAll(){
            try{
            $query = ' SELECT ID,Nom,Email,Password FROM Utilisateurs  ';
            $stmt = Database::connection() -> prepare($query);
            $result = $stmt -> execute();
            return $result;
            }catch(PDOException $e){
                echo'Error'.$e;
            }
        
}
}

?>