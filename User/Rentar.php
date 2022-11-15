<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>TeslaCarRent</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link  rel="icon"   href="Img/logo.png" type="image/png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="CSS/Style.css" rel="stylesheet" type="text/css">
  <link href="../CSS/Style.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/e5720b39b8.js" crossorigin="anonymous"></script>
  <link href="CSS/catalogo.css" rel="stylesheet" type="text/css">
  <link href="CSS/cuerpo.css" rel="stylesheet" type="text/css">
  <link href="CSS/formulario.css" rel="stylesheet" type="text/css">
  <link href="../CSS/catalogo.css" rel="stylesheet" type="text/css">
  <link href="../CSS/cuerpo.css" rel="stylesheet" type="text/css">
  <link href="../CSS/formulario.css" rel="stylesheet" type="text/css">
  <?php
    include_once '../Procesos/user.php';
    include_once '../Procesos/user_session.php'; 
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    if (isset($_SESSION['user'])){
        $cliente = $_SESSION['user'];
    }else{
  header('Location: login.php');
     die() ;
    }
  ?>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">TeslaCarRent</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#myPage"><i class="fa fa-home" aria-hidden="true"></i></a></li>
        <li><a href="#band"><i class="fa fa-id-card" aria-hidden="true"></i></a></li>
        <li><a href="#tour"><i class="fa fa-map-marker" aria-hidden="true"></i></a></li>
        <li><a href="#contact"><i class="fa fa-car" aria-hidden="true"></i></a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php  echo $cliente; ?> </i>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://localhost/RentaCarroF/Login.php"><i class="fa fa-wrench" aria-hidden="true"></i> Preferencias</a></li>
            <li><a href="http://localhost/RentaCarroF/Procesos/Logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar sesión</a></li>
            <li><a href="#"><i class="fa fa-question" aria-hidden="true"></i> Ayuda</a></li> 
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<br><br>
<div class="container-fluid">
        <div class="row">
            <div class="col-1 "></div>
            <div class="formulario col-10">
               <div class="registroU">
                        <div class="a1">
                            <h2>Informacion del carro</h2>
                            <?php 
                            $idcarrito =  $_GET['variable']; ?>
                        </div>
                        <?php
                  include '../Procesos/configServer.php';
                  include '../Procesos/consulSQL.php';
                  $consulta= ejecutarSQL::consultar("SELECT Placas, Modelo, Tipo, Marca, Transmicion, Precio FROM carros where idCarro = $idcarrito");
                  $cocheRenta = mysqli_num_rows($consulta);
                  if($cocheRenta>0){
                      while($fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){ ?>
                        <label for="">Numero de placas: <?php echo $fila['Placas'];?></label><br>
                        <label for="">Modelo: <?php echo $fila['Modelo'];?></label><br>
                        <label for="">Tipo: <?php echo $fila['Tipo'];?></label><br>
                        <label for="">Marca: <?php echo $fila['Marca'];?></label><br>
                        <label for="">Tipo de transmicion: <?php echo $fila['Transmicion'];?></label><br>
                        <label for=""> Precio por dia: $<?php echo $fila['Precio'];?></label><br>
                <?php
                      }
                      }
        ?>
        <?php
                  
                  $consulta2= ejecutarSQL::consultar("SELECT idUsuarios, Nombre, Dirreccion, Correo, Telefono FROM usuarios where UUser = '".$cliente."'");
                  $usuarioRenta = mysqli_num_rows($consulta2);
                  if($usuarioRenta>0){
                      while($fila=mysqli_fetch_array($consulta2, MYSQLI_ASSOC)){
                ?>
                <h2>Informacion del cliente</h2>
                    <?php
                      $nombre = $fila['idUsuarios'];
                    ?>
                      <label for=""> Nombre: <?php echo $fila['Nombre'];?> </label><br>
                      <label for=""> Nombre: <?php echo $fila['Dirreccion'];?> </label><br>
                      <label for=""> Nombre: <?php echo $fila['Correo'];?></label><br>
                      <label for=""> Nombre: <?php echo $fila['Telefono'];?></label><br>
                      <a href="../Procesos/Rentar.php?var1=echo $idcarrito' & var2= echo $nombre?>" >Realizar prestamo</a>
                      <?php
                      }
                      }
        ?>

                      


               </div>
            </div>
            <div class="col-1 border"></div>
        </div>
    </div>


</div> <br><br>



<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

</body>
</html>