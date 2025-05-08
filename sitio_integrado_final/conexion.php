<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "cosmeticos_db";

$conn = mysqli_connect($host, $usuario, $clave, $bd);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
