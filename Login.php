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
      <a class="navbar-brand" href="http://localhost/RentaCarrof/index_NS.php">TeslaCarRent</a>
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
            <li><a href="http://localhost/RentaCarroF/Login.php">Iniciar sesión</a></li>
            <li><a href="http://localhost/RentaCarrof/Registro.php">Registrarse</a></li>
            <li><a href="#">Ayuda</a></li> 
          </ul>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
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
                    <form action="http://localhost/RentacarroF/index.php" method="post">
                        <div class="a1">
                            <h2>Login</h2>
                        </div>
                        <div class="a1">
                            <input type="text" name="user" id="" placeholder="Usuario">
                        </div>
                        <div class="a1">
                            <input type="password" name="pass" id="" placeholder="contrase;a">
                        </div>
                        <div class="a1">
                            <input type="submit" value="iniciar secion">
                        </div>
                    </form>
                        <div>
                            <a href="http://localhost/RentaCarrof/Registro.php">Registrar nuevo usuario</a>
                        </div>
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