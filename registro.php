<?php
include "db.php";

$Usuario = $_POST['Usuario'];
$Email = $_POST['Email'];
$Contraseña = $_POST['Contraseña'];
$Rcontraseña = $_POST['Rcontraseña'];
/*$tmp_name = $Foto['tmp_name'];
$directorio_destino = "img_profile";

    $img_file = $Foto['name'];
    $img_type = $Foto['type'];*/

if(isset($_POST["Usuario"])){
    $Usuario = $_POST['Usuario'];
    $Email = $_POST['Email'];
    $Contraseña = $_POST['Contraseña'];
    $Rcontraseña = $_POST['Rcontraseña'];
    $campos = array();

    if($Usuario == ""){
        array_push($campos, "<script>alert('El campo Usuario no debe estar vacío')</script>");
    }
    if($Contraseña == "" || strlen($Contraseña) < 8){
        array_push($campos, "<script>alert('El campo Contraseña no debe estar vacío o tener menos de 8 caracteres')</script>");
    }
    if($Contraseña == 12345678){
        array_push($campos, "<script>alert('La contraseña no deben ser números consecutivos')</script>");
    }
    if($Rcontraseña != $Contraseña || $Rcontraseña == ""){
        array_push($campos, "<script>alert('Porfavor repite tu contraseña')</script>");
    }
    if($Email == ""){
        array_push($campos, "<script>alert('Ingresa un correo válido')</script>");
    }
    if(count($campos) > 0){
        echo "<div class='error'>";
        for($i = 0; $i < count($campos); $i++){
            echo $campos[$i];
        }
    echo '
    <script>
        window.location = "register.php";
    </script>
    ';
    die();
        echo "</div>";
    }else{
        echo "<div class='correcto'><script>alert('Datos correctos')</script>";
        $Contraseña = hash('md5', $Contraseña);
    }
    echo "</div>";    
}

$query = "INSERT INTO Tbl_Persona(Usuario, Email, Contraseña) VALUES('$Usuario', '$Email', '$Contraseña')";

$verificarCorreo = mysqli_query($conn, "SELECT * FROM Tbl_Persona WHERE Email = '$Email'");

if(mysqli_num_rows($verificarCorreo) > 0){
    echo'
    <script>
        alert("El correo ya ha sido registrado anteriormente, intenta con otro diferente");
        window.location = "register.php";
    </script>
    ';
    exit();
}

$verificarUsuario = mysqli_query($conn, "SELECT * FROM Tbl_Persona WHERE Usuario = '$Usuario'");

if(mysqli_num_rows($verificarUsuario) > 0){
    echo'
    <script>
        alert("El usuario ya ha sido registrado anteriormente, intenta con otro diferente");
        window.location = "register.php";
    </script>
    ';
    exit();
}

//if(((strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type, "jpg")) || strpos($img_type, "png"))){
    //$destino = $directorio_destino . '/' . $img_file;
    //$ejecutar2 = mysqli_query($conn, "INSERT INTO Tbl_FotoP(Foto) VALUES('$destino')");

    /*if(move_uploaded_file($tmp_name, $destino)){
        return true;
    }*/
//}

$ejecutar = mysqli_query($conn, $query);
/*$ejecutar2 = mysqli_query($conn, $query2);
$ejecutar3 = mysqli_query($conn, $query3);*/

if($ejecutar /*&& $ejecutar2 && $ejecutar3*/){
    echo'
    <script>
        alert("Usuario registrado con éxito");
        window.location = "login.php";
    </script>
    ';
}else{
    echo'
    <script>
        alert("Error al registrar al usuario, favor de intentar más tarde");
        window.location = "register.php";
    </script>
    ';
}

mysqli_close($conn);
?>