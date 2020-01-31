<?php
if(isset($_SESSION['id'])){
    if($_SESSION['rol'] == "usuario"){
        $usuario = new Usuario($_SESSION['id']);
        $usuario -> consultar();
    }
}else{
    header('Location: index.php');
}
?>