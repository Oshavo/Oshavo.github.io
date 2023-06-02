<?php
include "db.php";
session_start();

$user = $_SESSION['usuario'];
$consulta = "SELECT * FROM Tbl_Prenda a INNER JOIN Tbl_Persona b ON a.idPersona = b.id WHERE Tipo IN ('Playera', 'Camisa', 'Sudadera', 'Blusa')";

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
    <title>OutMe Crea tu conjunto</title>
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
    <link rel="stylesheet" href="css/fotos.css">
    <link rel="stylesheet" href="css/fresco.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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

   <section class="hero__section">
      <center>
      <h2>Creación del conjunto con OutMe</h2>
      <label for="foto">Elige una prenda que has guardado para generar el conjunto</label>
      </center>
      <div class="hero-slider">
        <?php foreach($resultado as $row){?>
        <div class="slide-item">
          <button onclick="seleccionarImagen('<?php echo $row['FotoPrenda']; ?>')" class="fresco" src="<?php echo $row['FotoPrenda']?>" data-fresco-group="projects">
            <img src="<?php echo $row['FotoPrenda']?>" alt="">
          </button>
          <h2><?php echo $row['Tipo']?></h2>
          <h5><?php echo $row['Estilo']?></h5>
        </div> 
        <?php }?>
      </div> 
      <div class="hero-text-slider">
      </div>
      <center>
      <button class="btn btn-primary" onclick="mostrarDatos()">Listo</button><br><br>
    </center>
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
    <script src="js/main.js"></script>
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/fresco.min.js"></script>
    <script src="js/fotos.js"></script>
    
    <script>
      var imagenesSeleccionadas = []; // Array para almacenar las URL de las imágenes seleccionadas

      function seleccionarImagen(url) {
        imagenesSeleccionadas.push(url); // Agregar la URL al array de imágenes seleccionadas
        alert("Imagen seleccionada");
      }

      function mostrarDatos() {
        var form = document.createElement('form');
        form.method = 'post';
        form.action = 'mostrar_sup.php';

        // Crea un campo de entrada oculto para enviar las imágenes seleccionadas
        var imagenesSeleccionadasInput = document.createElement('input');
        imagenesSeleccionadasInput.type = 'hidden';
        imagenesSeleccionadasInput.name = 'imagenesSeleccionadas';
        imagenesSeleccionadasInput.value = JSON.stringify(imagenesSeleccionadas);
        form.appendChild(imagenesSeleccionadasInput);

        // Agrega el formulario al cuerpo del documento y envíalo
        document.body.appendChild(form);
        form.submit();
      }
    </script>

  </body>
</html>