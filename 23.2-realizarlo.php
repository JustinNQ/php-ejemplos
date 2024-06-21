<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario de edición
    $paciente_id = $_POST['id'];
    $nombre = $_POST['nombre'];
    
    // Otros campos de edición aquí

    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "covid";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Actualizar los datos del paciente en la base de datos
        $sql = "UPDATE pacientes SET nombres = '$nombre' WHERE id = $paciente_id";
        // Actualiza otros campos de edición aquí

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        echo "Datos actualizados correctamente.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
