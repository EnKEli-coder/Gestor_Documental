<?php

include('../model/conexion.php');
$sql = "SELECT * FROM mostrar WHERE id=?";

$query =$mysqli->prepare($sql);
$query->bind_param('i',$GET['id']);
$query->execute();
$resDatos=$query->get_result();

if($arrayDatos = $resDatos->fetch_array(MYSQLI_BOTH)) {
    echo $arrayDatos['archivo'];
    if($arrayDatos['archivo']==""){ ?>
        <p>No tiene archivo</p>
        <?php 

    } else { 
        header('content-type: aplication/pdf');
        header("Content-Disposition: inline; filename=documento.pdf");
        readfile('model/archivos/'.$datos['archivo']);
    } 


    
}
?>

    