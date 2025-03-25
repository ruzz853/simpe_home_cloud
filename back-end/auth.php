<?php

require 'db_manager.php';
require 'routes.php';

class auth_manager{
    private $db;
    private $router; 
    private $email;
    private $password;
    private $uri;

    function __construct($uri,$postdata,$router){
        $this->db = new database_manager();
        $this->uri = $uri;
        $this->router = new routes_manager($uri);
        $this->email = $postdata["email"];
        $this->password = $postdata["pswd"];
    }

    function auth(){
        if (isset($_POST)) {
            http_response_code(200);
            if ($this->db->checkUser($this->email,$this->password)){ 
                echo "succes";
                echo $this->router->redirect("/home"); }
            else {$this->router->redirect("/login");}
        }else{ 
            http_response_code(404);
            $this->router->redirect("/login");
        }
    }
}

?>