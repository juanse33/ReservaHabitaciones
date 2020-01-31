<?php 
include 'presentacion/validacionUsuario.php';
include 'presentacion/menuUsuario.php';
$usuario = new Usuario($_SESSION['id']);
$usuario -> consultar();
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
				<div class="card-header text-white" style="background-color:#4F066C;"><h6>INFORMACION GENERAL</h6></div>
					<div class="card-body">                
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/iniciarSesion.php")?>">
						<div class="form-group">
							<label>Nombre: </label> <label><?php echo $usuario -> getNombre(); ?></label>
						</div>
						<div class="form-group">
							<label>Apellido: </label> <label> <?php echo $usuario -> getApellido(); ?></label>
						</div>
						<div class="form-group">
							<label>Correo: </label> <label> <?php echo $usuario -> getCorreo(); ?></label>
						</div>
						
					</form>
				</div>
			</div>
            
        </div>
	</div>	
</div>