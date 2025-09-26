<?php
require_once "../configuracion/conexion.php";
require_once "../modelo/Usuario.php";

class UsuarioController {
    private $modelusuario;

    public function __construct() {
        $this->modelusuario = new Usuario(); 
    }

    public function validarusu() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Corregí la forma en que accedes a $_POST['password'], antes tenías $_POST ['$password'] que está mal
            $usuario = $this->modelusuario->login($_POST['email'], $_POST['password']);

            if ($usuario) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                header("Location: ../vista/view/registro.php");
                exit();
            } else {
                header("Location: ../vista/view/perfil.php");
                exit();
            }
        }
    }

    // Definición correcta del método cerrarSesion dentro de la clase
    public function cerrarsesion(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Parece que aquí querías hacer algo, pero el código estaba incompleto
            // Además, la línea con el signo '?' está mal escrita, la corregí

            $nombre = $_POST['nombre'] ?? null;
            $email = $_POST['email'] ?? null;
            $contrasena = $_POST['contrasena'] ?? null;
            $telefono = $_POST['telefono'] ?? null;
            $rol = $_POST['rol'] ?? null;

            // Aquí puedes agregar lo que necesites hacer para cerrar sesión o procesar datos
            session_start();
            session_unset();
            session_destroy();

            // Redirigir después de cerrar sesión, ejemplo:
            header("Location: ../vista/view/login.php");
            exit();
        }
    }
}

// Crear objeto y llamar a validarusu sólo si este archivo es accedido directamente
$objeto = new UsuarioController();
$objeto->validarusu();
?>
