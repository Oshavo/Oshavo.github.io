<?php
include "db.php";
session_start();

$usuario = $_SESSION['usuario'];

$consultaPrendas = "SELECT * FROM Tbl_Prenda p INNER JOIN Tbl_Persona per ON p.idPersona = per.id WHERE per.Usuario = '$usuario'";
$resultadoPrendas = mysqli_query($conn, $consultaPrendas);
$fila = mysqli_fetch_assoc($resultadoPrendas);
$idPersona = $fila["id"];

while($data = $resultadoPrendas->fetch_array()){
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
            <form action="guardarconjunto.php" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="cold-md-4 form-group">
                  <h2>Crea tu conjunto con OutMe</h2>
                  <label for="foto">Elige las prendas que has guardado para empezar a vestir</label>  
                </div>
              </div>

            <div class="col-md-6 form-group">
              <div>
              <label for="tipo_imagen">Selecciona parte superior</label>
              <select name="FotoSuperior">
                <option value="Sin seleccion" disabled selected="true">Sin selección</option>
                <optgroup label="Camisas">
                <?php foreach($prendas as $prenda){
                  if($prenda['tipo'] == 'Camisa'){ ?>
                    <option value="<?php echo $prenda['fotoprenda'];?>"><?php echo $prenda['fotoprenda'];?></option>
                <?php }}?>
                </optgroup>
                <optgroup label="Vestidos">
                <?php foreach($prendas as $prenda){
                  if($prenda['tipo'] == 'Vestido'){ ?>
                    <option value="<?php echo $prenda['fotoprenda'];?>"><?php echo $prenda['fotoprenda'];?></option>
                <?php }}?>
                </optgroup>
                <optgroup label="Playeras">
                <?php foreach($prendas as $prenda){
                  if($prenda['tipo'] == 'Playera'){ ?>
                    <option value="<?php echo $prenda['fotoprenda'];?>"><?php echo $prenda['fotoprenda'];?></option>
                <?php }}?>
                </optgroup>                 
              </select>
                <br>
              </div>
            </div>

            <div class="col-md-6 form-group">
              <div>
              <label for="tipo_imagen">Selecciona parte media</label>
              <select name="FotoMedia">
                <option value="Sin seleccion" disabled selected="true">Sin selección</option>
                <optgroup label="Pantalones">
                <?php foreach($prendas as $prenda){
                  if($prenda['tipo'] == 'Pantalon'){ ?>
                    <option value="<?php echo $prenda['fotoprenda'];?>"><?php echo $prenda['fotoprenda'];?></option>
                <?php }}?>
                </optgroup>                
              </select>
                <br>
              </div>
            </div>   

            <div class="col-md-6 form-group">
              <div>
              <label for="tipo_imagen">Selecciona parte inferior</label>
              <select name="FotoInferior">
                <option value="Sin seleccion" disabled selected="true">Sin selección</option>
                <optgroup label="Tenis">
                <?php foreach($prendas as $prenda){
                  if($prenda['tipo'] == 'Teni'){ ?>
                    <option value="<?php echo $prenda['fotoprenda'];?>"><?php echo $prenda['fotoprenda'];?></option>
                <?php }}?>
                </optgroup>
                <optgroup label="Botas">
                <?php foreach($prendas as $prenda){
                  if($prenda['tipo'] == 'Bota'){ ?>
                    <option value="<?php echo $prenda['fotoprenda'];?>"><?php echo $prenda['fotoprenda'];?></option>
                <?php }}?>
                </optgroup>
                <optgroup label="Sandalias">
                <?php foreach($prendas as $prenda){
                  if($prenda['tipo'] == 'Sandalia'){ ?>
                    <option value="<?php echo $prenda['fotoprenda'];?>"><?php echo $prenda['fotoprenda'];?></option>
                <?php }}?>
                </optgroup>                
              </select>
                <br>
              </div>
            </div>   
            
            <div class="col-md-6 form-group">
              <div>
              <label for="tipo_imagen">Selecciona prenda encimada (opcional)</label>
              <select name="FotoEncima">
                <option value="Sin seleccion" disabled selected="true">Sin selección</option>
                <optgroup label="Abrigos">
                <?php foreach($prendas as $prenda){
                  if($prenda['tipo'] == 'Abrigo'){ ?>
                    <option value="<?php echo $prenda['fotoprenda'];?>"><?php echo $prenda['fotoprenda'];?></option>
                <?php }}?>
                </optgroup>
                <optgroup label="Sudaderas">
                <?php foreach($prendas as $prenda){
                  if($prenda['tipo'] == 'Sudadera'){ ?>
                    <option value="<?php echo $prenda['fotoprenda'];?>"><?php echo $prenda['fotoprenda'];?></option>
                <?php }}?>
                </optgroup>              
              </select>
                <br>
              </div>
            </div>

            <div class="col-md-6 form-group">
              <div>
              <label for="tipo_imagen">Selecciona complemento (opcional)</label>
              <select name="FotoComplemento">
                <option value="Sin seleccion" disabled selected="true">Sin selección</option>
                <optgroup label="Bolsos">
                <?php foreach($prendas as $prenda){
                  if($prenda['tipo'] == 'Bolsa'){ ?>
                    <option value="<?php echo $prenda['fotoprenda'];?>"><?php echo $prenda['fotoprenda'];?></option>
                <?php }}?>
                </optgroup>                       
              </select>
                <br>
              </div>
            </div>

                <div class="field input">
                  <input type="hidden" name="idPersona" value="<?php echo $idPersona?>">
                </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="Guardar conjunto" class="btn btn-primary" name="enviar" style="background-color: white; border-color: black; color: black;"> <!-- al dar click a este botón se deben guardar las imágenes con tu tipo y estilo en otra tabla llamada Conjuntos -->                                 
                </div>
              </div>
            </form>
            <a href="algoritmo.php" class="btn btn-primary" style="background-color: white; border-color: black; color: black;">Generar conjunto de manera automática</a>
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
    <script src="js/main.js" type="module"></script>

  </body>
</html>