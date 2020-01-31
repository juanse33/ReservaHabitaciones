<?php

require 'presentacion/menuUsuario.php';
$error = 0;
$usuario = new Usuario($_SESSION["id"]);
if (isset($_POST['actualizar'])) {
	$usuarioActualizar = new Usuario($_SESSION["id"], $_POST['nombre'], $_POST['apellido'], $_POST['correo']);
	$usuarioActualizar -> actualizar();
	 header("Location: index.php?pid=" . base64_encode("presentacion/usuario/editarPerfilUsuario.php") . "&idUsuario=" . $usuarioActualizar -> getId());
}

$usuario -> consultar();

?>
<br/>
<br/>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header  text-white" style="background-color:#4F066C;">Editar perfil</div>
				<div class="card-body">
					<form method="post"  action= >
						<div class="form-group">
							<label>Nombre</label> 
                            <input name="nombre" type="text"
								class="form-control" value="<?php echo $usuario -> getNombre() ?> "
								required="required">
						</div>
						<div class="form-group">
							<label>Apellido</label> <input name="apellido" type="text"
								class="form-control" value="<?php echo $usuario -> getApellido() ?> "
								required="required">
						</div>
						<div class="form-group" >
							<label>Correo</label> <input name="correo" type="email"
								class="form-control" value="<?php echo $usuario -> getCorreo() ?> "
								required="required">
						</div>
						<button type="submit" name="actualizar" class="btn text-white" style="background-color:#4F066C;">Actualizar Datos</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>