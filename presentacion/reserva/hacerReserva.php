<?php
include 'presentacion/menuUsuario.php';
$hotel = new Hotel("", "", "", "", "", $_POST["idCiudad"]);
$hoteles = $hotel -> consultarTodos();
$fecha1 = new DateTime($_POST["fecha_entrada"]);
$fecha2 = new DateTime($_POST["fecha_salida"]);
$resultado = $fecha1->diff($fecha2);
$dias = $resultado->format('%r%a');
$valor = "";
$bandera = "";
$habitacionesdisponibles="";
$resta ="";


?>
<br/>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header  text-black" style="background-color: #E2F896;">RESERVA</div>
				<div class="card-body">
						<body>
							<?php
									
									foreach ($hoteles as $h){
										$habitacion = new Habitacion("", "", $h -> getId(), $_POST["capacidad"]);
										$habitaciones = $habitacion -> consultarCapacidad();
										$reserva = new Reserva("", "",  $_POST["capacidad"], "", $h -> getId());
										$reservasExis = $reserva -> consultar();
										$reserva = new Reserva($_POST["fecha_entrada"], $_POST["fecha_salida"],  $_POST["capacidad"], "", $h -> getId());
										$reservas = $reserva -> consultarDisponibilidad();
										$habitacionesdisponibles = count($habitaciones) - count($reservas);
										foreach ($habitaciones as $a)
										{
											$valor = $dias * $a -> getPrecio(); 
										} 
										foreach ($reservasExis as $re){
											if(count($reservasExis) != 0){
												if($re -> getFecha_salida() > $_POST["fecha_entrada"]){
													$resta = count($reservasExis) - count($habitaciones);
													echo "xd ". $resta;
												}else{
													$resta = $habitacionesdisponibles;
												}
											}else{
												$resta = $habitacionesdisponibles;
											}
										}
										
										if($resta != 0)
											{
												echo "<div class='card-group'>";
												echo "<div class='card-body'>";
												echo "<strong> Hotel      " . $h -> getNombre() . "</strong>";
												echo "<h6> Direccion:      " . $h -> getDireccion() . "</h6>";
												echo "<h6> Proveedor:      " . $h -> getProveedor() -> getNombre() . "</h6>";
												echo "<h6> Ciudad:      " . $h -> getCiudad() -> getNombre() . "</h6>";
												echo "</div>";
												echo "<div class='row'>";
												echo "<div class='card-body'>";
												echo "<h6> Habitaciones disponibles:      " . $resta . "</h6>";
												echo "<h6> Precio Total:      " . $valor . "</h6>";

												echo "<a class='btn btn-outline-warning' href='index.php?pid=" . base64_encode("presentacion/reserva/confirmacionReserva.php") . "&fecha_entrada=" . $_POST["fecha_entrada"] . "&fecha_salida=" . $_POST["fecha_salida"] . "&num_personas=" . $_POST["capacidad"] ."&idhotel=" . $h -> getId() ."'>Reservar</a>";												

												echo "</div>";
												echo "</div>";
												echo "</div>";
											}    
										}	
													
									
									if((count($hoteles)) == 0){
										echo "<div class='alert alert-danger ' role='alert' >No se encontraron resultados</div>";
										echo "<div class='col text-center'>";
										echo "<a class='btn btn-outline-danger' href='index.php?pid=" . base64_encode("presentacion/reserva/reserva.php"). "'>Volver</a>";											
										echo "</div>";
									} 
							?>	
						</body>


				</div>
			</div>
		</div>
	</div>
</div>