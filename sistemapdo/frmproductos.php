<!DOCTYPE html>
<html>
<head>
	<title>Acceso a Datos con PDO</title>
	<meta charset="utf-8">
	<meta name="viewport">
	<link rel="stylesheet" type="text/css" href="">
	<link rel="stylesheet" type="text/css" href="">
	<script type="text/javascript"></script>
</head>
<body>
	<header></header>
	<main>
		<section>
			<?php
				//PDO: Servidor, bd, usuario, pass
				//Cada dato que requiere PDO sera una variable PhP
				$servidor = "localhost"; // Nombre o IP
				$bd= "sistema";
				$user = "root";
				$pass = "";

				// Para conectarno a la bd debemos Crear una instancia PDO

				// $cn = new PDO("mysql:host=localhost; dbname=sistema, root, ''")

				$cn = new PDO("mysql:host=".$servidor."; dbname=".$bd,$user,$pass);
				echo "Acceso a base de datos sistema Exitoso!!";


			?>
			
		</section>
	</main>
	<footer></footer>
	<script type="text/javascript"></script>
</body>
</html>












