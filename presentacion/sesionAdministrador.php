<?php 
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuAdministrador.php';
$administrador = new Administrador($_SESSION['id']);
$administrador -> consultar();
?>
<br/>
<br/>
<div class="container">
	<div class="row">
		<div class="col-10">
			<div class="row">
                <div class="col-4">
            </div>
			<div class="col-6">
				<div class="card">
				<div class="card-header text-white" style="background-color: #043727;"  >INFORMACION GENERAL </div>
					<div class="card-body">
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/iniciarSesion.php")?>">
						<div class="form-group">
							<label>Nombre: </label> <label><?php echo $administrador -> getNombre(); ?></label>
						</div>
						<div class="form-group">
							<label>Apellido: </label> <label> <?php echo $administrador -> getApellido(); ?></label>
						</div>
						<div class="form-group">
							<label>Correo: </label> <label> <?php echo $administrador -> getCorreo(); ?></label>
						</div>
						
					</form>
				</div>
			</div>
        </div>
	</div>	
</div>