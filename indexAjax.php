<?php
require 'logica/Administrador.php';
require 'logica/Reserva.php';
require 'logica/Proveedor.php';
require 'logica/Usuario.php';
require 'logica/Hotel.php';
require 'logica/Ciudad.php';
require 'logica/Pais.php';
require 'logica/Habitacion.php';
require 'persistencia/Conexion.php';
include base64_decode($_GET['pid']);
?>
    <script type="text/javascript">
    $(function () {
    	  $('[data-toggle="tooltip"]').tooltip()
    	})
    </script>
