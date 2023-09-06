<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cepeige_qr_user";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtiene el contenido del código QR enviado por la solicitud AJAX
$qr_content = $_POST['qr_content'];

// Validar el formato del enlace
if (!preg_match('/^https:\/\/credential\.certifyme\.online\/verify\/[a-zA-Z0-9]+$/', $qr_content)) {
    // El enlace no cumple con el formato esperado
    echo json_encode(array("error" => "Formato de enlace no válido"));
    exit;
}
// la conulta es para ta la tabla registro
// Realiza la consulta SQL para obtener los datos del enlace escaneado
$sql = "SELECT enlace_qr, nombre, apellido, cedula, correo_electronico, celular, taller_1, taller_2, ponencia, docente FROM registro WHERE enlace_qr = '$qr_content'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtiene los datos de la consulta
    $row = $result->fetch_assoc();

    // Devuelve los datos en formato JSON
    echo json_encode($row);
} else {
    // Si no se encontraron resultados, devuelve un objeto JSON vacío o un mensaje de error, según lo desees
    echo json_encode(array("message" => "No se encontraron resultados"));
}

// Cierra la conexión a la base de datos
$conn->close();
?>
