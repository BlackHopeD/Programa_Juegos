<?php
echo "<script>
    history.forward()
    </script>";
   ?>
<!DOCTYPE HTML>
<!-- Programa desarrollado (En gran media) por: BlackHope -->
<html>
	<head>
		<title>ProyectoFinal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
					<header id="header">
						<div class="content">
							<div class="inner">
								<h1>Videojuegos</h1>
								<p>Esta aplicación web contiene dos juegos: Memorizando y Camino sin fin <br />
								Presione "Acerca de" para saber mas o "Iniciar" para acceder</p>
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="#intro">Acerca de</a></li>	
								<li><a href="#ini">Iniciar</a></li>
								<li><a href="#reg">registrarse</a></li>
							</ul>
						</nav>
					</header>
				<!-- Inicio MAIN -->
					<div id="main">
						<!-- Inicio: Acerca de -->
							<article id="intro">
								<h2 class="major">Acerca de los juegos</h2>
					
								<p>Este programa consta de dos juegos, Memorizando: Debes ser capaz de encontrar todas las cartas que son iguales para poder ganar antes de que el tiempo termine, de lo contrario, perderas.</p>
								<p>El camino sin fin: Este juego trata de saltar y evitar los objetos que puedan hacerte daño para obtener la puntuacion mas alta. sin un limite de tiempo ni de vidas. </p>
								<p>Ambos juegos pueden ser repetidas las veces que usted desee</p>							
								<ul class="actions">
									<li><a href="#">Presione aqui para volver</a></li>																	
								</ul>
							</article>						
						<!-- Inicio: iniciar sesion -->
							<article id="ini">
								<h2 class="major">Iniciar sesión</h2>
								<form method="post" action="validar_usuarios.php">
									<div class="fields">
										<div class="field ">
											<label for="name">Usuario</label>
											<input type="text" name="user" id="name" />
										</div>			
										<div class="field">
											<label for="message">Contraseña</label>
											<input type="password" name="pass" id="email" />							
										</div>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Iniciar sesión" class="primary" /></li>									
									</ul>
								</form>							
							</article>

							<article id="reg"> 
								<h2 class="major">Registrarse</h2>
								<form method="post" action="registrar.php">
									<div class="fields">
										<div class="field ">
											<label for="name">Nombre</label>
											<input type="text" name="nombre" id="name" />
										</div>	
										<div class="field ">
											<label for="name">Usuario</label>
											<input type="text" name="user" id="name" />
										</div>												
										<div class="field">
											<label for="message">Contraseña</label>
											<input type="password" name="pass" id="email" />							
										</div>
									</div>
									<ul class="actions">
										<li><input type="submit" value="registrarse" class="primary" /></li>									
									</ul>
								</form>							
							</article>
							
					</div>
				<!-- Fin -->
					<footer id="footer">
						<p class="copyright">&copy; Desarrollado por: <strong>Estudiantes de la universidad latina</strong>.</p>
					</footer>
			</div>
		<!-- Transparencia No-Script -->
			<div id="bg"></div>
		<!-- Scripts JS full -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>
