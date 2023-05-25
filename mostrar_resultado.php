<?php
include "db.php";
// Obtener los identificadores de las imágenes desde la URL
$imagen1 = $_GET['imagen1'];
$imagen2 = $_GET['imagen2'];
$imagen3 = $_GET['imagen3'];

// Obtener la información de las imágenes desde la base de datos
$sqlImagenes = "SELECT FotoPrenda FROM tbl_prenda WHERE idPrenda IN ($imagen1, $imagen2, $imagen3)";
$resultImagenes = $conn->query($sqlImagenes);

if ($resultImagenes->num_rows > 0) {
    while ($rowImagen = $resultImagenes->fetch_assoc()) {
        $fotoPrenda = $rowImagen['FotoPrenda'];
        // Mostrar las imágenes en la página
        echo "<img src='$fotoPrenda' alt=''>";
    }
} else {
    // No se encontraron las imágenes en la base de datos
