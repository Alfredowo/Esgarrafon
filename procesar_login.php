<?php
session_start();
// Conectar a la base de datos y validar las credenciales aquí
// Conexión a la base de datos (debes configurar la conexión)
$conn = mysqli_connect("localhost", "root", "123", "Escalafon");


// Validar usuario y contraseña en la base de datos
$query = "SELECT * FROM Login WHERE Usuario = '$usuario' AND Contraseña = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    // Las credenciales son correctas
    $_SESSION['usuario'] = $_POST['usuario'];
    header('Location: Formulario.php');
    exit;
} else {
    echo "Error: Usuario o contraseña incorrectos.";
}
