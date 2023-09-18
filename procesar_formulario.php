<?php
session_start();
$id=$_SESSION['id'];
// Conectar a la base de datos (debes configurar la conexión)
require("conexion.php");
session_start();
require("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$id = $_POST['id'];
    //Posibles repetidos
    $consultaGrado=$conn->query("select Grado from Empleados where id=".$id);
    $valorGradoBD=$consultaGrado->fetch_assoc();
    $consultaAntiguedad=$conn->query("select Antiguedad from Empleados where id=".$id);
    $valorAntiguedadBD=$consultaAntiguedad->fetch_assoc();
    $consultaCursoCap=$conn->query("select CursoCap from Empleados where id=".$id);
    $valorCursoCapBD=$consultaAntiguedad->fetch_assoc();

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
    
    if(isset($_POST['btncursoCap'])) {
        $valorCursosCap = $_POST['btncursoCap'];
    } else {
        $valorCursosCap = null;
    }
    
    if(isset($_POST['btnCertificaciones'])) {
        $valorCertificaciones = $_POST['btnCertificaciones'];
    } else {
        $valorCertificaciones = null;
    }
    
    if(isset($_POST['btnDiplomados'])) {
        $valorDiplomados = $_POST['btnDiplomados'];
    } else {
        $valorDiplomados = null;
    }
    
    if(isset($_POST["btnCursosST"])) {
        $valorCursosST = $_POST["btnCursosST"];
    } else {
        $valorCursosST = null;
    }
    
    if(isset($_POST["btnCursos"])) {
        $valorCursos = $_POST["btnCursos"];
    } else {
        $valorCursos = null;
    }
    
    if(isset($_POST["btnInstructorDip"])) {
        $valorInstructorDiplomados = $_POST["btnInstructorDip"];
    } else {
        $valorInstructorDiplomados = null;
    }
    
    if(isset($_POST["btnInstructorCer"])) {
        $valorInstructorCertificaciones = $_POST["btnInstructorCer"];
    } else {
        $valorInstructorCertificaciones = null;
    }
    
    if(isset($_POST["btnAsesorRes"])) {
        $valorAsesorResidencias = $_POST["btnAsesorRes"];
    } else {
        $valorAsesorResidencias = null;
    }
    
    if(isset($_POST["btnAsesorTit"])) {
        $valorAsesorTitulacion = $_POST["btnAsesorTit"];
    } else {
        $valorAsesorTitulacion = null;
    }
    
    if(isset($_POST["btnDireccionTesis"])) {
        $valorDireccionTesis = $_POST["btnDireccionTesis"];
    } else {
        $valorDireccionTesis = null;
    }

    //Observaciones
    if(isset($_POST['observacionesGrado']))
    {
        $obGrado = $_POST['onservacionesGrado'];
        $obGradoBD=$conn->query("update observaciones set ovGrado=".$obGrado." 
        where fkEmpleado=".$id);
    }
    if(isset($_POST['observacionesAntiguedad']))
    {
        $obAntiguedad = $_POST['onservacionesAntiguedad'];
        $obAntiguedadBD=$conn->query("update observaciones set ovAntiguedad=".$obAntiguedad." 
        where fkEmpleado=".$id);
    }
    if(isset($_POST['observacionesCursosCap']))
    {
        $obCursosCap = $_POST['onservacionesCursosCap'];
        $obCursosCapBD=$conn->query("update observaciones set ovCursoCap=".$obCursosCap." 
        where fkEmpleado=".$id);
    }
    if(isset($_POST['observacionesCertificaciones']))
    {
        $obCertificaciones = $_POST['onservacionesCertificaciones'];
        $obCertificacionesBD=$conn->query("update observaciones set ovCertificaciones=".$obCertificaciones." 
        where fkEmpleado=".$id);
    }
    if(isset($_POST['observacionesDiplomados']))
    {
        $obDiplomados = $_POST['onservacionesDiplomados'];
        $obDiplomadosBD=$conn->query("update observaciones set ovDiplomados=".$obDiplomados." 
        where fkEmpleado=".$id);
    }
    if(isset($_POST['observacionesCursosST']))
    {
        $obCursosST = $_POST['onservacionesCursosST'];
        $obCursosSTBD=$conn->query("update observaciones set ovCursosST=".$obCursosST." 
        where fkEmpleado=".$id);
    }
    if(isset($_POST['observacionesCursos']))
    {
        $obCursos = $_POST['onservacionesCursos'];
        $obCursos=$conn->query("update observaciones set ovCursos=".$obCursos." 
        where fkEmpleado=".$id);
    }
    if(isset($_POST['observacionesInstructorDip']))
    {
        $obInstructorDip = $_POST['onservacionesInstructorDip'];
        $obInstructorDipBD=$conn->query("update observaciones set ovInstructorDip=".$obInstructorDip." 
        where fkEmpleado=".$id);
    }
    if(isset($_POST['observacionesInstructorCer']))
    {
        $obInstructorCer = $_POST['onservacionesInstructorCer'];
        $obInstructorCerBD=$conn->query("update observaciones set ovInstructirCer=".$obInstructorCer." 
        where fkEmpleado=".$id);
    }
    if(isset($_POST['observacionesAsesorRes']))
    {
        $obAsesorRes = $_POST['onservacionesAsesorRes'];
        $obAsesorResBD=$conn->query("update observaciones set ovAsesorRes=".$obAsesorRes." 
        where fkEmpleado=".$id);
    }
    if(isset($_POST['observacionesAsesorTit']))
    {
        $obAsesorTit = $_POST['onservacionesAsesorTit'];
        $obAsesorTitBD=$conn->query("update observaciones set ovAsesorTit=".$obAsesorTit." 
        where fkEmpleado=".$id);
    }
    if(isset($_POST['observacionesDireccionTesis']))
    {
        $obDireccionTesis = $_POST['onservacionesDireccionTesis'];
        $obDireccionTesisBD=$conn->query("update observaciones set ovDireccionTesis=".$obDireccionTesis." 
        where fkEmpleado=".$id);
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
        /*if($valorGradoBD=='Doctorado')
        {
            $revertirGrado=$conn->query("update Puntaje set Puntaje = 
            Puntaje - 30 where fkEmpleado=".$id);
        }else
        if($valorGradoBD=='Maestria')
        {
            $revertirGrado=$conn->query("update Puntaje set Puntaje = 
            Puntaje - 20 where fkEmpleado=".$id);
        }else
        if($valorGradoBD=='Licenciatura')
        {
            $revertirGrado=$conn->query("update Puntaje set Puntaje = 
            Puntaje - 10 where fkEmpleado=".$id);
        }*/
        $insertarGrado=$conn->query("update Empleados set rutaGrado='Aprobado owo',
        Grado=".$valorGrado." where id=".$id);
    }else $insertarGrado=$conn->query("update Empleados set rutaGrado='Rechazado umu' where id=".$id);
    if($antiguedad=='Aprobar')
    {
        /*$revertirAntiguedad=$conn->query("update Puntaje set Puntaje = Puntaje - "
        . ($valorAntiguedadBD * 10));*/
        $insertarAntiguedad=$conn->query("update Empleados set rutaAntiguedad='Aprobado owo',
        Antiguedad=".$valorAntiguedad."where id=".$id);
    }else $insertarGrado=$conn->query("update Empleados set rutaAntiguedad='Rechazado umu' where id=".$id);
    if($cursosCap=='Aprobar')
    {
        /*if($valorCursoCapBD>29)
        {
            $revertirCursosCap=$conn->query("update Puntaje set Puntaje = Puntaje - 2");
        }else
            $revertirCursosCap=$conn->query("update Puntaje set Puntaje = Puntaje - 1");*/
        $insertarCursosCap=$conn->query("update Empleados set rutaCursoCap='Aprobado owo',
        CursoCap=".$valorCursosCap."where id=".$id);
    }else $insertarGrado=$conn->query("update Empleados set rutaCursoCap='Rechazado umu' where id=".$id);
    if($certificaciones=='Aprobar')
    {
        /*$revertirCertificaciones=$conn->query("update Puntaje set Puntaje=Puntaje - 20 where 
        id = ".$id);*/
        $insertarCertificaciones=$conn->query("update Empleados set rutaCertificaciones='Aprobado owo'
         where id=".$id);
    }else $insertarGrado=$conn->query("update Empleados set rutaCertificaciones='Rechazado umu' where id=".$id);
    if($diplomados=='Aprobar')
    {
        /*$revertirDiplomados=$conn->query("update Puntaje set Puntaje=Puntaje - 10 where 
        id = ".$id);*/
        $insertarDiplomados=$conn->query("update Empleados set rutaDiplomados='Aprobado owo' 
        where id=".$id);
    }else $insertarGrado=$conn->query("update Empleados set rutaDiplomados='Rechazado umu' where id=".$id);
    if($cursosST=='Aprobar')
    {
        $insertarCursosST=$conn->query("update Empleados set rutaCursosST='Aprobado owo' 
        where id=".$id);
    }else $insertarGrado=$conn->query("update Empleados set rutaCursosST='Rechazado umu' where id=".$id);
    if($cursos=='Aprobar')
    {
        $insertarCursos=$conn->query("update Empleados set rutaCursos='Aprobado owo',
        Cursos=".$valorCursos."where id=".$id);
    }else $insertarGrado=$conn->query("update Empleados set rutaCursos='Rechazado umu' where id=".$id);
    if($instructorDiplomados=='Aprobar')
    {
        $insertarInstructorDip=$conn->query("update Empleados set rutaInstructorDip='Aprobado owo' 
        where id=".$id);
    }else $insertarGrado=$conn->query("update Empleados set rutaInstructorDip='Rechazado umu' where id=".$id);
    if($instructorCertificaciones=='Aprobar')
    {
        $insertarInstructoCer=$conn->query("update Empleados set rutaInstructorCer='Aprobado owo' 
        where id=".$id);
    }else $insertarGrado=$conn->query("update Empleados set rutaInstructorCer='Rechazado umu' where id=".$id);
    if($asesorResidencias=='Aprobar')
    {
        $insertarAsesorRes=$conn->query("update Empleados set rutaAsesorRes='Aprobado owo',
        AsesorRes=".$valorAsesorResidencias."where id=".$id);
    }else $insertarGrado=$conn->query("update Empleados set rutaAsesorRes='Rechazado umu' where id=".$id);
    if($asesorTitulacion=='Aprobar')
    {
        $insertarAsesorTit=$conn->query("update Empleados set rutaAsesorTit='Aprobado owo',
        AsesorTit=".$valorAsesorTitulacion."where id=".$id);
    }else $insertarGrado=$conn->query("update Empleados set rutaAsesorTit='Rechazado umu' where id=".$id);
    if($direccionTesis=='Aprobar')
    {
        $insertarDireccionTesis=$conn->query("update Empleados set rutaDireccionTesis='Aprobado owo' 
        where id=".$id);
    }else $insertarGrado=$conn->query("update Empleados set rutaDireccionTesis='Rechazado umu' where id=".$id);
    $conn->close();
} else {
    echo "Error, no existe un ruta que evaluar";
}
header("Location: Formulario.php");


