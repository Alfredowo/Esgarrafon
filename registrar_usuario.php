<?php
// Conectar a la base de datos (asegúrate de establecer la conexión adecuadamente)
require("conexion.php");

// Obtener los datos enviados desde el cliente
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Realizar una consulta SQL para insertar el nuevo usuario en la base de datos
$query = "INSERT INTO usuarios VALUES (NULL, '$usuario', '$contrasena',2)";

if (mysqli_query($conexion, $query)) {
    // Devolver una respuesta JSON indicando que el registro fue exitoso
    header('Content-Type: application/json');
    echo json_encode(['registrado' => true]);
} else {
    // Manejo de errores si la consulta falla
    echo json_encode(['registrado' => false]);
}
?>
