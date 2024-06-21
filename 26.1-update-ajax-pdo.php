<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    echo $nombre;//print_r($nombre,true);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "covid";
//ALMACENAR ID Y COLOCARLO EN LA CONSULTA 
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Actualizar los datos del paciente en la base de datos
        $sql = "UPDATE pacientes SET nombres = '$nombre' WHERE id = '$id'";
        // Actualiza otros campos de edición aquí

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        echo "Los datos se han actualizado correctamente.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
