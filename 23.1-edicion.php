<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
</head>
<body>
    <h2>Editar Paciente</h2>
    <?php
    // Recibir el ID del paciente a editar
    $paciente_id = $_GET['id'];

    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "covid";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtener los datos del paciente a editar
        $sql = "SELECT * FROM pacientes WHERE id = $paciente_id";
        $stmt = $conn->query($sql);
        $paciente = $stmt->fetch(PDO::FETCH_ASSOC);

        // Mostrar el formulario de edición con los datos actuales del paciente
        if ($paciente) {
            ?>
            <form action="23.2-realizarlo.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $paciente['id']; ?>">
                Nombre: <input type="text" name="nombre" value="<?php echo $paciente['nombres']; ?>"><br>
                
                <!-- Otros campos de edición aquí -->
                <input type="submit" value="Guardar Cambios">
            </form>
            <?php
        } else {
            echo "No se encontró el paciente.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</body>
</html>
