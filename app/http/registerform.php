<?php
namespace app\http;

class RegisterForm
{
    public string $name;
    public string $lName;
    public string $Email;
    public string $password;
    public string $passwordConfirmation;
    public string $rolename;

    public function __call($name, $arguments){
        if ($name = "instance") {
           
                $this->name = $arguments[0];
                $this->lName = $arguments[1];
                $this->Email = $arguments[2];
                $this->password = $arguments[3];
                $this->passwordConfirmation = $arguments[4];
                $this->rolename = $arguments[5];
            }}






}
