<?php
$server = "localhost";
$user = "root";
$pass = "1234";
$database = "bdOutme";

$conn = mysqli_connect($server, $user, $pass, $database);

if(!$conn){
    die("Conexión fallida");
}
?>