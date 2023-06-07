<?php
$imagenUrl = $_POST['imagen'];
if (strlen($imagenUrl) <= 0) exit("No se recibió ninguna imagen");

// Descargar la imagen sin fondo desde la URL
$imagenSinFondo = file_get_contents($imagenUrl);
if ($imagenSinFondo === false) exit("No se pudo descargar la imagen sin fondo");

// Calcular un nombre único para la imagen sin fondo
$rutaDestino = 'img_prenda/';
$nombreImagenSinFondo = $rutaDestino . "prenda_sin_fondo_" . uniqid() . ".png";

// Guardar la imagen sin fondo en la carpeta img_prenda
file_put_contents($nombreImagenSinFondo, $imagenSinFondo);

// Terminar y regresar el nombre de la imagen sin fondo
exit($nombreImagenSinFondo);
?>

