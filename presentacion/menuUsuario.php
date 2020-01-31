<?php 
$usuario = new Usuario($_SESSION['id']);
$usuario -> consultar();    
?>
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#4F066C;">
  <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/sesionUsuario.php")?>"><img src="img/icon2.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
      <li class="nav-item">
          <a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/reserva/reserva.php")?>" tabindex="-1" >Reservar habitación</a>
        </li>
    </ul>
      <ul class="navbar-nav ">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $usuario -> getNombre() . " " . $usuario -> getApellido(); ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/usuario/editarPerfilUsuario.php")?>">Editar Perfil</a>
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/usuario/editarContraseñaUsuario.php")?>">Cambiar Contraseña</a>
        </div>
      </li>
      </ul>
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/reserva/consultarReservaUs.php")?>" tabindex="-1" >Consultar mis reservas</a>
        </li>
    </ul>
      <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" href="index.php?salir=1" tabindex="-1" >Salida</a>
      </li>
    </ul>
  </div>
</nav>