<?php

#definir una clase

class Database{

    #definir los atributos

    private static $host = "localhost";
    private static $dbname = "santanderenos";
    private static $username = "admin2025";
    private static $password = "1234";
    private static $charset = "utf8mb4";
    private static $pdo = null;


    private function __construct(){

    }
    public static function connect(){
        if(self::$pdo === null){

            try{
               $dn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=" . self::$charset;
                self::$pdo = new PDO($dn,self::$username,self::$password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            }catch(PDOException $e){
                
                die("Error de conexion".$e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>