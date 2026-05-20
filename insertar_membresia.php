<?php

include 'conexion.php';

$tipo = $_POST['tipo'];
$precio = $_POST['precio'];

$sql = "INSERT INTO membresias(tipo, precio)
VALUES('$tipo','$precio')";

if($conn->query($sql) === TRUE){
    echo "Membresía registrada";
}else{
    echo "Error: " . $conn->error;
}

$conn->close();

?>
