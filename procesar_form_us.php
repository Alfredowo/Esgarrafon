<?php

// Conectar a la base de datos (debes configurar la conexión)
require("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    //echo $usuario;
    // Guardar la información en la base de datos
    //echo "el nombre de usuario es: $usuario ";
    $resultado= mysqli_query($conn, "SELECT id FROM Empleados WHERE Nombre = '$usuario'");
    $fila = mysqli_fetch_assoc($resultado); 
    /*
    if ($resultado) {
        echo "to bien";
    } else {//agregar nuevo
        echo "Fatality error, usuario no encontrado";
    }

    if ($fila) {
        $id = $fila['id'];
        //echo "El id es: $id"; //actualizar registro
        $query = "UPDATE empleados SET
            rutaGrado = '$grado_estudio',
        WHERE id = $id";
    } else {
        echo "No se encontró la Id para el usuario: $usuario"; 
    }*/

    $id = $fila['id'];

    // Verificar cuál de los botones se presionó y procesar el formulario correspondiente
    
    if (isset($_POST['enviar_gradoEstudio'])) {
        $grado_estudio = $_POST['grado_estudio'];
        // Realizar el UPDATE para el certificado de grado de estudios
        $query = "UPDATE Empleados SET rutaGrado = '$grado_estudio' WHERE id = $id";
    } elseif (isset($_POST['enviar_antiguedad'])) {
        $antiguedad = $_POST['antiguedad'];
        // Realizar el UPDATE para el comprobante de antigüedad
        $query = "UPDATE Empleados SET rutaAntiguedad = '$antiguedad' WHERE id = $id";
    } elseif (isset($_POST['enviar_cursosCap'])) {
        $cursosCap = $_POST['cursosCapz']; //echo "aaaaa1: ", $cursosCap;
        // Realizar el UPDATE para el comprobante de cursos de capacitación
        $query = "UPDATE Empleados SET rutaCursoCap = '$cursosCap' WHERE id = $id";
    } elseif (isset($_POST['enviar_certificaciones'])) {
        $certificaciones = $_POST['certificaciones'];
        // Realizar el UPDATE para el comprobante de certificaciones
        $query = "UPDATE Empleados SET rutaCertificaciones = '$certificaciones' WHERE id = $id";
    } elseif (isset($_POST['enviar_diplomados'])) {
        $diplomados = $_POST['diplomados'];
        // Realizar el UPDATE para el comprobante de diplomados
        $query = "UPDATE Empleados SET rutaDiplomados = '$diplomados' WHERE id = $id";
    } elseif (isset($_POST['enviar_cursos'])) {
        $cursos = $_POST['cursos'];
        // Realizar el UPDATE para el comprobante de cursos impartidos
        $query = "UPDATE Empleados SET rutaCursos = '$cursos' WHERE id = $id";
    } elseif (isset($_POST['enviar_cursosST'])) {
        $cursosST = $_POST['cursosST'];
        // Realizar el UPDATE para el comprobante de cursosST impartidos
        $query = "UPDATE Empleados SET rutaCursosST = '$cursosST' WHERE id = $id";
    } elseif (isset($_POST['enviar_instructorDip'])) {
        $instructorDiplomados = $_POST['instructorDip'];
        // Realizar el UPDATE para el comprobante de instructor de diplomados
        $query = "UPDATE Empleados SET rutaInstructorDip = '$instructorDiplomados' WHERE id = $id";
    } elseif (isset($_POST['enviar_instructorCer'])) {
        $instructorCertificaciones = $_POST['instructorCer'];
        // Realizar el UPDATE para el comprobante de instructor de certificaciones
        $query = "UPDATE Empleados SET rutaInstructorCer = '$instructorCertificaciones' WHERE id = $id";
    } elseif (isset($_POST['enviar_asesorRes'])) {
        $asesorResidencias = $_POST['asesorRes'];
        // Realizar el UPDATE para el comprobante de asesor de residencias
        $query = "UPDATE Empleados SET rutaAsesorRes = '$asesorResidencias' WHERE id = $id";
    } elseif (isset($_POST['enviar_asesorTit'])) {
        $asesorTitulacion = $_POST['asesorTit'];
        // Realizar el UPDATE para el comprobante de asesor de titulación
        $query = "UPDATE Empleados SET rutaAsesorTit = '$asesorTitulacion' WHERE id = $id";
    } elseif (isset($_POST['enviar_direccionTesis'])) {
        $direccionTesis = $_POST['direccionTesis'];
        // Realizar el UPDATE para el comprobante de dirección de tesis
        $query = "UPDATE Empleados SET rutaDireccionTesis = '$direccionTesis' WHERE id = $id";
    }
    //echo "Datos actualizados correctamente";
} else {
    echo "Error al obtener los datos";
}

// Mostrar todas las variables en un solo echo a ver si estan bien por que nombre
/*
echo "Variables: $usuario, $grado_estudio, $antiguedad, $cursosCap, $certificaciones, $diplomados, $cursosST,
 $cursosImpartidos, $instructorDiplomados, $instructorCertificaciones, $asesorResidencias, $asesorTitulacion,
  $direccionTesis, $grado_estudio1, $antiguedad1, $cursosCap1, $cursosImpartidos1, $asesorResidencias1,
   $asesorTitulacion1";*/

$result = mysqli_query($conn, $query);

if ($result) {
    // Redirigir al usuario a la página de resultados(ya no se ocupa)
    //header('Location: Resultados.php');
    //exit;
    echo "Datos registrados correctamente.";
} else {
    echo "Error al guardar los datos en la base de datos. $result";
}
mysqli_close($conn);
header("Location:FormularioUsuario.php");
?>

