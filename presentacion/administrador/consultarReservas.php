<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuAdministrador.php';

$reserva = new Reserva();
$registros = $reserva->consultarTodos();

?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-info text-white">Reservas</div>
				<div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Nombre</th>
								<th scope="col">Apellido</th>
								<th scope="col">Correo</th>
								<th scope="col">Direccion</th>
                                <th scope="col">Teléfono</th>
                                

							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($registros as $a){
							    echo "<tr>";
							    
							    echo "<td>" . $a -> getApellido() . "</td>";
							    echo "<td>" . $a -> getCorreo() . "</td>";
                                echo "<td>" . $a -> getDireccion() . "</td>";
                                echo "<td>" . $a -> getTelefono() . "</td>";
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