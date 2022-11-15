<?php
    
    include 'configServer.php';
    include 'consulSQL.php';

    $placas=consultasSQL::clean_string($_POST['placas']);
    $modelo=consultasSQL::clean_string($_POST['modelo']);
    $marca=consultasSQL::clean_string($_POST['marca']);
    $asientos=consultasSQL::clean_string($_POST['asientos']);
    $maletero=consultasSQL::clean_string($_POST['maletero']);
    $puertas=consultasSQL::clean_string($_POST['puertas']);
    $transmicion=consultasSQL::clean_string($_POST['transmicion']);
    $precio=consultasSQL::clean_string($_POST['precio']);
    $kilometrage=consultasSQL::clean_string($_POST['kilometrage']);
    $imgName=$_FILES['img']['name'];
    $imgType=$_FILES['img']['type'];
    $imgSize=$_FILES['img']['size'];
    $imgMaxSize=5120;

    if($placas!="" && $modelo!="" && $marca!="" && $asientos!="" && $maletero!="" 
    && $puertas!="" && $transmicion!="" && $precio!="" && $kilometrage!=""){
        $verificar=  ejecutarSQL::consultar("SELECT Placas FROM carros WHERE Placas='".$placas."'");
        $verificaltotal = mysqli_num_rows($verificar);
        
        if($verificaltotal<=0){
            
            if($imgType=="image/jpeg" || $imgType=="image/png"){
                
                if(($imgSize/1024)<=$imgMaxSize){
                    switch ($imgType) {
                      case 'image/jpeg':
                        $imgEx=".jpg";
                      break;
                      case 'image/png':
                        $imgEx=".png";
                      break;
                    }
                    $imgFinalName=$placas.$imgEx;
                    $url = 'img/'.$imgFinalName;
                    
                    if(move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$imgFinalName)){
                        if(consultasSQL::InsertSQL("carros", "Placas, Modelo, Asientos, Maletero,
                         Puertas, Transmicion, Precio, Kilometrage,Imagen", 
                         "'$placas','$modelo','$asientos','$maletero', '$puertas', '$transmicion','$precio',
                         '$kilometrage','$url'")){
                            echo '<script>
                                swal({
                                  title: "Nuevo registro",
                                  text: "El auto se añadió a la tienda con éxito",
                                  type: "success",
                                  showCancelButton: true,
                                  confirmButtonClass: "btn-danger",
                                  confirmButtonText: "Aceptar",
                                  cancelButtonText: "Cancelar",
                                  closeOnConfirm: false,
                                  closeOnCancel: false
                                  },
                                  function(isConfirm) {
                                  if (isConfirm) {
                                    location.reload();
                                  } else {
                                    location.reload();
                                  }
                                });
                            </script>';
                            
                        }else{
                            echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
                        }   
                    }else{
                        echo '<script>swal("ERROR", "Ha ocurrido un error al cargar la imagen", "error");</script>';
                    }  
                }else{
                    echo '<script>swal("ERROR", "Ha excedido el tamaño máximo de la imagen, tamaño máximo es de 5MB", "error");</script>';
                }
            }else{
                echo '<script>swal("ERROR", "El formato de la imagen del producto es invalido, solo se admiten archivos con la extensión .jpg y .png ", "error");</script>';
            }
        }else{
            echo '<script>swal("ERROR", "El Nuemero de placas que acaba de ingresar ya está registrado en el sistema, por favor ingrese Numero de placas distinto", "error");</script>';
        }
    }else {
        echo '<script>swal("ERROR", "Los campos no deben de estar vacíos, por favor verifique e intente nuevamente", "error");</script>';
    }

