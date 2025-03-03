<?php
$res = new ControladorOrdenes;
$cantidad = $res->cantidad($_SESSION["id"]);
$usu = ControladorUsuarios::consultaUsuarios_t();
foreach ($usu as $row => $item) {
  if ($_SESSION["nombre"] == $item[1]) {
    $id = $item[0];
  }
}
?>
<style>
  .profile-circle {
    width: 30px;
    /* Tamaño del círculo */
    height: 30px;
    /* Tamaño del círculo */
    border-radius: 50%;
    /* Hace que sea circular */
    overflow: hidden;
    /* Oculta cualquier parte de la imagen que sobresalga */
    display: inline-block;
    margin-right: 8px;
    /* Espacio entre la imagen y el nombre */
    vertical-align: middle;
    /* Alinea verticalmente */
  }

  .profile-circle img {
    width: 100%;
    /* Ajusta la imagen al ancho del círculo */
    height: auto;
    /* Mantiene la proporción de la imagen */
  }

  .dropdown-toggle {
    display: flex;
    /* Utiliza Flexbox para alinear los elementos */
    align-items: center;
    /* Alinea verticalmente */
  }

  .navbar-brand-center {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
  }

  /* Ajuste para pantallas pequeñas */
  @media (max-width: 768px) {
    .mi{
      display: none;
    }
  }
</style>

<nav role="navigation" class="navbar navbar-custom">
  <div class="container-fluid">
    <div class="navbar-header">
      <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.php?seccion=inicio" class="navbar-brand"><img src="img/aliru_logo.jpg" alt="logo" style="width: 40px;"></a>
    </div>

    <!-- Aquí se centra el nombre de la empresa, visible solo en pantallas medianas y grandes -->
    <!-- <a href="index.php?seccion=inicio" class="navbar-brand navbar-brand-center d-none d-md-block">Aliru | Refacciones para remolques</a> -->

    <a href="index.php?seccion=inicio" id="mi" class="navbar-brand navbar-brand-center d-none d-md-block text-center" style="display: block;">Aliru | Refacciones para remolques</a>

    <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item">
          <?php if ($_SESSION["rol"] == 2) { ?>
            <a class="nav-link" href="index.php?seccion=carrito">
              <div style="position: relative; display: inline-block;">
                <i class="bi bi-cart" style="font-size: 24px;"></i>
                <span class="badge bg-danger" style="position: absolute; top: -8px; right: -8px;"><?= $cantidad ?></span>
              </div>
            </a>
          <?php } ?>
        </li>

        <?php if ($_SESSION["rol"] == 1 or $_SESSION["rol"] == 0) {
          echo '<li class="active"><a href="index.php?seccion=inicio_admin">Inicio</a></li>';
        } else {
          echo '<li class="active"><a href="index.php?seccion=inicio">Inicio</a></li>';
        } ?>

        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <div class="profile-circle">
              <img src="<?= $_SESSION["img_perfil"] ?>" alt="Perfil" />
            </div>
            <?= $_SESSION['nombre'] ?> <b class="caret"></b>
          </a>
          <ul role="menu" class="dropdown-menu">
            <li class="dropdown-header">Configuración</li>
            <?php echo '<li><a href="index.php?seccion=detalleUsuarios&idUsuario=' . $id . '">Ver perfil</a></li>' ?>
            <li class="divider"></li>
            <?php if ($_SESSION["rol"] == 1 or $_SESSION["rol"] == 0) {
              echo '<li class=""><a href="index.php?seccion=inicio_admin">Regresar a inicio</a></li>';
            } else {
              echo '<li class=""><a href="index.php?seccion=inicio">Regresar a inicio</a></li>';
            } ?>
            <li class="divider"></li>
            <li class="disabled"><a href="logout.php">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>