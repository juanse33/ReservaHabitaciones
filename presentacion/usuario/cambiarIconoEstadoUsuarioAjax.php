<?php
$usuario = new Usuario($_GET['idUsuario']);
$usuario -> consultar();
if($usuario -> getEstado() == 1){
    echo "<i id='icono".$usuario->getId()."' class='fas fa-user-times' data-toggle='tooltip' data-placement='left' title='Deshabilitar'></i>";
}else{
    echo "<i id='icono".$usuario->getId()."' class='fas fa-user-check' data-toggle='tooltip' data-placement='left' title='Habilitar'></i>";
}

?>