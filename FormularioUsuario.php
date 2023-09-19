<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Documentos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="fondouwu2">

    <?php
    session_start(); // Asegúrate de iniciar la sesión en la parte superior del archivo

    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
    }
    ?>

    <h1 class="titulos">Subir Documentos</h1>
    <input type="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">

    <!-- Formulario para Certificado de grado de estudios -->
    <form class="formuwu" action="procesar_form_us.php" method="post">
        <input type="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
        <h2>Certificado de grado de estudios</h2>
        <!-- Campo para ingresar el enlace -->
        <label class="tiritas" for="grado_estudios">Enlace:</label>
        <input class="espacio-derecha" type="text" name="grado_estudios" id="grado_estudios" required>
        <!-- Campo para ver el estatus -->
        <label class="tiritas" for="estatus_grado_estudios">Estatus:</label>
        <input class="estatus" type="text" name="estatus_grado_estudios" id="estatus_grado_estudios" readonly value="">
        <!-- Cuadro de texto de observaciones -->
        <label class="tiritas" for="observaciones_grado_estudios">Observaciones:</label>
        <textarea class="textareaowo" id="observaciones_grado_estudios" readonly></textarea>
        <br><br><br>
        <input type="submit" name="enviar_certificado" value="Enviar certificado">
    </form>

    <!-- Formulario para Comprobantes de años de antigüedad -->
<form class="formuwu" action="procesar_form_us.php" method="post">
    <input type="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de años de antigüedad</h2>
    <!-- Campo para ingresar el enlace -->
    <label class="tiritas" for="antiguedad">Enlace:</label>
    <input class="espacio-derecha" type="text" name="antiguedad" id="antiguedad" required>
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus_antiguedad">Estatus:</label>
    <input class="estatus" type="text" name="estatus_antiguedad" id="estatus_antiguedad" readonly value="">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones_antiguedad">Observaciones:</label>
    <textarea class="textareaowo" id="observaciones_antiguedad" readonly></textarea>
    <br><br><br>
    <input type="submit" name="enviar_antiguedad" value="Enviar comprobante de antigüedad">
</form>

<!-- Formulario para Comprobante de Horas de cursos de capacitación impartidas -->
<form class="formuwu" action="procesar_form_us.php" method="post">
    <input type="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de Horas de cursos de capacitación impartidas</h2>
    <!-- Campo para ingresar el enlace -->
    <label class="tiritas" for="cursosCap">Enlace:</label>
    <input class="espacio-derecha" type="text" name="cursosCap" id="cursosCap" required>
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus_cursosCap">Estatus:</label>
    <input class="estatus" type="text" name="estatus_cursosCap" id="estatus_cursosCap" readonly value="">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones_cursosCap">Observaciones:</label>
    <textarea class="textareaowo" id="observaciones_cursosCap" readonly></textarea>
    <br><br><br>
    <input type="submit" name="enviar_cursosCap" value="Enviar comprobante de cursos de capacitación impartidas">
</form>

<!-- Formulario para Comprobante de certificaciones -->
<form class="formuwu" action="procesar_form_us.php" method="post">
    <input type="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de certificaciones</h2>
    <!-- Campo para ingresar el enlace -->
    <label class="tiritas" for="certificaciones">Enlace:</label>
    <input class="espacio-derecha" type="text" name="certificaciones" id="certificaciones" required>
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus_certificaciones">Estatus:</label>
    <input class="estatus" type="text" name="estatus_certificaciones" id="estatus_certificaciones" readonly value="">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones_certificaciones">Observaciones:</label>
    <textarea class="textareaowo" id="observaciones_certificaciones" readonly></textarea>
    <br><br><br>
    <input type="submit" name="enviar_certificaciones" value="Enviar comprobante de certificaciones">
</form>

<!-- Formulario para Comprobante de diplomados -->
<form class="formuwu" action="procesar_form_us.php" method="post">
    <input type="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de diplomados</h2>
    <!-- Campo para ingresar el enlace -->
    <label class="tiritas" for="diplomados">Enlace:</label>
    <input class="espacio-derecha" type="text" name="diplomados" id="diplomados" required>
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus_diplomados">Estatus:</label>
    <input class="estatus" type="text" name="estatus_diplomados" id="estatus_diplomados" readonly value="">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones_diplomados">Observaciones:</label>
    <textarea class="textareaowo" id="observaciones_diplomados" readonly></textarea>
    <br><br><br>
    <input type="submit" name="enviar_diplomados" value="Enviar comprobante de diplomados">
</form>

<!-- Formulario para Comprobante de cursos -->
<form class="formuwu" action="procesar_form_us.php" method="post">
    <input type="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de cursos</h2>
    <!-- Campo para ingresar el enlace -->
    <label class="tiritas" for="cursos">Enlace:</label>
    <input class="espacio-derecha" type="text" name="cursos" id="cursos" required>
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus_cursos">Estatus:</label>
    <input class="estatus" type="text" name="estatus_cursos" id="estatus_cursos" readonly value="">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones_cursos">Observaciones:</label>
    <textarea class="textareaowo" id="observaciones_cursos" readonly></textarea>
    <br><br><br>
    <input type="submit" name="enviar_cursos" value="Enviar comprobante de cursos">
