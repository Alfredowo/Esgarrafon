<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar empleado</title>
    <?php
    require("conexion.php");
    $consulta = "select id, Nombre from Empleados";
    $resultado=$conn->query($consulta);
    ?>
</head>
<body>
<h2>Seleccionar empleado:</h2>
    <form action="Formulario.php" method="post">
        <select name="empleado" id="empleado" onchange="extraerId()">
            <?php
            if (!$resultado) {
                die("Error en la consulta: " . $conn->error);
            }
            while ($fila = $resultado->fetch_assoc()) {
                echo '<option value="'.$fila['id'].'">'.$fila['Nombre'].'</option>';
            }
            ?>
        </select><br><br>
        <center><input type="submit" value="Evaluar"></center>
        <br><br>
    </form>
</body>
</body>
</html>