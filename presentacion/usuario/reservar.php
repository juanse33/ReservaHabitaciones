<?php
include 'presentacion/menuUsuario.php';
?>

<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-body">
					<?php if (isset($_POST['registrar'])) { ?>
					<div class="alert alert-<?php echo ($error==0) ? "success" : "danger" ?> alert-dismissible fade show"
						role="alert">
						<?php echo ($error==0) ? "Registro exitoso" : $_POST['correo'] . " ya existe"; ?>
						<button type="button" class="close" data-dismiss="alert"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/reservar.php") ?>">
						<div class="form-group">
							<label>Fecha de entrada</label> <input name="nombre" type="date"
								class="form-control" 
								required="required">
						</div>
						<div class="form-group">
							<label>Fecha de salida</label> <input name="apellido" type="date"
								class="form-control" 
								required="required">
						
                        <div class="form-group">
							<label>Seleccione habitaciones</label>
                            <select class="form-control" name="habitaciones">
                            <option value="1">1</option>
                            <option value="1">1</option>
                            <option value="1">1</option>
                            <option value="1">1</option>
						</div>
                        </div>
                        <!--<div class="form-group">
							<label>Seleccione Hotel</label> 
							<select class="form-control"
								name="hotel">
								<?php
								$hotel = new Hotel();
								$hoteles = $hotel -> consultarTodos();
								foreach ($hotel as $h){
								    echo "<option value='" . $h -> getId() . "'>" . $h -> getNombre() . " - " . $h -> getCiudad() . "</option>";
								}
								?>
							</select>
						</div> -->

					
						
						
						<button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>