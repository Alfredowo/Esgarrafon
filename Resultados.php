<?php
require("conexion.php");

// Verificar si se envió un término de búsqueda
if (isset($_GET['buscar'])) {
    $terminoBusqueda = '%' . $_GET['buscar'] . '%'; // Agregar comodines % para coincidencias parciales
    $query = "SELECT * FROM VistaPuntajes WHERE NombreEmpleado LIKE ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $terminoBusqueda);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    // Si no se envió un término de búsqueda, mostrar todos los resultados
    $query = "SELECT * FROM VistaPuntajes";
    $result = mysqli_query($conn, $query);
}

if (!$result) {
    echo "Error al obtener los datos de la base de datos.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background-color: #13141D;
            background-repeat: no-repeat;
            background-size: cover;
            color: azure;
            height: 900px;
            margin: 30px;
        }
        h1{
            color: antiquewhite;
            border-bottom: 6px solid rgb(66,68,94);
        }
        tr{
            color: #c4c3ca;
            background-color: #1f2029;
        }
        .botonowo{
            /*float: right;*/
            background-color: #0E0F1B;
            border: none;
            color: azure;
            padding: 10px 20px;
            cursor: pointer;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .botonowo:hover{
            background-color: #2e4468;
        }
        .formewe{
            background-color: #2b3444;
            padding: 10px;
        }
    </style>
</head>
<body>
<form class="formewe" method="GET" action="">
        <label style="font-weight:bold;" for="buscar">Buscar empleado: </label>
        <input type="text" name="buscar" id="buscar" placeholder="Nombre del empleado">
        <input class="botonowo" type="submit" value="Buscar">
    </form>

    <center>
        <table>
        <tr>
                <th>Nombre del Empleado</th>
                <th>Grado</th>
                <th>Antiguedad</th>
                <th>Cur. Capacitación</th>
                <th>Certificaciones</th>
                <th>Diplomados</th>
                <th>Cursos ST</th>
                <th>Cursos</th>
                <th>Ins. Diplomados</th>
                <th>Ins. Certificaciones</th>
                <th>As. Residencias</th>
                <th>As. Titulación</th>
                <th>Dir. Tesis</th>
                <th>Puntaje Total</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['NombreEmpleado'] . "</td>";
                echo "<td>" . $row['Grado'] . "</td>";
                echo "<td>" . $row['Antiguedad'] . "</td>";
                echo "<td>" . $row['CursoCap'] . "</td>";
                echo "<td>" . $row['Certificaciones'] . "</td>";
                echo "<td>" . $row['Diplomados'] . "</td>";
                echo "<td>" . $row['CursosST'] . "</td>";
                echo "<td>" . $row['Cursos'] . "</td>";
                echo "<td>" . $row['InstructorDip'] . "</td>";
                echo "<td>" . $row['InstructorCer'] . "</td>";
                echo "<td>" . $row['AsesorRes'] . "</td>";
                echo "<td>" . $row['AsesorTit'] . "</td>";
                echo "<td>" . $row['DireccionTesis'] . "</td>";
                echo "<td>" . $row['Puntaje'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </center>
</body>
</html>
