<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los parámetros de búsqueda del formulario
    $nombre = $_POST['nombre'];
    // Otros parámetros de búsqueda aquí

    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "covid";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Construir la consulta SQL dinámicamente según los parámetros de búsqueda proporcionados
        $sql = "SELECT * FROM pacientes WHERE 1=1";
        if (!empty($nombre)) {
            $sql .= " AND nombres = '$nombre'";
        }
        // Agregar condiciones para otros campos de búsqueda aquí

        // Ejecutar la consulta
        $stmt = $conn->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Mostrar los resultados
        if (count($resultados) > 0) {
            echo "<h2>Resultados de la búsqueda:</h2>";
            echo "<tr>
            <th>Paciente</th>
            <th>Edad</th>
            <th>Talla</th>
            <th>Peso</th>
            <th>Tos</th>
            <th>Fiebre</th>
            <th>Disnea</th>
            <th>Acciones</th>
        </tr>";
            foreach ($resultados as $resultado) {
                
            
                echo "<table border='1' style='border-collapse: collapse;'>"; 
                echo "<tr>
            <th>Paciente</th>
            <th>Edad</th>
            <th>Talla</th>
            <th>Peso</th>
            <th>Tos</th>
            <th>Fiebre</th>
            <th>Disnea</th>
            <th>Acciones</th>
        </tr>";   
                echo "<tr>";
                    echo "<td>".$resultado["nombres"]."</td>";
                    echo "<td>".$resultado["edad"]."</td>";
                    echo "<td>".$resultado["talla_m"]."</td>";
                    echo "<td>".$resultado["peso_kg"]."</td>";
                    echo "<td>".($resultado["sintoma_tos"]==1 ? "Si" : "No")."</td>";
                    echo "<td>".($resultado["sintoma_fiebre"]==1 ? "Si" : "No")."</td>";
                    echo "<td>".($resultado["sintoma_disnea"]==1 ? "Si" : "No")."</td>";
                    echo "<td> <button>Editar</button><button>Eliminar</button></td>";
                    echo "</tr>";
                    echo "</table>";
            }
        } else {
            echo "No se encontraron resultados.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
