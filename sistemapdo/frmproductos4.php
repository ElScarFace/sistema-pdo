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
			<form method="POST" action="">
				<p><input type="text" name="txtCod"></p>
				<p><input type="text" name="txtNom"></p>
				<p><input type="text" name="txtDes"></p>
				<p><input type="number" name="txtPre"></p>
				<p><input type="text" name="txtImg"></p>
				<p><button type="submit">Enviar Datos</button></p>
			</form>
			<?php
			if($_POST){
				//llamar los datos de componentes
			include "componentes.php";
			//instanciar de la clase conexion 
			$objCn = new Conexion("localhost", "sistema", "root", "");
			$objPDO = $objCn->Conectar();

			//instanciar la clase productos
			$objProducto = new Producto();
			$objProducto->Pdo=$objPDO;
			$objProducto->Codigo=$_POST["txtCod"];
			$objProducto->Nombre=$_POST["txtNom"];
			$objProducto->Descripcion=$_POST["txtDes"];
			$objProducto->Precio=$_POST["txtPre"];
			$objProducto->Imagen=$_POST["txtImg"];

			//EJECUTAR EL METODO CREATE: EJECUTE EL SP-CREATE: grabar los datosen la base tabla productos
			//$objProducto->Create($objPDO);

			//usar el metodo create mejorado
			$objProducto->Createi();
			echo $objProducto->message;



			}

			?>
			
		</section>
	</main>
	<footer></footer>
	<script type="text/javascript"></script>
</body>
</html>












