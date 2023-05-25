<?php
// obtener_random.php

include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['imagenes'])) {
  $imagenesSeleccionadas = json_decode($_POST['imagenes']);

  // Obtener dos imágenes aleatorias adicionales de la tabla tbl_prenda
  $resultado = mysqli_query($conexion, "SELECT FotoPrenda FROM tbl_prenda ORDER BY RAND() LIMIT 2");
  $imagenesAleatorias = array();
  while ($row = mysqli_fetch_assoc($resultado)) {
    $imagenesAleatorias[] = $row['FotoPrenda'];
  }

  // Devolver las imágenes aleatorias al cliente en formato JSON
  echo json_encode($imagenesAleatorias);
}
?>
