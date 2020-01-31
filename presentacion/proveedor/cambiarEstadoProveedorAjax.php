<?php
$proveedor = new Proveedor($_GET['idProveedor']);
$proveedor -> cambiarEstado();
$proveedor -> consultar();
echo $proveedor -> getEstado();
?>