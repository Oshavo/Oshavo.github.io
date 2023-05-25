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
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Foto</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.9.0/p5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.9.0/addons/p5.dom.min.js"></script>
    <script src="https://unpkg.com/ml5@latest/dist/ml5.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--<style>
        p{
          font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
          color: white;
        }

        h1{
          font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        h2{
          font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .scriptAlert{
          font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; 
        }

        main{
          background-color: #7e949e;
        }

        #resultado {
          font-weight: bold;
          font-size: 6rem;
          align-items: center;
        }
      </style>-->
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

                
        <div class="px-4 py-2 my-2 text-center border-bottom">
          <br><br><br>
          <h1 class="display-5 fw-bold">Foto de la Prenda</h1>
          <div class="col-lg-6 mx-auto">
            <h2 class="display-5 fw-bold">Recomendaciones</h2>
            <p class="lead mb-0">1.- No realices movimientos bruscos frente la c&aacute;mara para mayor exactitud</p>
            <p class="lead mb-0">2.- Trata de que la c&aacute;mara enfoque bien una sola prenda de ropa</p>
            <p class="lead mb-0">Disculpa si la precisi&oacute;n de nuestra IA no es perfecta. Recuerda que sigue en desarrollo :)</p>     
          </div>
        </div>
    
      <div>
        <br><br>
        <center>
        <button class="btn btn-primary" style="background-color: white; border-color: black; color: black;" id="boton">Tomar Foto</button>
        &nbsp;&nbsp;
        <a href="prediccion.php">
          <button class="btn btn-primary" style="background-color: white; border-color: black; color: black;">Guardar en el Closet</button>
        </a>
        &nbsp;&nbsp;
        <a href="filtros.php">
          <button class="btn btn-primary" style="background-color: white; border-color: black; color: black;">Filtrar de manera manual</button>
        </a>
        <p id="estado" style="color:#000"></p>
      </center>
      </div>
      <center>
      <video muted="muted" id="video"></video>
      <canvas id="canvas" style="display: none;"></canvas>
      </center>
      <script src="script1.js"></script>
      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/jquery-migrate-3.0.0.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/jquery.waypoints.min.js"></script>
      <script src="js/jquery.stellar.min.js"></script>
</body>
</html>