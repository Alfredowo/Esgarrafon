<?php
session_start();

// Conectar a la base de datos (debes configurar la conexión)
$conn = mysqli_connect("localhost", "userPro", "123", "Escalafon");

// Consultar la base de datos para obtener la lista de empleados y puntajes
$query = "SELECT * FROM Empleados";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error al obtener los datos de la base de datos.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultados</title>
    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background-color: #13141D;
            background-repeat: no-repeat;
            background-size: cover;

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
    </style>
</head>
<body>
    <center><h1>Resultados de Evaluación</h1></center>
    
   <center> <table>
        <tr>
            <th>Nombre del Empleado</th>
            <th>Puntaje Total</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Nombre'] . "</td>";
            echo "<td>" . $row['Puntaje'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    </center>
    
    <a href="formulario_evaluacion.php">Volver al formulario de evaluación</a>
</body>
</html>
