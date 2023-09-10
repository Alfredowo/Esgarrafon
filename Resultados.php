<?php
session_start();

// Conectar a la base de datos (debes configurar la conexión)
$conn = mysqli_connect("localhost", "root", "123", "Escalafon");

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
</head>
<body>
    <h1>Resultados de Evaluación</h1>
    
    <table>
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
    
    <a href="formulario_evaluacion.php">Volver al formulario de evaluación</a>
</body>
</html>
