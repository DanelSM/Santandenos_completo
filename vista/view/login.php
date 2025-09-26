<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/header.css">

</head>
<body>
     <form action="../../controlador/UsuarioController.php"   method="POST"    class="formulario">
    <H2>inicia sesion</H2>
    
    <label for="correo">CORREO</label>
    <input type="correo" name="email" id="correo" class="box" required>

    <label for="contraseña">CONTRASEÑA</label>
    <input type="text" name="contraseña" id="tarjeta" class="box" required>

    <input type="submit" name="enviar" id="enviar">
</form>
</body>
</html>