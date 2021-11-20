<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script language="javascript" src="../js/jquery-3.6.0.min.js"></script>
    <title>Editar</title>
</head>
<body>
<?php
        require('conexion.php');
        $id = $_GET["id"];
        $usuarios = "SELECT * FROM categorias WHERE id = '$id'";
        $query = "SELECT idCategorias, Categorias FROM categorias ORDER BY idCategorias";
        $resultado = $mysqli->query($query);
        

?>


<link rel="stylesheet" href="../styles/subirarchivo.css">

<script language="javascript">
			$(document).ready(function(){
				$("#cbx_fondo").change(function () {
 
					$('#cbx_series').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
                    $('#cbx_subseries').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_fondo option:selected").each(function () {
						idCategorias = $(this).val();
						$.post("../includes/getSubseccion.php", { idCategorias: idCategorias }, function(data){
							$("#cbx_subseccion").html(data);
						});            
					});
				})
			});

            $(document).ready(function(){
				$("#cbx_subseccion").change(function () {

                    $('#cbx_subseries').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_subseccion option:selected").each(function () {
						idSubcategorias = $(this).val();
						$.post("../includes/getSeries.php", { idSubcategorias: idSubcategorias }, function(data){
							$("#cbx_series").html(data);
						});            
					});
				})
			});

            $(document).ready(function(){
				$("#cbx_series").change(function () {
					
					$("#cbx_series option:selected").each(function () {
						idSeries = $(this).val();
						$.post("../includes/getSubseries.php", { idSeries: idSeries }, function(data){
							$("#cbx_subseries").html(data);
						});            
					});
				})
			});
            

       
</script>
    
    <div class="form-register" id="contenedor">
        <form id="combo" name="combo" action="model/guarda.php" method="POST" enctype="multipart/form-data">

            <div class="izquierda">

                <div>Sección Documental: <select required name="cbx_fondo" id="cbx_fondo" class="controls">
                    <option value="0">Seleccionar Sección</option>
                    <?php WHILE($row = $resultado->fetch_assoc()) { ?>
                    <option value="<?php echo $row['idCategorias']; ?>"><?php echo $row['Categorias']; ?></option>
                    <?php } ?>
                </select></div>

                <div>Subsección Documental: <select required name="cbx_subseccion" id="cbx_subseccion" class="controls"></select></div>

                <div>Series Documentales: <select required name="cbx_series" id="cbx_series" class="controls"></select></div>

                <div>Subseries Documentales: <select required name="cbx_subseries" id="cbx_subseries" class="controls"></select></div>

            </div>

            <div class="derecha">

                <label for="">Número de Caja:</label>
                <input type="text" class="controls" name="Caja" autocomplete="off">

                <label for="">Número de Expediente:</label>
                <input type="text" class="controls" name="Expediente" autocomplete="off">

                <label for="">Vigencia Documental:</label>
                <input type="text" class="controls" name="Vigencia" autocomplete="off">

                <label for="archivo">Subir Archivo:</label>
                <input type="file" class="controls" name="archivo" id="archivo" accept=".pdf, .PDF" required>
            
            </div>
            <br /> 
            <button type="submit" class="botons" id="enviar" name="enviar" value="Guardar">ACTUALIZAR</button>
           

        </form>
    </div>
</body>
</html>
