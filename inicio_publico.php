<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Aliru | Refacciones para remolques</title>
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="shortcut icon" href="favicon_16.ico" />
  <link rel="bookmark" href="favicon_16.ico" />
  <link rel="stylesheet" href="dist/css/site.min.css">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="dist/js/site.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-mQ93BzQJQLyG6DeNWBo0rK9IYTv/xIw3iTX1QtFSfI3z7i1pGpFbgEpp56Pb+NeK" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6/0nQknsLrD9KK2Vck1rFZPbO1Lv+DgDmxM9JFiJpFxh5b6bJ6M" crossorigin="anonymous"></script>

  <!-- Sweet alert -->
  <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- icono -->
  <link rel="icon" href="img/aliru_logo.ico" type="image/x-icon">

</head>

<body>

  <?php
  include 'modelo/conexion.php';
  include 'controlador/ControladorUsuarios.php';
  include 'controlador/ControladorProductos.php';
  include 'modelo/ModeloUsuarios.php';
  include 'modelo/ModeloProductos.php';
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
      .mi {
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
        <a href="inicio_publico.php" class="navbar-brand"><img src="img/aliru_logo.jpg" alt="logo" style="width: 40px;"></a>
      </div>
      <a href="inicio_publico.php" id="mi" class="navbar-brand navbar-brand-center d-none d-md-block text-center" style="display: block;">Aliru | Refacciones para remolques</a>

      <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="inicio_publico.php">Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Iniciar sesión <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li class="dropdown-header">Bienvenido</li>
              <li class="divider"></li>
              <li class="nav-item"><a class="dropdown-item" href="login.php">Inicia sesión</a></li>
              <li class="divider"></li>
              <li class="nav-item"><a class="dropdown-item" href="registroUsuario_publico.php">Crear cuenta</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="row row-offcanvas row-offcanvas-left">
    <div class="col-xs-6 col-sm-3  sidebar-offcanvas" role="navigation">
      <ul class="list-group panel">
        <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>Panel de control</b></li>
        <li class="list-group-item"><a href="inicio_publico.php"><i class="glyphicon glyphicon-home"></i>Inicio </a></li>
        <li class="list-group-item"><a href="registroUsuario_publico.php"><i class="glyphicon glyphicon-user"></i>Registrarse </a></li>
        <li class="list-group-item"><a href="login.php"><i class="glyphicon glyphicon-log-in"></i>Iniciar sesion </a></li>
      </ul>
    </div>
  </div>

  <div class="container-fluid">
    <!--documents-->
    <div class="row row-offcanvas row-offcanvas-left">
      <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">

      </div>
      <div class="col-xs-12 col-sm-9 content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Ocultar panel</h3>
          </div>
          <div class="panel-body">
            <?php
            $producto = ControladorProductos::consultaProductosview();
            $part = Modeloproductos::selectproductos();
            $array = $part->fetch_all();
            // Definir la cantidad de productos por página
            $productos_por_pagina = 9;

            // Obtener el número total de productos
            $total_productos = count($producto);

            // Calcular el número total de páginas
            $total_paginas = ceil($total_productos / $productos_por_pagina);

            // Obtener la página actual de la URL, si no está definida, es la página 1
            $pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

            // Asegurarse de que la página actual esté dentro de los límites válidos
            if ($pagina_actual < 1) {
              $pagina_actual = 1;
            } elseif ($pagina_actual > $total_paginas) {
              $pagina_actual = $total_paginas;
            }

            $producto_li = ControladorProductos::consultaProductosviewLimit();

            ?>

            <style>
              body {
                background-image: url();
                /* background-size: cover; */
                /* background-repeat: no-repeat; */
              }

              h1 {
                color: white;
                /* position: absolute; */
                bottom: auto;
                /* Coloca el h1 en la parte inferior de la página */
                left: 0;
                /* Alinea el h1 a la izquierda */
                width: 100%;
                /* Ancho completo */
                padding: 20px;
                /* Agrega espacio alrededor del h1 si es necesario */
              }

              .content-row {
                margin-bottom: 20px;
              }

              .producto-card {
                margin-bottom: 20px;
              }

              .grafica-card {
                margin-top: 500px;
                margin-bottom: 200px;
              }

              footer {
                background-color: #f8f9fa;
                text-align: center;
                padding: 10px 0;
                position: relative;
                bottom: 0;
                width: 100%;
              }

              h4.fixed-height {
                font-size: 24px;
                height: 60px;
                /* Define la altura fija */
                line-height: 1.2;
                /* Ajusta la altura de línea */
                overflow: hidden;
                /* Oculta el contenido que exceda la altura */
                text-overflow: ellipsis;
                /* Agrega puntos suspensivos si el texto es muy largo */
                white-space: nowrap;
                /* Evita que el texto se divida en varias líneas */
              }

              ul.pagination li.active a {
                background-color: #007bff;
                /* Cambia el color de fondo */
                border-color: #007bff;
                /* Cambia el color del borde */
                color: white;
                /* Cambia el color del texto */
              }

              ul.pagination li.active a:hover {
                background-color: #000000;
                /* Color al pasar el cursor sobre el botón activo */
                border-color: #0056b3;
                /* Cambia el color del borde al hacer hover */
                color: white;
                /* Asegura que el texto siga siendo blanco */
              }

              ul.pagination li a {
                color: #007bff;
                /* Cambia el color del texto normal */
              }

              ul.pagination li a:hover {
                background-color: #0056b3;
                /* Cambia el color de fondo al pasar el cursor */
                color: white;
              }
            </style>

            <div class="content-row">
              <h2 class="content-row-title">Productos publicados: <?= count($producto) ?>
                <span>(<b>Excelente</b>: <a href="index.php?seccion=inicio_grafica">Ver productos populares</a>)</span>
              </h2>

              <div class="row">
                <?php

                $arre = array("#5D9CEC", "#4FC1E9", "#48CFAD", "#A0D468", "#FFCE54", "#FC6E51", "#ED5565", "#AC92EC", "#EC87C0", "#F5F7FA", "#CCD1D9", "#656D78");
                $arre2 = array("#4A89DC", "#3BAFDA", "#37BC9B", "#8CC152", "#F6BB42", "#E9573F", "#DA4453", "#967ADC", "#D770AD", "#E6E9ED", "#AAB2BD", "#434A54");

                foreach ($producto_li as $row => $item) {
                  // Asegúrate de que el índice esté dentro del rango de los arrays $arre y $arre2
                  $indice = $row % count($arre);

                  echo '
                <div class="col-md-4 producto-card">
                    <div class="color-swatches">
                        <div class="swatches">
                            <div class="clearfix">
                                <div style="background-color:' . $arre[$indice] . '; height: 15px;" class="pull-left light"></div>
                                <div style="background-color:' . $arre2[$indice] . '; height: 15px;" class="pull-right dark"></div>
                            </div>
                            <div class="infos">
                            <h4 class="text-center fixed-height" style="font-size: 24px;">' . $item[1] . '</h4>
                                <div class="text-center">
                                    <img src="' . $item[4] . '" alt="img de producto" style="width: 300px; height: 200px;   ">
                                </div>    
                                <p style="font-size: 14px;"><strong>Descripción:</strong>' . $item[2] . '</p>
                                <p style="font-size: 13px;"><strong>Categoría:</strong> ' . $item[5] . '</p>
                                <p style="font-size: 13px;"><strong>Precio:</strong> $' . $item[3] . '</p>
                                <div class="text-center">
                                    <a href="login.php" class="btn btn-primary text-center">Ver detalle</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
                }
                ?>
              </div>
            </div>

            <div class="text-center">
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <?php if ($pagina_actual > 1): ?>
                    <li><a href="?pagina=<?= $pagina_actual - 1 ?>">&laquo; Anterior</a></li>
                  <?php endif; ?>

                  <?php
                  // Mostrar 2 páginas antes y 2 después de la página actual
                  for ($i = max(1, $pagina_actual - 2); $i <= min($total_paginas, $pagina_actual + 2); $i++): ?>
                    <li <?= $i == $pagina_actual ? 'class="active"' : '' ?>>
                      <a href="?pagina=<?= $i ?>"><?= $i ?></a>
                    </li>
                  <?php endfor; ?>


                  <?php if ($pagina_actual < $total_paginas): ?>
                    <li><a href="?pagina=<?= $pagina_actual + 1 ?>">Siguiente &raquo;</a></li>
                  <?php endif; ?>
                </ul>
              </nav>
            </div>




          </div><!-- panel body -->
        </div>
      </div><!-- content -->
    </div>
  </div>

  <footer>
    © 2024 Aliru | Refacciones para remolques
  </footer>


  <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>
</body>

</html>