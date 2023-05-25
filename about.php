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
    <title>Acerca</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,900" rel="stylesheet">

    <link rel="shortcut icon" href="images/logo_empresa.png">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel='stylesheet' href="https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
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
                  <a class="dropdown-item" href="Boceto.php">Cámara(Alfa)</a>
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

    <section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1>¿Quiénes somos?</h1>
              <p>Inspirados en la necesidad del humano de facilitar sus tareas del día a día, nuestro trabajo es crear proyectos capaces de abarcar diferentes ámbitos no sólo de la vida cotidiana sino también de áreas especializadas, siempre brindando seguridad y confianza.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2>¿Por qué decimos hacer este proyecto?</h2>
          </div>
        </div>

        <div class="row mb-5 align-items-center">
          
          <div class="col-md-6 overflow order-1">
            <img src="images/img_1.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-md-1 order-2"></div>
          <div class="col-md-5 order-3">
            <h2 class="mb-4">Amamos ayudar a los demás</h2>
            <p>Nuestra visión, vermos siendo capaces de siempre brindar soluciones a todo aquel que las requiera. Queremos ser reconocidos como una empresa con servicios de calidad, excelencia e integridad, todo esto para poder expandirnos a lo largo del país.</p>
            <p>Es gracias a esa visión que surge nuestra misión. Con estos proyectos queremos dar a las personas el poder de sumar comodidad a las actividades de su vida cotidiana por medio de tecnologías innovadoras.</p>                                   
          </div>
        </div>

        <div class="row align-items-center">
          
          <div class="col-md-6 overflow order-3">
            <img src="images/img_2.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-md-1 order-2"></div>
          <div class="col-md-5 order-1">
            <h2 class="mb-4">Queremos a nuestros usuarios satisfechos</h2>
            <p>Es por esta razón que nuestro enfoque son nuestros clientes, ya que basamos nuestro desarrollo en sus necesidades, ellos son quiénes decidirán si nuestro software es eficiente y de calidad, proporcionarles los beneficios necesarios para mejorar continuamente nuestros productos y servicios.</p>
            <p>
              <ol>
                <li>
                  Confidencialidad
                  <p>Garantizar la seguridad de todos nuestros desarrollos y de la información utilizada en ellos.</p>
                </li>
                <li>
                  Co-creación
                  <p>Creación de experiencias de cooperación y diálogo.</p>
                </li>
                <li>
                  Responsabilidad
                  <p>Actuando de la manera correcta y adquiriendo compromisos conjuntos.</p>
                </li>
                <li>
                  Honestidad
                  <p>Con transparencia, honradez e integridad en nuestros servicios.</p>
                </li>
                <li>
                  Compromiso
                  <p>Compartiendo conocimientos, experiencias y esfuerxo, para ofrecer siempre lo mejor</p>
                </li>
              </ol>
            </p> 
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2>Miembros de SirchMart</h2>
            <p class="lead">Personal encargado del desarrollo y administración de la app y web.</p>
          </div>
        </div>
        <section class="school-features text-dark d-flex">

          <div class="inner">
            <div class="media d-block feature text-center">
              <img src="images/person_1.jpeg" alt="Image placeholder" class="mb-3">
              <div class="media-body">
                <h3 class="mt-0">Lagunas Orduña Sara</h3>
                <p class="instructor-meta">CEO y Diseñadora de Software</p>
                <p>CEO de la empresa, perteneciente al Departamento de Recursos Humanos, Departamento Administrativo y Departamento de Finanzas.</p>
              </div>
            </div>

            <div class="media d-block feature text-center">
              <img src="images/person_2.jpeg" alt="Image placeholder" class="mb-3">
              <div class="media-body">
                <h3 class="mt-0">Rojas Mejía Luis Yael </h3>
                <p class="instructor-meta">Desarrollador y Arquitecto de Software</p>
                <p>Desarrollador perteneciente al Departamento de Finanzas y Departamento de Soporte Técnico y Comunicaciones.</p>
              </div>
            </div>

            <div class="media d-block feature text-center">
              <img src="images/person_3.jpg" alt="Image placeholder" class="mb-3">
              <div class="media-body">
                <h3 class="mt-0">De la Rosa Valdes Itztli Fernanda</h3>
                <p class="instructor-meta">Diseñadora de Software</p>
                <p>Diseñadora perteneciente al Departamento de Soporte Técnico y Comunicaciones, y Departamento de Marketing y Publicidad.</p>
              </div>
            </div>

            <div class="media d-block feature text-center">
              <img src="images/person_4.jpeg" alt="Image placeholder" class="mb-3">
              <div class="media-body">
                <h3 class="mt-0">Posadas Villegas Octavio</h3>
                <p class="instructor-meta">Desarrollador y Analista de Software</p>
                <p>Desarrollador perteneciente al Departamento de Logística, Departamento de Recursos Humanos y Departamento Administrativo.</p>
              </div>
            </div>

            <div class="media d-block feature text-center">
              <img src="images/person_5.jpg" alt="Image placeholder" class="mb-3">
              <div class="media-body">
                <h3 class="mt-0">Sanchez Martinez Emiliano</h3>
                <p class="instructor-meta">Desarrollador y Encargado del Marketing</p>
                <p>Desarrollador perteneciente al Departamento de Atención al Cliente y Departamento de Marketing y Publicidad.</p>
              </div>
            </div>

            <div class="media d-block feature text-center">
              <img src="images/person_6.jpg" alt="Image placeholder" class="mb-3">
              <div class="media-body">
                <h3 class="mt-0">Sanchez Rolon Pedro</h3>
                <p class="instructor-meta">Encargado del Soporte Técnico</p>
                <p>Perteneciente al Departamento de Logística, Departamento Administrativo y Departamento de Soporte Técnico y Comunicaciones.</p>
              </div>
            </div>

          </div>
        </section>

        <br>
        <br>

      </div>
    </section>
  
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

    
    <script src="js/main.js"></script>
  </body>
</html>