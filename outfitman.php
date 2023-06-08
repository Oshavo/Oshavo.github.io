<?php
include "db.php";
session_start();

$usuario = $_SESSION['usuario'];
//Superior
$consultaSup = "SELECT * FROM Tbl_Prenda p INNER JOIN Tbl_Persona per ON p.idPersona = per.id WHERE per.Usuario = '$usuario' AND p.Tipo IN ('Playera', 'Camisa', 'Vestido', 'Blusa')";
$resultadoSup = mysqli_query($conn, $consultaSup);
$filaSup = mysqli_fetch_assoc($resultadoSup);
$idPersona = $filaSup["id"];

while($data = $resultadoSup->fetch_array()){
  $prendas[] = array(
    'id' => $data['idPrenda'],
    'tipo' => $data['Tipo'],
    'color' => $data['Color'],
    'estilo' => $data['Estilo'],
    'fotoprenda' => $data['FotoPrenda']
  );
}

//Inferior
$consultaInf = "SELECT * FROM Tbl_Prenda p INNER JOIN Tbl_Persona per ON p.idPersona = per.id WHERE per.Usuario = '$usuario' AND p.Tipo IN ('Pantalon', 'Falda')";
$resultadoInf = mysqli_query($conn, $consultaInf);
$filaInf = mysqli_fetch_assoc($resultadoInf);
$idPersona = $filaInf["id"];

while($data = $resultadoInf->fetch_array()){
  $prendas[] = array(
    'id' => $data['idPrenda'],
    'tipo' => $data['Tipo'],
    'color' => $data['Color'],
    'estilo' => $data['Estilo'],
    'fotoprenda' => $data['FotoPrenda']
  );
}

//Calzado
$consultaCal = "SELECT * FROM Tbl_Prenda p INNER JOIN Tbl_Persona per ON p.idPersona = per.id WHERE per.Usuario = '$usuario' AND p.Tipo IN ('Teni', 'Bota', 'Sandalia', 'Zapato', 'Tacon')";
$resultadoCal = mysqli_query($conn, $consultaCal);
$filaCal = mysqli_fetch_assoc($resultadoCal);
$idPersona = $filaCal["id"];

while($data = $resultadoCal->fetch_array()){
  $prendas[] = array(
    'id' => $data['idPrenda'],
    'tipo' => $data['Tipo'],
    'color' => $data['Color'],
    'estilo' => $data['Estilo'],
    'fotoprenda' => $data['FotoPrenda']
  );
}

//Opcional
$consultaOpc = "SELECT * FROM Tbl_Prenda p INNER JOIN Tbl_Persona per ON p.idPersona = per.id WHERE per.Usuario = '$usuario' AND p.Tipo IN ('Sudadera', 'Abrigo', 'Chamarra')";
$resultadoOpc = mysqli_query($conn, $consultaOpc);
$filaOpc = mysqli_fetch_assoc($resultadoOpc);
$idPersona = $filaOpc["id"];

while($data = $resultadoOpc->fetch_array()){
  $prendas[] = array(
    'id' => $data['idPrenda'],
    'tipo' => $data['Tipo'],
    'color' => $data['Color'],
    'estilo' => $data['Estilo'],
    'fotoprenda' => $data['FotoPrenda']
  );
}

//Bolsa
$consultaBol = "SELECT * FROM Tbl_Prenda p INNER JOIN Tbl_Persona per ON p.idPersona = per.id WHERE per.Usuario = '$usuario' AND p.Tipo IN ('Bolsa')";
$resultadoBol = mysqli_query($conn, $consultaBol);
$filaBol = mysqli_fetch_assoc($resultadoBol);
$idPersona = $filaBol["id"];

