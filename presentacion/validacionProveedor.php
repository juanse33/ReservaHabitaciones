<?php
if(isset($_SESSION['id'])){
    if($_SESSION['rol'] == "proveedor"){
        $proveedor = new Proveedor($_SESSION['id']);
        $proveedor -> consultar();
    }
}else{
    header('Location: index.php');
}
?>