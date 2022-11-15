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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/e5720b39b8.js" crossorigin="anonymous"></script>
  <link href="CSS/catalogo.css" rel="stylesheet" type="text/css">
  <link href="CSS/cuerpo.css" rel="stylesheet" type="text/css">
  <link href="CSS/formulario.css" rel="stylesheet" type="text/css">
  <link href="CSS/Style.css" rel="stylesheet" type="text/css">
</head>
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
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-plus" aria-hidden="true"></i>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://localhost/RentaCarroF/Login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Iniciar sesión</a></li>
            <li><a href="http://localhost/RentaCarrof/Registro.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrarse</a></li>
            <li><a href="#"><i class="fa fa-question" aria-hidden="true"> </i>Ayuda</a></li> 
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<div>
    <h3>Lista de coches</h3>
    <div class="carros_recientes"> 
            <div class="tarjetero">

            <?php
                  include 'Procesos/configServer.php';
                  include 'Procesos/consulSQL.php';
                  $consulta= ejecutarSQL::consultar("SELECT Placas, Modelo, Asientos, Marca, Transmicion, Precio, Imagen FROM carros ORDER BY idCarro DESC");
                  $ListaCosches = mysqli_num_rows($consulta);
                  if($ListaCosches>0){
                      while($fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
                ?>

                <div class="tarjeta">
                    <div class="img"><?php echo "<img src='".$fila['Imagen']."' width='100'>";?></div>
                    <div><h5><?php echo $fila['Modelo'];?></h5></div>
                    <div><?php echo $fila['Asientos'];?></div>
                    <div><?php echo $fila['Transmicion'];?></div>
                    <div><?php echo $fila['Precio'];?></div>
                    <div><a href="Rentar">Rentar</a></div>
                </div>
                <?php
                      }
                      }
        ?>
            </div>

            
    </div>
</div>






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