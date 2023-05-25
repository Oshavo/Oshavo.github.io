<?php
// Paso 1: Establecer la conexión con la base de datos
include "db.php";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Paso 2: Obtener los datos de las imágenes
$imagenesSeleccionadas = json_decode($_POST['imagenes']);
$fotosOutfit = implode(',', $imagenesSeleccionadas); // Juntar las URLs separadas por coma

// Paso 3: Insertar los datos en la base de datos
$idPersona = 1; // Actualiza esto con el valor adecuado

$sql = "INSERT INTO tbl_conjuntos (idPersona, FotoOutfit) VALUES ('$idPersona', '$fotosOutfit')";
mysqli_query($conn, $sql);

// Paso 5: Proporcionar una respuesta al cliente
if (mysqli_affected_rows($conn) > 0) {
    echo "Las imágenes se guardaron correctamente en la base de datos.";
} else {
    echo "Hubo un error al guardar las imágenes en la base de datos.";
}
?>
