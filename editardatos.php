<?php
include "db.php";

$Usuario = $_POST['Usuario'];
$Nombre = $_POST['Nombre'];
$ApellidoP = $_POST['ApellidoP'];
$ApellidoM = $_POST['ApellidoM'];
$Email = $_POST['Email'];
$Telefono = $_POST['Telefono'];
//$Contraseña = $_POST['Contraseña'];
//$Rcontraseña = $_POST['Rcontraseña'];
$Foto = $_FILES['Foto'];
$tmp_name = $Foto['tmp_name'];
$directorio_destino = "img_profile";

    $img_file = $Foto['name'];
    $img_type = $Foto['type'];

if(isset($_POST["Usuario"])){
    $Usuario = $_POST['Usuario'];
    $Nombre = $_POST['Nombre'];
    $ApellidoP = $_POST['ApellidoP'];
    $ApellidoM = $_POST['ApellidoM'];
    $Email = $_POST['Email'];
    $Telefono = $_POST['Telefono'];
    //$Contraseña = $_POST['Contraseña'];
    //$Rcontraseña = $_POST['Rcontraseña'];
    $Foto = $_FILES['Foto'];
    $campos = array();

    if($Usuario == ""){
        array_push($campos, "<script>alert('El campo Usuario no debe estar vacío')</script>");
    }
    if($Nombre == ""){
        array_push($campos, "<script>alert('El campo Nombre no debe estar vacío')</script>");
    }
    if($ApellidoP == ""){
        array_push($campos, "<script>alert('El campo Apellido Paterno no debe estar vacío')</script>");
    }
    if($ApellidoM == ""){
        array_push($campos, "<script>alert('El campo Apellido Materno no debe estar vacío')</script>");
    }
    if($Email == ""){
        array_push($campos, "<script>alert('Ingresa un correo válido')</script>");
    }
    if($Telefono == ""){
        array_push($campos, "<script>alert('El campo Teléfono no debe estar vacío')</script>");
    }
    if(strlen($Telefono) > 10){
        array_push($campos, "<script>alert('El campo Teléfono no debe ser mayor a 10 dígitos')</script>");
    }
    if(count($campos) > 0){
        echo "<div class='error'>";
        for($i = 0; $i < count($campos); $i++){
            echo $campos[$i];
        }
    echo '
    <script>
        window.location = "editarperf.php";
    </script>
    ';
    die();
        echo "</div>";
    }else{
        echo "<div class='correcto'><script>alert('Datos correctos')</script>";
        //$Contraseña = hash('md5', $Contraseña);
    }
    echo "</div>";    
}

if(((strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type, "jpg")) || strpos($img_type, "png"))){
    $destino = $directorio_destino . '/' . $img_file;
    $query = "INSERT INTO Tbl_Perfil (Nombre, ApellidoP, ApellidoM, Telefono, Foto, Usuario, Email, idPersona) 
    SELECT '$Nombre', '$ApellidoP', '$ApellidoM', '$Telefono', '$destino', '$Usuario', '$Email', b.id 
    FROM Tbl_Persona b 
    WHERE b.id = a.idPersona";
    $ejecutar = mysqli_query($conn, $query);

    if($ejecutar){
        echo'
        <script>
            alert("Datos modificados con éxito (Vuelve a inicar sesión)");
            window.location = "logout.php";
        </script>
        ';
    }else{
        echo'
        <script>
            alert("Error al ingresar los datos del usuario, favor de intentar más tarde");
            window.location = "perfil.php";
        </script>
        ';
    }

    if(move_uploaded_file($tmp_name, $destino)){
        return true;
    }
}

mysqli_close($conn);
?>