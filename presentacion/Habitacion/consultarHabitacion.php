<?php
include 'presentacion/validacionProveedor.php';
include 'presentacion/menuProveedor.php';
$habitacion = new Habitacion("", "", $_GET["idHotel"]);
$registros = $habitacion -> consultarTodos();
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-info text-white">Consultar Habitacion</div>
				<div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Numero</th>
								<th scope="col">Numero maximo de personas</th>
								<th scope="col">Precio</th>
								<th scope="col">Hotel</th>
								</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($registros as $h){
							    echo "<tr>";
							    echo "<td>" . $h -> getNumero() . "</td>";
							    echo "<td>" . $h -> getNum_personas() . "</td>";
								echo "<td>" . $h -> getPrecio() . "</td>";
								echo "<td>" . $h -> getHotel() -> getNombre() . "</td>";
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