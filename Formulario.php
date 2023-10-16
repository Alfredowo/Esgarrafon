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
    .boton-flotante {
    position: fixed; /* Fija el elemento en la ventana del navegador */
    bottom: 20px; /* Distancia desde la parte inferior de la ventana */
    right: 20px; /* Distancia desde la derecha de la ventana */
    z-index: 1000; /* Controla la superposición del elemento */
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
    .botonregresar {
        font-family: Verdana,Geneva,Tahoma,sans-serif;
        color: #c4c3ca;
        cursor: pointer;
        background-color: #13141D;
        border: none;
        padding: 10px 20px; /* Ajusta el padding según tu preferencia */
    }
    .botonregresar:hover{
        background-color: #4CA289 ;
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
    <form action="procesar_formulario.php" method="post" id="mostrarAlerta">
    <?php
        function extraer(){
            require("conexion.php");
            if (isset($_SESSION['id2'])) {
                $id = $_SESSION['id2'];
            } else {
                $id=$_POST['empleado'];
            }
            $algunDocumentoPresente=false;
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

            if ($filaGrado['rutaGrado']!='Aprobado owo'&&$filaGrado['rutaGrado']!='Rechazado umu'
            &&!empty($filaGrado['rutaGrado'])&&$filaGrado['rutaGrado']!='En espera') {
                echo '<label>Grado de estudio: </label>';
                echo '<a href="'.$filaGrado['rutaGrado'].'" target="_blank" class="btn">Verificar</a><br>';
                echo '<label>Aprobar como: </label><br>';
                echo '<input type="radio" id="doctorado" name="grado_estudio" value="1" checked> Doctorado<br>';
                echo '<input type="radio" id="Maestria" name="grado_estudio" value="2"> Maestría<br>';
                echo '<input type="radio" id="licenciatura" name="grado_estudio" value="3"> Licenciatura<br><br>';
                echo '<input type="submit" class="Botonesinput" name="btnGrado" value="Aprobar"></input>';
                echo '<input type="submit"  class="button" name="btnGrado" value="Rechazar"></input><br><br>';
                echo '<textarea name="observacionesGrado" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
            }
            
            if ($filaAntiguedad['rutaAntiguedad']!='Aprobado owo'&&$filaAntiguedad['rutaAntiguedad']!='Rechazado umu'&&
            !empty($filaAntiguedad['rutaAntiguedad'])&&$filaAntiguedad['rutaAntiguedad']!='En espera') {
                echo '<label>Años de antigüedad: </label>';
                echo '<a href="'.$filaAntiguedad['rutaAntiguedad'].'" target="_blank" class="btn">';
                echo 'Verificar';
                echo '</a><br>';
                echo '<input type="number" id="antiguedad" name="antiguedad">';
                echo '<input type="submit" class="Botonesinput" name="btnAntiguedad" value="Aprobar"></input>';
                echo '<input type="submit" class="button" class="Botonesinput" name="btnAntiguedad" value="Rechazar"></input><br><br>';
                echo '<textarea name="observacionesAntiguedad" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';    
                $algunDocumentoPresente = true;
            }
            
            if ($filaCursosCap['rutaCursoCap']!='Aprobado owo'&&$filaCursosCap['rutaCursoCap']!='Rechazado umu'&&
            !empty($filaCursosCap['rutaCursoCap'])&&$filaCursosCap['rutaCursoCap']!='En espera') {
                echo '<label>Horas de cursos de capacitación impartidas:</label>';
                echo '<a href="'.$filaCursosCap['rutaCursoCap'].'" target="_blank" class="btn">';
                echo 'Verificar';
                echo '</a><br>';
                //Si es >= 30hrs 2pts y <30hrs 1pt
                echo '<input type="number" id="cursoCap" name="cursoCap">';
                echo '<input type="submit" class="Botonesinput" name="btnCursoCap" value="Aprobar"></input>';
                echo '<input type="submit" class="button" name="btnCursoCap" value="Rechazar"></input><br><br>';
                echo '<textarea name="observacionesCursosCap" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
                $algunDocumentoPresente = true;
            }
            
            if ($filaCertificaciones['rutaCertificaciones']!='Aprobado owo'&&
            $filaCertificaciones['rutaCertificaciones']!='Rechazado umu'&&
            !empty($filaCertificaciones['rutaCertificaciones'])&&$filaCertificaciones['rutaCertificaciones']!='En espera') {
                echo '<label for="certificaciones">Cuenta con certificaciones:</label>';
                //<!-- 20pts si sí -->'
                echo '<a href="'.$filaCertificaciones['rutaCertificaciones'].'" target="_blank" class="btn">';
                echo 'Verificar';
                echo '</a><br>';
                /*echo '<select name="certificaciones" id="certificaciones">';
                echo '<option value="true">Si</option>';
                echo '<option value="false">No</option>';
                echo '</select>';*/
                echo '<input type="submit" class="Botonesinput" name="btnCertificaciones" value="Aprobar"></input>';
                echo '<input type="submit" class="button" name="btnCertificaciones" value="Rechazar"></input><br><br>';
                echo '<textarea name="observacionesCertificaciones" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
                $algunDocumentoPresente = true;
            }
            
            if ($filaDilomados['rutaDiplomados']!='Aprobado owo'&&$filaDilomados['rutaDiplomados']!='Rechazado umu'
            &&!empty($filaDilomados['rutaDiplomados'])&&$filaDilomados['rutaDiplomados']!='En espera') {
                echo '<label for="diplomados">Cuenta con diplomados:</label>';
                echo '<a href="'.$filaDilomados['rutaDiplomados'].'" target="_blank" class="btn">';
                echo 'Verificar';
                echo '</a><br>';
                //<!-- si sí 10pts -->
                /*echo '<select name="diplomados" id="diplomados">';
                echo '<option value="true">Si</option>';
                echo '<option value="false">No</option>';
                echo '</select>';*/
                echo '<input type="submit" class="Botonesinput" name="btnDiplomados" value="Aprobar"></input>';
                echo '<input type="submit" class="button" name="btnDiplomados" value="Rechazar"></input><br><br>';
                echo '<textarea name="observacionesDiplomados" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
                $algunDocumentoPresente = true;
            }
            
            if ($filaCursosST['rutaCursosST']!='Aprobado owo'&&$filaCursosST['rutaCursosST']!='Rechazado umu'
            &&!empty($filaCursosST['rutaCursosST'])&&$filaCursosST['rutaCursosST']!='En espera') {
                echo '<label for="cursosST">Cuenta con cursos de ST:</label>';
                echo '<a href="'.$filaCursosST['rutaCursosST'].'" target="_blank" class="btn">';
                echo 'Verificar';
                echo '</a><br>';
                //'<!-- si sí 20pts -->';
                /*echo '<select name="cursosST" id="cursosST">';
                echo '<option value="true">Si</option>';
                echo '<option value="false">No</option>';
                echo '</select>';*/
                echo '<input type="submit" class="Botonesinput" name="btnCursosST" value="Aprobar"></input>';
                echo '<input type="submit" class="button" name="btnCursosST" value="Rechazar"></input><br><br>';
                echo '<textarea name="observacionesCursosST" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
                $algunDocumentoPresente = true;
            }
            
            if ($filaCursos['rutaCursos']!='Aprobado owo'&&$filaCursos['rutaCursos']!='Rechazado umu'
            &&!empty($filaCursos['rutaCursos'])&&$filaCursos['rutaCursos']!='En espera') {
                echo '<label for="cursos">Horas impartidas de cursos:</label>';
                echo '<a href="'.$filaCursos['rutaCursos'].'" target="_blank" class="btn">';
                echo 'Verificar';
                echo '</a><br>';
                // '<!-- si es >30hrs 15pts si es <30 7pts -->';
                echo '<input type="number" id="cursos" name="cursos">';
                echo '<input type="submit" class="Botonesinput" name="btnCursos" value="Aprobar"></input>';
                echo '<input type="submit" class="button" name="btnCursos" value="Rechazar"></input><br><br>';
                echo '<textarea name="observacionesCursos" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
                $algunDocumentoPresente = true;
            }
            
            if ($filaInstructorDip['rutaInstructorDip']!='Aprobado owo'
            &&$filaInstructorDip['rutaInstructorDip']!='Rechazado umu'
            &&!empty($filaInstructorDip['rutaInstructorDip'])&&$filaInstructorDip['rutaInstructorDip']!='En espera') {
                echo '<label for="instructorDip">Ha sido instructor de diplomados:</label>';
                echo '<a href="'.$filaInstructorDip['rutaInstructorDip'].'" target="_blank" class="btn">';
                echo 'Verificar';
                echo '</a><br>';
                // '<!-- Si sí 20pts-->';
                /*echo '<select name="instructorDip" id="instructorDip">';
                echo '<option value="true">Si</option>';
                echo '<option value="false">No</option>';
                echo '</select>';*/
                echo '<input type="submit" class="Botonesinput" name="btnInstructorDip" value="Aprobar"></input>';
                echo '<input type="submit" class="button" name="btnInstructorDip" value="Rechazar"></input><br><br>';
                echo '<textarea name="observacionesInstructorDip" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
                $algunDocumentoPresente = true;
            }
            
            if ($filaInstructorCer['rutaInstructorCer']!='Aprobado owo'
            &&$filaInstructorCer['rutaInstructorCer']!='Rechazado umu'
            &&!empty($filaInstructorCer['rutaInstructorCer'])&&$filaInstructorCer['rutaInstructorCer']!='En espera') {
                echo '<label for="instructorCer">Ha sido instructor de certificaciones:</label>';
                echo '<a href="'.$filaInstructorCer['rutaInstructorCer'].'" target="_blank" class="btn">';
                echo 'Verificar';
                echo '</a><br>';
                // '<!-- Si sí 30pts-->';
                /*echo '<select name="instructorCer" id="instructorCer">';
                echo '<option value="true">Si</option>';
                echo '<option value="false">No</option>';
                echo '</select>';*/
                echo '<input type="submit" class="Botonesinput" name="btnInstructorCer" value="Aprobar"></input>';
                echo '<input type="submit" class="button" name="btnInstructorCer" value="Rechazar"></input><br><br>';
                echo '<textarea name="observacionesInstructorCer" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
                $algunDocumentoPresente = true;
            }
            
            if ($filaAsesorRes['rutaAsesorRes']!='Aprobado owo'&&$filaAsesorRes['rutaAsesorRes']!='Rechazado umu'
            &&!empty($filaAsesorRes['rutaAsesorRes'])&&$filaAsesorRes['rutaAsesorRes']!='En espera') {
                echo '<label for="asesorRes">No. de veces que ha sido asesor de residencias:</label>';
                echo '<a href="'.$filaAsesorRes['rutaAsesorRes'].'" target="_blank" class="btn">';
                echo 'Verificar';
                echo '</a><br>';
                echo '<!-- 1pt por cada una -->';
                echo '<input type="number" id="asesorRes" name="asesorRes">';
                echo '<input type="submit" class="Botonesinput" name="btnAsesorRes" value="Aprobar"></input>';
                echo '<input type="submit" class="button" name="btnAsesorRes" value="Rechazar"></input><br><br>';
                echo '<textarea name="observacionesAsesorRes" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
                $algunDocumentoPresente = true;
            }
            
            if ($filaAsesorTit['rutaAsesorTit']!='Aprobado owo'&&$filaAsesorTit['rutaAsesorTit']!='Rechazado umu'
            &&!empty($filaAsesorTit['rutaAsesorTit'])&&$filaAsesorTit['rutaAsesorTit']!='En espera') {
                echo '<label for="asesorTit">No. de veces que ha sido asesor de titulación:</label>';
                echo '<a href="'.$filaAsesorTit['rutaAsesorTit'].'" target="_blank" class="btn">';
                echo 'Verificar';
                echo '</a><br>';
                echo '<!-- 1pt por cada una -->';
                echo '<input type="number" id="asesorTit" name="asesorTit">';
                echo '<input type="submit" class="Botonesinput" name="btnAsesorTit" value="Aprobar"></input>';
                echo '<input type="submit" class="button" name="btnAsesorTit" value="Rechazar"></input><br><br>';
                echo '<textarea name="observacionesAsesorTit" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
                $algunDocumentoPresente = true;
            }
            
            if ($filaDireccionTesis['rutaDireccionTesis']!='Aprobado owo'
            &&$filaDireccionTesis['rutaDireccionTesis']!='Rechazado umu'
            &&!empty($filaDireccionTesis['rutaDireccionTesis'])&&$filaDireccionTesis['rutaDireccionTesis']!='En espera') {
                echo '<label for="direccionTesis">Ha hecho alguna dirección de tesis:</label>';
                echo '<a href="'.$filaDireccionTesis['rutaDireccionTesis'].'" target="_blank" class="btn">';
                echo 'Verificar';
                echo '</a><br>';
                // '<!-- Si sí 10pts-->';
                /*echo '<select name="direccionTesis" id="direccionTesis">';
                echo '<option value="true">Si</option>';
                echo '<option value="false">No</option>';
                echo '</select>';*/
                echo '<input type="submit" class="Botonesinput" name="btnDireccionTesis" value="Aprobar"></input>';
                echo '<input type="submit" class="button" name="btnDireccionTesis" value="Rechazar"></input><br><br>';
                echo '<textarea name="observacionesDireccionTesis" rows="4" cols="50" placeholder="Observaciones"></textarea><br><br>';
                $algunDocumentoPresente = true;
            }
            echo '<br><br><br>';
            if($algunDocumentoPresente==false)
            {
                echo '<div>No hay documentos a evaluar (:</div>';
            }
        }
        extraer();
    ?>
    </form>
    <form action="seleccionarEmpleado.php">
    <div class="boton-flotante">
        <input type="submit" class="botonregresar" value="Regresar">
    </div>
    </form>
        <!-- <center><input class="botonregresar boton-flotante" type="submit" value="Regresar"></center> -->
    </form>
        <a style="position:absolute; top:10px; right:20px;" value="Mirar puntajes" href="Resultados.php" class="botonregresar" target="_blank">Mirar Puntajes</a>
    <br><br>
</body>
<script>
    mostrarAlerta.addEventListener("submit", function() { 
            // Muestra un mensaje en la página 
            alert("Operación realizada con éxito"); 
        }); 
</script>
</html>
