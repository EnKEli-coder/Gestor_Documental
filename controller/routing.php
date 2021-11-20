<?php
      $var_getMenu = isset($_GET['menu']) ? $_GET['menu'] : 'sesion';
      echo "<br>";
      switch ($var_getMenu) {
      case "inicio":
            require_once ('./views/subirarchivo.php');
            break;

      case "tabla":
            require_once('./views/tabla.php');  
            break;

      case "login":
            require_once('./views/login.php');
            break;

      case "logout":
            $session_destroy = session_destroy();
            
            header("location: ./index.php?menu=home");
            break;  
      case "editar":
            require_once("./views/editar.php");
            break;
      default:
      require_once('./views/login.php');
      }


?>