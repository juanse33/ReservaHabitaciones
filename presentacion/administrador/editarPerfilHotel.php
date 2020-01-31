<?php
require 'presentacion/menuAdministrador.php';
$hotel = new Hotel($_GET['idHotel']);
if (isset($_POST['actualizar'])) {
	$hotelActualizar = new Hotel ($_GET['idHotel'], $_POST['nombre'], $_POST['correo'], "", $_POST['direccion'], $_POST['cantidad_habitaciones'], $_POST['cantidad_habitaciones_disponibles'], $_POST['valor_habitacion']);
	$hotelActualizar -> actualizar();
	header("Location: index.php?pid=" . base64_encode("presentacion/administrador/editarPerfilHotel.php") . "&idHotel=" . $hotel -> getId());
}
 
$hotel -> consultar();

?>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header bg-primary text-white">Editar perfil</div>
				<div class="card-body">
					<form method="post"   >
						<div class="form-group">
							<label>Nombre</label> 
                            <input name="nombre" type="text"
								class="form-control" value="<?php echo $hotel -> getNombre() ?> "
								required="required">
						</div>
						<div class="form-group">
							<label>Correo</label> <input name="correo" type="email"
								class="form-control" value="<?php echo $hotel -> getCorreo() ?> "
								required="required">
						</div>
						<div class="form-group" >
							<label>Direccion</label> <input name="direccion" type="text"
								class="form-control" value="<?php echo $hotel -> getDireccion() ?> "
								required="required">
						</div>
                        <div class="form-group">
							<label>Cantidad habitaciones</label> <input name="cantidad_habitaciones" type="text"
								class="form-control" value="<?php echo $hotel -> getCantidad_habitaciones() ?> "
								required="required">
						</div>
                        <div class="form-group">
							<label>Cantidad habitaciones disponibles</label> <input name="cantidad_habitaciones_disponibles" type="text"
								class="form-control" value="<?php echo $hotel -> getCantidad_habitaciones_disponibles() ?> "
								required="required">
						</div>
					<!--	<div class="form-group">
							<label>Valor</label> <input name="valor_habitacion" type="text"
								class="form-control" value="<?php echo $hotel -> getValorHabitacion() ?> "
								required="required">
						</div> -->
						<button type="submit" name="actualizar" class="btn btn-primary">Actualizar Datos</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>