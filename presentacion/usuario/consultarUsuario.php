<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuAdministrador.php';
if(isset($_GET['idUsuario'])){
    $usuarioEstado = new Usuario($_GET['idUsuario'],"","","","",$_GET['estado']);
    $usuarioEstado->cambiarEstado();
}
$usuario = new Usuario();
$registros = $usuario->consultarTodos();

?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header text-white" style="background-color: #043727 ;">Consultar Cliente</div>
				<div class="card-body">
					<div class="form-group">
						<label>Filtro</label> <input name="filtro" id="filtro" type="text"
							class="form-control" placeholder="Digite valor" >
					</div>
					<div id="resultados"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#filtro").keyup(function(){
		if($("#filtro").val()!=""){
			var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/usuario/consultarUsuarioAjax.php"); ?>&filtro="+$("#filtro").val();
			$("#resultados").load(ruta);
		}
	});
});
</script>