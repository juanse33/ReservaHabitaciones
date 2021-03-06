<?php 
session_start();
require 'logica/Administrador.php';
require 'logica/Hotel.php';
require 'logica/Usuario.php';
require 'logica/Reserva.php';
require 'logica/Pais.php';
require 'logica/Ciudad.php';
require 'logica/Proveedor.php';
require 'logica/Habitacion.php';
require 'persistencia/Conexion.php';

?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <title>Hotel</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
</script>
</head>
<body>
	<?php 
	if(isset($_GET['pid'])){
	    include base64_decode($_GET['pid']);
	}else{
	    if(isset($_GET['salir'])){
	        $_SESSION['id']=null;
	        $_SESSION['rol']=null;
	    }
	    include 'presentacion/header.php';
	    include 'presentacion/inicio.php';	    
	}
	
	
	?>
</body>
</html>