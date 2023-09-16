<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Documentos</title>
</head>
<body>
    <h1>Subir Documentos</h1>
    <form action="procesar.php" method="post" enctype="multipart/form-data">
        <input type="file" name="archivos[]" multiple>
        <input type="submit" value="Subir Documentos">
    </form>
</body>
</html>

