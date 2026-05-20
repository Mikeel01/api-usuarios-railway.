<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = getenv('MYSQLHOST');
$user = getenv('MYSQLUSER');
$pass = getenv('MYSQLPASSWORD');
$db   = getenv('MYSQLDATABASE');
$port = getenv('MYSQLPORT');

try {

    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

    $conexion = new PDO($dsn, $user, $pass);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO usuarios (nombre, email, password)
              VALUES (:nombre, :email, :password)";

    $stmt = $conexion->prepare($query);

    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        echo "REGISTRO_EXITOSO";
    } else {
        echo "ERROR_AL_REGISTRAR";
    }

} catch(PDOException $e) {

    echo "ERROR: " . $e->getMessage();

}
?>
