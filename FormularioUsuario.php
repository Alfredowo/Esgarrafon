<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Documentos</title>
    <link rel="stylesheet" href="style.css">
    <link href="bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet"></head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap" rel="stylesheet">
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
        $resultado='Aun no se ha adjuntado el documento';
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

    <h1 class="titulos">Subir Documentos</h1><hr style="border-bottom: 3px solid aqua;"><br>
    
    <!--
    <input type="" name="id" id="usuario" value="<?php echo $estatus1; ?>">
    <input type="" name="id" id="usuario" value="<?php echo $obervaciones1; ?>"> -->

<form class="form" action="procesar_form_us.php" method="post" id="mostrarAlerta">
    <input hidden="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">

    <!-- Formulario para Certificado de grado de estudios -->
    <div class="container">
        <h3 class="text-center">Certificado de grado de estudios</h3>
        <div class="form-group">
            <label for="grado_estudios">Enlace del documento:</label>
            <input class="form-control" type="text" name="grado_estudios" id="grado_estudios" style="margin-top: 5px;">
        </div><br>
        <div class="form-group">
            <label for="estatus_grado_estudios">Estatus:</label>
            <input class="" type="text" name="estatus_grado_estudios" id="estatus_grado_estudios" readonly value="<?php echo $estatus1; ?>" style="border: none; background: none; pointer-events: none; color: #d6fcff;">
        </div><br>
        <div class="form-group">
            <label for="observaciones_grado_estudios">Observaciones:</label>
            <textarea class="fuente form-control" name="observaciones_grado_estudios" id="observaciones_grado_estudios" readonly style="border: none; background: none; pointer-events: none; color: #d6fcff;">
                <?php echo $obervaciones1; ?>
            </textarea>
        </div>
        <button class="btn btn-primary" type="submit" name="enviar_certificado">Enviar</button>
    </div><br>
    <hr><br>

        <!-- Formulario para Comprobantes de años de antigüedad -->
    <div class="container">
        <h3 class="text-center">Comprobante de años de antigüedad</h3>
        <div class="form-group">
            <label for="antiguedad">Enlace del documento:</label>
            <input class="form-control" type="text" name="antiguedad" id="antiguedad" style="margin-top: 5px;">
        </div><br>
        <div class="form-group">
            <label for="estatus_antiguedad">Estatus:</label>
            <input class="" type="text" name="estatus_antiguedad" id="estatus_antiguedad" readonly value="<?php echo $estatus2; ?>" style="border: none; background: none; pointer-events: none; color: #d6fcff;">
        </div><br>
        <div class="form-group">
            <label for="observaciones_antiguedad">Observaciones:</label>
            <textarea class="form-control" name="observaciones_antiguedad" id="observaciones_antiguedad" readonly style="border: none; background: none; pointer-events: none; color: #d6fcff;">
                <?php echo $obervaciones2; ?>
            </textarea>
        </div>
        <button class="btn btn-primary" type="submit" name="enviar_antiguedad" >Enviar</button>
    </div><br>
    <hr><br>

    <!-- Formulario para Comprobante de Horas de cursos de capacitación impartidas -->
    <div class="container">
        <h3 class="text-center">Comprobante de Horas de cursos de capacitación impartidas</h3>
        <div class="form-group">
            <label for="cursosCap">Enlace del documento:</label>
            <input class="form-control" type="text" name="cursosCap" id="cursosCap" style="margin-top: 5px;">
        </div><br>
        <div class="form-group">
            <label for="estatus_cursosCap">Estatus:</label>
            <input class="" type="text" name="estatus_cursosCap" id="estatus_cursosCap" readonly value="<?php echo $estatus3; ?>" style="border: none; background: none; pointer-events: none; color: #d6fcff;">
        </div><br>
        <div class="form-group">
            <label for="observaciones_cursosCap">Observaciones:</label>
            <textarea class="fuente form-control" name="observaciones_cursosCap" id="observaciones_cursosCap" readonly style="border: none; background: none; pointer-events: none; color: #d6fcff;">
                <?php echo $obervaciones3; ?>
            </textarea>
        </div>
        <button class="btn btn-primary" type="submit" name="enviar_cursosCap">Enviar</button>
    </div><br>
    <hr><br>

    <!-- Formulario para Comprobante de certificaciones -->
    <div class="container">
        <h3 class="text-center titulos">Comprobante de Horas de cursos de capacitación impartidas</h3>
        <div class="form-group">
            <label for="cursosCap">Enlace del documento:</label>
            <input class="form-control" type="text" name="cursosCap" id="cursosCap" style="margin-top: 5px;">
        </div><br>
        <div class="form-group">
            <label for="estatus_cursosCap">Estatus:</label>
            <input class="" type="text" name="estatus_cursosCap" id="estatus_cursosCap" readonly value="<?php echo $estatus4; ?>" style="border: none; background: none; pointer-events: none; color: #d6fcff;">
        </div><br>
        <div class="form-group">
            <label for="observaciones_certificaciones">Observaciones:</label>
            <textarea class="form-control fuente" name="observaciones_certificaciones" id="observaciones_certificaciones" readonly style="border: none; background: none; pointer-events: none; color: #d6fcff;">
                <?php echo $obervaciones4; ?>
            </textarea>
        </div>
        <button class="btn btn-primary" type="submit" name="enviar_cursosCap">Enviar</button>
    </div><br>
    <hr><br>

    <!-- Formulario para Comprobante de diplomados -->
    <div class="container">
        <h3 class="text-center titulos">Comprobante de diplomados</h3>
        <div class="form-group">
            <label for="diplomados">Enlace del documento:</label>
            <input class="form-control" type="text" name="diplomados" id="diplomados" style="margin-top: 5px;">
        </div><br>
        <div class="form-group">
            <label for="estatus_diplomados">Estatus:</label>
            <input class="" type="text" name="estatus_diplomados" id="estatus_diplomados" readonly value="<?php echo $estatus5; ?>" style="border: none; background: none; pointer-events: none; color: #d6fcff;">
        </div><br>
        <div class="form-group">
            <label for="observaciones_diplomados">Observaciones:</label>
            <textarea class="form-control fuente " name="observaciones_diplomados" id="observaciones_diplomados" readonly style="border: none; background: none; pointer-events: none; color: #d6fcff;">
                <?php echo $obervaciones5; ?>
            </textarea>
        </div>
        <button class="btn btn-primary" type="submit" name="enviar_diplomados">Enviar</button>
    </div><br>
    <hr><br>

    <!-- Formulario para Comprobante de cursos -->
    <div class="container">
        <h3 class="text-center titulos">Comprobante de cursos</h3>
        <div class="form-group">
            <label for="cursos">Enlace del documento:</label>
            <input class="form-control " type="text" name="cursos" id="cursos" style="margin-top: 5px;">
        </div><br>
        <div class="form-group">
            <label for="estatus_cursos">Estatus:</label>
            <input class="form-control" type="text" name="estatus_cursos" id="estatus_cursos" readonly value="<?php echo $estatus6; ?>" style="border: none; background: none; pointer-events: none; color: #d6fcff;">
        </div><br>
        <div class="form-group">
            <label for="observaciones_cursos">Observaciones:</label>
            <textarea class="form-control fuente " name="observaciones_cursos" id="observaciones_cursos" readonly style="border: none; background: none; pointer-events: none; color: #d6fcff;">
                <?php echo $obervaciones6; ?>
            </textarea>
        </div>
        <button class="btn btn-primary botonowo" type="submit" name="enviar_cursos">Enviar</button>
    </div><br>
    <hr><br>

    <!-- Formulario para Comprobante de cursos ST-->
    <div class="container">
        <h3 class="text-center titulos">Comprobante de cursos ST</h3>
        <div class="form-group">
            <label for="cursosST">Enlace del documento:</label>
            <input class="form-control " type="text" name="cursosST" id="cursosST" style="margin-top: 5px;">
        </div><br>
        <div class="form-group">
            <label for="estatus_cursos_ST">Estatus:</label>
            <input class="form-control" type="text" name="estatus_cursos_ST" id="estatus_cursos_ST" readonly value="<?php echo $estatus7; ?>" style="border: none; background: none; pointer-events: none; color: #d6fcff;">
        </div><br>
        <div class="form-group">
            <label for="observaciones_cursos_ST">Observaciones:</label>
            <textarea class="form-control fuente textareaowo2" name="observaciones_cursos_ST" id="observaciones_cursos_ST" readonly style="border: none; background: none; pointer-events: none; color: #d6fcff;">
                <?php echo $obervaciones7; ?>
            </textarea>
        </div>
        <button class="btn btn-primary botonowo" type="submit" name="enviar_cursosST">Enviar</button>
    </div><br>
    <hr><br>


    <!-- Formulario para Comprobante de instructor de diplomados -->
    <div class="container">
        <h3 class="text-center">Certificado de grado de estudios</h3>
        <div class="form-group">
            <label for="grado_estudios">Enlace del documento:</label>
            <input class="form-control" type="text" name="grado_estudios" id="grado_estudios" style="margin-top: 5px;">
        </div><br>
        <div class="form-group">
            <label for="estatus_instructorDip">Estatus:</label>
            <input class="" type="text" name="estatus_instructorDip" id="estatus_instructorDip" readonly value="<?php echo $estatus8; ?>" style="border: none; background: none; pointer-events: none; color: #d6fcff;">
        </div><br>
        <div class="form-group">
            <label for="observaciones_instructorDip">Observaciones:</label>
            <textarea class="fuente form-control" name="observaciones_instructorDip" id="observaciones_instructorDip" readonly style="border: none; background: none; pointer-events: none; color: #d6fcff;">
                <?php echo $obervaciones8; ?>
            </textarea>
        </div>
        <button class="btn btn-primary" type="submit" name="enviar_certificado">Enviar</button>
    </div><br>
    <hr><br>

    <!-- Formulario para Comprobante de instructor de certificaciones -->
    <div class="container">
        <h3 class="text-center">Comprobante de instructor de certificaciones</h3>
        <div class="form-group">
            <label for="certificaciones">Enlace del documento:</label>
            <input class="form-control" type="text" name="certificaciones" id="certificaciones" style="margin-top: 5px;">
        </div><br>
        <div class="form-group">
            <label for="estatus_certificaciones">Estatus:</label>
            <input class="" type="text" name="estatus_certificaciones" id="estatus_certificaciones" readonly value="<?php echo $estatus9; ?>" style="border: none; background: none; pointer-events: none; color: #d6fcff;">
        </div><br>
        <div class="form-group">
            <label for="observaciones_certificaciones">Observaciones:</label>
            <textarea class="fuente form-control" name="observaciones_certificaciones" id="observaciones_certificaciones" readonly style="border: none; background: none; pointer-events: none; color: #d6fcff;">
                <?php echo $obervaciones9; ?>
            </textarea>
        </div>
        <button class="btn btn-primary" type="submit" name="enviar_certificado">Enviar</button>
    </div><br>
    <hr><br>


    <!-- Formulario para Comprobante de asesor de residencias -->
    <div class="container">
        <h3 class="text-center">Certificado de asesor de residencias</h3>
        <div class="form-group">
            <label for="asesorRes">Enlace del documento:</label>
            <input class="form-control" type="text" name="asesorRes" id="asesorRes" style="margin-top: 5px;">
        </div><br>
        <div class="form-group">
            <label for="estatus_residencias">Estatus:</label>
            <input class="" type="text" name="estatus_residencias" id="estatus_residencias" readonly value="<?php echo $estatus10; ?>" style="border: none; background: none; pointer-events: none; color: #d6fcff;">
        </div><br>
        <div class="form-group">
            <label for="observaciones_residencias">Observaciones:</label>
            <textarea class="fuente form-control" name="observaciones_residencias" id="observaciones_residencias" readonly style="border: none; background: none; pointer-events: none; color: #d6fcff;">
                <?php echo $obervaciones10; ?>
            </textarea>
        </div>
        <button class="btn btn-primary" type="submit" name="enviar_certificado">Enviar</button>
    </div><br>
    <hr><br>


    <!-- Formulario para Comprobante de asesor de titulación -->
    <div class="container">
        <h3 class="text-center">Certificado de asesor de titulación</h3>
        <div class="form-group">
            <label for="asesorTit">Enlace del documento:</label>
            <input class="form-control" type="text" name="asesorTit" id="asesorTit" style="margin-top: 5px;">
        </div><br>
        <div class="form-group">
            <label for="estatus_titulacion">Estatus:</label>
            <input class="" type="text" name="estatus_titulacion" id="estatus_titulacion" readonly value="<?php echo $estatus11; ?>" style="border: none; background: none; pointer-events: none; color: #d6fcff;">
        </div><br>
        <div class="form-group">
            <label for="observaciones_titulacion">Observaciones:</label>
            <textarea class="fuente form-control" name="observaciones_titulacion" id="observaciones_titulacion" readonly style="border: none; background: none; pointer-events: none; color: #d6fcff;">
                <?php echo $obervaciones11; ?>
            </textarea>
        </div>
        <button class="btn btn-primary" type="submit" name="enviar_certificado">Enviar</button>
    </div><br>
    <hr><br>

    <!-- Formulario para Comprobante de dirección de tesis -->
    <div class="container">
        <h3 class="text-center">Certificado de dirección de tesis</h3>
        <div class="form-group">
            <label for="direccionTesis">Enlace del documento:</label>
            <input class="form-control" type="text" name="direccionTesis" id="direccionTesis" style="margin-top: 5px;">
        </div><br>
        <div class="form-group">
            <label for="estatus_direccion_tesis">Estatus:</label>
            <input class="" type="text" name="estatus_direccion_tesis" id="estatus_direccion_tesis" readonly value="<?php echo $estatus12; ?>" style="border: none; background: none; pointer-events: none; color: #d6fcff;">
        </div><br>
        <div class="form-group">
            <label for="observaciones_direccion_tesis">Observaciones:</label>
            <textarea class="fuente form-control" name="observaciones_direccion_tesis" id="observaciones_direccion_tesis" readonly style="border: none; background: none; pointer-events: none; color: #d6fcff;">
                <?php echo $obervaciones12; ?>
            </textarea>
        </div>
        <button class="btn btn-primary" type="submit" name="enviar_certificado">Enviar</button>
    </div><br>
    <hr><br>
</form>

<form action="Login.html">
    <div class="boton-flotante">
        <input type="submit" class="botonregresar" value="Regresar">
    </div>
    </form>
<Button class="boton-flotantepro" onclick="mostrarVentanaEmergente()">?</Button>

<div class="ventana-emergente" id="miVentanaEmergente">
  <p>Enlace del documento: Ingresar link de donde esté ubicado su archivo.<br>Ejem.: https://drive.google.com/drive/documento.pdf.</p>
  <p>Estatus: Ver si el archivo ha sido aceptado, rechazado o se encuentra en espera de evaluación.</p>
  <p>Observaciones: Ver si el superior hizo alguna observación sobre tu documento.</p>
  <button onclick="cerrarVentanaEmergente()">Cerrar</button>
</div>

<script>
    mostrarAlerta.addEventListener("submit", function() { 
            alert("Operación realizada con éxito"); 
        }); 
</script>
<script>
function mostrarVentanaEmergente() {
  var ventanaEmergente = document.getElementById("miVentanaEmergente");
  ventanaEmergente.style.display = "block";
}

function cerrarVentanaEmergente() {
  var ventanaEmergente = document.getElementById("miVentanaEmergente");
  ventanaEmergente.style.display = "none";
}
</script>

</body>
</html>

