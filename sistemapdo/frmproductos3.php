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
				// Capturar datos del formulario
				$cod=$_POST['txtCod'];
				$nom=$_POST['txtNom'];
				$des=$_POST['txtDes'];
				$pre=$_POST['txtPre'];
				$img=$_POST['txtImg'];
				/********************/

				include "componentes.php";
				$objConexion = new Conexion("localhost", "sistema", "root", "");
				$cnSistema = $objConexion->Conectar();

				// Ejecutar el Procedimiento almacenado (sp) sp_Create
				// $cnSitema es mi objeto de conexion PDO
				// Para ejecutar un sp necesito un objeto de la clase PDOStatement
				// Metodo prepare() de objeto PDO permite preparar un sp para su ejecucio y crear un objeto del tipo PDOStatement

				$stmProd = $cnSistema->prepare("call sp_Create(:dato1, :dato2, :dato3, :dato4, :dato5)");

				// Asignar Valores a los parametros de entreda
				$stmProd->bindParam(':dato1',$cod );
				$stmProd->bindParam(':dato2',$nom );
				$stmProd->bindParam(':dato3',$des );
				$stmProd->bindParam(':dato4',$pre );
				$stmProd->bindParam(':dato5',$img);

				$stmProd->execute();
			}

			?>
			
		</section>
	</main>
	<footer></footer>
	<script type="text/javascript"></script>
</body>
</html>












