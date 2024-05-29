<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $talla = $_POST['talla'];
    $peso = $_POST['peso'];

    $tos = array_key_exists("tos", $_POST) ? $_POST['tos'] : "0";
    $fiebre = array_key_exists("fiebre", $_POST) ? $_POST['fiebre'] : "0";
    $disnea = array_key_exists("disnea", $_POST) ? $_POST['disnea'] : "0";
    $dolor_muscular = array_key_exists("dolor_muscular", $_POST) ? $_POST['dolor_muscular'] : "0";
    $gripe = array_key_exists("gripe", $_POST) ? $_POST['gripe'] : "0";
    $Presion_alta = array_key_exists("Presion_alta", $_POST) ? $_POST['Presion_alta'] : "0";
    $Fatiga = array_key_exists("Fatiga", $_POST) ? $_POST['Fatiga'] : "0";
    $Garraspera = array_key_exists("Garraspera", $_POST) ? $_POST['Garraspera'] : "0";
    $fecha = $_POST['fecha'];

    if (empty($nombre) || empty($apellido) || empty($edad) || empty($talla) || empty($peso)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    if (!is_numeric($edad) || !is_numeric($talla) || !is_numeric($peso)) {
        echo "Tiene que poner valores numéricos.";
        exit;
    }

    if ($tos == 1 || $fiebre == 1 || $disnea == 1 || $dolor_muscular == 1 || $gripe == 1 || $Presion_alta == 1 || $Fatiga == 1 || $Garraspera == 1) {
        $resultado = "1";
    } else {
        $resultado = "0"; 
    }

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "covid";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->beginTransaction();
        $sql = "INSERT INTO `pacientes` (`nombres`, `apellidos`, `edad`, `talla_m`, `peso_kg`, `sintoma_tos`, `sintoma_fiebre`, `sintoma_disnea`, `sintoma_dolormuscular`, `sintoma_gripe`, `sintoma_presionalta`, `sintoma_fatiga`, `sintoma_garraspera`, `ultima_fecha_vacunacion`, `resultado`)
                VALUES ('$nombre', '$apellido', $edad, $talla, $peso, '$tos', '$fiebre', '$disnea', '$dolor_muscular', '$gripe', '$Presion_alta', '$Fatiga', '$Garraspera', '$fecha', '$resultado');";
        $conn->exec($sql);
        $conn->commit();
        echo "Fue registrado correctamente.";
    } catch (Exception $e) {
        echo "Error : " . $e->getMessage();
    }
}
?>
