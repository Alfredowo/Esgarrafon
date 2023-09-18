<?php
// Conectar a la base de datos (asegúrate de establecer la conexión adecuadamente)
require("conexion.php");

// Obtener el nombre de usuario enviado desde el cliente
$usuario = $_POST['usuario'];

// Realizar una consulta SQL para verificar si el usuario existe en la base de datos
$query = "SELECT COUNT(*) AS existe FROM usuarios WHERE Usuario = '$usuario'";
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado);
    $existe = ($fila['existe'] > 0) ? true : false;

    // Devolver una respuesta JSON con el resultado
    header('Content-Type: application/json');
    echo json_encode(['existe' => $existe]);
} else {
    // Manejo de errores si la consulta falla
    echo json_encode(['existe' => false]); // Supongamos que no existe en caso de error
}
?>
