<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "covid";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener la lista de pacientes
    $sql = "SELECT * FROM pacientes";
    $stmt = $conn->query($sql);
    $pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mostrar la lista de pacientes con botones de editar
    if ($pacientes) {
        echo "<h2>Lista de Pacientes</h2>";
        echo "<ul>";
        foreach ($pacientes as $paciente) {
            echo "<li>";
            echo "Nombre: " . $paciente['nombres'] . " " . $paciente['apellidos'] . " - Edad: " . $paciente['edad'];
            echo "<form action='23.1-edicion.php' method='GET' style='display: inline;'>";
            echo "<input type='hidden' name='id' value='" . $paciente['id'] . "'>";
            echo "<input type='submit' value='Editar'>";
            echo "</form>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "No se encontraron pacientes.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
