<?php

try {
    $connect = new PDO('mysql:host=localhost;dbname=todo', 'root', '');
} catch (PDOException $e) {
    echo "Error de conexión:" . $e->getMessage();
}

if (isset($_POST['agregar_tarea'])) {
    $tarea = $_POST['tarea'];
    $sql = 'INSERT INTO tareas (tarea, completado) VALUES (?, 0)';
    $sentencia = $connect->prepare($sql);
    $sentencia->execute([$tarea]);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tareas WHERE id=?";
    $sentencia = $connect->prepare($sql);
    $sentencia->execute([$id]);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['toggle_completado'])) {
    $id = $_POST['id'];
    $completado = $_POST['completado'] == 1 ? 0 : 1;
    $sql = "UPDATE tareas SET completado=? WHERE id=?";
    $sentencia = $connect->prepare($sql);
    $sentencia->execute([$completado, $id]);
}

$sql = "SELECT * FROM tareas";
$resultados = $connect->query($sql)->fetchAll();


$connect = null;

?>