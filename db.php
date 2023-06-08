<?php
$server = "localhost";
$user = "root";
$pass = "n0m3l0";
$database = "bdOutme";

$conn = mysqli_connect($server, $user, $pass, $database);

if(!$conn){
    die("Conexión fallida");
}
?>