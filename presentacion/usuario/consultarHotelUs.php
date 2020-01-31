<?php

include 'presentacion/menuUsuario.php';
include 'logica/Hotel.php';	

$hotelActualizar = new Hotel();
$registros = $hotelActualizar -> consultarTodos();

?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-info text-white">Consultar Hotel</div>
				<div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Direccion</th>
								<th scope="col">Num. Habitaciones</th>
                                <th scope="col">Num Hab. Disponibles</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Pais</th>
								<th></th>

							</tr>
						</thead>	
						<tbody>
							<?php 
							foreach ($registros as $h){
								echo "<tr>";
							    echo "<td>" . $h -> getNombre() . "</td>";
							   	echo "<td>" . $h -> getCorreo() . "</td>";
                                echo "<td>" . $h -> getDireccion() . "</td>";
								echo "<td>" . $h -> getCantidad_habitaciones() . "</td>";
								echo "<td>" . $h -> getCantidad_habitaciones_disponibles() . "</td>";
								echo "<td>" . $h -> getValorHabitacion() . "</td>";
								echo "<td>" . $h -> getCiudad() . "</td>";
								echo "<td>" . $h -> getPais() . "</td>";
                                
								echo "<td>";
								echo "<td>";
								
								echo "</td>";
								    
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