<?php

namespace app\core;
require_once('../vendor/autoload.php');
use app\controllers\authController;
use app\controllers\FreelancerController;

class Router
{
    private $controller;
    private $method;
    private $param = [];
    public function __construct()
    {
//        var_dump($_SERVER);
//        die;
        $url = $this->getUrl();

        // [user,edit,2]
        if (isset($url[0])) {
            $controllerClass = ucwords($url[0]);        



            if (class_exists('\\app\\controllers\\' . $controllerClass . 'Controller')) { //UserController if exist or not

                $this->controller = $controllerClass;

            }

            $controllerClass = '\\app\\controllers\\' . $this->controller . 'Controller'; //UserController
            $this->controller = new $controllerClass();
            // $user = new UserController;

            if (isset($url[1])) {                          // [user,edit,2]
//                 echo'method is set';
                //  $url[1]='edit'; methode
                if (method_exists($this->controller, $url[1])) { // accept  controller and methode
                    $this->method = $url[1];
//                    echo'method is set';
                }
            }


            if (!empty($_REQUEST)) {
                // $_REQUEST return array assoc des param
                // [id=>1]
                $this->convertArray($_REQUEST);
            } else {
                $this->param = [];
            }
        } else {
            $this->controller = new $this->controller;
        }
//        var_dump($this->param);
        call_user_func_array([$this->controller, $this->method], $this->param);
    }
    private function convertArray($array)
    {
        foreach ($array as $value) {
            array_push($this->param, $value);
        }
    }
    private function getBasePaths()
    {
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path ");
    }

    public function GetUrl()
    {
        if(empty($_SERVER['PATH_INFO']))
        {
            $request = "";
        }
        else
        {
            $request = $_SERVER['PATH_INFO'];
            $uri = explode('/',trim($request,'/'));
            // var_dump($uri);
            return $uri;
        }
    }
}



?>
