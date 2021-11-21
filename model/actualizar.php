<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script language="javascript" src="../js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../styles/subirarchivo.css">
    <title>Editar</title>
</head>
<body>

    <?php
            require('conexion.php');

            $query = "SELECT idCategorias, Categorias FROM categorias ORDER BY idCategorias";
            $resultado = $mysqli->query($query);

            $query = $mysqli->prepare("SELECT * FROM datos WHERE id = ?");
            $query->bind_param("i",$_GET['id']); 
            $query->execute();
            $result = $query->get_result();
            $datos = $result->fetch_array(MYSQLI_BOTH);
            
            $query = "SELECT idSubcategorias, Subcategorias FROM subcategorias ORDER BY idSubcategorias";
            $subSecciones = $mysqli->query($query);

            $query = "SELECT idSeries, Series FROM series ORDER BY idSeries";
            $series = $mysqli->query($query);

            $query = "SELECT idSubseries, Subseries FROM subseries ORDER BY idSubseries";
            $subSeries = $mysqli->query($query);
    ?>

    <script language="javascript">
                $(document).ready(function(){
                        $("#cbx_fondo").change(function () {
        
                        $('#cbx_series').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
                        $('#cbx_subseries').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
                        
                        $("#cbx_fondo option:selected").each(function () {
                            idCategorias = $(this).val();
                            $.post("../includes/getSubseccion.php?id=<?php echo $_GET["id"];?>", { idCategorias: idCategorias }, function(data){
                                $("#cbx_subseccion").html(data);
                            });            
                        });
                    })

                    $("#cbx_fondo").change(function () {
    
                        $('#cbx_series').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
                        $('#cbx_subseries').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
                        
                        $("#cbx_fondo option:selected").each(function () {
                            idCategorias = $(this).val();
                            $.post("../includes/getSubseccion.php?id=<?php echo $_GET["id"];?>", { idCategorias: idCategorias }, function(data){
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
        <form id="combo" name="combo" action="update.php" method="POST" enctype="multipart/form-data">

            <div class="izquierda">

                <div>Sección Documental: <select required name="cbx_fondo" id="cbx_fondo" class="controls">
                    <option value="0">Seleccionar Sección</option>
                    <?php WHILE($row = $resultado->fetch_assoc()) { ?>
                    <option value="<?php echo $row['idCategorias'];?>" <?php if($row['idCategorias'] == $datos['idCategorias']){echo "selected";}?>><?php echo $row['Categorias']; ?></option>
                    <?php } ?>
                </select></div>

                <div>Subsección Documental: <select required name="cbx_subseccion" id="cbx_subseccion" class="controls">
                <option value="0">Seleccionar Subserie</option>
                    <?php WHILE($row = $subSecciones->fetch_assoc()) { ?>
                    <option value="<?php echo $row['idSubcategorias'];?>" <?php if($row['idSubcategorias'] == $datos['idSubcategorias']){echo "selected";}?>><?php echo $row['Subcategorias']; ?></option>
                    <?php } ?>
                </select></div>

                <div>Series Documentales: <select required name="cbx_series" id="cbx_series" class="controls">
                <option value="0">Seleccionar Subserie</option>
                    <?php WHILE($row = $series->fetch_assoc()) { ?>
                    <option value="<?php echo $row['idSeries'];?>" <?php if($row['idSeries'] == $datos['idSeries']){echo "selected";}?>><?php echo $row['Series']; ?></option>
                    <?php } ?>
                </select></div>

                <div>Subseries Documentales: <select required name="cbx_subseries" id="cbx_subseries" class="controls">
                <option value="0">Seleccionar Subserie</option>
                    <?php WHILE($row = $subSeries->fetch_assoc()) { ?>
                    <option value="<?php echo $row['idSubseries'];?>" <?php if($row['idSubseries'] == $datos['idSubseries']){echo "selected";}?>><?php echo $row['Subseries']; ?></option>
                    <?php } ?>
                </select></div>

                <label for="archivo">Subir Archivo:</label>
                <input type="file" class="controls" name="archivo" id="archivo" accept=".pdf, .PDF" /><span><?php echo $datos['archivo'];?></span>

            </div>

            <div class="derecha">

                <label for="">Número de Caja:</label>
                <input type="number" class="controls" name="Caja" autocomplete="off" value="<?php echo $datos['Caja'];?>">

                <label for="">Número de Expediente:</label>
                <input type="number" class="controls" name="Expediente" autocomplete="off" value="<?php echo $datos['Expediente'];?>">
                
                <label for="">Número de Fojas:</label>
                <input type="number" class="controls"  name="Fojas" autocomplete="off" value="<?php echo $datos['Fojas'];?>">

                <label for="">Vigencia Documental:</label>
                <input type="number" class="controls" name="Vigencia" autocomplete="off" value="<?php echo $datos['Vigencia'];?>">

                <input type="hidden" name="id" value="<?php$datos['id'].?>">
            </div>
            <br /> 
            <button type="submit" class="botons" id="enviar" name="enviar" value="Guardar">ACTUALIZAR</button>
        </form>
    </div>
</body>
</html>
