<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de la Subida</title>
</head>
<body>
    <h1>Resultado de la Subida</h1>

    <?php
    if(isset($_FILES['archivos']['name'])) {
        $archivos = $_FILES['archivos'];

        // Carpeta donde se guardarán los archivos subidos
        $carpeta_destino = 'documentos/';

        // Iterar a través de los archivos
        for($i = 0; $i < count($archivos['name']); $i++) {
            $nombre_archivo = $archivos['name'][$i];
            $nombre_temporal = $archivos['tmp_name'][$i];
            $ruta_destino = $carpeta_destino . $nombre_archivo;

            // Comprobar si el archivo es válido (puedes agregar más validaciones según tus necesidades)
            if(move_uploaded_file($nombre_temporal, $ruta_destino)) {
                echo "<p>El archivo $nombre_archivo ha sido aceptado.</p>";
            } else {
                echo "<p>El archivo $nombre_archivo ha sido rechazado.</p>";
            }
        }
    } else {
        echo "<p>No se han subido archivos.</p>";
    }
    ?>

    <a href="index.html">Volver</a>
</body>
</html>
