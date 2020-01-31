<?php
$filtro = $_GET['ciudad'];
if($filtro != "-1"){
    $ciudad = new Ciudad();
    $ciudades = $ciudad -> buscar($filtro);
    if(count($ciudades)>0){
        echo "<div  class='list-group'>";
        foreach ($ciudades as $c){
            echo "<button type='button' id='c". $c->getIdCiudad() ."' class='list-group-item list-group-item-action'> ". $c -> getNombre(). "</button>";
        }
        echo "</div>";
    }
}else{
    echo "";
}
?>

<script type="text/javascript">
$(document).ready(function(){
	<?php 
	   foreach ($ciudades as $c){
	       echo "$(\"#c" . $c -> getIdCiudad() . "\").click(function(){\n";
	       echo "$(\"#ciudad\").val(\"" . $c -> getNombre() . "\");\n";	       
	       echo "$(\"#idCiudad\").val(\"" . $c-> getIdCiudad() . "\");\n";
	       echo "});\n";
	   }
	   //Aqui se oculta la lista.
	   foreach ($ciudades as $c){
	       echo "$(\"#c" . $c -> getIdCiudad() . "\").click(function(){\n";
	       echo "$(\"#resultados\").hide();\n";	       
	       echo "});\n";
	   }
	   
	?>
});
	
</script>