while($data = $resultadoBol->fetch_array()){
  $prendas[] = array(
    'id' => $data['idPrenda'],
    'tipo' => $data['Tipo'],
    'color' => $data['Color'],
    'estilo' => $data['Estilo'],
    'fotoprenda' => $data['FotoPrenda']
  );
}

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
    <title>OutMe Crea tu conjunto</title>
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
   <h2>Crea tu conjunto con OutMe</h2>
  <!--Superior -->
   <section class="site-section bg-light ">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <center>  
              <h4>Elige una prenda Superior que has guardado para empezar a vestir</h4>
            </center>
            <!--Aqui empieza la galeria-->
            <div class="gallery__page">
            <div class="gallery__warp">
              <div class="row">
                <?php foreach($resultadoSup as $row){?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <button onclick="seleccionarImagen('<?php echo $row['FotoPrenda']; ?>')" class="gallery__item fresco" src="<?php echo $row['FotoPrenda']?>" data-fresco-group="gallery">
                      <img src="<?php echo $row['FotoPrenda']?>" alt="">
                    </button>
                </div>
                <?php }?>
              </div>
            </div>
          </div>
        <!-- Aqui termina la galeria-->

          </div>
        </div>
      </div>

    <!--Inferior-->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <center>  
              <h4>Elige una prenda Inferior que has guardado</h4>
            </center>
            <!--Aqui empieza la galeria-->
            <div class="gallery__page">
            <div class="gallery__warp">
              <div class="row">
                <?php foreach($resultadoInf as $row){?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <button onclick="seleccionarImagen('<?php echo $row['FotoPrenda']; ?>')" class="gallery__item fresco" src="<?php echo $row['FotoPrenda']?>" data-fresco-group="gallery">
                      <img src="<?php echo $row['FotoPrenda']?>" alt="">
                    </button>
                </div>
                <?php }?>
              </div>
            </div>
          </div>
        <!-- Aqui termina la galeria-->

          </div>
        </div>
      </div>

    <!--Calzado-->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <center>  
              <h4>Elige un calzado que has guardado</h4>
            </center>
            <!--Aqui empieza la galeria-->
            <div class="gallery__page">
            <div class="gallery__warp">
              <div class="row">
                <?php foreach($resultadoCal as $row){?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <button onclick="seleccionarImagen('<?php echo $row['FotoPrenda']; ?>')" class="gallery__item fresco" src="<?php echo $row['FotoPrenda']?>" data-fresco-group="gallery">
                      <img src="<?php echo $row['FotoPrenda']?>" alt="">
                    </button>
                </div>
                <?php }?>
              </div>
            </div>
          </div>
        <!-- Aqui termina la galeria-->

          </div>
        </div>
      </div>

    <!--Opcionales-->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <center>  
              <h4>Si así lo deseas elige una de las siguientes prendas que has guardado</h4>
            </center>
            <!--Aqui empieza la galeria-->
            <div class="gallery__page">
            <div class="gallery__warp">
              <div class="row">
                <?php foreach($resultadoOpc as $row){?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <button onclick="seleccionarImagen('<?php echo $row['FotoPrenda']; ?>')"class="gallery__item fresco" src="<?php echo $row['FotoPrenda']?>" data-fresco-group="gallery">
                      <img src="<?php echo $row['FotoPrenda']?>" alt="">
                    </button>
                </div>
                <?php }?>
              </div>
            </div>
          </div>
        <!-- Aqui termina la galeria-->

          </div>
        </div>
      </div>

    <!--Bolsas-->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <center>  
              <h4>Si así lo deseas elige uno de los siguientes bolsos que has guardado</h4>
            </center>
            <!--Aqui empieza la galeria-->
            <div class="gallery__page">
            <div class="gallery__warp">
              <div class="row">
                <?php foreach($resultadoBol as $row){?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <button onclick="seleccionarImagen('<?php echo $row['FotoPrenda']; ?>')" class="gallery__item fresco" src="<?php echo $row['FotoPrenda']?>" data-fresco-group="gallery">
                      <img src="<?php echo $row['FotoPrenda']?>" alt="">
                    </button>
                </div>
                <?php }?>
              </div>
            </div>
          </div>
        <!-- Aqui termina la galeria-->
    
          </div>
        </div>
      </div>
      <center>
      <button class="btn btn-primary" onclick="mostrarDatos()">Listo</button><br><br>
    </center>
    <script>
    var imagenesSeleccionadas = []; // Array para almacenar las URL de las imágenes seleccionadas

    function seleccionarImagen(url) {
      imagenesSeleccionadas.push(url); // Agregar la URL al array de imágenes seleccionadas
      alert("Imagen seleccionada");
    }

    function mostrarDatos() {
      // Enviar las imágenes seleccionadas al servidor utilizando AJAX y PHP
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'guardar_imagenes.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // Mostrar las imágenes guardadas en el servidor
          var imagenesGuardadas = xhr.responseText;
          // Hacer algo con las imágenes guardadas (por ejemplo, mostrarlas en la página)
          var url = 'mostrar_imagenes.php?imagenes=' + encodeURIComponent(JSON.stringify(imagenesSeleccionadas));
          window.location.href = url;
        }
      };
      xhr.send('imagenes=' + JSON.stringify(imagenesSeleccionadas));
    }
  </script>
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
    <script src="js/main.js" type="module"></script>
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
	  <script src="js/jquery.slicknav.min.js"></script>
	  <script src="js/slick.min.js"></script>
	  <script src="js/fresco.min.js"></script>
	  <script src="js/fotos.js"></script>

  </body>
</html>