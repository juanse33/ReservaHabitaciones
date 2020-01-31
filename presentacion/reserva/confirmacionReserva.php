<?php
include 'presentacion/menuUsuario.php';
$pais = new Pais();

$fecha1 = new DateTime($_GET["fecha_entrada"]);
$fecha2 = new DateTime($_GET["fecha_salida"]);
$resultado = $fecha1->diff($fecha2);
$valor = "";
$error=0;
$dias = $resultado->format('%r%a');
$hotel = new Hotel($_GET['idhotel']);
$hotel -> consultar();
$habitacion = new Habitacion("", "", $_GET['idhotel'], $_GET['num_personas']);
$habitaciones = $habitacion -> consultarCapacidad();
foreach ($habitaciones as $a)
{
	$valor = $dias * $a -> getPrecio(); 
} 
$reserva = new Reserva($_GET["fecha_entrada"], $_GET["fecha_salida"],  $_GET["num_personas"], $_SESSION["id"], $_GET["idhotel"], $valor);
if(isset($_POST["confirm"]))
{
	
	$reserva -> insertar();
	//header( "Location:index.php?pid=". base64_encode("presentacion/registro.php"));

}
?>

<br/>
<div class="container">
<?php if (isset($_POST['confirm'])) { ?>
					<div class="alert alert-<?php echo ($error==0) ? "success" : "danger" ?> alert-dismissible fade show"
						role="alert">
						<?php echo ($error==0) ? "Reserva realizada :)" : $_POST['correo'] . " ya existe"; ?>
						<button type="button" class="close" data-dismiss="alert"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<?php } ?>
<?php
echo "<div class='card-header  text-black' style='background-color: #E2F896;'>TU RESERVA</div>";
echo "<div class='card-group'>";
echo "<div class='card-body'>";
echo "<strong> Hotel      " . $hotel -> getNombre() . "</strong>";
echo "<h6> Direccion:      " . $hotel -> getDireccion() . "</h6>";
echo "<h6> Numero personas:      " . $_GET["num_personas"] . "</h6>";
echo "</div>";
echo "<div class='row'>";
echo "<div class='card-body'>";
echo "<h6> Precio Total:      " . $valor . "</h6>";
echo "<form method='post' action=''>";
echo "<button type='submit' name='confirm' class='btn btn-outline-warning'>Confirmar</button>";
echo "</form>";
echo "</div>";
echo "</div>";
echo "</div>";
?>
<?php if (isset($_POST['confirm'])) { 
		echo "<div class='col text-center'>";
		echo "<a class='btn btn-outline-danger' href='index.php?pid=" . base64_encode("presentacion/reserva/reserva.php"). "'>Volver</a>";											
		echo "</div>";
		}
?>


<br/>
