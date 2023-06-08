function tieneSoporteUserMedia() {
  return !!(navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)
}

function _getUserMedia() {
  return (navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia).apply(navigator, arguments);
}

// Declaramos elementos del DOM
var $video = document.getElementById("video"),
  $canvas = document.getElementById("canvas"),
  $boton = document.getElementById("boton"),
  $estado = document.getElementById("estado");
if (tieneSoporteUserMedia()) {
  _getUserMedia({
          video: true
      },
      function(stream) {
          console.log("Permiso concedido");
          $video.srcObject = stream;
          $video.play();

          //Escuchar el click
          $boton.addEventListener("click", function() {

              //Pausar reproducción
              $video.pause();

              //Obtener contexto del canvas y dibujar sobre él
              var contexto = $canvas.getContext("2d");
              $canvas.width = $video.videoWidth;
              $canvas.height = $video.videoHeight;
              contexto.drawImage($video, 0, 0, $canvas.width, $canvas.height);

              var foto = $canvas.toDataURL(); //Esta es la foto, en base 64
              $estado.innerHTML = "Foto enviada con éxito";
              var xhr = new XMLHttpRequest();
              xhr.open("POST", "./guardar_foto.php", true);
              xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhr.send(encodeURIComponent(foto)); //Codificar y enviar

              xhr.onreadystatechange = function() {
                  if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                    console.log("La foto fue enviada correctamente");
                    console.log(xhr);
                
                    var imagenConFondoEliminado = xhr.responseText;
                
                    // Eliminar el fondo de la imagen utilizando la API de Remove.bg
                    eliminarFondo(imagenConFondoEliminado);
                  }
                }
                
                function eliminarFondo(imagen) {
                  // Realizar la llamada a la API de Remove.bg para eliminar el fondo de la imagen
                  var xhrEliminarFondo = new XMLHttpRequest();
                  xhrEliminarFondo.open("POST", "https://api.remove.bg/v1.0/removebg", true);
                  xhrEliminarFondo.setRequestHeader("X-Api-Key", "SK1EWe3Nr3snojRx5H5XS7Jt"); // Reemplaza "TU_API_KEY" con tu clave de API de Remove.bg
                  xhrEliminarFondo.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                  xhrEliminarFondo.onreadystatechange = function() {
                    if (xhrEliminarFondo.readyState == XMLHttpRequest.DONE && xhrEliminarFondo.status == 200) {
                      console.log("Fondo eliminado correctamente");
                      console.log(xhrEliminarFondo);
                
                      var imagenSinFondo = xhrEliminarFondo.responseText;
                
                      // Mostrar la imagen sin fondo en un elemento <img> en tu página web
                      var $imagenResultado = document.getElementById("imagenResultado");
                      $imagenResultado.src = imagenSinFondo;
                      $imagenResultado.style.display = "block";
                      $imagenResultado.style.maxWidth = "100%";
                      $imagenResultado.style.height = "auto";
                
                      // Guardar la imagen sin fondo en la carpeta img_prenda
                      var xhrGuardar = new XMLHttpRequest();
                      xhrGuardar.open("POST", "./guardar_imagen_sin_fondo.php", true);
                      xhrGuardar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                      xhrGuardar.send("imagen=" + encodeURIComponent(imagenSinFondo));
                
                      $estado.innerHTML = "Foto tomada con éxito.";
                    }
                  }
                
                  xhrEliminarFondo.send("image_url=" + encodeURIComponent(imagen));
                }

              //Reanudar reproducción
              $video.play();
          });
      },
      function(error) {
          console.log("Permiso denegado o error: ", error);
          $estado.innerHTML = "No se puede acceder a la cámara, o no diste permiso.";
      });
} else {
  alert("Lo siento. Tu navegador no soporta esta característica");
  $estado.innerHTML = "Parece que tu navegador no soporta esta característica. Intenta actualizarlo.";
}
