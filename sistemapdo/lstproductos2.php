<!DOCTYPE html>
<html>
<head>
	<title>Acceso a Datos con PDO</title>
	<meta charset="utf-8">
	<meta name="viewport">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
				$cn = new Conexion("localhost","sistema","root", "");
				$objPdo = $cn->Conectar();

				$objProd = new Producto();
				$objProd->Pdo = $objPdo;

				$objConsulta = $objProd->Vista();

			?>	
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Nro</th>
						<th scope="col">Codigo</th>
						<th scope="col">Nombre</th>
						<th scope="col">Descripcion</th>
						<th scope="col">Precio</th>
						<th scope="col">Imagen</th>
						<th scope="col">Editar</th>
						<th scope="col">Eliminar</th>
						<th scope="col">Ver</th>
						


					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($objConsulta as $Fila) {
						echo "<tr>
						<td>$Fila->Nro</td>
						<td>$Fila->Codigo</td>
						<td>$Fila->Nombre</td>
						<td>$Fila->Descripcion</td>
						<td>$Fila->Precio</td>
						<td>$Fila->imagen</td>
						<td>u</td>
						<td><a href='eliminar.php?var=$Fila->Nro'>x</a></td>
						<td>v</td>


						</tr>";
					}

					?>
					

				</tbody>
				<tfoot></tfoot>
			</table>		
		</section>
	</main>
	<footer></footer>
	<script type="text/javascript"></script>
</body>
</html>