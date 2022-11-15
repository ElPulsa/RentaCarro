<?php
    
    include 'configServer.php';
    include 'consulSQL.php';

    $nombre=consultasSQL::clean_string($_POST['nombre']);
    $user=consultasSQL::clean_string($_POST['user']);
    $correo=consultasSQL::clean_string($_POST['correo']);
    $pass=consultasSQL::clean_string($_POST['pass']);
    $pass2=consultasSQL::clean_string($_POST['pass2']);

    if($pass !== $pass2){
        ?><script>
                                swal({
                                  title: "Error en las contrase;as",
                                  text: "Las contrase;as no coinsiden",
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
                            </script> <?php
    }

    $Contraseña = hash('sha512', $pass);
    $direccion=consultasSQL::clean_string($_POST['direccion']);
    $telefono=consultasSQL::clean_string($_POST['telefono']);



    if($nombre!="" && $user!="" && $correo!="" && $pass!="" && $pass2!="" 
    && $direccion!="" && $telefono!="" ){
        $verificar=  ejecutarSQL::consultar("SELECT UUser FROM usuarios WHERE UUser='".$user."'");
        $verificaltotal = mysqli_num_rows($verificar);
        
        if($verificaltotal<=0){
            
                        if(consultasSQL::InsertSQL("usuarios", "Nombre, Dirreccion, Correo, Telefono, UUser, UPassaword", 
                         "'$nombre','$direccion','$correo','$telefono', '$user', '$Contraseña'")){
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

