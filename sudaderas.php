<?php
include "db.php";
session_start();

$user = $_SESSION['usuario'];
$consulta = "SELECT * FROM Tbl_Prenda a INNER JOIN Tbl_Persona b ON a.idPersona = b.id WHERE a.Tipo = 'Sudadera'";

$resultado = $conn->query($consulta);

while($data = $resultado->fetch_array()){
  $id = $data['id'];
  $tipo = $data['Tipo'];
  $color = $data['Color'];
  $estilo = $data['Estilo'];
  $fotoprenda = $data['FotoPrenda'];
}

if(!isset($user)){
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
        <link rel="stylesheet" href="css/fotos.css">
          <link rel="stylesheet" href="css/fresco.css">
          <link rel="stylesheet" href="css/slick.css">
          <link rel="stylesheet" href="css/slicknav.min.css">
          <link rel="stylesheet" href="css/bootstrap.min.css">
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
                    <a href="logout.php" class="nav-link">Cerrar Sesión</a>
                    </li>
                  </ul>
                  
                </div>
              </div>
            </nav>
        </header>

    <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_3.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1>Tus Sudaderas</h1>
              <p class="lead">A continuacion verás las sudaderas que has subido a la nube.</p>
            </div>          
          </div>
        </div>
      </div>
    </section>
    <section class="site-section bg-light ">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!--Aqui empieza la galeria-->
            <div class="gallery__page">
            <div class="gallery__warp">
              <div class="row">
                <?php foreach($resultado as $row){?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a class="gallery__item fresco" src="<?php echo $row['FotoPrenda']?>" data-fresco-group="gallery">
                      <img src="<?php echo $row['FotoPrenda']?>" alt="">
                    </a>
                    <h5><?php echo $row['Color']?></h5>
                    <h5><?php echo $row['Estilo']?></h5>
                </div>
                <?php }?>
              </div>
            </div>
          </div>
        <!-- Aqui termina la galeria-->

          </div>
        </div>
      </div>
      <center><a href ="filtrossudaderas.php">
            <span><input type="button" value="Añadir" class="btn btn-primary"></span></a></center>
    </section>

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/jquery-migrate-3.0.0.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>

        
        <script src="js/main.js" type="module"></script>
    </body>
</html>