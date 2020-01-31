<?php 
$administrador = new Administrador($_SESSION['id']);
$administrador -> consultar();    
?>
<nav class="navbar navbar-expand-lg navbar-dark text-dark " style="background-color: #043727  ;">
  <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/sesionAdministrador.php")?>"><img src="img/icon2.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Consultar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/usuario/consultarUsuario.php")?>">Usuario</a>
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/proveedor/consultarProveedor.php")?>">Proveedor</a>
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/hotel/consultarHotelAdmin.php")?>">Hotel</a>
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/reserva/consultarReservaAdmin.php")?>">Reserva</a>
        </div>
      </li>
      </ul>
      <ul class="navbar-nav mr-auto">   
        <li class="nav-item ">
          <a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/proveedor/registroProveedorAdmin.php")?>">Registro proveedor</a>
        </li>
       </ul> 
      <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="-1" ><?php echo $administrador -> getNombre() . " " . $administrador -> getApellido(); ?></a>
      </li>
      </ul>
      <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php?salir=1" tabindex="-1" >Salida</a>
      </li>
      </ul>
      </ul>
      <li >
      </li>
  </div>
</nav>