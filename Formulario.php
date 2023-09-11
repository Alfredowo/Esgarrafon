<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluar empleado</title>
    <?php
    require("prueba.php");
    $consulta = "select id, Nombre from Empleados";
    $resultado=$conn->query($consulta);
    ?>
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #13141D;
        background-repeat: no-repeat;
        background-size: cover;
        height: 900px;
        margin: 30px;
    }
    h1 {
        color: antiquewhite;
        border-bottom: 6px solid rgb(66, 68, 94);
        margin-bottom: 20px; /* Agrega margen inferior al título */
    }
    main {
        color: #c4c3ca;
        background-color: #1f2029;
        padding: 20px; /* Agrega relleno alrededor del contenido principal */
        margin: 0 auto; /* Centra el contenido principal horizontalmente */
        max-width: 800px; /* Establece un ancho máximo para el contenido principal */
    }
    /* Agrega margen inferior a los elementos de formulario */
    label, input, select {
        margin-bottom: 10px;
    }
    input[type=submit] {
        background-color: #0E0F1B;
        border: none;
        color: azure;
        padding: 10px 20px; /* Aumenta el relleno horizontal */
        cursor: pointer;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
</style>
</head>
<body>
    <center><h1>Formulario de Evaluacion</h1></center>
    <br>
    <main>
    <form action="procesar_formulario.php" method="POST">
        <br>
        <label for="nombre">Nombre del empleado:</label>
        <select name="empleados" id="empleados">
            <?php
            if (!$resultado) {
                die("Error en la consulta: " . $conn->error);
            }
            while ($fila = $resultado->fetch_assoc()) {
                echo '<option value="'.$fila['id'].'">'.$fila['Nombre'].'</option>';
            }
            ?>
        </select><br><br>
        <label>Grado de estudio:</label><br>
        <br>
        <!-- Doctorado=30pts, Maestría=20pts, Licenciatura=10pts -->
        <input type="radio" id="doctorado" name="grado_estudio" value="doctorado"> Doctorado<br>
        <input type="radio" id="maestria" name="grado_estudio" value="maestria"> Maestría<br>
        <input type="radio" id="licenciatura" name="grado_estudio" value="licenciatura"> Licenciatura<br><br>
        <label for="antiguedad">Antigüedad en la empresa (en años):</label>
        <!-- 10pts por año -->
        <input type="number" id="antiguedad" name="antiguedad" required><br><br>
        <label>Horas de cursos de capacitación impartidas:</label>
        <br>
        <br>
        <!-- Si es >= 30hrs 2pts y <30hrs 1pt -->
        <input type="number" id="cursosCap" name="cursosCap" required><br><br>
        <label for="certificaciones">Cuenta con certificaciones:</label>
        <!-- 20pts si sí -->
        <select>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select><br><br>
        <label for="diplomados">Cuenta con diplomados:</label>
        <!-- si sí 10pts -->
        <select>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select><br><br>
        <label for="cursosST">Cuenta con cursos de ST:</label>
        <!-- si sí 20pts -->
        <select>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select><br><br>
        <label for="cursos">Horas impartidas de cursos:</label>
        <!-- si es >30hrs 15pts si es <30 7pts -->
        <input type="number" id="cursos" name="cursos" required><br><br>
        <label for="cursos">Ha sido instructor de diplomados:</label>
        <!-- Si sí 20pts-->
        <select>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select><br><br>
        <label for="cursos">Ha sido instructor de certificaciones:</label>
        <!-- Si sí 30pts-->
        <select>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select><br><br>
        <label for="cursos">No. de veces que ha sido asesor de residencias:</label>
        <br>
        <br>
        <!-- 1pt por cada una -->
        <input type="number" id="cursos" name="cursos" required><br><br>
        
        <label for="cursos">No. de veces que ha sido asesor de titulación:</label>
        <br>
        <br>
        <!-- 1pt por cada una -->
        <input type="number" id="cursos" name="cursos" required><br><br>
        
        <label for="cursos">Ha hecho alguna dirección de tesis:</label>
        <!-- Si sí 10pts-->
        <select>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select>
        <br>
        <br>
        <br>
        <center><input type="submit" value="Calcular Puntaje" ></center>
            <br>
            <br>
    </form>
        </main>
</body>
</html>