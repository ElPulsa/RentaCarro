<?php 
  
  include_once '../Procesos/admin.php';
  include_once '../Procesos/admin_session.php';
  include '../Procesos/configServer.php';
  include '../Procesos/consulSQL.php';


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

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $id=$_POST['idCarro'];
    $Pl=$_POST['Placas'];
    $Mo=$_POST['Modelo'];
    $Ti=$_POST['Tipo'];
    $Ma=$_POST['Marca'];
    $Tr=$_POST['Transmicion'];
    $Pr=$_POST['Precio'];
    $Km=$_POST['Kilometrage'];


    
    $sql = "UPDATE carros SET Placas='$Pl', Modelo='$Mo', Tipo='$Ti', Marca='$Ma',Transmicion='$Tr', Precio='$Pr',Kilometrage='$Km'  WHERE idCarro = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
      header("Location: ListaCarros.php");
    }


?>
?>

