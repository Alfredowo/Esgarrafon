<?php

// Conectar a la base de datos (debes configurar la conexión)
require("conexion.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Obtener datos del formulario
$id = $_POST['empleado'];
$grado_estudio = $_POST['grado_estudio'];
$antiguedad = $_POST['antiguedad'];
//$cursos = isset($_POST['cursos']) ? $_POST['cursos'] : [];
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

// Guardar la información en la base de datos
echo "la id es: $id";
$nombre = mysqli_query($conn, "SELECT Nombre FROM Empleados WHERE id = $id");
echo "el nombre es: $nombre";

if($id>0) { //actualizar registro
    echo "si se encuentra la id, actualizar";
    $query = "CALL insertarEmpleados($id, '$nombre', '$grado_estudio', $antiguedad, $cursosCap, 
    $certificaciones, $diplomados, $cursosST, $cursosImpartidos, $instructorDiplomados, 
    $instructorCertificaciones, $asesorResidencias, $asesorTitulacion, $direccionTesis)";
} else { //agregar nuevo, (no deberia de pasar)
    echo "no se encuentra la id, crear registro nuevo";
    $query = "CALL insertarEmpleados(-1, '$id', '$grado_estudio', $antiguedad, $cursos, $certificaciones, 
    $diplomados, $cursosST, $cursosImpartidos, $instructorDiplomados, $instructorCertificaciones, 
    $asesorResidencias, $asesorTitulacion, $direccionTesis)";
}

$result = mysqli_query($conn, $query);

if ($result) {
    // Redirigir al usuario a la página de resultados(ya no se ocupa)
    //header('Location: Resultados.php');
    //exit;
    echo "todo bien uwu";
} else {
    echo "Error al guardar los datos en la base de datos.";
}
mysqli_close($conn);
?>

