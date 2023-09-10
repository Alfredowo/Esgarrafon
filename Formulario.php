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
        <input type="radio" id="doctorado" name="grado_estudio" value="doctorado"> Doctorado (30 puntos)<br>
        <input type="radio" id="maestria" name="grado_estudio" value="maestria"> Maestría (20 puntos)<br>
        <input type="radio" id="licenciatura" name="grado_estudio" value="licenciatura"> Licenciatura (10 puntos)<br><br>
        
        <label for="antiguedad">Antigüedad en la empresa (en años):</label>
        <input type="number" id="antiguedad" name="antiguedad" required><br><br>
        
        <label>Cursos de capacitación:</label><br>
        <input type="checkbox" id="cursos_30" name="cursos" value="cursos_30"> Más de 30 horas (2 puntos)<br>
        <input type="checkbox" id="cursos_30" name="cursos" value="cursos_30"> Menos de 30 horas (1 punto)<br><br>
        
        <label for="certificaciones">Número de certificaciones:</label>
        <input type="number" id="certificaciones" name="certificaciones" required><br><br>
        
        <label for="diplomados">Número de diplomados:</label>
        <input type="number" id="diplomados" name="diplomados" required><br><br>
        
        <input type="submit" value="Calcular Puntaje">
    </form>
</body>
</html>