<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>css/estilo.css" media="only screen and (min-width: 768px)" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/tablet.css" media="only screen and (min-width: 600px) and (max-width:767px)" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/movil.css" media="only screen and (max-width: 599px)" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
<body>
<header>
	<nav>
		<ul id="ul_index">
			<li class="principal activo"><a href="">ASDF</a></li>
			<li id="li_botonmenu"><button type="button" id="boton_menu"><i class="fa fa-bars" style="font-size:24px"></i></button></li>
			<div id="div_derecha">
				<li><a href="">Login</a></li>
				<li><a href="">PPLogin</a></li>
				<li><a href="">JJJLogin</a></li>
			</div>
		</ul>
	</nav>
</header>







<section id="section_login">
	<h1>Iniciar Sesión en la aplicación</h1>
	<form id="form_login">
		<div class="grupo_botones">
			<i class="material-icons">person</i>
			<input type="text" placeholder="Usuario*" required>
		</div>

		<div class="grupo_botones">
			<i class="material-icons">lock_outline</i>
			<input type="password" placeholder="Contraseña*" required>
		</div>
		<input type="submit" value="Iniciar Sesión">
	</form>
</section>






<footer>

	<article id="terminos">
		<ul>
			<li>Terminos y Condiciones</li>
			<li>Politica de privacidad</li>
			<li>Politica de Cookies</li>
		</ul>
	</article>

	<article id="logo">
		LOGO
		LOGO
		LOGO
		LOGO
		LOGO
		LOGO
		LOGO
	</article>

	<article id="info">
		<ul>
			<li><a href="" title="">Terminos y Condiciones</a></li>
			<li><a href="" title="">Politica de privacidad</a></li>
			<li><a href="" title="">Politica de Cookies</a></li>
		</ul>
	</article>

</footer>
</body>
</html>






<!-- LINKS DE SCRIPTS AQUI QUE SI SE PONEN EN EL HEAD NO FUNCIONAN -->
<script src="<?php echo base_url(); ?>js/funciones.js" type="text/javascript"></script>
