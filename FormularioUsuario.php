<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Documentos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="fondouwu2">

    <?php
    require("conexion.php"); // Asegúrate de iniciar la sesión en la parte superior del archivo

    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
    }

    // Funcion SQL para obtener los estatus
    function obtenerEstatusGrado($ruta) {
    //require("conexion.php");
    $conn = mysqli_connect("localhost", "userPro", "123", "Escalafon");
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
    }
    $sql = "SELECT $ruta FROM Empleados WHERE Nombre = '$usuario'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $estatus = $row[$ruta];
    } else {
        $estatus = "";
    }
    return $estatus;
}
function evaluarEstatus($valorBD){
    if($valorBD=='En espera'){
    $resultado='Aprobado';
    }
    else if($valorBD=='Rechazado umu'){
        $resultado='Rechazado';
    }
    else if(!empty($valorBD)&&$valorBD!=null)
    {
        $resultado='En espera';
    }
    else
    {
        $resultado='No se encontraron resultados.';
    }
    return $resultado;
}
$estatus1 =  evaluarEstatus(obtenerEstatusGrado("rutaGrado"));
$estatus2 =  evaluarEstatus(obtenerEstatusGrado("rutaAntiguedad"));
$estatus3 =  evaluarEstatus(obtenerEstatusGrado("rutaCursoCap"));
$estatus4 =  evaluarEstatus(obtenerEstatusGrado("rutaCertificaciones"));
$estatus5 =  evaluarEstatus(obtenerEstatusGrado("rutaDiplomados"));
$estatus6 =  evaluarEstatus(obtenerEstatusGrado("rutaCursosST"));
$estatus7 =  evaluarEstatus(obtenerEstatusGrado("rutaCursos"));
$estatus8 =  evaluarEstatus(obtenerEstatusGrado("rutaInstructorDip"));
$estatus9 =  evaluarEstatus(obtenerEstatusGrado("rutaInstructorCer"));
$estatus10 = evaluarEstatus(obtenerEstatusGrado("rutaAsesorRes"));
$estatus11 = evaluarEstatus(obtenerEstatusGrado("rutaAsesorTit"));
$estatus12 = evaluarEstatus(obtenerEstatusGrado("rutaDireccionTesis"));

    // Funcion SQL para obtener las observaciones
    function obtenerObservaciones($ob)
    {
        $conn = mysqli_connect("localhost", "userPro", "123", "Escalafon");
        if (isset($_SESSION['usuario'])) {
            $usuario = $_SESSION['usuario'];
        }
        $query = "SELECT id FROM Empleados WHERE Nombre = '$usuario'";
        $result1 = $conn->query($query);
        if ($result1->num_rows > 0) {
            $row1 = $result1->fetch_assoc();
            $estatus1 = $row1["id"];
        } else {
            $estatus1 = "nel";
        }
        $sql2 = "SELECT $ob FROM observaciones WHERE fkEmpleado = '$estatus1'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            $row2 = $result2->fetch_assoc();
            $observaciones = $row2[$ob];
        } else {
            $observaciones = "";
        }
        return $observaciones;
    }
    $obervaciones1 = obtenerObservaciones("OvGrado");
    $obervaciones2 = obtenerObservaciones("OvAntiguedad");
    $obervaciones3 = obtenerObservaciones("OvCursoCap");
    $obervaciones4 = obtenerObservaciones("OvCertificaciones");
    $obervaciones5 = obtenerObservaciones("OvDiplomados");
    $obervaciones6 = obtenerObservaciones("OvCursosST");
    $obervaciones7 = obtenerObservaciones("OvCursos");
    $obervaciones8 = obtenerObservaciones("OvInstructorDip");
    $obervaciones9 = obtenerObservaciones("OvInstructorCer");
    $obervaciones10 = obtenerObservaciones("OvAsesorRes");
    $obervaciones11 = obtenerObservaciones("OvAsesorTit");
    $obervaciones12 = obtenerObservaciones("OvDireccionTesis");

    ?>

    <h1 class="titulos">Subir Documentos</h1>
    
    <!--
    <input type="" name="id" id="usuario" value="<?php echo $estatus1; ?>">
    <input type="" name="id" id="usuario" value="<?php echo $obervaciones1; ?>"> -->

    <!-- Formulario para Certificado de grado de estudios -->
        <form class="formuwu" action="procesar_form_us.php" method="post" id="mostrarAlerta">
    <input hidden="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
        <h2>Certificado de grado de estudios</h2>
        <!-- Campo para ingresar el enlace -->
        <label class="tiritas" for="grado_estudios">Enlace:</label>
        <input class="espacio-derecha" type="text" name="grado_estudios" id="grado_estudios">
        <!-- Campo para ver el estatus -->
        <label class="tiritas" for="estatus_grado_estudios">Estatus:</label>
        <input class="estatus" type="text" name="estatus_grado_estudios" id="estatus_grado_estudios" readonly value="<?php echo $estatus1; ?>">
        <!-- Cuadro de texto de observaciones -->
        <label class="tiritas" for="observaciones_grado_estudios">Observaciones:</label>
        <input type="" name="id" id="usuario" readonly value="<?php echo $obervaciones1; ?>">
        <br><br><br>
        <input class="botonowo" type="submit" name="enviar_certificado" value="Enviar certificado">
    <!-- </form> -->

    <!-- Formulario para Comprobantes de años de antigüedad -->
