<!DOCTYPE html>
<html lang="en">
<head>
  <title>TeslaCarRent</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<header>
    
</header>
<body>


    <div class="container-fluid "> <!-- contenedor de cuerpo de la pagina-->
        <div class="filas row">
            <div class="col-1 border"></div>
            <div class="formulario col-10"> <!--Incertar contenido aqui-->
                <div class= "registroC">
                    <form  method="post" action="../Procesos/nuevo_auto.php" enctype="multipart/form-data">
                        <div class="a1">
                            <H4>Registro de vehículos</H4>
                        </div>
                        <div class="a1">
                            <input type="text" name="modelo" placeholder="Modelo">
                        </div>
                        <div class="a1">
                            <input type="number" name="placas" placeholder="Placas">
                        </div>
                        <div class="a1">
                            <input type="text" name="tipo" placeholder="Tipo">   
                        </div>
                        <div class="a1">
                            <input type="text" name="marca" placeholder="Marca">   
                        </div>
                        <div class="a1">
                            <input type="number" name="asientos" placeholder="Numero de asientos">    
                        </div>
                        <div class="a1">
                            <input type="text" name="maletero" placeholder="Tamaño del maletero">    
                        </div>
                        <div class="a1">
                            <input type="number" name="puertas" placeholder="Numero de puertas">    
                        </div>
                        <div class="a1">
                            <input type="text" name="transmicion" placeholder="Tipo de transmición">    
                        </div>
                        <div class="a1">
                            <input type="number" name="precio" placeholder="Precio">    
                        </div>
                        <div class="a1">
                            <input type="number" name="kilometrage" placeholder="Kilometraje">    
                        </div>
                        <div class="a2">
                            <input type="file" name="img">    
                        </div>
                        <div class="a3">
                        <button type="submit" name="guardar">Guardar</button>
                        </div>    
                    </form>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</body>