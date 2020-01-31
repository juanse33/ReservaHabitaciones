<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffe7b2;">
<a class="navbar-brand" href="index.php"><img src="img/icon2.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse"  id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/iniciarSesion.php")?>">Iniciar Sesion</a>
      </li>
    </ul>
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/registro.php")?>">Registro</a>
      </li>
    
    
      <li class="nav-item active">
        <a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/proveedor/registroProveedor.php")?>">Registro Proveedor</a>
      </li>
   </ul>
  </div>
</nav>



