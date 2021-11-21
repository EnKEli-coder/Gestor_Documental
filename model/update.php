<?php
    //Conexión a la base de datos
    require('conexion.php');
    include 'subida.php';

    //Variables de consulta
    $id = $_POST['id'];
    $idCategorias = $_POST['cbx_fondo'];
    $idSubcategorias = $_POST['cbx_subseccion'];
    $idSeries = $_POST['cbx_series'];
    $idSubseries = $_POST['cbx_subseries'];
    $Caja =$_POST['Caja'];
    $Expediente=$_POST['Expediente'];
    $Vigencia=$_POST['Vigencia'];
    $Fojas = $_POST['Fojas'];
    $file = $_FILES['archivo']['name'];
   
    if($file != ""){
        $query = $mysqli->prepare("UPDATE datos SET idCategorias = ?, idSubcategorias = ?, idSeries = ?, idSubseries = ?, Caja = ?, Expediente = ?, Vigencia = ?, archivo = ?, Fojas = ? WHERE id = ?");
        $query->bind_param('ssssiiisii', $idCategorias, $idSubcategorias, $idSeries, $idSubseries, $Caja, $Expediente, $Vigencia, $file, $Fojas, $id); 
        $query->execute();
        $resultado = $query->affected_rows;
    }else{
        $sql = "UPDATE datos SET idCategorias = '$idCategorias', idSubcategorias = '$idSubcategorias', idSeries = '$idSeries', idSubseries = '$idSubseries',
        Caja = '$Caja', Expediente = '$Expediente', Fojas = '$Fojas', Vigencia = '$Vigencia', WHERE id = '$id'";
        $resultado = $mysqli->query($sql);
    }

    if($resultado > 0) {
        echo "<script>
        alert('Registro Exitoso');
        
        </script>";
        
    } else {
        echo "<script>
        alert('Registro fallido');
        </script>";
        echo nl2br($resultado."\n");
        echo $query->get_result();
        echo $_FILES['archivo']['name'];
        echo nl2br($id."\n");
        echo nl2br($idCategorias."\n");
        echo nl2br($idSubcategorias."\n");
        echo nl2br($idSeries."\n");
        echo nl2br($idSubseries."\n");
        echo nl2br($Caja."\n");
        echo nl2br($Expediente."\n");
        echo nl2br($Fojas."\n");
    }

?>