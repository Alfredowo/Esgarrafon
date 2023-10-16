<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    require("conexion.php");
    
    $consultaGrado = "SELECT rutaGrado FROM Empleados WHERE id = $id";
    $resultadoGrado = $conn->query($consultaGrado);

    if ($resultadoGrado) {
        if ($resultadoGrado->num_rows > 0) {
            $fila = $resultadoGrado->fetch_assoc();
            $rutaGrado = $fila['rutaGrado'];
            echo json_encode($rutaGrado);
        } else {
            echo "No se encontró la rutaGrado para el empleado con ID: $id";
        }
    } else {
        echo "Error en la consulta: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID no proporcionado en la solicitud.";
}