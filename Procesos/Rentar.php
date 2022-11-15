<?php
    
    include 'configServer.php';
    include 'consulSQL.php';
   
    $idcarrito =  $_GET['var1']; 
    $usuario = $_GET['var2'];
    $admin = 1;
    $fecha =  '09/11/2022';
    $fecha2 = '18/11/2022';
    $estado = 'En Proceso';
    

    if($idcarrito!="" && $usuario!=""){
        $verificar=  ejecutarSQL::consultar("SELECT UUser FROM usuarios WHERE idUsuarios='".$usuario."'");
        $verificaltotal = mysqli_num_rows($verificar);
        
        if($verificaltotal<=0){
                            echo  "$idcarrito .$usuario.$admin.$fecha.$fecha2.$estado";
                        if(consultasSQL::InsertSQL("rentas", "Administrador, Usuario, Carro, Fecha, FechaR, Estado", 
                         "'".$admin."','".$usuario."','".$idcarrito."','".$fecha."', '".$fecha2."', '".$estado."'")){
                            echo '<script>
                                swal({
                                  title: "Nuevo registro",
                                  text: "El usuario se registro con exito",
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
                                echo '<script>swal("ERROR", "No se puedo registrar al usuario en el sistema", "error");</script>';
                            }
        }else{
            echo '<script>swal("ERROR", "El Nuemero de placas que acaba de ingresar ya está registrado en el sistema, por favor ingrese Numero de placas distinto", "error");</script>';
        }
    }else {
        echo '<script>swal("ERROR", "Los campos no deben de estar vacíos, por favor verifique e intente nuevamente", "error");</script>';
    }

    
