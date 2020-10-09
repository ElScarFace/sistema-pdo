<?php
	$nro = $_GET["var"];
	include "componentes.php";
	$cn = new Conexion("localhost", "sistema", "root", "");
	$cnPdo = $cn->Conectar();

	$objProd = new Producto();
	$objProd->Pdo = $cnPdo;
	$objProd->Delete($nro);
	header('location: lstproductos2.php');

?>