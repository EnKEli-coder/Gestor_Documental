<?php
    //Conexión a la base de datos
    require('conexion.php');
    include 'subida.php';

    //Variables de consulta
    $idCategorias = $_POST['cbx_fondo'];
    $idSubcategorias = $_POST['cbx_subseccion'];
    $idSeries = $_POST['cbx_series'];
    $idSubseries = $_POST['cbx_subseries'];
    $Caja =$_POST['Caja'];
    $Expediente=$_POST['Expediente'];
    $Vigencia=$_POST['Vigencia'];
    $archivo = $_FILES['archivo']["name"];
    //$archivo = implode('', $_FILES['archivo']["name"]);
    $Fojas = $_POST['Fojas'];
   
    

    $sql = "INSERT INTO datos (idCategorias, idSubcategorias, idSeries, idSubseries, Caja, Expediente, Fojas, Vigencia, archivo)    
    VALUES ('$idCategorias', '$idSubcategorias', '$idSeries', '$idSubseries', '$Caja', '$Expediente', '$Fojas' , '$Vigencia', '$archivo')";
    $resultado = $mysqli->query($sql);

    if($resultado) {
        echo "<script>
        alert('Registro Exitoso');
        window.location= '../index.php?menu=inicio'
        </script>";
        
    } else {
        echo "<script>
        alert('Error al Registrar');
        window.location= '../index.php?menu=inicio'
        </script>";
    }

?>