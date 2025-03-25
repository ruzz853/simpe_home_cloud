<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
function error_report($e_pdo)
{
  print_r($e_pdo->errorInfo());
}
*/

class database_manager{
    private $_host = "localhost";
    private $_user = "user";
    private $_passw = "password";
    private $_db = "cloud_users";

    private static $_dbAccess;

    public function __construct(){
        $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
        self::$_dbAccess = new PDO("mysql:host=$this->_host;dbname=$this->_db;charset=utf8mb4", $this->_user, $this->_passw, $options);
        } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function getInstance(){
        if (self::$_dbAccess) return self::$_dbAccess; 
        else new database_manager(); 
            return self::$_dbAccess;
        
    }

    public function checkUser($email, $pswd){
        try{
        $stmt = self::$_dbAccess->prepare('SELECT * FROM Users WHERE email = :email AND password = :pswd');
        $stmt->execute(['email' => $email, 'pswd' => $pswd]);
        return $stmt->fetch();
       } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
          }
    }
}

?>