<?php
include "db.php";
session_start();

$user = $_SESSION['usuario'];
$consulta = "SELECT * FROM Tbl_Conjuntos a INNER JOIN Tbl_Persona b ON a.idPersona = b.id";

$resultado = $conn->query($consulta);

while($data = $resultado->fetch_array()){
  $id = $data['id'];
  $fotoOutfit = $data['FotoOutfit'];
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
              <h1>Tus Conjuntos</h1>
              <p class="lead">A continuacion verás los conjuntos que has guardado.</p>
            </div>          
          </div>
        </div>
      </div>
    </section>
    <section class="site-section bg-white">
  <div class="row mb-5 align-items-center">
    <center class="samaparte">
      <div class="col-md-12 overflow order-1" style="position: relative; left: 280%;">
        <?php 
        $contador = 0; // Variable para llevar el conteo de imágenes mostradas
        foreach ($resultado as $row) {
          $urlImagenes = $row['FotoOutfit'];
          $imagenes = explode(",", $urlImagenes); // Dividir las URL de las imágenes
          foreach ($imagenes as $imagen) {
            if ($contador % 3 == 0 && $contador != 0) {
              echo '</div><br><div class="col-md-12 overflow order-1" style="position: relative; left: 280%;">'; // Cerrar y abrir un nuevo contenedor para las siguientes tres imágenes
            }
            echo '<img src="' . $imagen . '" alt="" class="img-sama">';
            echo '<br>';
            $contador++;
          }
        }
        ?>
      </div>
      <br>
        <a href="outme.php">
          <span><input type="button" value="Añadir" class="btn btn-primary" style="position: relative; left: 280%;"></span>
        </a>
    </center>
  </div>
</section>




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