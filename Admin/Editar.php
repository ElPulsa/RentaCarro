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
  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rentacarros";

    $idCarro=$_POST['idCarro'];

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT Placas, Modelo, Tipo, Marca, Transmicion, Precio, Kilometrage FROM carros WHERE idCarro = '$idCarro'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
  
      $Placas=$row["Placas"];
      $Modelo=$row["Modelo"];
      $Tipo=$row["Tipo"];
      $Marca=$row["Marca"];
      $Transmicion=$row["Transmicion"];
      $Precio=$row["Precio"];
      $Kilometrage=$row["Kilometrage"];
          
      }
    } else {
      echo "0 results";
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
        <li><a href="ListaRevicion.php"><i class="fa fa-wrench" aria-hidden="true"></i></a></li>
        <li><a href="ListaCarros.php"><i class="fa fa-car" aria-hidden="true"></i></a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php  echo $_SESSION["user"];?> </i>
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

<div class="container">
        <div class="row">
            <div class="col-1 "></div>
            <div class="formulario col-10">
               <div class="registroU">
                    <form action="Actualizar.php" method="post">
                      <table> 
                        <thead >
                          <tr class="Heading">
                            <th></th>
                          <th class="Cell">Informacion anterior</th>
                          <th class="Cell">Nueva informacion</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><h6>Numero de placas:</h6></td>
                            <td> <?php echo $Placas;?></td>
                            <td><input type="number" name="Placas" id="Pl" value='<?=$Placas?>'></td>
                          </tr>
                          <tr>
                            <td><h6>Modelo: </h6></td>
                            <td><?php echo $Modelo;?></td>
                            <td><input type="text" name="Modelo" id="Mo" value='<?=$Modelo?>'></td>
                          </tr> 
                          <tr>
                            <td><h6>Tipo: </h6></td>
                            <td><?php echo $Tipo;?></td>
                            <td><input type="text" name="Tipo" id="Ti" value='<?=$Tipo?>'></td>
                          </tr> 
                          <tr>
                            <td><h6>Marca: </h6></td>
                            <td><?php echo $Marca;?></td>
                            <td><input type="text" name="Marca" id="Ma" value='<?=$Marca?>'></td>
                          </tr> 
                          <tr>
                            <td><h6>Transmicion: </h6></td>
                            <td><?php echo $Transmicion;?></td>
                            <td><input type="text" name="Transmicion" id="Tr" value='<?=$Transmicion?>'></td>
                          </tr> 
                          <tr>
                            <td><h6>Precio por dia: </h6></td>
                            <td><?php echo $Precio;?></td>
                            <td><input type="number" name="Precio" id="Pr" value='<?=$Precio?>'></td>
                          </tr> 
                          <tr>
                            <td><h6>Kilometraje: </h6></td>
                            <td><?php echo $Kilometrage;?></td>
                            <td> <input type="number" name="Kilometrage" id="Km" value='<?=$Kilometrage?>'></td>
                          </tr> 
                        </tbody>
                      </table>
                            <input type="hidden" name="idCarro" id="id" value="<?=$idCarro?>">
                            <input type="submit" class="btn btn-custom" value="Actualizar">
                            <button onclick="ListaCarros.php" class="btn btn-custom">Regresar</button>
                        
                    </form>
               </div>
            </div>
            <div class="col-1 border"></div>
        </div>
    </div>

    <tbody>
      
    </tbody>

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