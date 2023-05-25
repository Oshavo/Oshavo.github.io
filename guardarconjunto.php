<?php
include "db.php";

$idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : null;
$FotoSuperior = isset($_POST['FotoSuperior']) ? $_POST['FotoSuperior'] : null;
$FotoMedia = isset($_POST['FotoMedia']) ? $_POST['FotoMedia'] : null;
$FotoInferior = isset($_POST['FotoInferior']) ? $_POST['FotoInferior'] : null;
$FotoComplemento = isset($_POST['FotoComplemento']) ? $_POST['FotoComplemento'] : "Sin complementos";
$FotoEncima = isset($_POST['FotoEncima']) ? $_POST['FotoEncima'] : "Sin prendas por encima";

if(!$idPersona){
    echo "<div class='error'><script>alert('El campo idPersona no debe estar vacío')</script></div>";
    echo '<script>window.location = "outmeman.php";</script>';
    die();
}

if(!$FotoSuperior){
    echo "<div class='error'><script>alert('El campo Foto Superior no debe estar vacío')</script></div>";
    echo '<script>window.location = "outmeman.php";</script>';
    die();
}

if(!$FotoMedia){
    echo "<div class='error'><script>alert('El campo Foto Media no debe estar vacío')</script></div>";
    echo '<script>window.location = "outmeman.php";</script>';
    die();
}

if(!$FotoInferior){
    echo "<div class='error'><script>alert('El campo Foto Inferior no debe estar vacío')</script></div>";
    echo '<script>window.location = "outmeman.php";</script>';
    die();
}

$query = "INSERT INTO Tbl_Conjuntos(idPersona, FotoSuperior, FotoMedia, FotoInferior, FotoComplemento, FotoEncima) VALUES(?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "isssss", $idPersona, $FotoSuperior, $FotoMedia, $FotoInferior, $FotoComplemento, $FotoEncima);
$ejecutar = mysqli_stmt_execute($stmt);

if($ejecutar){
    echo'
    <script>
        alert("Conjunto registrado con éxito");
        window.location = "outmeman.php";
    </script>
    ';
}else{
    echo'
    <script>
        alert("Error al registrar el conjunto, favor de intentar más tarde");
        window.location = "outmeman.php";
    </script>
    ';
}

mysqli_close($conn);
?>
