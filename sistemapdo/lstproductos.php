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
	<header>Listado de Productos</header>
	<main>
		<section>
			<?php
				include "componentes.php";
				// Instanciar la clase Conexion
				$objPDO = new Conexion("localhost","sistema","root", "");
				$cn = $objPDO->Conectar();

				// Instanciar la clase Producto
				$objProd = new Producto();
				$objProd->Pdo = $cn;

				echo "<p>Imprimir datos mediante metodo Vista()</p>";
				// Ejecutar el metodo Vista
				$consulta = $objProd->Vista();
				// Recorrer el objeto $consulta e imprmir los datos
				foreach ($consulta as $Fila) {
					echo "<p>Produto $Fila->Nro - 
								  $Fila->Nombre - 
								  $Fila->Descripcion - 
								  $Fila->Precio - 
								  $Fila->imagen</p>";
				}

				echo "<p>Imprimir datos mediante campo Vista() ejecutando el metodo Vistai()</p>";
				// Ejecutar el metodo Vistai
				$objProd->Vistai();
				// Recorrer el objeto el campo Vista e imprmir los datos
				foreach ($objProd->Listado as $Fila) {
					echo "<p>Produto $Fila->Nro - 
								  $Fila->Nombre - 
								  $Fila->Descripcion - 
								  $Fila->Precio - 
								  $Fila->imagen</p>";
				}

			?>			
		</section>
	</main>
	<footer></footer>
	<script type="text/javascript"></script>
</body>
</html>












