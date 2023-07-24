<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/boton_al_lado.css">
	<link rel="stylesheet" href="../css/detalles.css">
</head>

<body>

	<?php
	include "database.php";
	$datos = $con->query("select * from person");
	?>

	<div class="contenedor">
		<form method="post" id="addproduct" action="import.php" enctype="multipart/form-data" role="form">
			<label class="boton">Archivo (.xlsx)*</label>
			<input type="file" name="name" id="name" class="boton" placeholder="Archivo (.xlsx)">
			<button type="submit" class="boton">Importar Datos</button>
		</form>
		&nbsp;
		<form action="borrar_tabla.php">
			<button type="submit" class="boton">Limpiar DDBB</button>
		</form>
		<!-- 
		<form action="exportar_tabla.php">
				<button type="submit" class="boton" target="_blank" rel="noopener noreferrer">Exportar</button> 
			</form>
		-->
		<a href="exportar_tabla.php" class="boton">Exportar</a>
	</div>


	<?php if ($datos->num_rows > 0) : ?>

		<p>Resultados <?php echo $datos->num_rows; ?></p>
		<table border="1">
			<thead>
				<th>Viaje No.</th>
				<th>Direccion inicio</th>
				<th>Estado</th>
				<th>Nom Pasajero</th>
				<th>Cel pasajero</th>
				<th>Movil</th>
				<th>Nom Chofer</th>
				<th>DNI</th>
				<th>Marca</th>
				<th>Patente</th>
				<th>CC</th>
				<th>Traslado</th>
				<th>Siniestro</th>
				<th>Solicitado</th>
				<th>Completado</th>
				<th>Destino</th>
				<th>Reloj</th>
				<th>Peaje</th>
				<th>Equipaje</th>
				<th>Adicional</th>
				<th>Plus</th>
				<th>Total</th>
				<td>Operador</td>
				<th>Fecha de creacion</th>
			</thead>
			<?php while ($d = $datos->fetch_object()) : ?>
				<tr>
					<td><?php echo $d->no; ?></td>
					<td><?php echo $d->name; ?></td>
					<td><?php echo $d->estado;  ?></td>
					<td><?php echo $d->address1; ?></td>
					<td><?php echo $d->address2; ?>sd</td>
					<td><?php echo $d->email1; ?></td>
					<td><?php echo $d->phone1; ?></td>
					<td><?php echo $d->phone2; ?></td>
					<td><?php echo $d->marca; ?></td>
					<td><?php echo $d->patente; ?></td>
					<td><?php echo $d->cc; ?></td>
					<td><?php echo $d->traslado; ?></td>
					<td><?php echo $d->siniestro; ?></td>
					<td><?php echo $d->solicitado; ?></td>
					<td><?php echo $d->completado; ?></td>
					<td><?php echo $d->destino; ?></td>
					<td><?php echo $d->reloj; ?></td>
					<td><?php echo $d->peaje; ?></td>
					<td><?php echo $d->equipaje; ?></td>
					<td><?php echo $d->adicional; ?></td>
					<td><?php echo $d->plus; ?></td>
					<td><?php echo $d->total; ?></td>
					<td><?php echo $d->operador; ?></td>
					<td><?php echo $d->created_at; ?></td>
				</tr>

			<?php endwhile; ?>
		</table>
	<?php else : ?>
		<h3>No hay Datos</h3>
	<?php endif; ?>

</body>

</html>