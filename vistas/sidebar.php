<?php
$cat = ControladorCategorias::consultaCategorias();
$mandar = new ControladorCategorias;  //no array de regreso
$res = new ControladorOrdenes;
$cantidad = $res->cantidad($_SESSION["id"]);
$mandar->Filtrar();
if ($_SESSION['rol'] == 2) {
  echo '
    <div class="row row-offcanvas row-offcanvas-left">
    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
      <ul class="list-group panel">
        <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>Panel de control</b></li>
        <li class="list-group-item"><a href="index.php?seccion=inicio"><i class="glyphicon glyphicon-tag"></i>Productos</a></li>
        <li class="list-group-item"><a href="index.php?seccion=buscar"><i class="glyphicon glyphicon-search"></i>Buscar</a></li>
        <li class="list-group-item"><a href="index.php?seccion=carrito"><i class="bi bi-cart"></i>Carrito ('.$cantidad.')</a></li>
        <li class="list-group-item dropdown">
          <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
            <i class="glyphicon glyphicon-list-alt"></i> Categorías <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">';
            foreach ($cat as $key => $val) {
              echo '<li><a href="index.php?seccion=categorias_u&filtrar&id_categoria=' . $val[0] . '&name='.$val[1].'">- ' . $val[1] . '</a></li>';
            }
          echo '
          </ul>
        </li>
        <li class="list-group-item"><a href="index.php?seccion=ordenes_usuario"><i class="glyphicon glyphicon-check"></i> Mis ordenes</a></li>
        <li class="list-group-item"><a href="index.php?seccion=detalleUsuarios&idUsuario=' . $_SESSION["id"] . '"><i class="glyphicon glyphicon-user"></i> Perfil</a></li>
        <li class="list-group-item"><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
      </ul>
    </div>
  </div>';
} else {
  echo '
  <div class="row row-offcanvas row-offcanvas-left">
  <div class="col-xs-6 col-sm-3  sidebar-offcanvas" role="navigation">
    <ul class="list-group panel">
      <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>Panel de control</b></li>
      <li class="list-group-item"><a href="index.php?seccion=inicio_admin"><i class="glyphicon glyphicon-home"></i>Inicio </a></li>
      <li class="list-group-item"><a href="index.php?seccion=grafica"><i class="glyphicon glyphicon-stats"></i>Grafica</a></li>
      <li class="list-group-item"><a href="index.php?seccion=productos"><i class="glyphicon glyphicon-tag"></i>Productos</a></li>
      <li class="list-group-item"><a href="index.php?seccion=categorias"><i class="glyphicon glyphicon-list-alt"></i>Categorias</a></li>
      <li class="list-group-item"><a href="index.php?seccion=ordenes"><i class="glyphicon glyphicon-check"></i>Ordenes</a></li>
      <li class="list-group-item"><a href="index.php?seccion=usuarios"><i class="glyphicon glyphicon-user"></i>Usuarios</a></li>
      <li class="list-group-item"><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Salir</a></li>
    </ul>
  </div>
</div>
  ';
}
?>