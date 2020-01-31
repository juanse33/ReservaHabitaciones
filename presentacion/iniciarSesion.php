<?php
include 'presentacion/header.php';

$correo = "";
if (isset($_POST['correo'])) {  
    $correo = $_POST['correo'];
}
$clave = "";
if (isset($_POST['clave'])) {
    $clave = $_POST['clave'];
}
$error = 0;
if(isset($_POST['autenticar'])){
    echo "Entra 1";
    $administrador = new Administrador("", "", "", $correo, $clave);
    if ($administrador -> autenticar()){
        echo "Entra 2";        
            echo "Entra 3";
            $_SESSION['id'] = $administrador -> getId();
            $_SESSION['rol'] = "administrador";
            $pid = base64_encode("presentacion/sesionAdministrador.php");
            header('Location: index.php?pid='. $pid);           
        }
     else {
        $usuario = new Usuario("", "", "", $correo, $clave);
        if ($usuario -> autenticar()) {
            if($usuario -> getEstado()==1){
            $_SESSION['id'] = $usuario -> getId();
            $_SESSION['rol'] = "usuario";
            $pid = base64_encode("presentacion/sesionUsuario.php");
            header('Location: index.php?pid='. $pid);
            }else{
                $error=1;
            }
        }else{
            $proveedor = new Proveedor("", "", "" ,$correo,$clave);
            if($proveedor -> autenticar()){
                if($proveedor -> getEstado()==1){
                    $_SESSION['id'] = $proveedor -> getId();
                    $_SESSION['rol'] = "proveedor";
                    $pid = base64_encode("presentacion/sesionProveedor.php");
                    header('Location: index.php?pid='. $pid);  
                }
                else{
                    $error=1;
                }
            }
        }
    }
}
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
            <div class="card-header col text-center" style="background-color: #ffe7b2;">INICIA SESION!!!!</div>
								<div class="card-body">
									<?php if ($error == 1) { ?>
									<div class="alert alert-danger alert-dismissible fade show"
										role="alert">
										Error de correo o clave
										<button type="button" class="close" data-dismiss="alert"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<?php } else if ($error == 2) { ?>
									<div class="alert alert-danger alert-dismissible fade show"
										role="alert">
										Usuario inhabilitado
										<button type="button" class="close" data-dismiss="alert"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<?php } ?>
									<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/iniciarSesion.php")?>">
										<div class="form-group">
											<label>Correo</label> <input name="correo" type="email"
												class="form-control" placeholder="Digite Correo" required="required">
										</div>
										<div class="form-group">
											<label>Clave</label> <input name="clave" type="password"
												class="form-control" placeholder="Clave" required="required">
										</div>
										<button type="submit" name="autenticar" class="btn text-black" style="background-color: #ffe7b2;">Autenticar</button>
									</form>
								</div>
			</div>
        </div>
	</div>	
</div>

