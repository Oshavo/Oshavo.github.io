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
    <title>OutMe</title>
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
          
    <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1>Bienvenido <?php echo $_SESSION['usuario']?></h1>
              <p class="lead">Aprenderás a vestir de la forma más rápida con OutMe.</p>
              <p><a href="micloset.php" class="btn btn-primary">MiClóset</a></p>
            </div>          
          </div>
        </div>
      </div>
    </section>

    <section class="school-features d-flex" style="background-image: url(images/big_image_2.jpg);">

      <div class="inner">
        <div class="media d-block feature">
          <div class="media-body">
            <h3 class="mt-0">Clóset personalizado</h3>
            <p>Visualiza todas las prendas que has registrado en tu cuenta, de manera ordenada y con la posibilidad de editar cada una de ellas.</p>
          </div>
        </div>

        <div class="media d-block feature">
          <div class="media-body">
            <h3 class="mt-0">IA que detecta ropa</h3>
            <p>Con la función de la cámara, el usuario tendrá la posibilidad de tomar una foto a la prenda de ropa que quiera guardar, la IA detectará si esta en efecto corresponde a una prenda de ropa o no, de ser correcto almacenará. </p>
          </div>
        </div>

        <div class="media d-block feature">       
          <div class="media-body">
            <h3 class="mt-0">Una nueva forma rápida y sencilla de vestir</h3>
            <p>En OutMe (Módulo principal) puedes crear un Outfit de manera automática con la ropa registrada en tu clóset. No te preocupes más por tu forma de vestir.</p>
          </div>
        </div>

        <div class="media d-block feature">       
          <div class="media-body">
            <h3 class="mt-0">Filtros y criterios especiales</h3>
            <p>Contarás con la opción de usar diferentes filtros para tu ropa como estilo (formal, casual, deportivo) o clima (soleado, lluvioso, despejado).</p>
          </div>
        </div>

      </div>
    </section>
    <!-- END section -->  

    <section class="site-section">
      <div class="container">
        <section class="school-features text-dark d-flex">

          <div class="inner">
            <div class="media d-block feature">
              <div class="icon"><span class="fi-ss-shield-check"></div>
              <div class="media-body">
                <h3 class="mt-0">Seguro para todos</h3>
                <p>Evitamos que usuarios no deseados ingresen a la información de nuestro registro, con el uso de un captcha y diferentes procesos de verificación.</p>
              </div>
            </div>

            <div class="media d-block feature">
              <div class="icon"><span class="fi-ss-comments-question-check"></span></div>
              <div class="media-body">
                <h3 class="mt-0">De uso fácil</h3>
                <p>Desarrollados sin mucha complejidad al momento de su uso, con diseño y funcionamiento sencillos para el entendimiento de cualquier usuario.</p>
              </div>
            </div>

            <div class="media d-block feature">
              <div class="icon"><span class="fi-ss-social-network"></span></div>
              <div class="media-body">
                <h3 class="mt-0">Con buen rendimiento</h3>
                <p>Hecho de tal forma que cualquier dispositivo con los requerimientos mínimos pueda correr la app y web sin ningún problema como ralentizado o trabas en estos.</p>
              </div>
            </div>

            <div class="media d-block feature">
              <div class="icon"><span class="ion-gear-b"></span></div>
              <div class="media-body">
                <h3 class="mt-0">Mejor mantenimiento</h3>
                <p>Al tener un desarrollo no tan complejo, es más sencillo realizar cambios, actualizaciones y correciones en la app y web.</p>
              </div>
            </div>
          </div>
        </section>

      </div>
    </section>
    <!-- END section -->

    <section class="section-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_3.jpg);">
      <div class="container">
        <div class="row justify-content-center align-items-center intro">
          <div class="col-md-7 text-center element-animate">
            <h2>Empieza a lucir tus OutFits</h2>
            <br>
            <br>
            <p><a href="Boceto.php" class="btn btn-primary">Prueba nuestra IA</a></p>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-right mb-5">
          <div class="col-md-7 text-right">
            <h2 class="text-mod">Conoce los módulos de OutMe</h2>            
          </div>
        </div>
          <div class="row top-course">
            <div class="col-lg-2 col-md-4 col-sm-6 col-12">
              <a class="course">
                <img src="images/closet.png" alt="Image placeholder">
                <h2>MiClóset</h2>
                <p>Tu ropa en un sólo lugar</p>
              </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-12">
              <a class="course">
                <img src="images/usuario.png" alt="Image placeholder">
                <h2>Perfil</h2>
                <p>Tu información personal</p>
              </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-12">
              <a class="course">
                <img src="images/maniqui.png" alt="Image placeholder">
                <h2>OutMe</h2>
                <p>Empieza a lucir mejor y rápido</p>
              </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-12">
              <a class="course">
                <img src="images/camara.png" alt="Image placeholder">
                <h2>Cámara</h2>
                <p>Nuestra IA clasicará tu ropa</p>
              </a>
            </div>
          </div>       
      </div>
    </section>
    <!-- END section -->
  
    <footer class="site-footer" style="background-image: url(images/big_image_3.jpg);">
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

    
    <script src="js/main.js" type="module"></script>
  </body>
</html>