<?php
	require ('../model/conexion.php');
	
	$idSubcategorias = $_POST['idSubcategorias'];
	
	$queryL = "SELECT idSeries, Series FROM series WHERE idSubcategorias = '$idSubcategorias' ORDER BY idSeries";
	$resultadoL = $mysqli->query($queryL);
	
	$html= "<option value='0'>Seleccionar Serie</option>";
	
	while($rowL = $resultadoL->fetch_assoc())
	{
		$html.= "<option value='".$rowL['idSeries']."'>".$rowL['Series']."</option>";
	}
	
	echo $html;
?>

