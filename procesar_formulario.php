<?php
require("conexion.php");
//session_start();
if(!isset($_SESSION['id'])){
$id = $_POST['id'];
$_SESSION['id'] = $id;
}else
$id = $_SESSION['id'];
// Conectar a la base de datos (debes configurar la conexión)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //Posibles repetidos
    $consultaGrado=$conn->query("select Grado from Empleados where id=".$id);
    $valorGradoBD=$consultaGrado->fetch_assoc();
    $consultaAntiguedad=$conn->query("select Antiguedad from Empleados where id=".$id);
    $valorAntiguedadBD=$consultaAntiguedad->fetch_assoc();
    $consultaCursoCap=$conn->query("select CursoCap from Empleados where id=".$id);
    $valorCursoCapBD=$consultaCursoCap->fetch_assoc();
    $consultaCursosBD=$conn->query("select Cursos from Empleados where id=".$id);
    $valorCursosBD=$consultaCursosBD->fetch_assoc();
    $consultaAsesorRes=$conn->query("select AsesorRes from Empleados where id=".$id);
    $valorAsesorResBD=$consultaAsesorRes->fetch_assoc();
    $consultaAsesorTit=$conn->query("select AsesorTit from Empleados where id=".$id);
    $valorAsesorTitBD=$consultaAsesorTit->fetch_assoc();

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
    
    if(isset($_POST['btnCursoCap'])) {
        $cursosCap = $_POST['btnCursoCap'];
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
    
    if(isset($_POST['cursoCap'])) {
        $valorCursosCap = $_POST['cursoCap'];
    } else {
        $valorCursosCap = null;
    }
    
    if(isset($_POST['certificaciones'])) {
        $valorCertificaciones = $_POST['certificaciones'];
    } else {
        $valorCertificaciones = null;
    }
    
    if(isset($_POST['diplomados'])) {
        $valorDiplomados = $_POST['diplomados'];
    } else {
        $valorDiplomados = null;
    }
    
    if(isset($_POST["cursosST"])) {
        $valorCursosST = $_POST["cursosST"];
    } else {
        $valorCursosST = null;
    }
    
    if(isset($_POST["cursos"])) {
        $valorCursos = $_POST["cursos"];
    } else {
        $valorCursos = null;
    }
    
    if(isset($_POST["instructorDip"])) {
        $valorInstructorDiplomados = $_POST["instructorDip"];
    } else {
        $valorInstructorDiplomados = null;
    }
    
    if(isset($_POST["instructorCer"])) {
        $valorInstructorCertificaciones = $_POST["instructorCer"];
    } else {
        $valorInstructorCertificaciones = null;
    }
    
    if(isset($_POST["asesorRes"])) {
        $valorAsesorResidencias = $_POST["asesorRes"];
    } else {
        $valorAsesorResidencias = null;
    }
    
    if(isset($_POST["asesorTit"])) {
        $valorAsesorTitulacion = $_POST["asesorTit"];
    } else {
        $valorAsesorTitulacion = null;
    }
    
    if(isset($_POST["direccionTesis"])) {
        $valorDireccionTesis = $_POST["direccionTesis"];
    } else {
        $valorDireccionTesis = null;
    }

    //Observaciones
    if(isset($_POST['observacionesGrado']))
    {
        $obGrado = $_POST['observacionesGrado'];
        if($obGrado!='Observaciones'){
            $obGradoBD=$conn->query("update observaciones set ovGrado='".$obGrado."' 
            where fkEmpleado=".$id);
        }
    }
    if(isset($_POST['observacionesAntiguedad']))
    {
        $obAntiguedad = $_POST['observacionesAntiguedad'];
        if($obAntiguedad!='Observaciones'){
            $obAntiguedadBD=$conn->query("update observaciones set ovAntiguedad='".$obAntiguedad."' 
            where fkEmpleado=".$id);
        }
    }
    if(isset($_POST['observacionesCursosCap']))
    {
        $obCursosCap = $_POST['observacionesCursosCap'];
        if($obCursosCap!='Observaciones'){
            $obCursosCapBD=$conn->query("update observaciones set ovCursoCap='".$obCursosCap."' 
            where fkEmpleado=".$id);
        }
    }
    if(isset($_POST['observacionesCertificaciones']))
    {
        $obCertificaciones = $_POST['observacionesCertificaciones'];
        if($obCertificaciones!='Observaciones'){
            $obCertificacionesBD=$conn->query("update observaciones set ovCertificaciones='".$obCertificaciones."' 
            where fkEmpleado=".$id);
        }
    }
    if(isset($_POST['observacionesDiplomados']))
    {
        $obDiplomados = $_POST['observacionesDiplomados'];
        if($obDiplomados!='Observaciones'){
            $obDiplomadosBD=$conn->query("update observaciones set ovDiplomados='".$obDiplomados."' 
            where fkEmpleado=".$id);
        }
    }
    if(isset($_POST['observacionesCursosST']))
    {
        $obCursosST = $_POST['observacionesCursosST'];
        if($obCursosST!='Observaciones'){
            $obCursosSTBD=$conn->query("update observaciones set ovCursosST='".$obCursosST."' 
            where fkEmpleado=".$id);
        }
    }
    if(isset($_POST['observacionesCursos']))
    {
        $obCursos = $_POST['observacionesCursos'];
        if($obCursos!='Observaciones'){
            $obCursos=$conn->query("update observaciones set ovCursos='".$obCursos."' 
            where fkEmpleado=".$id);
        }
    }
    if(isset($_POST['observacionesInstructorDip']))
    {
        $obInstructorDip = $_POST['observacionesInstructorDip'];
        if($obInstructorDip!='Observaciones'){
            $obInstructorDipBD=$conn->query("update observaciones set ovInstructorDip='".$obInstructorDip."' 
            where fkEmpleado=".$id);
        }
    }
    if(isset($_POST['observacionesInstructorCer']))
    {
        $obInstructorCer = $_POST['observacionesInstructorCer'];
        if($obInstructorCer!='Observaciones'){
            $obInstructorCerBD=$conn->query("update observaciones set ovInstructirCer='".$obInstructorCer."' 
            where fkEmpleado=".$id);
        }
    }
    if(isset($_POST['observacionesAsesorRes']))
    {
        $obAsesorRes = $_POST['observacionesAsesorRes'];
        if($obAsesorRes!='Observaciones'){
            $obAsesorResBD=$conn->query("update observaciones set ovAsesorRes='".$obAsesorRes."' 
            where fkEmpleado=".$id);
        }
    }
    if(isset($_POST['observacionesAsesorTit']))
    {
        $obAsesorTit = $_POST['observacionesAsesorTit'];
        if($obAsesorTit!='Observaciones'){
            $obAsesorTitBD=$conn->query("update observaciones set ovAsesorTit='".$obAsesorTit."' 
            where fkEmpleado=".$id);
        }
    }
    if(isset($_POST['observacionesDireccionTesis']))
    {
        $obDireccionTesis = $_POST['observacionesDireccionTesis'];
        if($obDireccionTesis!='Observaciones'){
            $obDireccionTesisBD=$conn->query("update observaciones set ovDireccionTesis='".$obDireccionTesis."' 
            where fkEmpleado=".$id);
        }
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
        if($valorGradoBD['Grado']=='Doctorado')
        {
            $revertirGrado=$conn->query("update Puntaje set Puntaje = 
            Puntaje - 30 where fkEmpleado=".$id);
        }else
        if($valorGradoBD['Grado']=='Maestria')
        {
            $revertirGrado=$conn->query("update Puntaje set Puntaje = 
            Puntaje - 20 where fkEmpleado=".$id);
        }else
        if($valorGradoBD['Grado']=='Licenciatura')
        {
            $revertirGrado=$conn->query("update Puntaje set Puntaje = 
            Puntaje - 10 where fkEmpleado=".$id);
        }
        $insertarGrado=$conn->query("update Empleados set rutaGrado='Aprobado owo',
        Grado=".$valorGrado." where id=".$id);
        $insertarGrado=$conn->query("update Empleados set rutaGrado='En espera' where id=".$id);
    }else if($grado=='Rechazar') 
        $insertarGrado=$conn->query("update Empleados set rutaGrado='Rechazado umu' where id=".$id);

    if($antiguedad=='Aprobar')
    {
        if(!empty($valorAntiguedadBD['Antiguedad'])){
            $revertirAntiguedad=$conn->query("update Puntaje set Puntaje = Puntaje - "
            . ($valorAntiguedadBD['Antiguedad'] * 10)." where fkEmpleado=".$id);
        }
        $insertarAntiguedad=$conn->query("update Empleados set rutaAntiguedad='Aprobado owo',
        Antiguedad=".$valorAntiguedad." where id=".$id);
        $insertarAntiguedad=$conn->query("update Empleados set rutaAntiguedad='En espera' where id=".$id);
    }else  if($antiguedad=='Rechazar') 
        $insertarAntiguedad=$conn->query("update Empleados set rutaAntiguedad='Rechazado umu' where id=".$id);
    
    if($cursosCap=='Aprobar')
    {
        if($valorCursoCapBD['CursoCap']>29&&!empty($valorCursoCapBD['CursoCap']))
        {
            $revertirCursosCap=$conn->query("update Puntaje set Puntaje = Puntaje - 2 where fkEmpleado=".$id);
        }else if($valorCursoCapBD['CursoCap']<29&&!empty($valorCursoCapBD['CursoCap'])){
            $revertirCursosCap=$conn->query("update Puntaje set Puntaje = Puntaje - 1 where fkEmpleado=".$id);
        }
        $insertarCursosCap=$conn->query("update Empleados set rutaCursoCap='Aprobado owo',
        CursoCap=".$valorCursosCap." where id=".$id);
        $insertarCursosCap=$conn->query("update Empleados set rutaCursoCap='En espera' where id=".$id);
    }else  if($cursosCap=='Rechazar') 
        $insertarCursosCap=$conn->query("update Empleados set rutaCursoCap='Rechazado umu' where id=".$id);
    
    if($certificaciones=='Aprobar')
    {
        $insertarCertificaciones=$conn->query("update Empleados set rutaCertificaciones='Aprobado owo', Certificaciones=true ".
        "where id=".$id);
        $insertarCertificaciones=$conn->query("update Empleados set rutaCertificaciones='En espera' where id=".$id);
    }else  if($certificaciones=='Rechazar') 
        $insertarCertificaciones=$conn->query("update Empleados set rutaCertificaciones='Rechazado umu' where id=".$id);

    if($diplomados=='Aprobar')
    {
        $insertarDiplomados=$conn->query("update Empleados set rutaDiplomados='Aprobado owo', Diplomados=true ".
        "where id=".$id);
        $insertarDiplomados=$conn->query("update Empleados set rutaDiplomados='En espera' where id=".$id);
    }else if($diplomados=='Rechazar') 
        $insertarDiplomados=$conn->query("update Empleados set rutaDiplomados='Rechazado umu' where id=".$id);

    if($cursosST=='Aprobar')
    {
        $insertarCursosST=$conn->query("update Empleados set rutaCursosST='Aprobado owo', CursosST = true ".
        "where id=".$id);
        $insertarCursosST=$conn->query("update Empleados set rutaCursosST='En espera' where id=".$id);
    }else if($cursosST=='Rechazar') 
        $insertarCursosST=$conn->query("update Empleados set rutaCursosST='Rechazado umu' where id=".$id);

    if($cursos=='Aprobar')
    {
        if($valorCursosBD>29&&!empty($valorCursosBD['Cursos'])){
            $revertirCursos=$conn->query("update Puntaje set Puntaje=Puntaje - 15 where ".
            "id = ".$id);
        }else if($valorCursosBD<29&&!empty($valorCursosBD['Cursos'])){
            $revertirCursos=$conn->query("update Puntaje set Puntaje=Puntaje - 7 where ".
            "id = ".$id);
        }
        $insertarCursos=$conn->query("update Empleados set rutaCursos='Aprobado owo',
        Cursos=".$valorCursos." where id=".$id);
        $insertarCursos=$conn->query("update Empleados set rutaCursos='En espera' where id=".$id);
    }else if($cursos=='Rechazar') 
        $insertarCursos=$conn->query("update Empleados set rutaCursos='Rechazado umu' where id=".$id);

    if($instructorDiplomados=='Aprobar')
    {
        $insertarInstructorDip=$conn->query("update Empleados set rutaInstructorDip='Aprobado owo', InstructorDip = true ".
        "where id=".$id);
        $insertarInstructorDip=$conn->query("update Empleados set rutaInstructorDip='En espera' where id=".$id);
    }else if($instructorDiplomados=='Rechazar') 
        $insertarInstructorDip=$conn->query("update Empleados set rutaInstructorDip='Rechazado umu' where id=".$id);

    if($instructorCertificaciones=='Aprobar')
    {
        $insertarInstructoCer=$conn->query("update Empleados set rutaInstructorCer='Aprobado owo', InstructorCer=true ".
        "where id=".$id);
        $insertarInstructorDip=$conn->query("update Empleados set rutaInstructorDip='En espera' where id=".$id);
    }else if($instructorCertificaciones=='Rechazar') 
        $insertarInstructoCer=$conn->query("update Empleados set rutaInstructorCer='Rechazado umu' where id=".$id);

    if($asesorResidencias=='Aprobar')
    {
        if(!empty($valorAsesorResBD['AsesorRes'])&&$valorAsesorResBD['AsesorRes']!=0){
            $revertirAsesorResBD=$conn->query("update Puntaje set Puntaje=Puntaje - ".
            $valorAsesorResBD['AsesorRes']." where id = ".$id);
        }
        $insertarAsesorRes=$conn->query("update Empleados set rutaAsesorRes='Aprobado owo', 
        AsesorRes=".$valorAsesorResidencias." where id=".$id);
        $insertarAsesorRes=$conn->query("update Empleados set rutaAsesorRes='En espera' where id=".$id);
    }else if($asesorResidencias=='Rechazar') 
        $insertarAsesorRes=$conn->query("update Empleados set rutaAsesorRes='Rechazado umu' where id=".$id);
    
    if($asesorTitulacion=='Aprobar')
    {
        if(!empty($valorAsesorTitBD['AsesorTit'])&&$valorAsesorTitBD['AsesorTit']!=0){
            $revertirAsesorTitBD=$conn->query("update Puntaje set Puntaje=Puntaje - ".
            $valorAsesorTitBD['AsesorTit']." where id = ".$id);
        }
        $insertarAsesorTit=$conn->query("update Empleados set rutaAsesorTit='Aprobado owo',
        AsesorTit=".$valorAsesorTitulacion." where id=".$id);
        $insertarAsesorTit=$conn->query("update Empleados set rutaAsesorTit='En espera' where id=".$id);
    }else if($asesorTitulacion=='Rechazar') 
    $insertarAsesorTit=$conn->query("update Empleados set rutaAsesorTit='Rechazado umu' where id=".$id);

    if($direccionTesis=='Aprobar')
    {
        $insertarDireccionTesis=$conn->query("update Empleados set rutaDireccionTesis='Aprobado owo', DireccionTesis=true ".
        "where id=".$id);
        $insertarDireccionTesis=$conn->query("update Empleados set rutaDireccionTesis='En espera' where id=".$id);
    }else if($direccionTesis=='Rechazar') 
        $insertarDireccionTesis=$conn->query("update Empleados set rutaDireccionTesis='Rechazado umu' where id=".$id);

    $conn->close();
} else {
    echo "Error, no existe un ruta que evaluar";
}
header("Location: Formulario.php");


