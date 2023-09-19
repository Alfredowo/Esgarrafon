<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar empleado</title>
    <style>
    .botonregresar {
        font-family: Verdana,Geneva,Tahoma,sans-serif;
        color: #c4c3ca;
        cursor: pointer;
        background-color: #13141D;
        border: none;
        padding: 10px 20px; /* Ajusta el padding según tu preferencia */
    }
    .botonregresar:hover{
        background-color: #4CA289 ;
    }
    </style>
    <link rel="stylesheet" href="style.css">
    <?php
    require("conexion.php");
    $consulta = "select id, Nombre from Empleados";
    $resultado=$conn->query($consulta);
    ?>
</head>
<body class="fondouwu">
<h2 class="titulos">Seleccionar empleado:</h2>
<div class="divwaos">
    <form action="Formulario.php" method="post">
        <select class="selectorewe" name="empleado" id="empleado" onchange="extraerId()">
            <?php
            if (!$resultado) {
                die("Error en la consulta: " . $conn->error);
            }
            while ($fila = $resultado->fetch_assoc()) {
                echo '<option value="'.$fila['id'].'">'.$fila['Nombre'].'</option>';
            }
            ?>
        </select><br><br>
        <center><input class="botonowo" type="submit" value="Evaluar"></center>
        <br><br>
    </form>
    <form action="Login.html">
        <center><input class="botonregresar" type="submit" value="Regresar"></center></form>
    </form>
</div>
</body>
</body>
</html>