<!-- <form class="formuwu" action="procesar_form_us.php" method="post"> -->
    <input hidden="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de años de antigüedad</h2>
    <!-- Campo para ingresar el enlace -->
    <label class="tiritas" for="antiguedad">Enlace:</label>
    <input class="espacio-derecha" type="text" name="antiguedad" id="antiguedad">
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus_antiguedad">Estatus:</label>
    <input class="estatus" type="text" name="estatus_antiguedad" id="estatus_antiguedad" readonly value="<?php echo $estatus2; ?>">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones_antiguedad">Observaciones:</label>
        <input type="" name="id" id="usuario" readonly value="<?php echo $obervaciones2; ?>">
    <br><br><br>
    <input class="botonowo" type="submit" name="enviar_antiguedad" value="Enviar comprobante de antigüedad">
<!-- </form> -->

<!-- Formulario para Comprobante de Horas de cursos de capacitación impartidas -->
<!-- <form class="formuwu" action="procesar_form_us.php" method="post"> -->
    <input hidden="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de Horas de cursos de capacitación impartidas</h2>
    <!-- Campo para ingresar el enlace -->
    <label class="tiritas" for="cursosCap">Enlace:</label>
    <input class="espacio-derecha" type="text" name="cursosCap" id="cursosCap">
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus_cursosCap">Estatus:</label>
    <input class="estatus" type="text" name="estatus_cursosCap" id="estatus_cursosCap" readonly value="<?php echo $estatus3; ?>">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones_cursosCap">Observaciones:</label>
        <input type="" name="id" id="usuario" readonly value="<?php echo $obervaciones3; ?>">
    <br><br><br>
    <input class="botonowo" type="submit" name="enviar_cursosCap" value="Enviar comprobante de cursos de capacitación impartidas">
<!-- </form> -->

<!-- Formulario para Comprobante de certificaciones -->
<!-- <form class="formuwu" action="procesar_form_us.php" method="post"> -->
    <input hidden="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de certificaciones</h2>
    <!-- Campo para ingresar el enlace -->
    <label class="tiritas" for="certificaciones">Enlace:</label>
    <input class="espacio-derecha" type="text" name="certificaciones" id="certificaciones">
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus_certificaciones">Estatus:</label>
    <input class="estatus" type="text" name="estatus_certificaciones" id="estatus_certificaciones" readonly value="<?php echo $estatus4; ?>">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones_certificaciones">Observaciones:</label>
        <input type="" name="id" id="usuario" readonly value="<?php echo $obervaciones4; ?>">
    <br><br><br>
    <input class="botonowo" type="submit" name="enviar_certificaciones" value="Enviar comprobante de certificaciones">
<!-- </form> -->

<!-- Formulario para Comprobante de diplomados -->
<!-- <form class="formuwu" action="procesar_form_us.php" method="post"> -->
    <input hidden="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de diplomados</h2>
    <!-- Campo para ingresar el enlace -->
    <label class="tiritas" for="diplomados">Enlace:</label>
    <input class="espacio-derecha" type="text" name="diplomados" id="diplomados">
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus_diplomados">Estatus:</label>
    <input class="estatus" type="text" name="estatus_diplomados" id="estatus_diplomados" readonly value="<?php echo $estatus5; ?>">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones_diplomados">Observaciones:</label>
        <input type="" name="id" id="usuario" readonly value="<?php echo $obervaciones5; ?>">
    <br><br><br>
    <input class="botonowo" type="submit" name="enviar_diplomados" value="Enviar comprobante de diplomados">
<!-- </form> -->

<!-- Formulario para Comprobante de cursos -->
<!-- <form class="formuwu" action="procesar_form_us.php" method="post"> -->
    <input hidden="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de cursos</h2>
    <!-- Campo para ingresar el enlace -->
    <label class="tiritas" for="cursos">Enlace:</label>
    <input class="espacio-derecha" type="text" name="cursos" id="cursos">
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus_cursos">Estatus:</label>
    <input class="estatus" type="text" name="estatus_cursos" id="estatus_cursos" readonly value="<?php echo $estatus6; ?>">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones_cursos">Observaciones:</label>
        <input type="" name="id" id="usuario" readonly value="<?php echo $obervaciones6; ?>">
    <br><br><br>
    <input class="botonowo" type="submit" name="enviar_cursos" value="Enviar comprobante de cursos">
<!-- </form> -->

<!-- Formulario para Comprobante de cursos -->
<!-- <form class="formuwu" action="procesar_form_us.php" method="post"> -->
    <input hidden="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de cursos ST</h2>
    <!-- Campo para ingresar el enlace -->
    <label class="tiritas" for="cursosST">Enlace:</label>
    <input class="espacio-derecha" type="text" name="cursosST" id="cursosST">
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus_cursos">Estatus:</label>
    <input class="estatus" type="text" name="estatus_cursos" id="estatus_cursos" readonly value="<?php echo $estatus7; ?>">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones_cursos">Observaciones:</label>
        <input type="" name="id" id="usuario" readonly value="<?php echo $obervaciones7; ?>">
    <br><br><br>
    <input class="botonowo" type="submit" name="enviar_cursosST" value="Enviar comprobante de cursosST">
