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

// Obtén los datos enviados por la solicitud AJAX
$qr_content = $_POST['enlace_qr'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$correo_electronico = $_POST['correo_electronico'];
$celular = $_POST['celular'];
$taller_1 = $_POST['taller_1'];
$taller_2 = $_POST['taller_2'];
$ponencia = $_POST['ponencia'];
$docente = $_POST['docente'];

// Prepara la declaración SQL para evitar la inyección de SQL
$stmt = $conn->prepare("INSERT INTO asistentes (enlace_qr, nombre, apellido, cedula, correo_electronico, celular, taller_1, taller_2, ponencia, docente) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Verifica si la preparación de la declaración fue exitosa
if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

// Vincula los parámetros
$stmt->bind_param("ssssssssss", $qr_content, $nombre, $apellido, $cedula, $correo_electronico, $celular, $taller_1, $taller_2, $ponencia, $docente);

// Ejecuta la declaración SQL
if ($stmt->execute()) {
    echo "Datos guardados correctamente.";
} else {
    echo "Error al guardar los datos: " . $stmt->error;
}


// Cierra la declaración y la conexión a la base de datos
$stmt->close();

?>
