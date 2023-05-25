<?php
include "db.php";
session_start();

$Usuario = $_POST['Usuario'];
$Contraseña = $_POST['Contraseña'];
$Contraseña = hash('md5', $Contraseña);

$validarLogin = mysqli_query($conn, "SELECT * FROM Tbl_Persona WHERE Usuario = '$Usuario' AND Contraseña = '$Contraseña'");

if(mysqli_num_rows($validarLogin) > 0){
    $_SESSION['usuario'] = $Usuario;
    header("location: index.php");
    exit;
}else{
    echo '
        <script>
            alert("El usuario no existe, verifica los datos introducidos");
            window.location = "login.php";
        </script>
    ';
    exit;
}
?>