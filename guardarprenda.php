<?php
include "db.php";

$idPersona = $_POST['idPersona'];
$FotoPrenda = $_FILES['FotoPrenda'];
$Tipo = $_POST['Tipo'];
$Color = $_POST['Color'];
$Estilo = $_POST['Estilo'];

$tmp_name = $FotoPrenda['tmp_name'];
$directorio_destino = "img_prenda";

    $img_file = $FotoPrenda['name'];
    $img_type = $FotoPrenda['type'];

if(isset($_POST["idPersona"])){
    $idPersona = $_POST['idPersona'];
    $FotoPrenda = $_FILES['FotoPrenda'];
    $Tipo = $_POST['Tipo'];
    $Color = $_POST['Color'];
    $Estilo = $_POST['Estilo'];
    $campos = array();

    if(empty($_FILES['FotoPrenda']['name'])){
        echo "<script>alert('El campo de la imagen no debe estar vacío')</script>";
        echo '
            <script>
                window.location = "filtros.php";
            </script>
            ';
        die();
    }
    if($Tipo == ""){
        array_push($campos, "<script>alert('El campo Tipo no debe estar vacío')</script>");
    }
    if($Color == ""){
        array_push($campos, "<script>alert('El campo Color no debe estar vacío')</script>");
    }
    if($Estilo == ""){
        array_push($campos, "<script>alert('El campo Estilo no debe estar vacío')</script>");
    }
    if(count($campos) > 0){
        echo "<div class='error'>";
        for($i = 0; $i < count($campos); $i++){
            echo $campos[$i];
        }
    echo '
    <script>
        window.location = "filtros.php";
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
    $query = "INSERT INTO Tbl_Prenda(idPersona, FotoPrenda, Tipo, Color, Estilo) VALUES('$idPersona', '$destino', '$Tipo', '$Color', '$Estilo')"; 
    $ejecutar = mysqli_query($conn, $query);
    /*$ejecutar2 = mysqli_query($conn, $query2);
    $ejecutar3 = mysqli_query($conn, $query3);*/

    if($ejecutar /*&& $ejecutar2 && $ejecutar3*/){
        echo'
        <script>
            alert("Prenda registrada con éxito");
            window.location = "filtros.php";
        </script>
        ';
    }else{
        echo'
        <script>
            alert("Error al registrar la prenda, favor de intentar más tarde");
            window.location = "filtros.php";
        </script>
        ';
    }

    if(move_uploaded_file($tmp_name, $destino)){
        return true;
    }
}

mysqli_close($conn);
?>