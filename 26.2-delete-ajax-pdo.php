<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "covid";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Eliminar el registro con el ID especificado
        $sqlDelete = "DELETE FROM pacientes WHERE id = :id";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bindParam(':id', $id); // Vincula la variable $id al marcador de posición :id
        $stmtDelete->execute();

        echo "Los datos se eliminaron correctamente.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
