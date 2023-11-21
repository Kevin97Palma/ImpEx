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

// Your database connection code goes here
// Perform database inserts for 'clientes', 'pedidos', 'detalles_pedido', 'estados_pedido'
// ...

// Dummy response for demonstration purposes
$response = array('status' => 'success', 'message' => 'Data successfully inserted');
echo json_encode($response);
?>