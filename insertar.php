<?php

$host = getenv('MYSQLHOST');
$user = getenv('MYSQLUSER');
$pass = getenv('MYSQLPASSWORD');
$db   = getenv('MYSQLDATABASE');
$port = getenv('MYSQLPORT');

$conexion = new mysqli($host, $user, $pass, $db, $port);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$email = $_POST['email'];

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query = "INSERT INTO usuarios (nombre, email, password)
VALUES ('$nombre', '$email', '$password')";

$resultado = $conexion->query($query);

if ($resultado) {
    echo "REGISTRO_EXITOSO";
} else {
    echo "ERROR_AL_REGISTRAR: " . $conexion->error;
}

$conexion->close();

?>
