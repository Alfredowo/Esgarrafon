<?php
session_start();

// Conectar a la base de datos (debes configurar la conexión)
$conn = mysqli_connect("localhost", "root", "123", "Escalafon");

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$grado_estudio = $_POST['grado_estudio'];
$antiguedad = $_POST['antiguedad'];
$cursos = isset($_POST['cursos']) ? $_POST['cursos'] : [];
$certificaciones = $_POST['certificaciones'];
$diplomados = $_POST['diplomados'];

// Calcular el puntaje total
$puntaje = 0;

if ($grado_estudio == "doctorado") {
    $puntaje += 30;
} elseif ($grado_estudio == "maestria") {
    $puntaje += 20;
} elseif ($grado_estudio == "licenciatura") {
    $puntaje += 10;
}

$puntaje += $antiguedad * 10;

foreach ($cursos as $curso) {
    if ($curso == "cursos_30") {
        $puntaje += 2;
    } elseif ($curso == "cursos_menos_30") {
        $puntaje += 1;
    }
}

$puntaje += $certificaciones * 20;
$puntaje += $diplomados * 10;

// Guardar la información en la base de datos
$query = "INSERT INTO Empleados (Nombre, Puntaje) VALUES ('$nombre', $puntaje)";
$result = mysqli_query($conn, $query);

if ($result) {
    // Redirigir al usuario a la página de resultados
    header('Location: Resultados.php');
    exit;
} else {
    echo "Error al guardar los datos en la base de datos.";
}
?>

