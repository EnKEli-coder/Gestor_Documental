<?php
$estado_session = session_status();
if($estado_session == PHP_SESSION_NONE)
{
    session_start();
    
}

if (isset($_SESSION['loggedUserName'])) {
?>
    <h1>No tiene permisos para entrar a la página <h1>
<?php    
}else {    
?>
<br />
<br />


<link rel="stylesheet" href="styles/login.css">

<form action="./controller/login.php" method="post">

<div class="login">
    <img src="imagenes/SEFINblanco.png" id="sefin" alt="">
    <div class="login-triangle"></div>
    
    <h2 class="login-header">Iniciar Sesión</h2>
    

    <form class="login-container">
        <p><input type="text" placeholder="Usuario" name="usuario" id="usuario" autocomplete="off"></p>
        <p><input type="password" placeholder="Contraseña" name="pswd" id="pswd" autocomplete="off"></p>
        <p><input type="submit" value="Ingresar"></p>
    </form>
    </div>
</form>
<?php 

}?>
