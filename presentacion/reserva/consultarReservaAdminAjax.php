<?php
$filtro = $_GET['filtro'];
$reserva = new Reserva();
$registros = $reserva -> buscar($filtro);
if(count($registros)>0){
?>
<br/>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">

				<div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Fecha de entrada</th>
								<th scope="col">Fecha de salida</th>
								<th scope="col">Numero personas</th>
								<th scope="col">Hotel</th>
								<th scope="col">Usuario</th>
								<th scope="col">Precio</th>
								</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($registros as $h){
							    echo "<tr>";
							    echo "<td>" . $h -> getFecha_entrada() . "</td>";
							    echo "<td>" . $h -> getFecha_salida() . "</td>";
								echo "<td>" . $h -> getNum_personas() . "</td>";
								echo "<td>" . $h -> getHotel() -> getNombre() . "</td>";
								echo "<td>" . $h -> getUsuario() -> getNombre() . "</td>";
								echo "<td>" . $h -> getPrecio() . "</td>";
							    echo "</tr>";
							}							
							?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
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