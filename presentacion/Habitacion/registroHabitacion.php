<?php
include 'presentacion/menuProveedor.php';
$error = 0;

if(isset($_POST['registrar']))
{	
	$habitacion = new Habitacion("", $_POST["numero"], $_GET["idHotel"], $_POST["num_personas"], $_POST["precio"]);
	$habitacion -> insertar();
	echo $_GET["idHotel"];
	//header( "Location:index.php?pid=". base64_encode("presentacion/registroProveedor.php"));
}else{
        $error = 1;
     }
?>
<br/>
<div class="container text-white">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header bg-danger text-white">Registro Habitacion</div>
				<div class="card-body text-body">
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
					<form method="post">
						<div class="form-group">
							<label>Numero habitacion</label> <input name="numero" type="text"
								class="form-control" placeholder="Digite numero de habitacion"
								required="required">
						</div>
						<label>Numero maximo de personas</label> 
							<select class="form-control" name="num_personas" >
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						<div class="form-group">
							<label>Precio</label> <input name="precio" type="text"
								class="form-control" placeholder="Digite precio habitacion"
								required="required">
						</div>						
						<button type="submit" name="registrar" class="btn btn-danger" >Registrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


