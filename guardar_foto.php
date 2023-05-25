<?php
$imagenCodificada = file_get_contents("php://input"); // Obtener la imagen
    if(strlen($imagenCodificada) <= 0) exit("No se recibió ninguna imagen");
    // La imagen traerá al inicio data:image/png;base64, cosa que debemos remover
    $imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", urldecode($imagenCodificada));
     
    // Venía en base64 pero sólo la codificamos así para que viajara por la red, ahora la decodificamos y
    // todo el contenido lo guardamos en un archivo
    $imagenDecodificada = base64_decode($imagenCodificadaLimpia);
    
    // Calcular un nombre único para la imagen
    $rutaDestino = 'img_prenda/';
    $nombreImagenGuardada = $rutaDestino . "prenda_" . uniqid() . ".png";
     
    // Escribir el archivo de imagen original
    file_put_contents($nombreImagenGuardada, $imagenDecodificada);
    
    // Eliminar el fondo de la imagen utilizando la API de Remove.bg
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.remove.bg/v1.0/removebg');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
      'image_file' => new CURLFile($nombreImagenGuardada),
      'size' => 'auto'
    ]);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'X-Api-Key: SK1EWe3Nr3snojRx5H5XS7Jt', // Reemplaza TU_API_KEY con tu clave de API de Remove.bg
    ]);
    $respuesta = curl_exec($ch);
    if (curl_errno($ch)) {
      echo 'Error al eliminar el fondo: ' . curl_error($ch);
      exit();
    }
    curl_close($ch);
    
    // Guardar la imagen con el fondo eliminado
    $nombreImagenGuardadaFondoEliminado = $rutaDestino . "prenda_fondo_eliminado_" . uniqid() . ".png";
    file_put_contents($nombreImagenGuardadaFondoEliminado, $respuesta);
    
    // Terminar y regresar el nombre de la foto con fondo eliminado
    exit($nombreImagenGuardada);
    
?>