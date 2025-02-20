<?php
namespace app\http;
class LoginForm{
    public string $Email;
    public string $password;

    public function __construct()
    { 
    }
    
    public function __call($name, $arguments)
    {
        if ($name="instance" ){
//            echo'here';
            if(count($arguments)==2){
            $this -> Email =$arguments[0];
            $this -> password = $arguments[1];
            } }
    }

    public function setEmail($email){
     $this -> Email=$email;
    }
    
    public function setPassword($password){
     $this-> password=$password;
    }

}



?>