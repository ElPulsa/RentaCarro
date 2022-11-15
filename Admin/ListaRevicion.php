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
  <link href="../CSS/Style.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/e5720b39b8.js" crossorigin="anonymous"></script>
  <link href="../CSS/catalogo.css" rel="stylesheet" type="text/css">
  <link href="../CSS/cuerpo.css" rel="stylesheet" type="text/css">
  <link href="../CSS/formulario.css" rel="stylesheet" type="text/css">
  <link href="../CSS/Tablas.css" rel="stylesheet" type="text/css">
  <?php 
  include_once '../Procesos/admin.php';
  include_once '../Procesos/admin_session.php';
  ?>
   <?php
    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (isset($_SESSION['user'])){
        $cliente = $_SESSION['user'];
    }else{
  header('Location: login.php');//Aqui lo redireccionas al lugar que quieras.
     die() ;

    }
  ?>
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
        <li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
        <li><a href="ListaUser.php"><i class="fa fa-id-card" aria-hidden="true"></i></a></li>
        <li><a href="ListaRevicion.php"><i class="fa fa-wrench" aria-hidden="true"></i></i></a></li>
        <li><a href="ListaCarros.php"><i class="fa fa-car" aria-hidden="true"></i></a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php  echo $_SESSION["user"];?></i>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="http://localhost/RentaCarroF/Login.php"><i class="fa fa-wrench" aria-hidden="true"></i> Preferencias</a></li>
            <li><a href="http://localhost/RentaCarrof/Registro.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar sesión</a></li>
            <li><a href="#"><i class="fa fa-question" aria-hidden="true"></i> Ayuda</a></li>
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-3">
  <h2>Lista de servicios de los carros</h2> 
<table class="table table-striped table-bordered">
    <thead >
      <tr class="Heading">
        <th class="Cell">Placas</th>
        <th class="Cell">Modelo</th>
        <th class="Cell">Ultima revicion</th>
        <th class="Cell">Proxima revicion</th>
        <th class="Cell">Aseite</th><!-- Transmición -->
        <th class="Cell">Neumaticos</th> 
        <th class="Cell">Pintura</th> <!-- Kilometraje -->
        <th class="Cell">Bujias</th>
        <th class="Cell">Bateria</th>
        <th class="">Eliminar </th>
      </tr>
    </thead>
        <?php
                  include '../Procesos/configServer.php';
                  include '../Procesos/consulSQL.php';
                  $consulta= ejecutarSQL::consultar("SELECT Placas, Modelo, UltimaR, ProximaR, Aseite, Neumaticos, Pintura, Bujias, Bateria FROM rentacarros.servicios,
                  rentacarros.carros where idCarro = Carro ORDER BY idServicios DESC");
                  $ListaCosches = mysqli_num_rows($consulta);
                  if($ListaCosches>0){
                      while($fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
                ?>
         <tr>
        <td><?php echo $fila['Placas'];?></td>
        <td><?php echo $fila['Modelo'];?></td>
        <td><?php echo $fila['UltimaR'];?></td>
        <td><?php echo $fila['ProximaR'];?></td>
        <td><?php echo $fila['Aseite'];?></td>
        <td><?php echo $fila['Neumaticos'];?></td>
        <td><?php echo $fila['Pintura'];?></td>
        <td><?php echo $fila['Bujias'];?></td>
        <td><?php echo $fila['Bateria'];?></td>
        <td><p>Editar Eliminar</p></td>
      </tr>
        <?php
                      }
                      }
        ?>
    </tbody>
  </table>
</div>
</div>

<br><br>
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