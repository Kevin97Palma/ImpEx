<?php
// Permitir el acceso desde cualquier origen
header('Access-Control-Allow-Origin: *');

// Permitir métodos específicos (GET en este caso)
header('Access-Control-Allow-Methods: GET');

// Permitir ciertos encabezados
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

// Configurar el tipo de contenido de la respuesta como JSON
header('Content-Type: application/json');

// Configuración de la conexión a la base de datos
$servername = "localhost";  // Cambia esto según tu configuración
$username = "mevalini_api";
$password = "Moodle2020*";
$dbname = "mevalini_orders";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se proporciona el ID por GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar la base de datos
    $sql = "SELECT * FROM `estados` WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtener los datos como un array asociativo
        $row = $result->fetch_assoc();

        // Convertir a JSON y devolver la respuesta
        $response = json_encode($row);
        echo $response;
    } else {
        // Si no se encuentra el registro, devolver un mensaje de error
        echo json_encode(['error' => 'Registro no encontrado']);
    }
} else {
    // Si no se proporciona el ID, devolver un mensaje de error
    echo json_encode(['error' => 'ID no proporcionado']);
}

// Cerrar la conexión a la base de datos
$conn->close();

?>
