
<?php


include_once '../Procesos/admin_session.php';
include_once '../Procesos/db.php';


class User extends DB{
private $nombre;
private $password;


public function userExists($user, $pass){
       
     
    $query = $this->connect()->prepare('SELECT * FROM administradores WHERE AUser = :user and APassaword = :pass');
    $query->execute(['user' => $user, 'pass'=> $pass]);

    if($query->rowCount()){
        return true;
    }else{
        return false;
    }

}
public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM administradores WHERE AUser = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->Nombre = $currentUser['Nombre'];
        }
    }
public function getNombre(){
        return $this->Nombre;
    }

}

?>