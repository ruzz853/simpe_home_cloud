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
                header('../front-end/dashboard.html');
                break;
            case"/login":
                header('../front-end/login.html');
                break;
            case "/auth":
                header('auth.php');
                break;
            case "/home":
                 header("../front-end/homepage.html");
                break;
        }
    }        

}


?>