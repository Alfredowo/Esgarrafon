<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluar empleado</title>
    <?php
    require("conexion.php");
    $consulta = "select id, Nombre from Empleados";
    $resultado=$conn->query($consulta);
    ?>
        </script>
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        /*background-color: #13141D;*/
        background: linear-gradient(to bottom,#13141D,#5B5C5F);
        background-size: cover;
        background-attachment: fixed;
        height: 900px;
        margin: 30px;
    }
    h1 {
        color: antiquewhite;
        border-bottom: 6px solid rgb(66, 68, 94);
        margin-bottom: 20px; 
    }
    input, select {
        margin-bottom: 10px;
    }
    label{
        margin-bottom: 10px;
        font-weight:bold;

    }
    a{
        color: #3B9E99;
    }
    a:hover{
        color: #9AD0CD;
    }
    .Botonesinput {
        float: right;
        background-color: #0E0F1B;
        border: none;
        color: azure;
        padding: 10px 20px;
        cursor: pointer;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .Botonesinput:hover{
        background-color: #467F44;
    }
    .botoncito{
        background-color: #0E0F1B;
        border: none;
        color: azure;
        padding: 10px 20px;
        cursor: pointer;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .botoncito:hover{
        background-color: #2A2C46;
    }
    #nuevoEmpleado {
    margin-left: 240px; 
    }
    button {
        font-family: Verdana,Geneva,Tahoma,sans-serif;
        color: #c4c3ca;
        cursor: pointer;
        float: right;
        background-color: #13141D;
        border: none;
        padding: 10px 20px; /* Ajusta el padding según tu preferencia */
    }
    button:hover{
        background-color: #C64040;
    }
    form{
        color: #c4c3ca;
        background-color: #1f2029;
        padding: 10px; 
        margin: 0 auto; 
        max-width: 800px;

    }
    textarea {
        width: 80%;
        padding: 3px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: none; 
    }
    textarea:focus {
        outline: none; 
    }
    input[type="number"] {
        width: 30%;
        font-size: 16px;
}
</style>
</head>
<h1>Administrador</h1>
    <form action="procesar_formulario" method="post">
        <?php
        //if (!empty($filaGrado['rutaGrado'])) {
            echo '<label>Grado de estudio: </label>';
            echo '<a href="/home/leo/Downloads/Grado de estudios.pdf" target="_blank" class="btn">Verificar</a><br>';
            echo '<label>Aprobar como: </label><br>';
            echo '<input type="radio" id="doctorado" name="grado_estudio" value="1" checked> Doctorado<br>';
            echo '<input type="radio" id="maestria" name="grado_estudio" value="2"> Maestría<br>';
            echo '<input type="radio" id="licenciatura" name="grado_estudio" value="3"> Licenciatura<br><br>';
            echo '<input type="submit" class="Botonesinput" name="btnGradoAprobado" value="Aprobar"></input>';
            echo '<button name="btnRechGrado" onclick="evaluar(\'no aprobado umu\')">Rechazar</button><br><br>';
            echo '<textarea name="observacionesGrado" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
         //}
        
        //if (!empty($rutaAntiguedad)) {
            echo '<label>Años de antigüedad: </label>';
            echo '<a href="visualizador.html?archivo=archivo de prueba owo.pdf" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            echo '<input type="number" id="antiguedad" name="antiguedad" required>';
            echo '<input type="submit" class="Botonesinput" name="btnAntiguedadAprobado" value="Aprobar"></input>';
            echo '<button name="btnRechGrado" onclick="evaluar(\'no aprobado umu\')">Rechazar</button><br><br>';
            echo '<textarea name="observacionesAntiguedad" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';    
       // }
        
        //if (!empty($rutaCursosCap)) {
            echo '<label>Horas de cursos de capacitación impartidas:</label>';
            echo '<a href="visualizador.html?archivo=archivo de prueba owo.pdf" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            echo '<!-- Si es >= 30hrs 2pts y <30hrs 1pt -->';
            echo '<input type="number" id="cursosCap" name="cursosCap" required>';
            echo '<input type="submit" class="Botonesinput" name="btnAntiguedadAprobado" value="Aprobar"></input>';
            echo '<button name="btnRechGrado" onclick="evaluar(\'no aprobado umu\')">Rechazar</button><br><br>';
            echo '<textarea name="observacionesCursosCap" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
        //}
        
       // if (!empty($rutaCertificaciones)) {
            echo '<label for="certificaciones">Cuenta con certificaciones:</label>';
            echo '<!-- 20pts si sí -->';
            echo '<a href="visualizador.html?archivo=archivo de prueba owo.pdf" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            echo '<select name="certificaciones" id="certificaciones">';
            echo '<option value="true">Si</option>';
            echo '<option value="false">No</option>';
            echo '</select>';
            echo '<input type="submit" class="Botonesinput" name="btnAntiguedadAprobado" value="Aprobar"></input>';
            echo '<button name="btnRechGrado" onclick="evaluar(\'no aprobado umu\')">Rechazar</button><br><br>';
            echo '<textarea name="observacionesCertificaciones" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
       // }
        
       // if (!empty($rutaDiplomados)) {
            echo '<label for="diplomados">Cuenta con diplomados:</label>';
            echo '<a href="visualizador.html?archivo=archivo de prueba owo.pdf" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            echo '<!-- si sí 10pts -->';
            echo '<select name="diplomados" id="diplomados">';
            echo '<option value="true">Si</option>';
            echo '<option value="false">No</option>';
            echo '</select>';
            echo '<input type="submit" class="Botonesinput" name="btnAntiguedadAprobado" value="Aprobar"></input>';
            echo '<button name="btnRechGrado" onclick="evaluar(\'no aprobado umu\')">Rechazar</button><br><br>';
            echo '<textarea name="observacionesDiplomados" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
       // }
        
       // if (!empty($rutaCursosST)) {
            echo '<label for="cursosST">Cuenta con cursos de ST:</label>';
            echo '<a href="visualizador.html?archivo=archivo de prueba owo.pdf" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            echo '<!-- si sí 20pts -->';
            echo '<select name="cursosST" id="cursosST">';
            echo '<option value="true">Si</option>';
            echo '<option value="false">No</option>';
            echo '</select>';
            echo '<input type="submit" class="Botonesinput" name="btnAntiguedadAprobado" value="Aprobar"></input>';
            echo '<button name="btnRechGrado" onclick="evaluar(\'no aprobado umu\')">Rechazar</button><br><br>';
            echo '<textarea name="observacionesCursosST" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
        //}
        
       // if (!empty($rutaCursos)) {
            echo '<label for="cursos">Horas impartidas de cursos:</label>';
            echo '<a href="visualizador.html?archivo=archivo de prueba owo.pdf" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            echo '<!-- si es >30hrs 15pts si es <30 7pts -->';
            echo '<input type="number" id="cursos" name="cursos" required>';
            echo '<input type="submit" class="Botonesinput" name="btnAntiguedadAprobado" value="Aprobar"></input>';
            echo '<button name="btnRechGrado" onclick="evaluar(\'no aprobado umu\')">Rechazar</button><br><br>';
            echo '<textarea name="observacionesCursos" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
      //  }
        
        //if (!empty($rutaInstructorDip)) {
            echo '<label for="instructorDip">Ha sido instructor de diplomados:</label>';
            echo '<a href="visualizador.html?archivo=archivo de prueba owo.pdf" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            echo '<!-- Si sí 20pts-->';
            echo '<select name="instructorDip" id="instructorDip">';
            echo '<option value="true">Si</option>';
            echo '<option value="false">No</option>';
            echo '</select>';
            echo '<input type="submit" class="Botonesinput" name="btnAntiguedadAprobado" value="Aprobar"></input>';
            echo '<button name="btnRechGrado" onclick="evaluar(\'no aprobado umu\')">Rechazar</button><br><br>';
            echo '<textarea name="observacionesInstructorDip" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
       // }
        
       // if (!empty($rutaInstructorCer)) {
            echo '<label for="instructorCer">Ha sido instructor de certificaciones:</label>';
            echo '<a href="visualizador.html?archivo=archivo de prueba owo.pdf" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            echo '<!-- Si sí 30pts-->';
            echo '<select name="instructorCer" id="instructorCer">';
            echo '<option value="true">Si</option>';
            echo '<option value="false">No</option>';
            echo '</select>';
            echo '<input type="submit" class="Botonesinput" name="btnAntiguedadAprobado" value="Aprobar"></input>';
            echo '<button name="btnRechGrado" onclick="evaluar(\'no aprobado umu\')">Rechazar</button><br><br>';
            echo '<textarea name="observacionesInstructorCer" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
        //}
        
       // if (!empty($rutaAsesorRes)) {
            echo '<label for="asesorRes">No. de veces que ha sido asesor de residencias:</label>';
            echo '<a href="visualizador.html?archivo=archivo de prueba owo.pdf" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            echo '<!-- 1pt por cada una -->';
            echo '<input type="number" id="asesorRes" name="asesorRes" required>';
            echo '<input type="submit" class="Botonesinput" name="btnAntiguedadAprobado" value="Aprobar"></input>';
            echo '<button name="btnRechGrado" onclick="evaluar(\'no aprobado umu\')">Rechazar</button><br><br>';
            echo '<textarea name="observacionesAsesorRes" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
       // }
        
       // if (!empty($rutaAsesorTit)) {
            echo '<label for="asesorTit">No. de veces que ha sido asesor de titulación:</label>';
            echo '<a href="visualizador.html?archivo=archivo de prueba owo.pdf" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            echo '<!-- 1pt por cada una -->';
            echo '<input type="number" id="asesorTit" name="asesorTit" required>';
            echo '<input type="submit" class="Botonesinput" name="btnAntiguedadAprobado" value="Aprobar"></input>';
            echo '<button name="btnRechGrado" onclick="evaluar(\'no aprobado umu\')">Rechazar</button><br><br>';
            echo '<textarea name="observacionesAsesorTit" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
       // }
        
        //if (!empty($rutaDireccionTesis)) {
            echo '<label for="direccionTesis">Ha hecho alguna dirección de tesis:</label>';
            echo '<a href="visualizador.html?archivo=archivo de prueba owo.pdf" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            echo '<!-- Si sí 10pts-->';
            echo '<select name="direccionTesis" id="direccionTesis">';
            echo '<option value="true">Si</option>';
            echo '<option value="false">No</option>';
            echo '</select>';
            echo '<input type="submit" class="Botonesinput" name="btnAntiguedadAprobado" value="Aprobar"></input>';
            echo '<button name="btnRechGrado" onclick="evaluar(\'no aprobado umu\')">Rechazar</button><br><br>';
            echo '<textarea name="observacionesDireccionTesis" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
       // }
        
        echo '<br><br><br>';
        ?>
        <center><input type="submit" class="botoncito" value="Calcular Puntaje"></center>
        <br><br>
        </form>
</body>
</html>