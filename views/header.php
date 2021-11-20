
<?php 
    $estado_session = session_status();
	if($estado_session == PHP_SESSION_NONE)
	{
		session_start();
	}
	
	if (isset($_SESSION['loggedUserName'])) {
?>
    <link rel="stylesheet" href="styles/header.css">
    <header id="main-header">

		
		<a id="logo-header">
			
			<img src="imagenes/SEFINHORIZONTALblanco.png" id="prueba" alt="">
			<!--<span class="site-name">Gestor documental</span>
			<span class="site-desc">Unidad de Transparencia</span>-->
		</a> <!-- / #logo-header -->

		<nav>
			<ul>
				<li><a href="?menu=inicio">Subir Documento</a></li>
				<li><a href="?menu=tabla">Buscar Documento</a></li>
				<li><a href="?menu=logout">Cerrar Sesión</a></li>
			</ul>
		</nav><!-- / nav -->

	</header><!-- / #main-header -->
<?php 
} else { 
?>
	<link rel="stylesheet" href="styles/header.css">
	<header id="main-header">
		
		<a id="logo-header">
			
			<img src="imagenes/SEFINHORIZONTALblanco.png" id="prueba" alt="">
			<!--<span class="site-name">Gestor documental</span>
			<span class="site-desc">Unidad de Transparencia</span>-->
		</a> <!-- / #logo-header -->

		<nav>
			<ul>
				<li><a href="?menu=login">Login</a></li>
			</ul>
		</nav><!-- / nav -->

	</header><!-- / #main-header -->

<?php } ?>	