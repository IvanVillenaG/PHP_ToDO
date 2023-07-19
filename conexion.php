<?php
try {
    $conexion = new PDO('mysql:host=localhost;dbname=user', 'root', ''); // Cambiar los datos de acceso si es necesario
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión:" . $e->getMessage();
}

?>