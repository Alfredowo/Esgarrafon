<?php

// Conectar a la base de datos (debes configurar la conexión)
//require("conexion.php");
session_start();
require("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    //Posibles repetidos
    $consultaGrado=$conn->query("select Grado from Empleados where id='.$id.'");
    $valorGradoBD=$consultaGrado->fetch_assoc();

    if(isset($_POST['btnGrado']))
    {
        $grado = $_POST['btnGrado'];
    }else $grado=null;
    if(isset($_POST['btnAntiguedad']))
    {
        $antiguedad = $_POST['btnAntiguedad'];
    }else $antiguedad=null;
        /*$cursos = $_POST['btnCursos'];
        $cursosCap = $_POST['btncursoCap'];
        $certificaciones = $_POST['btnCertificaciones'];
        $diplomados = $_POST['btnDiplomados'];
        $cursosST = $_POST["btnCursosST"];
        $cursosImpartidos = $_POST["btnCursos"];
        $instructorDiplomados = $_POST["btnInstructorDip"];
        $instructorCertificaciones = $_POST["btnInstructorCer"];
        $asesorResidencias = $_POST["btnAsesorRes"];
        $asesorTitulacion = $_POST["btnAsesorTit"];
        $direccionTesis = $_POST["btnDireccionTesis"];*/

    //Obtener valor a insertar
    if(isset($_POST['grado_estudio'])){
        $valorGrado=$_POST['grado_estudio'];
    }else $valorGrado=null;
    if(isset($_POST['antiguedad'])){
        $valorAntiguedad=$_POST['antiguedad'];
    }else $valorAntiguedad=null;
        /*$valorCursosCap=$_POST['cursosCap'];
        $valorCertificaciones=$_POST['certificaciones'];
        $valorDiplomados=$_POST['diplomados'];
        $valorCursosST=$_POST['cursosST'];
        $valorCursos=$_POST['cursos'];
        $valorInstructorDip=$_POST['instructorDip'];
        $valorInstructorCer=$_POST['instructorCer'];
        $valorAsesorRes=$_POST['asesorRes'];
        $valorAsesorTit=$_POST['asesorTit'];
        $valorDireccionTesis=$_POST['direccionTesis'];*/


    //Variables extra
    $evaluarGrado=0;

    //Evaluar los archivos
    if($valorGrado=='Doctorado')
        $evaluarGrado=1;
        else if($valorGrado=='Maestría')
            $evaluarGrado=2;
            else if($valorGrado=='Licenciatura')
                $evaluarGrado=3;
    if($grado=='Aprobar'&&($valorGradoBD!=$evaluarGrado||$valorGradoBD==null))
    {
        $insertarGrado=$conn->query("update Empleados set rutaGrado='Aprobado owo',
        Grado=".$valorGrado." where id=".$id);
    }
    $conn->close();
} else {
    echo "Error, no existe un ruta que evaluar";
}


