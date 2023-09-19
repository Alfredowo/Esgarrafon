<?php
// Conectar a la base de datos (asegúrate de establecer la conexión adecuadamente)
require("conexion.php");

// Encabezado para permitir solicitudes desde cualquier origen (CORS)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Obtener el nombre de usuario enviado desde el cliente
$usuario = $_POST['registroUsuario'];
//echo "el nombre que se obtuvo es: $usuario";

// Realizar una consulta SQL para verificar si el usuario existe en la base de datos
$query = "SELECT COUNT(*) AS existe FROM Login WHERE Usuario = '$usuario'";
$resultado = mysqli_query($conn, $query);

// Verificar si el usuario se recibió correctamente
if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado);
    $existe = ($fila['existe'] > 0) ? true : false;
    // Devolver una respuesta JSON con el resultado
    header('Content-Type: application/json');
    echo json_encode(['existe' => $existe]);
} else {
    // Manejo de excepciones si la consulta falla
    echo json_encode(['existe' => false]); // Supongamos que no existe 
}
?>
