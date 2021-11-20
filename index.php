<?php
    require('model/conexion.php');

    $query = "SELECT idCategorias, Categorias FROM categorias ORDER BY idCategorias";
    $resultado = $mysqli->query($query);
    
        
        
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script language="javascript" src="js/jquery-3.6.0.min.js"></script>
    <title>Unidad de Transparencia</title>
    <link rel="icon" type="image/png" href="imagenes/SEFIN.png">
    
    
    <?php
        include 'views/header.php';
        include 'controller/routing.php';
    ?>


    
</body>
</html>