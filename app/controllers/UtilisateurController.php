<?php

include('../app/models/Utilisateur.php');

class UtilisateurController{

    private Utilisateur $Utilisateur;

    public function __construct(){
        $this->Utilisateur;
    }

    public function Create($Nom,$Email,$Password){
        try{
        $this->Utilisateur->Create($Nom,$Email,$Password);
        echo'UserCreated succefully';
        }catch(Exception $e){
        echo'error'.$e ;
        }
    }
    public function ShowAll(){
        $Utilisateurs=$this->Utilisateur->getAll();
        // foreach($Utilisateurs as $Utilisateur){

        // }


    }




}

$C = new UtilisateurController;
$C->Create($test,$test,$test);

?>