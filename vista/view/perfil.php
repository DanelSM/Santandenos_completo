<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil del Usuario</title>
    <link rel="stylesheet" href="../css/perfil.css">
</head>
<body>
    <div class="perfil-container">
        <h1>Perfil</h1>
        <p class="perfil-bienvenida">
            Bienvenido, <?php echo isset($_SESSION['nombre']) ? ($_SESSION['nombre']) : 'Admin'; ?>
        </p>
        <a href="index.php" class="btn-cerrar-sesion">Cerrar Sesión</a>

    </div>
</body>
</html>
