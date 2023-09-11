<?php
require("prueba.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["empleados"];
    $gradoEstudio = $_POST["grado_estudio"];
    $antiguedad = $_POST["antiguedad"];
    $cursosCap = $_POST["cursosCap"];
    $certificaciones = $_POST["certificaciones"];
    $diplomados = $_POST["diplomados"];
    $cursosST = $_POST["cursosST"];
    $cursosImpartidos = $_POST["cursos"];
    $instructorDiplomados = $_POST["instructorDip"];
    $instructorCertificaciones = $_POST["instructorCer"];
    $asesorResidencias = $_POST["asesorRes"];
    $asesorTitulacion = $_POST["asesorTit"];
    $direccionTesis = $_POST["direccionTesis"];

    $nombre=mysqli_query($conn,"select Nombre from Empleados where id = $id");
    $insertar="call insertarEmpleados($id,$nombre,$gradoEstudio,$antiguedad,$cursosCap,$certificaciones,
    $diplomados,$cursosST,$cursosImpartidos,$instructorDiplomados,$instructorCertificaciones,$asesorResidencias,$asesorTitulación,
    $direccionTesis)";
    $consulta=mysqli_query($conn,$insertar);
    mysqli_close($conn);
}
?>
