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

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="Img/20030202.jpg" alt="New York" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Model 3</h3>
          <p></p>
        </div>      
      </div>

      <div class="item">
        <img src="chicago.jpg" alt="Chicago" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Model S</h3>
          <p></p>
        </div>      
      </div>
    
      <div class="item">
        <img src="Img/200302001.jpg" alt="Los Angeles" width="1200" height="700">
        <div class="carousel-caption">
          <h3>CyberTruck</h3>
          <p></p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>


<!-- Container (TOUR Section) -->
<div id="tour" class="bg-1">
  <div class="container">
    <h3 class="text-center">Ultimos Vehículos Agregados</h3>
    <p class="text-center">Dentro de esta sección podrás encontrar los veículos mas recientes.<br> Recuerda revisar la disponibilidad!</p>
    
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
                </div>
                <?php
                      }
                      }
        ?>
            </div>

            <div>
              <a href="inventario.php">Conoce todos nuestros coches</a>
            </div>
    </div>


  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Tickets</h4>
        </div>
        <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-shopping-cart"></span> Tickets, $23 per person</label>
              <input type="number" class="form-control" id="psw" placeholder="How many?">
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Send To</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
              <button type="submit" class="btn btn-block">Pay 
                <span class="glyphicon glyphicon-ok"></span>
              </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
          <p>Need <a href="#">help?</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h3 class="text-center">Contactános</h3>
  <p class="text-center"><em>Te ayudaremos con lo que requieras</em></p>

  <div class="row">
    <div class="col-md-4">
      <p>Información de contacto</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>  Ensenda, B.C.</p>
      <p><span class="glyphicon glyphicon-phone"></span>       Teléfono: +52 6462013516</p>
      <p><span class="glyphicon glyphicon-envelope"></span>    Email: atencion@teslacarrent.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Nombre" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Correo" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comentario" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Enviar</button>
        </div>
      </div>
    </div>
  </div>
  <br>
  
</div>

<!-- Image of location/map -->
<img src="map.jpg" class="img-responsive" style="width:100%">

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