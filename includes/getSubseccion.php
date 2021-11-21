<?php
	require ('../model/conexion.php');
	
	$idCategorias = $_POST['idCategorias'];
	
	$queryM = "SELECT idSubcategorias, Subcategorias FROM subcategorias WHERE idCategorias = '$idCategorias' ORDER BY idSubcategorias";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar Subsección</option>";
	
	while($rowM = $resultadoM->fetch_assoc()){
			$html.= "<option value='".$rowM['idSubcategorias']."' >".$rowM['Subcategorias']."</option>";
	}
	
	echo $html;
?>