</form>

<!-- Formulario para Comprobante de cursos -->
<form class="formuwu" action="procesar_form_us.php" method="post">
    <input type="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de cursos ST</h2>
    <!-- Campo para ingresar el enlace -->
    <label class="tiritas" for="cursosST">Enlace:</label>
    <input class="espacio-derecha" type="text" name="cursosST" id="cursosST" required>
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus_cursos">Estatus:</label>
    <input class="estatus" type="text" name="estatus_cursos" id="estatus_cursos" readonly value="">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones_cursos">Observaciones:</label>
    <textarea class="textareaowo" id="observaciones_cursos" readonly></textarea>
    <br><br><br>
    <input type="submit" name="enviar_cursosST" value="Enviar comprobante de cursosST">
</form>

<!-- Formulario para Comprobante de instructor de diplomados -->
<form class="formuwu" action="procesar_form_us.php" method="post">
    <input type="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de instructor de diplomados</h2>
    <!-- Campo para ingresar el enlace -->
    <label class="tiritas" for="instructorDip">Enlace:</label>
    <input class="espacio-derecha" type="text" name="instructorDip" id="instructorDip" required>
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus_instructorDip">Estatus:</label>
    <input class="estatus" type="text" name="estatus_instructorDip" id="estatus_instructorDip" readonly value="">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones_instructorDip">Observaciones:</label>
    <textarea class="textareaowo" id="observaciones_instructorDip" readonly></textarea>
    <br><br><br>
    <input type="submit" name="enviar_instructorDip" value="Enviar comprobante de instructor de diplomados">
</form>

<!-- Formulario para Comprobante de instructor de certificaciones -->
<form class="formuwu" action="procesar_form_us.php" method="post">
    <input type="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de instructor de certificaciones</h2>
    <!-- Campo para ingresar el enlace -->
    <label class="tiritas" for="instructorCer">Enlace:</label>
    <input class="espacio-derecha" type="text" name="instructorCer" id="instructorCer" required>
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus_instructorCer">Estatus:</label>
    <input class="estatus" type="text" name="estatus_instructorCer" id="estatus_instructorCer" readonly value="">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones_instructorCer">Observaciones:</label>
    <textarea class="textareaowo" id="observaciones_instructorCer" readonly></textarea>
    <br><br><br>
    <input type="submit" name="enviar_instructorCer" value="Enviar comprobante de instructor de certificaciones">
</form>

<!-- Formulario para Comprobante de asesor de residencias -->
<form class="formuwu" action="procesar_form_us.php" method="post">
    <input type="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de asesor de residencias</h2>
    <!-- Campo para ingresar el enlace de asesor de residencias -->
    <label class="tiritas" for="asesorRes">Enlace:</label>
    <input class="espacio-derecha" type="text" name="asesorRes" id="asesorRes" required>
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus">Estatus:</label>
    <input class="estatus" type="text" name="estatus" id="estatus" readonly value="">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones">Observaciones:</label>
    <textarea class="textareaowo" id="observaciones" readonly></textarea>
    <br><br><br>
    <input type="submit" name="enviar_asesorRes" value="Enviar comprobante de asesor de residencias">
</form>

<!-- Formulario para Comprobante de asesor de titulación -->
<form class="formuwu" action="procesar_form_us.php" method="post">
    <input type="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de asesor de titulación</h2>
        <!-- Campo para ingresar el enlace de asesor de titulación -->
        <label class="tiritas" for="asesorTit">Enlace:</label>
    <input class="espacio-derecha" type="text" name="asesorTit" id="asesorTit" required>
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus">Estatus:</label>
    <input class="estatus" type="text" name="estatus" id="estatus" readonly value="">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones">Observaciones:</label>
    <textarea class="textareaowo" id="observaciones" readonly></textarea>
    <br><br><br>
    <input type="submit" name="enviar_asesorTit" value="Enviar comprobante de asesor de titulación">
</form>

<!-- Formulario para Comprobante de dirección de tesis -->
<form class="formuwu" action="procesar_form_us.php" method="post">
    <input type="hidden" name="usuario" id="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    <h2>Comprobante de dirección de tesis</h2>
    <!-- Campo para ingresar el enlace de dirección de tesis -->
    <label class="tiritas" for="direccionTesis">Enlace:</label>
    <input class="espacio-derecha" type="text" name="direccionTesis" id="direccionTesis" required>
    <!-- Campo para ver el estatus -->
    <label class="tiritas" for="estatus">Estatus:</label>
    <input class="estatus" type="text" name="estatus" id="estatus" readonly value="">
    <!-- Cuadro de texto de observaciones -->
    <label class="tiritas" for="observaciones">Observaciones:</label>
    <textarea class="textareaowo" id="observaciones" readonly></textarea>
    <br><br><br>
    <input type="submit" name="enviar_direccionTesis" value="Enviar comprobante de dirección de tesis">
</form>








</body>
</html>

