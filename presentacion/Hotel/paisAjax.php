<?php
$pais = $_GET['pais'];
$ciudad = new Ciudad("",$pais);
$ciudades = $ciudad -> consultarTodos();
?>
<div class="form-group">
						<label>Ciudad</label> 
							<select class="form-control" id="ciudad" name="ciudad" >
								<?php							
								foreach ($ciudades as $p) {
									echo "<option value='" . $p->getIdCiudad() . "'>" . $p->getNombre() . "</option>";

								}
								?>
							</select>
</div>




