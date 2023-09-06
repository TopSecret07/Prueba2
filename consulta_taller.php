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

// Realiza la consulta SQL para verificar si el enlace existe en la tabla "asistentes"
$sql = "SELECT * FROM asistentes WHERE enlace_qr = '$qr_content'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // El enlace existe en la tabla "asistentes"

    // Verificar si el enlace existe en la tabla 
    $sqlComida = "SELECT * FROM taller WHERE enlace_qr = '$qr_content'";
    $resultComida = $conn->query($sqlComida);

    if ($resultComida->num_rows == 0) {
        // El enlace no existe en la tabla "tallerr," agrega un nuevo registro
        $insertSql = "INSERT INTO taller (enlace_qr) VALUES ('$qr_content')";
        if ($conn->query($insertSql) !== TRUE) {
            // Error al agregar el nuevo registro de comida
            echo json_encode(array("error" => "Error al agregar el registro de comida."));
            exit;
        }
    }

    // Obtiene los datos de la consulta
    $row = $result->fetch_assoc();

    // Devuelve los datos en formato JSON
    echo json_encode($row);
} else {
    // El enlace no existe en la tabla "asistentes"

    // Devuelve un mensaje de error
    echo json_encode(array("message" => "Enlace no válido"));
}

// Cierra la conexión a la base de datos
$conn->close();
?>