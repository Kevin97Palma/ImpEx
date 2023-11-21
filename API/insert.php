<?php
// Allow access from any origin
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Content-Type: application/json');

// Database configuration
$servername = "localhost";
$username = "mevalini_api";
$password = "Moodle2020*";
$dbname = "mevalini_orders";

// Collect form data
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$factura = $_POST['factura'];
$comentario = $_POST['comentario'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Call the stored procedure
$sql = "CALL InsertDataProcedure('$cedula', '$nombre', '$celular', '$correo', '$direccion', '$factura', '$comentario')";

if ($conn->query($sql) === TRUE) {
    $response = array('status' => 'success', 'message' => 'Data successfully inserted');
} else {
    $response = array('status' => 'error', 'message' => $conn->error);
}

echo json_encode($response);

// Close the connection
$conn->close();
?>