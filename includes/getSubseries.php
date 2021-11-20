<?php
	require ('../model/conexion.php');
	
	$idSeries = $_POST['idSeries'];
	
	$queryP = "SELECT idSubseries, Subseries FROM subseries WHERE idSeries = '$idSeries' ORDER BY idSubseries";
	$resultadoP = $mysqli->query($queryP);
	
	$html= "<option value='0'>Seleccionar Suberie</option>";
	
	while($rowP = $resultadoP->fetch_assoc())
	{
		$html.= "<option value='".$rowP['idSubseries']."'>".$rowP['Subseries']."</option>";
	}
	
	echo $html;
?>

