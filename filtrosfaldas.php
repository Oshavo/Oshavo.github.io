<?php
include "db.php";
session_start();

$usuario = $_SESSION['usuario'];

$consultaid = "SELECT id FROM Tbl_Persona WHERE Usuario = '$usuario'";
$resultado = mysqli_query($conn, $consultaid);
$fila = mysqli_fetch_assoc($resultado);
$idPersona = $fila["id"];

if(!isset($_SESSION['usuario'])){
    echo '
        <script>
            alert("Debes iniciar sesión");
            window.location = "Principal.php";
        </script>
    ';
    session_destroy();
    die();    
}
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Filtros</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,900" rel="stylesheet">

    <link rel="shortcut icon" href="images/logo_empresa.png">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel='stylesheet' href="https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css">

    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

  <header role="banner" style="background-color: black;">
     
      <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container">
          <a class="navbar-brand absolute" href="index.php">OutMe</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Inicio</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Módulos</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="micloset.php">MiClóset</a>
                  <a class="dropdown-item" href="Boceto.php">Cámara</a>
                  <a class="dropdown-item" href="outme.php">OutMe</a>
                  <a class="dropdown-item" href="misconjuntos.php">MisConjuntos</a>
                </div>
              </li> 

              <li class="nav-item">
                <a class="nav-link" href="about.php">Acerca</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contactános</a>
              </li>
            </ul>
            <ul class="navbar-nav absolute-right">
              <li class="nav-item">
                <a href="logout.php" class="nav-link">Cerrar Sesión</a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
    </header> 

  <section class="site-section bg-light ">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <form action="guardarprenda.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-4 form-group">
                <h2>Filtros de Prenda</h2>
                <label for="foto">Elige las opciones con las que deseas guardar la prenda</label>  
              </div>
            </div>
            <input class="btn btn-outline-primary" type="file" name="FotoPrenda" onchange="mostrarImagen(event)"> <!-- añade el atributo onchange -->
            <div class="row">
              <div class="col-md-4 form-group">
                <img id="imagen_preview" src="images/prenda-foto.png" alt="FotoPrenda" style="border: solid black 3px; border-radius: 5px; margin: 20px; width: 480px; height: 600px;"> <!-- añade el id -->
              </div>
            </div>
            <!-- el resto del formulario -->
              <div class="row">
                <div class="col-md-4 form-group">
                  <label for="tipo">Tipo</label>
                  <select name="Tipo">
                    <option value="Playera">Playeras</option>
                    <option value="Bolsa">Bolsas</option>
                    <option value="Abrigo">Abrigos</option>
                    <option value="Camisa">Camisas</option>
                    <option value="Pantalon">Pantalones</option>
                    <option value="Bota">Botas</option>
                    <option value="Teni">Tenis</option>
                    <option value="Sudadera">Sudaderas</option>
                    <option value="Sandalia">Sandalias</option>
                    <option value="Vestido">Vestidos</option>
                    <option value="Tacon">Tacones</option>
                    <option value="Zapato">Zapatos</option>
                    <option value="Chamarra">Chamarras</option>
                    <option value="Blusa">Blusas</option>
                    <option value="Falda" selected>Faldas</option>
                  </select>
                </div>
                <div class="col-md-4 form-group">
                  <label for="color">Color</label>
                  <select name="Color" >
                    <option value="Rojo" selected>Rojo</option>
                    <option value="Azul">Azul</option>
                    <option value="Amarillo">Amarillo</option>
                    <option value="Verde">Verde</option>
                    <option value="Naranja">Naranja</option>
                    <option value="Morado">Morado</option>
                    <option value="Rosa">Rosa</option>
                    <option value="Blanco">Blanco</option>
                    <option value="Negro">Negro</option>
                    <option value="Gris">Gris</option>
                    <option value="Cafe">Cafe</option>
                  </select>
                </div>
                <div class="col-md-4 form-group">
                  <label for="estilo">Estilo</label>
                  <select name="Estilo">
                    <option value="Casual" selected>Casual</option>
                    <option value="Formal">Formal</option>
                    <option value="Deportivo">Deportivo</option>
                  </select>
                </div>
                <div class="field input">
                  <input type="hidden" name="idPersona" value="<?php echo $idPersona?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Listo" class="btn btn-primary" name="enviar">
                </div>
              </div>
            </form>
            <div class="col-md-6 form-group">
                  <a href="faldas.php"><button class="btn btn-primary">Volver</button></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <footer class="site-footer" style="background-color:black;">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3>Acerca de</h3>
            <p>Somos una empresa de desarrollo de software, nuestro trabajo es crear proyectos que puedan
              abarcar diferentes ámbitos no solo de la vida cotidiana sino también de áreas especializadas.Todos
              nuestros proyectos están enfocados a facilitar la vida de las personas así como a brindarles
              seguridad y confianza.</p>
          </div>
        <div class="col-md-6 ml-auto">
          <div class="row">
            <div class="col-md-4">
              <ul class="list-unstyled">
                <li><a href="about.php">Nosotros</a></li>
                <li><a href="contact.php">Contáctanos</a></li>
              </ul>
            </div>              
          </div>
          <div>
            <img class="img_logo" src="images/logo_empresa.png" alt="Logo_Empresa">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>All rights reserved<a href="https://colorlib.com" target="_blank"></a></p>
          </div>
        </div>
      </div>
    </footer>
    
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script>
      function mostrarImagen(event) {
      var archivo = event.target.files[0];
      var lector = new FileReader();
      lector.onload = function(evento) {
        var imagen = document.getElementById('imagen_preview');
        imagen.src = evento.target.result;
      }
      lector.readAsDataURL(archivo);
    }
    </script>
    
    <script src="js/main.js"></script>
  </body>
</html>