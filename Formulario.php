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
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #13141D;
        background-repeat: no-repeat;
        background-size: cover;
        height: 900px;
        margin: 30px;
    }
    header{
        margin: 10px;
        background-color: #47495F;
    }
    h1 {
        color: antiquewhite;
        border-bottom: 6px solid rgb(66, 68, 94);
        margin-bottom: 20px; 
    }
    main {
        color: #c4c3ca;
        background-color: #1f2029;
        padding: 20px; 
        margin: 0 auto; 
        max-width: 800px;
    }
    label, input, select {
        margin-bottom: 10px;
    }
    input[type=submit] {
        background-color: #0E0F1B;
        border: none;
        color: azure;
        padding: 10px 20px;
        cursor: pointer;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    #nuevoEmpleado {
    margin-left: 100px; 
    }
    a{
            float: right;
            margin-right: 10px; 
            font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
</style>
</head>
<body>
    <header><center><h1>Formulario de Evaluacion</h1></center>
    <a href="Login.html"><input type="submit" value="Cerrar Sesión" ></a></header>
    <br>
    <main>
    <form action="procesar_formulario.php" method="POST">
        <br>
        <label for="empleado">Nombre del empleado:</label>
        <select name="empleado" id="empleado">
            <?php
            if (!$resultado) {
                die("Error en la consulta: " . $conn->error);
            }
            while ($fila = $resultado->fetch_assoc()) {
                echo '<option value="'.$fila['id'].'">'.$fila['Nombre'].'</option>';
            }
            ?>
        </select>
        <!-- Campo de texto para ingresar un nuevo nombre -->
        <input type="text" id="nuevoEmpleado" placeholder=" Agregar empleado">
        <!-- Botón para agregar nuevo -->
        <button type="button" onclick="agregarNuevo()">Agregar Nuevo</button>
        <br><br> 
        <label>Grado de estudio:</label><br>
        <br>
        <!-- Doctorado=30pts, Maestría=20pts, Licenciatura=10pts -->
        <input type="radio" id="doctorado" name="grado_estudio" value="1"> Doctorado<br>
        <input type="radio" id="maestria" name="grado_estudio" value="2"> Maestría<br>
        <input type="radio" id="licenciatura" name="grado_estudio" value="3"> Licenciatura<br><br>
        
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
        <select name="certificaciones" id="certificaciones">
            <option value="true">Si</option>
            <option value="false">No</option>
        </select><br><br>

        <label for="diplomados">Cuenta con diplomados:</label>
        <!-- si sí 10pts -->
        <select name="diplomados" id="diplomados">
            <option value="true">Si</option>
            <option value="false">No</option>
        </select><br><br>

        <label for="cursosST">Cuenta con cursos de ST:</label>
        <!-- si sí 20pts -->
        <select name="cursosST" id="cursosST">
            <option value="true">Si</option>
            <option value="false">No</option>
        </select><br><br>
        
        <label for="cursos">Horas impartidas de cursos:</label>
        <!-- si es >30hrs 15pts si es <30 7pts -->
        <input type="number" id="cursos" name="cursos" required><br><br>

        <label for="instructorDip">Ha sido instructor de diplomados:</label>
        <!-- Si sí 20pts-->
        <select name="instructorDip" id="instructorDip">
            <option value="true">Si</option>
            <option value="false">No</option>
        </select><br><br>

        <label for="instructorCer">Ha sido instructor de certificaciones:</label>
        <!-- Si sí 30pts-->
        <select name="instructorCer" id="instructorCer">
            <option value="true">Si</option>
            <option value="false">No</option>
        </select><br><br>

        <label for="asesorRes">No. de veces que ha sido asesor de residencias:</label>
        <br>
        <br>
        <!-- 1pt por cada una -->
        <input type="number" id="asesorRes" name="asesorRes" required><br><br>
        
        <label for="asesorTit">No. de veces que ha sido asesor de titulación:</label>
        <br>
        <br>
        <!-- 1pt por cada una -->
        <input type="number" id="asesorTit" name="asesorTit" required><br><br>
        
        <label for="direccionTesis">Ha hecho alguna dirección de tesis:</label>
        <!-- Si sí 10pts-->
        <select name="direccionTesis" id="direccionTesis">
            <option value="true">Si</option>
            <option value="false">No</option>
        </select><br><br>

        <br>
        <br>
        <br>
        <center><input type="submit" value="Calcular Puntaje" ></center>
            <br>
            <br>
    </form>
    </main>
    <br>
    <br>
    <script>
    function agregarNuevo() {
        var nuevoEmpleadoInput = document.getElementById('nuevoEmpleado');
        var empleadoSelect = document.getElementById('empleado');
        var nuevoNombre = nuevoEmpleadoInput.value;

        if (nuevoNombre.trim() !== '') {
            // Crea una nueva opción en la lista desplegable
            var nuevaOpcion = document.createElement('option');
            nuevaOpcion.value = nuevoNombre;
            nuevaOpcion.textContent = nuevoNombre;
            empleadoSelect.appendChild(nuevaOpcion);

            // Limpia el campo de texto
            nuevoEmpleadoInput.value = '';
        }
    }
    </script>
</body>
</html>