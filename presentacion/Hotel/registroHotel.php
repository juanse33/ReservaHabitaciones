<?php
include 'presentacion/menuProveedor.php';
$error = 0;
$pais = new Pais();
								
if (isset($_POST['registrarHotel'])) {
	$proveedor = new Proveedor("", "", "", $_POST['correo'], "");
	$hotel = new Hotel("", $_POST['nombre'], $_POST['direccion'], $_POST['correo'], $_SESSION['id'], $_POST['ciudad']);
	$administrador = new Administrador("", "", "", $_POST['correo']);
	$usuario = new Usuario("", "", "", $_POST['correo']);

	if (!$administrador->existeCorreo()) {
		if (!$usuario->existeCorreo()) {
			if (!$proveedor->existeCorreo()) {
				if (!$hotel->existeCorreo()) {
					$hotel->insertar();
					//header("Location:index.php?pid=" . base64_encode("presentacion/hotel/registroHotel.php"));
				} else {
					$error = 1;
				}
			} else {
				$error = 1;
			}
		} else {
			$error = 1;
		}
	} else {
		$error = 1;
	}
}
?>
<br/>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header ext-white" style="background-color: #ffe7b2;">Registro hotel</div>
				<div class="card-body">
					<?php if (isset($_POST['registrarHotel'])) { ?>
						<div class="alert alert-<?php echo ($error == 0) ? "success" : "danger" ?> alert-dismissible fade show" role="alert">
							<?php echo ($error == 0) ? "Registro exitoso" : $_POST['correo'] . " ya existe"; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php } ?>
					<form method="post">
						<div class="form-group">
							<label>Nombre</label> <input name="nombre" type="text" class="form-control" placeholder="Digite Nombre" required="required">
						</div>
						
						<div class="form-group">
							<label>Direccion</label> <input name="direccion" type="text" class="form-control" placeholder="Digite direccion">
						</div>

						<div class="form-group">
							<label>Correo</label> <input name="correo" type="email" class="form-control" placeholder="Digite Correo" required="required">
						</div>
						<div class="form-group">
						<label>Ciudad</label>
						<input type="text" class="form-control" placeholder="Ciudad Destino"
						name="ciudad" id="ciudad">
  							
						
							<!--</select>-->
							</div>		
							<div class="form-group">
									<br/>
								<button type="submit" name="registrarHotel" id="registrarHotel" class="btn btn-warning">Registrar Hotel</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>