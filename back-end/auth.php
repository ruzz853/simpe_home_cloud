<?php

require 'db_manager.php';
require 'routes.php';

class auth_manager{
    private $db = new database_manager();
    private $router; 
    private $email;
    private $password;
    private $uri;

    function __construct($uri,$postdata,$router){
        //$this->$db = ;
        $this->$uri = $uri;
        $this->$router = new router_manager($uri);
        $this->email = $postdata["email"];
        $this->password = $postdata["pswd"];
    }

    function auth(){
        if (isset($_POST)) {
            http_response_code(200);
            if ($db->checkUser($email,$password)){ 
                echo "succes";
                $router->redirect("/home"); }
            else {$router->redirect("/login");}
        }else{ 
            http_response_code(404);
            $router->redirect("/login");
        }
    }
}

?>