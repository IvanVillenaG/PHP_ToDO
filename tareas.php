<?php

include("agregarTarea.php");

if (isset($_POST['logout'])) {
    header('Location: index.html');
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>To Do List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        .tachar {
            text-decoration: line-through;
        }
    </style>

</head>

<body>
    <header>
    </header>
    <main class="container">
        <br />

        <div class="card">
            <div class="card-header">
                Lista de tareas
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <form action="" method="post">
                        <label for="tarea" class="form-label">Tarea:</label>
                        <input type="text" class="form-control" name="tarea" id="tarea" aria-describedby="helpId" placeholder="Tarea a agregar">
                        <br />
                        <input name="agregar_tarea" id="agregar_tarea" class="btn btn-primary" type="submit" value="Agregar tarea">
                    </form>
                </div>

                <ul class="list-group">
                    <?php foreach ($resultados as $resultado) {
                        $completada = $resultado['completado'] ? 'tachar' : '';
                    ?>
                        <li class="list-group-item">
                            <input class="form-check-input float-start" type="checkbox" value="1" id="" onchange="toggleTachado(this)" <?php echo $resultado['completado'] ? 'checked' : ''; ?>>
                            &nbsp; <span class="float-start <?php echo $completada; ?>"> &nbsp; <?php echo $resultado['tarea'] ?> </span>
                            <h6 class="float-start">
                                &nbsp; <a href="?id=<?php echo $resultado['id']; ?>"><span class="badge bg-danger"> x </span></a>
                            </h6>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="card-footer text-muted">
                <form action="tareas.php" method="post">
                    <button type="submit" class="btn btn-secondary" name="logout">Log out</button>
                </form>
            </div>
        </div>
    </main>
    <footer>
    </footer>
    <script>
        function toggleTachado(checkbox) {
            var tareaElement = checkbox.nextElementSibling;
            if (checkbox.checked) {
                tareaElement.classList.add('tachar');
            } else {
                tareaElement.classList.remove('tachar');
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>