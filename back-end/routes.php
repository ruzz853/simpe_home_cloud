`<?php

class routes_manager{

    private $uri;

    /*function __construct($request){
        $this->request = $request;

    } */

    function __construct($uri){
        $this->uri = $uri;
    } 

    function redirect($uri){
       
        switch ($uri){
            case"/dashboard":
                header('Location: ../dashboard.html');
                break;
            case"/login":
                header('Location: ../login.html');
                break;
            case "/auth":
                header('Location: ../back-end/auth.php');
                break;
            case "/home":
                header("Location: ../homepage.html");
                break;
        }
    }        

}


?>