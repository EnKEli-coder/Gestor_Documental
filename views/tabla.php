<?php  
    //Conexión a la base de datos
    include('./model/conexion.php');

    $query = $mysqli->prepare("SELECT rango FROM user WHERE id = ?");
    $query->bind_param("s",$_SESSION['loggedUserName']); 
    $query->execute();
    $usuario = $query->get_result();
    $filasql = $usuario->fetch_array(MYSQLI_BOTH); 
    

    //Variables de consulta
   if ($_SERVER["REQUEST_METHOD"] == "POST"){
        /*$Categorias = $_POST['cbx_fondo'];
        $Subcategorias = $_POST['cbx_subseccion'];
        $Series = $_POST['cbx_series'];
        $Subseries = $_POST['cbx_subseries'];*/
        $caja =$_POST['Caja'];
        $expediente=$_POST['Expediente'];
        $vigencia=$_POST['Vigencia'];
  
        
    } 

    $where = "";

    //Boton Buscar
    if(isset($_POST['buscar']))
    {
        if (empty($_POST['Caja']))
        {
            $where="where expediente like '".$expediente."%' and vigencia like '".$vigencia."%'";
        } 
        else if (empty($_POST['Expediente']))
        {
            $where="where caja like '".$caja."%' and vigencia like '".$vigencia."%'";
        }
        else 
        {
            $where="where expediente like '".$expediente."%' and caja like '".$caja."%' and vigencia like '".$vigencia."%'";
        }
   
    }
    /*$condiciones = array();
    if(isset($_POST['buscar']))
    {
        if (!empty($_POST['cbx_fondo']))
        {
            $condiciones[]="Categorias = ?";
        }
   
    }*/

    //Consulta a la base de datos
    $datos="SELECT * FROM mostrar $where";
    $resDatos = $mysqli->query($datos);

   /* if(!empty($condiciones)){
        //$datos.implode(' ',$condiciones);
        $datos .= " WHERE " . implode(' ', $condiciones);
        echo $datos;
        echo $Categorias;
        $query =$mysqli->prepare($datos);
        $query->bind_param('s',$Categorias);
        $query->execute();
        $resDatos=$query->get_result();
        }*/
?>


<link rel="stylesheet" href="styles/tabla.css"> 

<form method="post" class="form" enctype="multipart/form-data">

    <input type="text" name="Caja" autocomplete="off" placeholder="Número de Caja">

    <input type="text" name="Expediente" autocomplete="off" placeholder="Número de Expediente">

    <input type="text" name="Vigencia" autocomplete="off"  placeholder="Vigencia Documental">

    <button name="buscar" class="boton_personalizado" type="submit">Buscar</button>
    <!--<button onClick="window.location.reload();">Reinicio</button>-->

</form>
<?php
if($filasql['rango'] == 1){
?>
<table class="table">
    <tr>
        <th>Sección Documental</th>
        <th>Subsección Documental</th>
        <th>Series Documentales</th>
        <th>Subseries</th>
        <th>Número de Caja</th>
        <th>Número de Expediente</th>
        <th>Vigencia Documental</th>
        <th>Número de Fojas</th>
        <th>Archivo</th>
        <th>Acciones</th>
        
    </tr>
    <?php
        while($arrayDatos = $resDatos->fetch_array(MYSQLI_BOTH)) { ?>
        <tr>
            <td><?php echo $arrayDatos['Categorias']; ?></td>
            <td><?php echo $arrayDatos['Subcategorias']; ?></td>
            <td><?php echo $arrayDatos['Series']; ?></td>
            <td><?php echo $arrayDatos['Subseries']; ?></td>
            <td><?php echo $arrayDatos['Caja']; ?></td>
            <td><?php echo $arrayDatos['Expediente']; ?></td>
            <td><?php echo $arrayDatos['Vigencia']; ?></td>
            <td><?php echo $arrayDatos['Fojas']; ?></td>
            <td><a href="model/archivos/<?php echo $arrayDatos['archivo'];?>" type="button" target="_blank"><img src="imagenes/pdf.png"  class="prueba" alt="pdf"></a></td>
            <td>
                <a href="model/eliminar.php?id=<?php echo $arrayDatos["id"];?>" class="table__item__link"><img src="imagenes/borrar.png"  class="prueba" alt="eliminar"></a>           
                <a href="model/actualizar.php?id=<?php echo $arrayDatos["id"]; ?>"><img src="imagenes/editar.png" class="prueba" alt="editar"></a>
            </td>
        </tr>

    <?php } ?>

</table>
<script src="./model/confirmacion.js"></script>
<?php
}else{
?>

<table class="table">
    <tr>
        <th>Sección Documental</th>
        <th>Subsección Documental</th>
        <th>Series Documentales</th>
        <th>Subseries</th>
        <th>Número de Caja</th>
        <th>Número de Expediente</th>
        <th>Vigencia Documental</th>
        <th>Número de Fojas</th>
        <th>Archivo</th>
        
    </tr>
    <?php
        while($arrayDatos = $resDatos->fetch_array(MYSQLI_BOTH)) { ?>
        <tr>
            <td><?php echo $arrayDatos['Categorias']; ?></td>
            <td><?php echo $arrayDatos['Subcategorias']; ?></td>
            <td><?php echo $arrayDatos['Series']; ?></td>
            <td><?php echo $arrayDatos['Subseries']; ?></td>
            <td><?php echo $arrayDatos['Caja']; ?></td>
            <td><?php echo $arrayDatos['Expediente']; ?></td>
            <td><?php echo $arrayDatos['Vigencia']; ?></td>
            <td><?php echo $arrayDatos['Fojas']; ?></td>
            <td><a href="model/archivos/<?php echo $arrayDatos['archivo'];?>" type="button" target="_blank"><img src="imagenes/pdf.png"  class="prueba" alt="pdf"></a></td>
        </tr>

    <?php } ?>

</table> 
<script src="./model/confirmacion.js"></script>

<?php
}
?>    