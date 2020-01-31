<?php
require 'presentacion/menuProveedor.php';
$error = 0;
$proveedor = new Proveedor($_SESSION["id"]);
if (isset($_POST['actualizar'])) {
	$proveedorActualizar = new Proveedor($_SESSION["id"], $_POST['nombre'], $_POST['apellido'], $_POST['correo']);
	$proveedorActualizar -> actualizar();
	header("Location: index.php?pid=" . base64_encode("presentacion/proveedor/editarPerfilProveedor.php") . "&idProveedor=" . $proveedorActualizar -> getId());
}

$proveedor -> consultar();

?>
<br/>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header text-dark" style="background-color: #ffe7b2;">Editar perfil</div>
				<div class="card-body">
					<form method="post"   >
						<div class="form-group">
							<label>Nombre</label> 
                            <input name="nombre" type="text"
								class="form-control" value="<?php echo $proveedor -> getNombre() ?> "
								required="required">
						</div>
						<div class="form-group">
							<label>Apellido</label> <input name="apellido" type="text"
								class="form-control" value="<?php echo $proveedor -> getApellido() ?> "
								required="required">
						</div>
						<div class="form-group" >
							<label>Correo</label> <input name="correo" type="email"
								class="form-control" value="<?php echo $proveedor -> getCorreo() ?> "
								required="required">
						</div>
						<button type="submit" name="actualizar" class="btn btn-warning">Actualizar Datos</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>