<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuAdministrador.php';


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
								
								echo "<td>";
                                    echo "<a href='index.php?pid=" . base64_encode("presentacion/administrador/editarPerfilHotel.php"). "&idHotel=". $h -> getId() .  "'>";
                                    echo "<i class='fas fa-user-edit' data-toggle='tooltip' data-placement='left' title='Editar perfil'></i>";
                                    echo "</a>";
                                    echo "</td>";
                                
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