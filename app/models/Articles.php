<?php

include_once('../app/core/db/Database.php');


class Articles
{
    private $ID;
    private $Titre;
    private $Contenu;
    private $Date_publication;
    private utilisateur $utilisateur;
    private $connexion;

    private $conn;


    public function __construct()
    {
        $this->connexion = new Database();

    }

    public function getID()
    {
        return $this->ID;
    }
    public function GetTitre()
    {
        return $this->Titre;
    }
    public function GetContenu()
    {
        return $this->Contenu;
    }

    public function GetDatePublication()
    {
        return $this->Date_publication;
    }

    public function Getutilisateur()
    {
        return $this->utilisateur;
    }

    public function GetConnexion()
    {
        return $this->connexion;
    }

    public function SetId($id)
    {
        $this->ID = $id;
    }

    public function SetTitre($titre)
    {
        $this->Titre = $titre;
    }

    public function SetDatePublication($date)
    {
        $this->Date_publication = $date;
    }

    public function CreateArticle($titre,$date,$id_user)
    {
        try
        {
        $query = "INSERT INTO articles(Titre, Date_publication,id_utilisateur) VALUES (:titre,:Date,:id_user)";
        $conn = $this->connexion->connection()->prepare($query);
        $conn->bindParam(':titre',$titre);
        $conn->bindParam(':Date',$date);
        $conn->bindParam(':id_user',$id_user);
        $conn->execute();
        return $this->connexion->connection()->lastInsertId();
        }

        catch(PDOException $e)
        {
            throw new exception($e->getMessage());
        }
        

    }

    public function GetArticles()
    {
        try
        {
        $query = "SELECT * FROM articles";
        $conn = $this->connexion->connection()->prepare($query);
        $conn->execute();
        return $conn->fetchAll(PDO:: FETCH_OBJECT);
        }
        catch(PDOException $e)
        {
            throw new exception($e->getMessage());
        }
    }

    
}




?>