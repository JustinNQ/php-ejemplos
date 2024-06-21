<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Pacientes</title>
</head>
<body>
    <center><h1>Busqueda de Pacientes</h1>
    </center>
    <form action="22.1-consulta-pdo.php" method="POST">
        Nombre: <input type="text" name="nombre"><br>
        <label id="tos" name="tos">Tos</label>
        <input type="checkbox" for="tos">
        <label id="fiebre" name="fiebre">fiebre</label>
        <input type="checkbox" for="fiebre">
        <label id="Disnea" name="Disnea">fiebre</label>
        <input type="checkbox" for="Disnea">
        <!-- Otros campos de búsqueda aquí -->
        <input type="submit" value="Buscar">
        
    </form>


</body>
</html>
