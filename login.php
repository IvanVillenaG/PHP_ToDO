<?php
require 'conexion.php';

$mensaje_error = "";

if (isset($_POST['login'])) {
	$usuario = $_POST['nombre_user'];
	$contraseña = $_POST['contrasena_user'];

	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
	$resultados = $conexion->query($sql);
	$numero_registros = $resultados->rowCount();

	if ($numero_registros != 0) {
		echo "Inicio de sesión exitoso. Bienvenido, " . $usuario . "!";
		header('Location: tareas.php');
		exit();
	} else {
		$mensaje_error = "Credenciales inválidas. Por favor, verifica tu nombre de usuario y/o contraseña.";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Página de inicio de sesión</title>
	<meta charset="UTF-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<form action="login.php" method="POST">
					<h2 class="mt-5 mb-4">Iniciar sesión</h2>
					<div class="form-group">
						<input type="text" class="form-control" name="nombre_user" placeholder="Nombre de usuario" required>
						<br />
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="contrasena_user" placeholder="Contraseña" required>
						<br />
					</div>
					<button type="submit" class="btn btn-primary" name="login">Iniciar sesión</button>
				</form>
				<p class="mt-3">¿No tienes una cuenta? <a href="registro.html">Regístrate aquí</a></p>
				<?php
				if (!empty($mensaje_error)) {
					echo '<p class="text-danger">' . $mensaje_error . '</p>';
				}
				?>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>