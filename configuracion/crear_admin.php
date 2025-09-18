<?php
require_once "conexion.php";

try {
    $db = Database::connect();
    $email = "danelsaavedra@gmail.com";

    // Consultar si el usuario ya existe
    $consul = $db->prepare("SELECT * FROM usuarios WHERE email = :email");
    $consul->execute([":email" => $email]);

    if (!$consul->fetch()) {
        $pass = password_hash("12345", PASSWORD_BCRYPT);

        // Cambia columnas y valores según tu tabla
        $sql = "INSERT INTO usuarios(nombre_usuario, email, contrasena, telefono, rol) VALUES ('Admin', :email, :clave, '3175469977', 'Administrador')";
        
        $consult = $db->prepare($sql);
        $consult->execute([":email" => $email, ":clave" => $pass]);
        echo "Usuario administrador creado";
    } else {
        echo "El administrador ya existe";
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
