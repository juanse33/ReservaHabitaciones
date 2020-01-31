<?php
$filtro = $_GET['filtro'];
$hotel = new Hotel();
$hoteles = $hotel -> buscar($filtro);
if(count($hoteles)>0){
?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Direccion</th>
			<th>Correo</th>
			<th>Proveedor</th>
			<th>Ciudad</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php
	    foreach ($hoteles as $h) {
	        echo "<tr>";
	        echo "<td>" . $h -> getNombre() . "</td>";
	        echo "<td>" . $h -> getDireccion() . "</td>";
	        echo "<td>" . $h -> getCorreo() . "</td>";
			echo "<td>" . $h -> getProveedor() -> getNombre() . "</td>";
			echo "<td>" . $h -> getCiudad() -> getNombre() ." - ". $h -> getCiudad() -> getPais() -> getNombre() ."</td>";
	        echo "</td>";
	        echo "</tr>";
	    }				
	    echo "<tr><td colspan='6'><strong>" . count($hoteles) . " registros encontrados</strong></td></tr>";
    ?>
	</tbody>
</table>
<?php } else { ?>
<div class="alert alert-danger alert-dismissible fade show"
	role="alert">
	No se encontraron resultados
	<button type="button" class="close" data-dismiss="alert"
		aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<?php } ?>
