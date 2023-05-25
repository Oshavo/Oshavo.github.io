<?php
// guardar_imagenes.php

include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['imagenes'])) {
  $imagenes = json_decode($_POST['imagenes']);

  // Aquí puedes realizar las operaciones necesarias con las imágenes,
  // como guardarlas en una base de datos o en el sistema de archivos del servidor

  // Ejemplo: Guardar las imágenes en un archivo de texto en el servidor
  $archivo = 'random_guardadas.txt';
  file_put_contents($archivo, implode("\n", $imagenes));

  // Devolver las imágenes guardadas al cliente (puedes personalizar este formato según tus necesidades)
  echo implode(", ", $imagenes);
}
?>