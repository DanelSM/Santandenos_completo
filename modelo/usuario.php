<?php
require_once "../configuracion/conexion.php";
    class usuario{

    $db;

    private function __construct(){
        $this->Database::connect();
    }
}
    public function obtenerUsuario($email){
        $sql = "SELECT * FROM usuarios WHERE $email = :$email LIMIT 1"
        $consul = $this->db->prepare($sql);
        $consul->execute([":email"=>$email]);

        return $consul->fetch();

    }
    public function login($email,$pass){
        $usuario = $this->obtenerUsuario($email);
        if($usuario && password_verify($pass,$usuario['contraseña'])){
            return $usuario;

        }
        return false;
    }
    public function listarusuarios(){

    }
    public function crearusuarios(){

    }

?>