<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluar empleado</title>
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
    .button {
        font-family: Verdana,Geneva,Tahoma,sans-serif;
        color: #c4c3ca;
        cursor: pointer;
        float: right;
        background-color: #13141D;
        border: none;
        padding: 10px 20px; /* Ajusta el padding según tu preferencia */
    }
    .button:hover{
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
    <form action="procesar_formulario.php" method="post">
        <?php
        function extraer(){
            require("conexion.php");
            $id=$_POST['empleado'];
            echo '<input type="text" name="id" value="'.$id.'" style="display: none"></input>';
    
            $ConsultarutaGrado=$conn->query("select rutaGrado from Empleados where id=$id");
            $filaGrado = $ConsultarutaGrado->fetch_assoc();
    
            $ConsultarutaAntiguedad=$conn->query("select rutaAntiguedad from Empleados where id=$id");
            $filaAntiguedad = $ConsultarutaAntiguedad->fetch_assoc();
    
            $ConsultarutaCrusosCap=$conn->query("select rutaCursoCap from Empleados where id=$id");
            $filaCursosCap = $ConsultarutaCrusosCap->fetch_assoc();
            
            $ConsultarutaCertificaciones=$conn->query("select rutaCertificaciones from Empleados where id=$id");
            $filaCertificaciones = $ConsultarutaCertificaciones->fetch_assoc();
    
            $ConsultarutaDilomados=$conn->query("select rutaDiplomados from Empleados where id=$id");
            $filaDilomados = $ConsultarutaDilomados->fetch_assoc();
    
            $ConsultarutaCursosST=$conn->query("select rutaCursosST from Empleados where id=$id");
            $filaCursosST = $ConsultarutaCursosST->fetch_assoc();
    
            $ConsultarutaCursos=$conn->query("select rutaCursos from Empleados where id=$id");
            $filaCursos = $ConsultarutaCursos->fetch_assoc();
    
            $ConsultarutaInstructorDip=$conn->query("select rutaInstructorDip from Empleados where id=$id");
            $filaInstructorDip = $ConsultarutaInstructorDip->fetch_assoc();
    
            $ConsultarutaInstructorCer=$conn->query("select rutaInstructorCer from Empleados where id=$id");
            $filaInstructorCer = $ConsultarutaInstructorCer->fetch_assoc();
    
            $ConsultarutaAsesorRes=$conn->query("select rutaAsesorRes from Empleados where id=$id");
            $filaAsesorRes = $ConsultarutaAsesorRes->fetch_assoc();
    
            $ConsultarutaAsesorTit=$conn->query("select rutaAsesorTit from Empleados where id=$id");
            $filaAsesorTit = $ConsultarutaAsesorTit->fetch_assoc();
    
            $ConsultarutaDireccionTesis=$conn->query("select rutaDireccionTesis from Empleados where id=$id");
            $filaDireccionTesis = $ConsultarutaDireccionTesis->fetch_assoc();
            $conn->close();

        if (!empty($filaGrado['rutaGrado'])) {
            echo '<label>Grado de estudio: </label>';
            echo '<a href="'.$filaGrado['rutaGrado'].'" target="_blank" class="btn">Verificar</a><br>';
            echo '<label>Aprobar como: </label><br>';
            echo '<input type="radio" id="doctorado" name="grado_estudio" value="1" checked> Doctorado<br>';
            echo '<input type="radio" id="maestria" name="grado_estudio" value="2"> Maestría<br>';
            echo '<input type="radio" id="licenciatura" name="grado_estudio" value="3"> Licenciatura<br><br>';
            echo '<input type="submit" class="Botonesinput" name="btnGrado" value="Aprobar"></input>';
            echo '<input type="submit"  class="button" name="btnGrado" value="Rechazar"></input><br><br>';
            echo '<textarea name="observacionesGrado" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
        }
        
        if (!empty($filaAntiguedad['rutaAntiguedad'])) {
            echo '<label>Años de antigüedad: </label>';
            echo '<a href="'.$filaAntiguedad['rutaAntiguedad'].'" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            echo '<input type="number" id="antiguedad" name="antiguedad" required>';
            echo '<input type="submit" class="Botonesinput" name="btnAntiguedad" value="Aprobar"></input>';
            echo '<input type="submit" class="button" class="Botonesinput" name="btnAntiguedad" value="Rechazar"></input><br><br>';
            echo '<textarea name="observacionesAntiguedad" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';    
        }
        
        if (!empty($filaCursosCap['rutaCursoCap'])) {
            echo '<label>Horas de cursos de capacitación impartidas:</label>';
            echo '<a href="'.$filaCursosCap['rutaCursoCap'].'" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            //Si es >= 30hrs 2pts y <30hrs 1pt
            echo '<input type="number" id="cursosCap" name="cursosCap" required>';
            echo '<input type="submit" class="Botonesinput" name="btnCursoCap" value="Aprobar"></input>';
            echo '<input type="submit" class="button" name="btnCursoCap" value="Rechazar"></input><br><br>';
            echo '<textarea name="observacionesCursosCap" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
        }
        
        if (!empty($filaCertificaciones['rutaCertificaciones'])) {
            echo '<label for="certificaciones">Cuenta con certificaciones:</label>';
            //<!-- 20pts si sí -->'
            echo '<a href="'.$filaCertificaciones['rutaCertificaciones'].'" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            echo '<select name="certificaciones" id="certificaciones">';
            echo '<option value="true">Si</option>';
            echo '<option value="false">No</option>';
            echo '</select>';
            echo '<input type="submit" class="Botonesinput" name="btnCertificaciones" value="Aprobar"></input>';
            echo '<input type="submit" class="button" name="btnCertificaciones" value="Rechazar"></input><br><br>';
            echo '<textarea name="observacionesCertificaciones" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
        }
        
        if (!empty($filaDilomados['rutaDiplomados'])) {
            echo '<label for="diplomados">Cuenta con diplomados:</label>';
            echo '<a href="'.$filaDilomados['rutaDiplomados'].'" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            //<!-- si sí 10pts -->
            echo '<select name="diplomados" id="diplomados">';
            echo '<option value="true">Si</option>';
            echo '<option value="false">No</option>';
            echo '</select>';
            echo '<input type="submit" class="Botonesinput" name="btnDiplomados value="Aprobar"></input>';
            echo '<input type="submit" class="button" name="btnDiplomados" value="Rechazar"></input><br><br>';
            echo '<textarea name="observacionesDiplomados" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
        }
        
        if (!empty($filaCursosST['rutaCursosST'])) {
            echo '<label for="cursosST">Cuenta con cursos de ST:</label>';
            echo '<a href="'.$filaCursosST['rutaCursosST'].'" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            //'<!-- si sí 20pts -->';
            echo '<select name="cursosST" id="cursosST">';
            echo '<option value="true">Si</option>';
            echo '<option value="false">No</option>';
            echo '</select>';
            echo '<input type="submit" class="Botonesinput" name="btnCursosST" value="Aprobar"></input>';
            echo '<input type="submit" class="button" name="btnCursosST" value="Rechazar"></input><br><br>';
            echo '<textarea name="observacionesCursosST" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
        }
        
        if (!empty($filaCursos['rutaCursos'])) {
            echo '<label for="cursos">Horas impartidas de cursos:</label>';
            echo '<a href="'.$filaCursos['rutaCursos'].'" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            // '<!-- si es >30hrs 15pts si es <30 7pts -->';
            echo '<input type="number" id="cursos" name="cursos" required>';
            echo '<input type="submit" class="Botonesinput" name="btnCursos" value="Aprobar"></input>';
            echo '<input type="submit" class="button" name="btnCursos" value="Rechazar"></input><br><br>';
            echo '<textarea name="observacionesCursos" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
        }
        
        if (!empty($filaInstructorDip['rutaInstructorDip'])) {
            echo '<label for="instructorDip">Ha sido instructor de diplomados:</label>';
            echo '<a href="'.$filaInstructorDip['rutaInstructorDip'].'" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            // '<!-- Si sí 20pts-->';
            echo '<select name="instructorDip" id="instructorDip">';
            echo '<option value="true">Si</option>';
            echo '<option value="false">No</option>';
            echo '</select>';
            echo '<input type="submit" class="Botonesinput" name="btnInstructorDip" value="Aprobar"></input>';
            echo '<input type="submit" class="button" name="btnInstructorDip" value="Rechazar"></input><br><br>';
            echo '<textarea name="observacionesInstructorDip" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
        }
        
        if (!empty($filaInstructorCer['rutaInstructorCer'])) {
            echo '<label for="instructorCer">Ha sido instructor de certificaciones:</label>';
            echo '<a href="'.$filaInstructorCer['rutaInstructorCer'].'" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            // '<!-- Si sí 30pts-->';
            echo '<select name="instructorCer" id="instructorCer">';
            echo '<option value="true">Si</option>';
            echo '<option value="false">No</option>';
            echo '</select>';
            echo '<input type="submit" class="Botonesinput" name="btnInstructorCer" value="Aprobar"></input>';
            echo '<input type="submit" class="button" name="btnInstructorCer" value="Rechazar"></input><br><br>';
            echo '<textarea name="observacionesInstructorCer" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
        }
        
        if (!empty($filaAsesorRes['rutaAsesorRes'])) {
            echo '<label for="asesorRes">No. de veces que ha sido asesor de residencias:</label>';
            echo '<a href="'.$filaAsesorRes['rutaAsesorRes'].'" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            echo '<!-- 1pt por cada una -->';
            echo '<input type="number" id="asesorRes" name="asesorRes" required>';
            echo '<input type="submit" class="Botonesinput" name="btnAsesorRes" value="Aprobar"></input>';
            echo '<input type="submit" class="button" name="btnAsesorRes" value="Rechazar"></input><br><br>';
            echo '<textarea name="observacionesAsesorRes" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
        }
        
        if (!empty($filaAsesorTit['rutaAsesorTit'])) {
            echo '<label for="asesorTit">No. de veces que ha sido asesor de titulación:</label>';
            echo '<a href="'.$filaAsesorTit['rutaAsesorTit'].'" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            echo '<!-- 1pt por cada una -->';
            echo '<input type="number" id="asesorTit" name="asesorTit" required>';
            echo '<input type="submit" class="Botonesinput" name="btnAsesorTit" value="Aprobar"></input>';
            echo '<input type="submit" class="button" name="btnAsesorTit" value="Rechazar"></input><br><br>';
            echo '<textarea name="observacionesAsesorTit" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
        }
        
        if (!empty($filaDireccionTesis['rutaDireccionTesis'])) {
            echo '<label for="direccionTesis">Ha hecho alguna dirección de tesis:</label>';
            echo '<a href="'.$filaDireccionTesis['rutaDireccionTesis'].'" target="_blank" class="btn">';
            echo 'Verificar';
            echo '</a><br>';
            echo '<!-- Si sí 10pts-->';
            echo '<select name="direccionTesis" id="direccionTesis">';
            echo '<option value="true">Si</option>';
            echo '<option value="false">No</option>';
            echo '</select>';
            echo '<input type="submit" class="Botonesinput" name="btnDireccionTesis" value="Aprobar"></input>';
            echo '<input type="submit" class="button" name="btnDireccionTesis" value="Rechazar"></input><br><br>';
            echo '<textarea name="observacionesDireccionTesis" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
        }
        echo '<br><br><br>';
    }
    extraer();
        ?>
        </form>
        <form action="seleccionarEmpleado.php">
            <center><input type="submit" value="Regresar"></center>
            <a style="position:absolute; right:20px;" value="Mirar puntajes" href="Resultados.php" class="button" target="_blank">Mirar Puntujes</a>
        </form>
        <br><br>
</body>
</html>