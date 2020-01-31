<?php 
include 'presentacion/menuProveedor.php';
$proveedor = new Proveedor($_SESSION['id']);
$proveedor -> consultar();
?>
<BR/>
<BR/>
<div class="container">
	<div class="row">
		<div class="col-10">
			<div class="row">
                <div class="col-4">
            </div>
			<div class="col-6">
				<div class="card">
				<div class="card-header" style="background-color: #ffe7b2;">INFORMACION GENERAL</div>
					<div class="card-body">
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/iniciarSesion.php")?>">
						<div class="form-group">
							<label>Nombre: </label> <label><?php echo $proveedor -> getNombre(); ?></label>
						</div>
						<div class="form-group">
							<label>Apellido: </label> <label> <?php echo $proveedor -> getApellido(); ?></label>
						</div>
						<div class="form-group">
							<label>Correo: </label> <label> <?php echo $proveedor -> getCorreo(); ?></label>
						</div>
					</form>
				</div>
			</div>
        </div>
	</div>	
</div>
