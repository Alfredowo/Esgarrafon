<?php
// Conectar a la base de datos y validar las credenciales aquí
//require("conexion.php");
session_start();
require("conexion.php");
$usuario = $_POST['usuario'];
$password = $_POST['contrasena'];

// Validar usuario y contraseña en la base de datos
$query = "SELECT * FROM Login WHERE Usuario = '$usuario' AND Contrasena = '$password' AND Permisos = 'admin'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 1) {
    // Las credenciales son correctas
    $_SESSION['usuario'] = $_POST['usuario'];
    header('Location: seleccionarEmpleado.php');
    exit;
} else {
    echo "Error: Usuario o contraseña incorrectos.";
}