<?php
$usuario = new Usuario($_GET['idUsuario']);
$usuario -> cambiarEstado();
$usuario -> consultar();
echo $usuario -> getEstado();
?>