<?php

require 'conexion.php';

if (isset($_POST['registro'])) {

    $usuario = $_POST['nombre_user'];
    $contraseña = $_POST['contrasena_user'];

    $sql = "INSERT INTO usuarios (usuario, contraseña) VALUES ('$usuario', '$contraseña')";
    $resultados = $conexion->exec($sql);

    if ($resultados) {
        echo "¡Se insertaron los datos correctamente!";
        echo '<br>';
        echo '<a href="login.html" class="btn btn-primary">Ir a la página de inicio de sesión</a>';
    } else {
        echo "¡No se puede insertar la información!" . "<br>";
        echo "Error: " . $sql . "<br>" . $conexion->errorInfo()[2];
    }
}

?>