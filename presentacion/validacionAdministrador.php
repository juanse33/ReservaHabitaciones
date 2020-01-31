<?php
if(isset($_SESSION['id'])){
    if($_SESSION['rol'] == "administrador"){
        $administrador = new Administrador($_SESSION['id']);
        $administrador -> consultar();
    }
}else{
    header('Location: index.php');
}
?>