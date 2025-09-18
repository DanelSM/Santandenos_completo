<?php
require_once "../../conexion.php";
class UsuarioController{
    
    private $modelusuario;

    private function __construct(){
        $this->modelusuario = new usuario();
    }

    
     public function validarusu(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $usuario = $this->modelusuario->login($_POST['email'],$_POST['contraseña']);

            if($usuario){
                session_start();
                $_SESSION['usuario']=$usuario;
                header("Location: ../../vista/perfil.html");
            }else{
                echo "credenciales erroneas";
                header("Location: ../../vista/login.html");
            }
        }
     }   
    }
?>