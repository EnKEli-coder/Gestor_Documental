<?php
    include ("conexion.php");

    $id = $_GET['id'];
    $eliminar = "DELETE FROM datos WHERE id = '$id'";

    $resultadoEliminar = mysqli_query($mysqli, $eliminar);

    if ($resultadoEliminar) {
        header("Location: ../index.php?menu=tabla");
    } else {
        echo"<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";
    }

?>
