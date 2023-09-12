<?php

// Conectar a la base de datos (debes configurar la conexión)
//require("conexion.php");
session_start();
$conn = mysqli_connect("localhost", "userPro", "123", "Escalafon");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Obtener datos del formulario
$id = $_POST['empleado'];
$grado_estudio = $_POST['grado_estudio'];
$antiguedad = $_POST['antiguedad'];
$cursos = isset($_POST['cursos']) ? $_POST['cursos'] : [];
$cursosCap = $_POST['cursosCap'];
$certificaciones = $_POST['certificaciones'];
$diplomados = $_POST['diplomados'];
$cursosST = $_POST["cursosST"];
$cursosImpartidos = $_POST["cursos"];
$instructorDiplomados = $_POST["instructorDip"];
$instructorCertificaciones = $_POST["instructorCer"];
$asesorResidencias = $_POST["asesorRes"];
$asesorTitulacion = $_POST["asesorTit"];
$direccionTesis = $_POST["direccionTesis"];
} else {
    echo "fatal error, borra system32 y reinicia tu pc";
}

// Calcular el puntaje total
/*
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
*/

// Guardar la información en la base de datos
echo "la id es: $id";
$nombre = mysqli_query($conn, "SELECT Nombre FROM Empleados WHERE id = $id");
echo "el nombre es: $nombre";

// Obtener el nombre del empleado en función de la ID
/*
$nombre = "";
if ($id > 0) {
    $consulta_nombre = "SELECT Nombre FROM Empleados WHERE id = $id";
    $resultado_nombre = mysqli_query($conn, $consulta_nombre);
    if ($resultado_nombre) {
        $fila_nombre = mysqli_fetch_assoc($resultado_nombre);
        $nombre = $fila_nombre['Nombre'];
    } else {
        echo "Error al obtener el nombre del empleado.";
    }
}
*/

if($id>0) { //actualizar registro
    echo "si se encuentra la id, actualizar";
    $query = "CALL insertarEmpleados($id, '$nombre', '$grado_estudio', $antiguedad, $cursosCap, 
    $certificaciones, $diplomados, $cursosST, $cursosImpartidos, $instructorDiplomados, 
    $instructorCertificaciones, $asesorResidencias, $asesorTitulacion, $direccionTesis)";
} else { //agregar nuevo
    echo "no se encuentra la id, crear registro nuevo";
    $query = "CALL insertarEmpleados(-1, '$id', '$grado_estudio', $antiguedad, $cursos, $certificaciones, 
    $diplomados, $cursosST, $cursosImpartidos, $instructorDiplomados, $instructorCertificaciones, 
    $asesorResidencias, $asesorTitulacion, $direccionTesis)";
}

$result = mysqli_query($conn, $query);

if ($result) {
    // Redirigir al usuario a la página de resultados
    header('Location: Resultados.php');
    exit;
    echo "todo bien uwu";
} else {
    echo "Error al guardar los datos en la base de datos.";
}
mysqli_close($conn);
?>

