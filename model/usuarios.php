<?php


class usuarios{

   

    public static function login($_user, $_password) {
        include_once 'conexion.php';
        $query = $mysqli->prepare("SELECT id, user, pswd, rango FROM user WHERE user = ? and pswd = ?");
        $query->bind_param("ss",$_user,$_password); 
        $query->execute();
        $usuario = $query->get_result();

        while ($filasql = $usuario->fetch_array(MYSQLI_BOTH)) {
            
            // initialize session variables
            session_start();
           // $_SESSION['loggedDataTime']   = datatime();
            $_SESSION['loggedUserName'] = $filasql['id'] ;
        }

        $acceso = false;
        if ($usuario->num_rows > 0) {
            $acceso = true;
        }


        $mysqli->close();
        return $acceso;
    }


}

?>

