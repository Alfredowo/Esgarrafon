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
    if(isset($_POST['btnCursos'])) {
        $cursos = $_POST['btnCursos'];
    } else {
        $cursos = null;
    }
    
    if(isset($_POST['btncursoCap'])) {
        $cursosCap = $_POST['btncursoCap'];
    } else {
        $cursosCap = null;
    }
    
    if(isset($_POST['btnCertificaciones'])) {
        $certificaciones = $_POST['btnCertificaciones'];
    } else {
        $certificaciones = null;
    }
    
    if(isset($_POST['btnDiplomados'])) {
        $diplomados = $_POST['btnDiplomados'];
    } else {
        $diplomados = null;
    }
    
    if(isset($_POST['btnCursosST'])) {
        $cursosST = $_POST['btnCursosST'];
    } else {
        $cursosST = null;
    }
    
    if(isset($_POST['btnCursos'])) {
        $cursosImpartidos = $_POST['btnCursos'];
    } else {
        $cursosImpartidos = null;
    }
    
    if(isset($_POST['btnInstructorDip'])) {
        $instructorDiplomados = $_POST['btnInstructorDip'];
    } else {
        $instructorDiplomados = null;
    }
    
    if(isset($_POST['btnInstructorCer'])) {
        $instructorCertificaciones = $_POST['btnInstructorCer'];
    } else {
        $instructorCertificaciones = null;
    }
    
    if(isset($_POST['btnAsesorRes'])) {
        $asesorResidencias = $_POST['btnAsesorRes'];
    } else {
        $asesorResidencias = null;
    }
    
    if(isset($_POST['btnAsesorTit'])) {
        $asesorTitulacion = $_POST['btnAsesorTit'];
    } else {
        $asesorTitulacion = null;
    }
    
    if(isset($_POST['btnDireccionTesis'])) {
        $direccionTesis = $_POST['btnDireccionTesis'];
    } else {
        $direccionTesis = null;
    }

    //Obtener valor a insertar
    if(isset($_POST['grado_estudio'])){
        $valorGrado=$_POST['grado_estudio'];
    }else $valorGrado=null;
    if(isset($_POST['antiguedad'])){
        $valorAntiguedad=$_POST['antiguedad'];
    }else $valorAntiguedad=null;
    if(isset($_POST['btnCursos'])) {
        $cursos = $_POST['btnCursos'];
    } else {
        $cursos = null;
    }
    
    if(isset($_POST['btncursoCap'])) {
        $cursosCap = $_POST['btncursoCap'];
    } else {
        $cursosCap = null;
    }
    
    if(isset($_POST['btnCertificaciones'])) {
        $certificaciones = $_POST['btnCertificaciones'];
    } else {
        $certificaciones = null;
    }
    
    if(isset($_POST['btnDiplomados'])) {
        $diplomados = $_POST['btnDiplomados'];
    } else {
        $diplomados = null;
    }
    
    if(isset($_POST["btnCursosST"])) {
        $cursosST = $_POST["btnCursosST"];
    } else {
        $cursosST = null;
    }
    
    if(isset($_POST["btnCursos"])) {
        $cursosImpartidos = $_POST["btnCursos"];
    } else {
        $cursosImpartidos = null;
    }
    
    if(isset($_POST["btnInstructorDip"])) {
        $instructorDiplomados = $_POST["btnInstructorDip"];
    } else {
        $instructorDiplomados = null;
    }
    
    if(isset($_POST["btnInstructorCer"])) {
        $instructorCertificaciones = $_POST["btnInstructorCer"];
    } else {
        $instructorCertificaciones = null;
    }
    
    if(isset($_POST["btnAsesorRes"])) {
        $asesorResidencias = $_POST["btnAsesorRes"];
    } else {
        $asesorResidencias = null;
    }
    
    if(isset($_POST["btnAsesorTit"])) {
        $asesorTitulacion = $_POST["btnAsesorTit"];
    } else {
        $asesorTitulacion = null;
    }
    
    if(isset($_POST["btnDireccionTesis"])) {
        $direccionTesis = $_POST["btnDireccionTesis"];
    } else {
        $direccionTesis = null;
    }


    //Variables extra
    $evaluarGrado=0;

    //Evaluar los archivos
    if($valorGradoBD=='Doctorado')
        $evaluarGrado=1;
        else if($valorGradoBD=='Maestria')
            $evaluarGrado=2;
            else if($valorGradoBD=='Licenciatura')
                $evaluarGrado=3;
    if($grado=='Aprobar'&&($valorGrado!=$evaluarGrado||$valorGradoBD==null))
    {
        echo "update Empleados set rutaGrado='Aprobado owo',
        Grado=".$valorGrado." where id=".$id;
        $insertarGrado=$conn->query("update Empleados set rutaGrado='Aprobado owo',
        Grado=".$valorGrado." where id=".$id);
        $vaciarGrado=$conn->query("update Empleados set rutaGrado='' where id=".$id);
    }
    $conn->close();
} else {
    echo "Error, no existe un ruta que evaluar";
}
//header("Location: Formulario.php");


