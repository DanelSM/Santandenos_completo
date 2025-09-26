<?php
require_once "../configuracion/conexion.php"; // Asegúrate de que aquí esté la clase Database

class Usuario {
    private $db;

    public function __construct(){
        $this->db = Database::connect(); // Asegúrate que Database::connect() devuelva una instancia PDO
    }

    public function obtenerUsuario($email){
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $consul = $this->db->prepare($sql);
        $consul->execute([":email" => $email]);

        return $consul->fetch(PDO::FETCH_ASSOC);
    }

    public function login($email, $pass){
        $usuario = $this->obtenerUsuario($email);
        if($usuario && password_verify($pass, $usuario['contrasena'])){ // Cambié 'contraseña' por 'contrasena' para que coincida con la BD
            return $usuario;
        }
        return false;
    }

    public function listarUsuarios($email, $contrasena){
        // Aquí podrías implementar una lista de usuarios
        $usuario = $this->obtenerUsuario($email);
        if($usuario && password_verify($contrasena, $usuario['contrasena'])){  // Corregí paréntesis y password_verify
            return $usuario;
        }
        return false; // Falta un return para el caso contrario
    }

    public function crearUsuarios($nombre_usuario, $email, $contrasena, $telefono, $rol){
        // Aquí podrías implementar creación de usuarios
        $hash = password_hash($contrasena, PASSWORD_BCRYPT);
        $sql= "INSERT INTO usuarios(nombre, email, contrasena, telefono, rol) VALUES (:nombre, :email, :contrasena, :telefono, :rol)";
        $consul = $this->db->prepare($sql);
        return $consul->execute([
            ":nombre" => $nombre_usuario,
            ":email" => $email,
            ":contrasena" => $hash, // Debe usarse el hash, no la contraseña en texto plano
            ":telefono" => $telefono,
            ":rol" => $rol
        ]);
    }
}
?>
