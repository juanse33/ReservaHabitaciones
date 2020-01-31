<?php
include 'presentacion/menuUsuario.php';
$pais = new Pais();
if(isset($_POST["buscar"]))

if($dias > 0){
	header("Location: index.php?pid=" . base64_encode("presentacion/reserva/hacerReserva.php") );
}
?>

<br/>



<div class="container">
	<div class="row">
		<div class="col-10">
			<div class="row">
                <div class="col-4">
            </div>
			<div class="col-6">
				<div class="card">
					<div class="card-body">
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/reserva/hacerReserva.php") ?>">
					
						<div class="form-group">
						<label>Ciudad</label>
						<input type="text" class="form-control" placeholder="Ciudad Destino"
						name="ciudad" id="ciudad">
						<input name="idCiudad" id="idCiudad" type="hidden" class="form-control">
						<div id="resultados"></div>
						</div>  
						<div class="form-group">
						<label>Ida</label><input type="date" class="form-control" name="fecha_entrada">
						</div>
						<div class="form-group">
						<label>Vuelta</label><input type="text" class="form-control"  placeholder="Ciudad Destino" name="fecha_salida">
						</div>
						<div class="form-group">
							<div class="form-group">
								<label>Personas</label>
								<select class="form-control" name="capacidad">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								</select>
							</div>
						</div>
						
						<div class="col text-center">
						<label></label><br/>
						<button type="submit" name="buscar" class="btn text-black" style="background-color: #E2F896;" >Buscar</button>
						</div>
					
					</form>
				
				</div>
			</div>
        </div>
	</div>	
</div>

<br/><br/>
<script type="text/javascript">
$(document).ready(function(){
	$("#ciudad").keyup(function(){
		if($("#ciudad").val()!=""){
			var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/reserva/ciudadReservaAjax.php"); ?>&ciudad="+$("#ciudad").val();
			$("#resultados").load(ruta)
		}
	});
 	$("#ciudad").focusout(function(){
		var ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/reserva/ciudadReservaAjax.php"); ?>&ciudad=-1";
 		$("#resultados").load();
 	});
	
});
</script>

<br/>
<br/>
<br/>
	<div class="card-group">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title col text-center">Hoteles</h5>
      <img src="img/hotel.jpg" class="card-img-top" alt="..."> 
      <br/><br/><p class="card-text">Encuentra el hotel que mejor se acomoda a tu viaje. Hoteles en todo el mundo!!!!</p>
    </div>
  </div>
  <div class="card">
  <div class="card-body">
      <h5 class="card-title col text-center">Ciudades</h5>
      <img src="img/cartagena.jpg" class="card-img-top" alt="..."> 
      <br/><br/><p class="card-text">Los mejores destinos turisticos estan disponibles en nuestra plataforma, para que te des tus merecida vacaciones.</p>
    </div>
  </div>
  <div class="card">
  <div class="card-body">
      <h5 class="card-title col text-center">Precios</h5>
      <img src="img/vaca.jpg" class="card-img-top" alt="..."> 
      <br/><br/><p class="card-text">Los mejores precios los encontraras aca, consultamos en miles de hoteles y te damos las mejores posibilidades, Disfruta!!!!</p>
    </div>
  </div>
  
  </div>

