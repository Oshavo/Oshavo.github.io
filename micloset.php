<?php
session_start();

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
        <title>MiClóset</title>           
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
        <header role="banner">
     
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
                      <a href="perfil.php" class="nav-link">Ir al perfil</a>
                    </li>
                    <li class="nav-item">
                      <a href="logout.php" class="nav-link">Cerrar Sesión</a>
                    </li>
                  </ul>
                  
                </div>
              </div>
            </nav>
          </header>

          <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.jpg); background-repeat: repeat-x; background-repeat: repeat-y;">
            <div class="container">
                <div id="btn_modulos">
                  <p class="imgThumb">
                    <a href="playeras.php">
                    <img src="images/playera.jpg" alt="">
                    <span><input type="button" value="Playeras"></span></a>
                  </p>
                  <p class="imgThumb">
                    <a href="bolsas.php">
                    <img src="images/bolsa.jpg" alt="">
                    <span><input type="button" value="Bolsos"></span></a>
                  </p>
                  <p class="imgThumb">
                    <a href="abrigos.php">
                    <img src="images/abrigo.jpg" alt="">
                    <span><input type="button" value="Abrigos"></span></a>
                  </p>
                  <p class="imgThumb">
                    <a href="camisas.php">
                    <img src="images/camisa.jpg" alt="">
                    <span><input type="button" value="Camisas"></span></a>
                  </p>
                  <p class="imgThumb">
                    <a href="pantalones.php">
                    <img src="images/pantalon.jpg" alt="">
                    <span><input type="button" value="Pantalones"></span></a>
                  </p>                               
                  <p class="imgThumb">
                    <a href="botas.php">
                    <img src="images/botas.jpg" alt="">
                    <span><input type="button" value="Botas"></span></a>
                  </p>
                  <p class="imgThumb">
                    <a href="tenis.php">
                    <img src="images/tenis.jpg" alt="">
                    <span><input type="button" value="Tenis"></span></a>
                  </p>
                  <p class="imgThumb">
                    <a href="sudaderas.php">
                    <img src="images/sudadera.jpg" alt="">
                    <span><input type="button" value="Sudaderas"></span></a>
                  </p>
                  <p class="imgThumb">
                    <a href="sandalias.php">
                    <img src="images/sandalias.jpg" alt="">
                    <span><input type="button" value="Sandalias"></span></a>
                  </p>
                  <p class="imgThumb">
                    <a href="vestidos.php">
                    <img src="images/vestido.jpg" alt="">
                    <span><input type="button" value="Vestidos"></span></a>
                  </p>
                </div>
            </div>
          </section>

        <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/jquery-migrate-3.0.0.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>

        
        <script src="js/main.js"></script>
    </body>
</html>