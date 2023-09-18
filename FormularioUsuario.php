<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Documentos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="fondouwu2">
    <h1 class="titulos">Subir Documentos</h1>

    <form class="formuwu" action="procesar_formulario.php" method="post">
        <h2 class="espacio-abajo">Certificado de grado de estudios</h2>
            <!-- Campo para ingresar el enlace -->
            <label class="tiritas" for="grado_estudio">Enlace:</label>
            <input class="espacio-derecha" type="text" name="grado_estudios" id="grado_estudio" required>
            <!-- Campo para ver el estatus -->
            <label class="tiritas" for="estatus_grado_estudios">Estatus:</label>
            <input class="estatus" type="text" name="estatus_grado_estudios" id="estatus_grado_estudios" readonly value="">
            <!-- Cuadro de texto de observaciones -->
            <label class="tiritas" for="observaciones_grado_estudios">Observaciones:</label>
            <textarea class="textareaowo" id="observaciones_grado_estudios" readonly></textarea>
            <br><br><br>

        <h2 class="espacio-abajo">Comprobante de años de antiguedad</h2>
            <!-- Campo para ingresar el enlace -->
            <label class="tiritas" for="antiguedad">Enlace:</label>
            <input class="espacio-derecha" type="text" name="antiguedad" id="antiguedad" required>
            <!-- Campo para ver el estatus -->
            <label class="tiritas" for="estatus_antguedad">Estatus:</label>
            <input class="estatus" type="text" name="estatus_antguedad" id="estatus_antguedad" readonly value="">
            <!-- Cuadro de texto de observaciones -->
            <label class="tiritas" for="observaciones_antguedad">Observaciones:</label>
            <textarea class="textareaowo" id="observaciones_antguedad" readonly></textarea>
            <br><br><br>

        <h2 class="espacio-abajo">Comprobante de Horas de cursos de capacitación impartidas</h2>
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

        <h2 class="espacio-abajo">Comprobante de certificaciones</h2>
            <!-- Campo para ingresar el enlace -->
            <label class="tiritas" for="certificaciones">Enlace:</label>
            <input class="espacio-derecha" type="text" name="certificaciones" id="certificaciones" required>
            <!-- Campo para ver el estatus -->
            <label class="tiritas"  for="estatus_certificaciones">Estatus:</label>
            <input class="estatus" type="text" name="estatus_certificaciones" id="estatus_certificaciones" readonly value="">
            <!-- Cuadro de texto de observaciones -->
            <label class="tiritas" for="observaciones_certificaciones">Observaciones:</label>
            <textarea class="textareaowo" id="observaciones_certificaciones" readonly></textarea>
            <br><br><br>

        <h2 class="espacio-abajo">Comprobante de diplomados</h2>
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


        <h2 class="espacio-abajo">Comprobante de cursos de ST</h2>
            <!-- Campo para ingresar el enlace -->
            <label class="tiritas" for="cursosST">Enlace:</label>
            <input class="espacio-derecha" type="text" name="cursosST" id="cursosST" required>
            <!-- Campo para ver el estatus -->
            <label class="tiritas" for="estatus_cursosST">Estatus:</label>
            <input class="estatus" type="text" name="estatus_cursosST" id="estatus_cursosST" readonly value="">
            <!-- Cuadro de texto de observaciones -->
            <label class="tiritas" for="observaciones_cursosST">Observaciones:</label>
            <textarea class="textareaowo" id="observaciones_cursosST" readonly></textarea>
            <br><br><br>

        <h2 class="espacio-abajo">Comprobande de Horas impartidas de cursos</h2>
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

        <h2 class="espacio-abajo">Comprobante de instructor de diplomados</h2>
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

        <h2 class="espacio-abajo">Comprobante de instructor de certificaciones</h2>
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

        <h2 class="espacio-abajo">Comprobante de No. de veces que ha sido asesor de residencias</h2>
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
        
        <h2 class="espacio-abajo">Comprobante de No. de veces que ha sido asesor de titulación</h2>
            <!-- Campo para ingresar el enlace de asesor de titulación -->
            <label class="tiritas" for="asesorTit">Enlace:</label>
            <input class="espacio-derecha" type="text" name="asesorTit" id="asesorTit" required>
            <!-- Campo para ver el estatus -->
            <label class="tiritas" for="estatus">Estatus:</label>
            <input class="estatus" type="text" name="estatus" id="estatus" readonly value="">
            <!-- Cuadro de texto de observaciones -->
            <label class="tiritas"  for="observaciones">Observaciones:</label>
            <textarea class="textareaowo" id="observaciones" readonly></textarea>
            <br><br><br>
        
        <h2 class="espacio-abajo">Comprobante de dirección de tesis</h2>
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
        
        <!-- Botón para enviar los enlaces -->
        <input class="botonowo" type="submit" value="Enviar comprobantes" class="espacio-derecha">
    </form>


</body>
</html>

