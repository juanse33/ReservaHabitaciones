<?php 
$proveedor = new Proveedor($_SESSION['id']);
$proveedor -> consultar();    
?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ffe7b2;">
  <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/sesionProveedor.php")?>"><img src="img/icon2.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/hotel/consultarHotelProv.php")?>" tabindex="-1" >Consultar mis hotel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/hotel/registroHotel.php")?>" tabindex="-1" >Registrar mi hotel</a>
        </li>
        
    </ul>
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="-1" ><?php echo $proveedor -> getNombre() . " " . $proveedor -> getApellido(); ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?salir=1" tabindex="-1" >Salida</a>
      </li>
    </ul>
  </div>
</nav>