<?php
    
    include 'configServer.php';
    include 'consulSQL.php';

    $placas=consultasSQL::clean_string($_POST['placas']);
    $modelo=consultasSQL::clean_string($_POST['modelo']);
    $tipo=consultasSQL::clean_string($_POST['tipo']);
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
                        if(consultasSQL::InsertSQL("carros", "Placas, Modelo, Tipo, Marca, Asientos, Maletero,
                         Puertas, Transmicion, Precio, Kilometrage,Imagen", 
                         "'$placas','$modelo', '$tipo', '$marca', '$asientos','$maletero', '$puertas', '$transmicion','$precio',
                         '$kilometrage','$url'")){
                            echo '<script>
                                swal({
                                  title: "Nuevo registro",
                                  text: "El auto se a??adi?? a la tienda con ??xito",
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
                            echo '<script>swal("ERROR", "Ocurri?? un error inesperado, por favor intente nuevamente", "error");</script>';
                        }   
                    }else{
                        echo '<script>swal("ERROR", "Ha ocurrido un error al cargar la imagen", "error");</script>';
                    }  
                }else{
                    echo '<script>swal("ERROR", "Ha excedido el tama??o m??ximo de la imagen, tama??o m??ximo es de 5MB", "error");</script>';
                }
            }else{
                echo '<script>swal("ERROR", "El formato de la imagen del producto es invalido, solo se admiten archivos con la extensi??n .jpg y .png ", "error");</script>';
            }
        }else{
            echo '<script>swal("ERROR", "El Nuemero de placas que acaba de ingresar ya est?? registrado en el sistema, por favor ingrese Numero de placas distinto", "error");</script>';
        }
    }else {
        echo '<script>swal("ERROR", "Los campos no deben de estar vac??os, por favor verifique e intente nuevamente", "error");</script>';
    }

