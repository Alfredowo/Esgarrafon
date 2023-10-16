<?php
// Conectar a la base de datos (asegúrate de establecer la conexión adecuadamente)
require("conexion.php");

// Encabezado para permitir solicitudes desde cualquier origen (CORS)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Obtener los datos enviados desde el cliente
$usuario = $_POST['registroUsuario'];
$contrasena = $_POST['registroContrasena'];
$permisos = $_POST['permisos'];

//echo json_encode("usuario: $usuario, contraseña: $contrasena");

//Realizar una consulta SQL para insertar el nuevo usuario en la base de datos
$query = "INSERT INTO Login VALUES (NULL, '$usuario', '$contrasena', $permisos)";
$result = mysqli_query($conn, $query);

if ($result) {
    // Devolver una respuesta JSON indicando que el registro fue exitoso
    //header('Content-Type: application/json');
    //echo json_encode(['registrado' => true]);
    echo json_encode("registro exioso");
} else {
    // Manejo de errores si la consulta falla
    //echo json_encode(['registrado' => false]);
    echo json_encode("registro fallido");
}
?>
