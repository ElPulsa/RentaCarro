
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
    $idCarro=$_POST['idCarro'];
    
    $sql = "DELETE FROM carros WHERE idCarro = $idCarro";
    $result = mysqli_query($conn, $sql);

    if($result){
      header("Location: ListaCarros.php");
    }

?>