<!-- </form> -->

<!-- Formulario para Comprobante de instructor de diplomados -->
<!-- <form class="formuwu" action="procesar_form_us.php" method="post"> -->
    <input hidden="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de instructor de diplomados</h2>
    <!-- Campo para ingresar el enlace -->
    <label class="tiritas" for="instructorDip">Enlace:</label>
    <input class="espacio-derecha" type="text" name="instructorDip" id="instructorDip">
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus_instructorDip">Estatus:</label>
    <input class="estatus" type="text" name="estatus_instructorDip" id="estatus_instructorDip" readonly value="<?php echo $estatus8; ?>">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones_instructorDip">Observaciones:</label>
        <input type="" name="id" id="usuario" readonly value="<?php echo $obervaciones8; ?>">
    <br><br><br>
    <input class="botonowo" type="submit" name="enviar_instructorDip" value="Enviar comprobante de instructor de diplomados">
<!-- </form> -->

<!-- Formulario para Comprobante de instructor de certificaciones -->
<!-- <form class="formuwu" action="procesar_form_us.php" method="post"> -->
    <input hidden="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de instructor de certificaciones</h2>
    <!-- Campo para ingresar el enlace -->
    <label class="tiritas" for="instructorCer">Enlace:</label>
    <input class="espacio-derecha" type="text" name="instructorCer" id="instructorCer">
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus_instructorCer">Estatus:</label>
    <input class="estatus" type="text" name="estatus_instructorCer" id="estatus_instructorCer" readonly value="<?php echo $estatus9; ?>">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones_instructorCer">Observaciones:</label>
        <input type="" name="id" id="usuario" readonly value="<?php echo $obervaciones9; ?>">
    <br><br><br>
    <input class="botonowo" type="submit" name="enviar_instructorCer" value="Enviar comprobante de instructor de certificaciones">
<!-- </form> -->

<!-- Formulario para Comprobante de asesor de residencias -->
<!-- <form class="formuwu" action="procesar_form_us.php" method="post"> -->
    <input hidden="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de asesor de residencias</h2>
    <!-- Campo para ingresar el enlace de asesor de residencias -->
    <label class="tiritas" for="asesorRes">Enlace:</label>
    <input class="espacio-derecha" type="text" name="asesorRes" id="asesorRes">
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus">Estatus:</label>
    <input class="estatus" type="text" name="estatus" id="estatus" readonly value="<?php echo $estatus10; ?>">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones">Observaciones:</label>
        <input type="" name="id" id="usuario" readonly value="<?php echo $obervaciones10; ?>">
    <br><br><br>
    <input class="botonowo" type="submit" name="enviar_asesorRes" value="Enviar comprobante de asesor de residencias">
<!-- </form> -->

<!-- Formulario para Comprobante de asesor de titulación -->
<!-- <form class="formuwu" action="procesar_form_us.php" method="post"> -->
    <input hidden="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de asesor de titulación</h2>
        <!-- Campo para ingresar el enlace de asesor de titulación -->
        <label class="tiritas" for="asesorTit">Enlace:</label>
    <input class="espacio-derecha" type="text" name="asesorTit" id="asesorTit">
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus">Estatus:</label>
    <input class="estatus" type="text" name="estatus" id="estatus" readonly value="<?php echo $estatus11; ?>">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones">Observaciones:</label>
        <input type="" name="id" id="usuario" readonly value="<?php echo $obervaciones11; ?>">
    <br><br><br>
    <input class="botonowo" type="submit" name="enviar_asesorTit" value="Enviar comprobante de asesor de titulación">
<!-- </form> -->

<!-- Formulario para Comprobante de dirección de tesis -->
<!-- <form class="formuwu" action="procesar_form_us.php" method="post"> -->
    <input hidden="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de dirección de tesis</h2>
    <!-- Campo para ingresar el enlace de dirección de tesis -->
    <label class="tiritas" for="direccionTesis">Enlace:</label>
    <input class="espacio-derecha" type="text" name="direccionTesis" id="direccionTesis">
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus">Estatus:</label>
    <input class="estatus" type="text" name="estatus" id="estatus" readonly value="<?php echo $estatus12; ?>">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones">Observaciones:</label>
        <input type="" name="id" id="usuario" readonly value="<?php echo $obervaciones12; ?>">
    <br><br><br>
    <input class="botonowo" type="submit" name="enviar_direccionTesis" value="Enviar comprobante de dirección de tesis">
</form>
<form action="Login.html">
    <div class="boton-flotante">
        <input type="submit" class="botonregresar" value="Regresar">
    </div>
    </form>

<script>
    mostrarAlerta.addEventListener("submit", function() { 
            // Muestra un mensaje en la página 
            alert("Operación realizada con éxito"); 
        }); 
</script>

</body>
</html>

