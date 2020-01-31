<?php
$filtro = $_GET['filtro'];
$usuario = new Usuario();
$usuarios = $usuario -> buscar($filtro);
if(count($usuarios)>0){
?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Correo</th>
			<th>Estado</th>
			<th>Fecha de registro</th>
			<th>Fecha de actualizacion</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php
	    foreach ($usuarios as $u) {
			echo "<tr>";
	        echo "<td>" . $u -> getNombre() . "</td>";
	        echo "<td>" . $u -> getApellido() . "</td>";
	        echo "<td>" . $u -> getCorreo() . "</td>";
			echo "<td><div id='estado".$u->getId()."'>" . $u -> getEstado() . "</div></td>";
			echo "<td>" . $u -> getFechaRegistro() . "</td>";
			echo "<td>" . $u -> getFechaActualizacion() . "</td>";
	        echo "<td>";
	        if($u -> getEstado() == 1){
	            echo "<a id='cambiarEstado".$u->getId()."' href='#'>";
	            echo "<div id='iconoEstado".$u->getId()."'><i id='icono".$u->getId()."' class='fas fa-user-times' data-toggle='tooltip' data-placement='left' title='Deshabilitar'></i></div>";
	            echo "</a>";
	        }else{
	            echo "<a id='cambiarEstado".$u->getId()."' href='#'>";
	            echo "<div id='iconoEstado".$u->getId()."'><i id='icono".$u->getId()."' class='fas fa-user-check' data-toggle='tooltip' data-placement='left' title='Habilitar'></i></div>";
	            echo "</a>";
	        }
	        echo "</td>";
	        echo "</tr>";
	    }				
	    echo "<tr><td colspan='6'><strong>" . count($usuarios) . " registros encontrados</strong></td></tr>";
    ?>
	</tbody>
</table>
<?php } else { ?>
<div class="alert alert-danger alert-dismissible fade show"
	role="alert">
	No se encontraron resultados
	<button type="button" class="close" data-dismiss="alert"
		aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<?php } ?>
<script>
$(document).ready(function(){
<?php 
foreach ($usuarios as $u) {
    echo "$(\"#cambiarEstado".$u->getId()."\").click(function(){\n";
    echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/usuario/cambiarEstadoUsuarioAjax.php") . "&idUsuario=".$u->getId(). "\";\n";
    echo "$(\"#estado".$u->getId()."\").load(ruta);\n";
    echo "$(\"#icono".$u->getId()."\").tooltip('hide');\n";
    echo "ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/usuario/cambiarIconoEstadoUsuarioAjax.php") . "&idUsuario=".$u->getId(). "\";\n";
    echo "$(\"#iconoEstado".$u->getId()."\").load(ruta);\n";
    echo "});\n";
}
?>
});
</script>