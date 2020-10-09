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
				// Crear una instancia de la clase Conexion
				include "componentes.php";
				$objConexion = new Conexion("localhost", "sistema", "root", "");
				
				/* Asignar datos a sus campos
				$objConexion->Servidor="localhost";
				$objConexion->BaseDatos="sistema";
				$objConexion->Usuario="root";
				$objConexion->Password="";*/

				$objConexion->Conectar();

				if ($objConexion->Respuesta) {
					echo "Conexion Exitosa!!!";
				}




			?>
			
		</section>
	</main>
	<footer></footer>
	<script type="text/javascript"></script>
</body>
</html>












