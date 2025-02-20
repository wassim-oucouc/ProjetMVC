<?php
namespace app\controllers;

use app\controllers\UtilisateurController;
use app\models\authModel;
use app\http\LoginForm;
use app\http\RegisterForm;
class authController{
    private UtilisateurController $utilisateurController;
    private AuthModel $authModel;
    public function __construct() {
        $this-> utilisateurController = new UtilisateurController() ;
        $this->authModel = new AuthModel() ;
    }

    public function register(RegisterForm $registerForm) {
        try {

            $user = $this->authModel->register($registerForm);
            return $user;
        }catch (PDOException $e) {
              echo"error:".$e;
        }
    }




    public function login($email,$password) {
//         var_dump($email,$password);
        $loginForm = new LoginForm() ;
        $loginForm->intance($email,$password);
//        var_dump($loginForm);
//        die;
        try {
            $user = $this->authModel->login( $loginForm);
            return $user;
        } catch (PDOException $e) {
            echo"error!:".$e;
        }

        header('location: dashboard');
    }

}




?>