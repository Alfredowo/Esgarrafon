<?php

// Conectar a la base de datos (debes configurar la conexión)
require("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Obtener datos del formulario(enlaces)
$usuario = $_POST['usuario'];
$grado_estudio = $_POST['grado_estudios'];
$antiguedad = $_POST['antiguedad'];
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

// ints
$grado_estudio1 = $_POST['grado_estudios1']; //tipo enum
$antiguedad1 = $_POST['antiguedad1'];
$cursosCap1 = $_POST['cursosCap1'];
$cursosImpartidos1 = $_POST["cursos1"];
$asesorResidencias1 = $_POST["asesorRes1"];
$asesorTitulacion1 = $_POST["asesorTit1"];
} else {
    echo "fatal error, borra system32 y reinicia tu pc";
}

// Mostrar todas las variables en un solo echo a ver si estan bien por que nombre
/*
echo "Variables: $usuario, $grado_estudio, $antiguedad, $cursosCap, $certificaciones, $diplomados, $cursosST,
 $cursosImpartidos, $instructorDiplomados, $instructorCertificaciones, $asesorResidencias, $asesorTitulacion,
  $direccionTesis, $grado_estudio1, $antiguedad1, $cursosCap1, $cursosImpartidos1, $asesorResidencias1,
   $asesorTitulacion1";*/

// Guardar la información en la base de datos
//echo "el nombre de usuario es: $usuario ";
$resultado= mysqli_query($conn, "SELECT id FROM empleados WHERE Nombre = '$usuario'");
if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado);
    if ($fila) {
        $id = $fila['id'];
        //echo "El id es: $id"; //actualizar registro
        $query = "UPDATE empleados SET
            Grado = '$grado_estudio1',
            rutaGrado = '$grado_estudio',
            Antiguedad = $antiguedad1,
            rutaAntiguedad = '$antiguedad1',
            CursoCap = $cursosCap1,
            rutaCursoCap = '$cursosCap',
            Certificaciones = true,
            rutaCertificaciones = '$certificaciones',
            Diplomados = true,
            rutaDiplomados = '$diplomados',
            CursosST = true,
            rutaCursosST = '$cursosST',
            Cursos = $cursosImpartidos1,
            rutaCursos = '$cursosImpartidos',
            InstructorDip = true,
            rutaInstructorDip = '$instructorDiplomados',
            InstructorCer = true,
            rutaInstructorCer = '$instructorCertificaciones',
            AsesorRes = $asesorResidencias1,
            rutaAsesorRes = '$asesorResidencias',
            AsesorTit = $asesorTitulacion1,
            rutaAsesorTit = '$asesorTitulacion',
            DireccionTesis = TRUE,
            rutaDireccionTesis = '$direccionTesis'
        WHERE id = $id";
    } else {
        echo "No se encontró la Id para el usuario: $usuario"; 
    }
} else {//agregar nuevo
    echo "Fatality error, usuario no encontrado";
}

$result = mysqli_query($conn, $query);

if ($result) {
    // Redirigir al usuario a la página de resultados(ya no se ocupa)
    //header('Location: Resultados.php');
    //exit;
    echo "datos registrados correctamente";
} else {
    echo "Error al guardar los datos en la base de datos. $result";
}
mysqli_close($conn);
?>