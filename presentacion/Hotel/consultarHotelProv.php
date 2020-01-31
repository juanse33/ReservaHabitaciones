<?php
include 'presentacion/menuProveedor.php';
?>
<br/>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header text-dark" style="background-color: #ffe7b2;">Consultar Proveedor</div>
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
			var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/Hotel/consultarHotelProvAjax.php") . "&idProveedor=". $_SESSION["id"] ?>&filtro="+$("#filtro").val() ;
			$("#resultados").load(ruta);
		}
	});
});
</script>k 