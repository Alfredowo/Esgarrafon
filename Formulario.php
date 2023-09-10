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
</head>
<body>
    <h1>Formulario de Evaluacion</h1>
    
    <form action="procesar_formulario.php" method="POST">
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
        <!-- Doctorado=30pts, Maestría=20pts, Licenciatura=10pts -->
        <input type="radio" id="doctorado" name="grado_estudio" value="doctorado"> Doctorado<br>
        <input type="radio" id="maestria" name="grado_estudio" value="maestria"> Maestría<br>
        <input type="radio" id="licenciatura" name="grado_estudio" value="licenciatura"> Licenciatura<br><br>
        
        <label for="antiguedad">Antigüedad en la empresa (en años):</label>
        <!-- 10pts por año -->
        <input type="number" id="antiguedad" name="antiguedad" required><br><br>
        
        <label>Horas de cursos de capacitación impartidas:</label>
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
        <!-- 1pt por cada una -->
        <input type="number" id="cursos" name="cursos" required><br><br>
        
        <label for="cursos">No. de veces que ha sido asesor de titulación:</label>
        <!-- 1pt por cada una -->
        <input type="number" id="cursos" name="cursos" required><br><br>
        
        <label for="cursos">Ha hecho alguna dirección de tesis:</label>
        <!-- Si sí 10pts-->
        <select>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select><br><br>

        <input type="submit" value="Calcular Puntaje">
    </form>
</body>
</html>