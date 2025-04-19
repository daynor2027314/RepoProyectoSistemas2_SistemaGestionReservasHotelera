<?php
$host = "localhost";
$user = "root"; // cambia si tienes otro usuario
$pass = ""; // cambia si tu MySQL tiene contraseña
$db = "hotel_system";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
