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
  include 'modelo/ModeloUsuarios.php';

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
            $nuevo = new ControladorUsuarios; //respuestas boleanas
            $nuevo->registrarUsuario_f();
            ?>
            <div class="col-md">
              <div class="color-swatches">
                <div class="swatches">
                  <div class="clearfix">
                    <h3 style="margin-left: 10px;">Crear cuenta</h3>
                  </div>
                  <div class="infos">
                    <form action="" method="POST" enctype="multipart/form-data">
                      <div class="mb-3">
                        <label for="nombreUsuario" class="form-label">Nombre:</label>
                        <input required name="nombre" type="text" class="form-control" id="nombreUsuario" aria-describedby="emailHelp" autocomplete="off">
                      </div>
                      <div class="mb-3">
                        <label for="emailUsuario" class="form-label">Email:</label>
                        <input required name="email" type="email" class="form-control" id="emailUsuario" aria-describedby="emailHelp" autocomplete="off">
                      </div>
                      <div class="mb-3">
                        <label for="passUsuario" class="form-label">Contraseña:</label>
                        <input required name="password" type="password" class="form-control" id="passUsuario" aria-describedby="emailHelp" autocomplete="off">
                      </div>
                      <div class="mb-3">
                        <label for="emailUsuario" class="form-label">Confirmar contraseña:</label>
                        <input required name="passwordConfirm" type="password" class="form-control" id="emailUsuario" aria-describedby="emailHelp" autocomplete="off">
                      </div>
                      <div class="mb-3">
                        <label for="fileUpload" class="form-label">Foto de perfil</label>
                        <input name="archivo" type="file" class="form-control" id="fileUpload">
                        <small>Nota: Seleccione unicamente archivos con extension .jpg o .png</small>
                      </div>
                      <button name="nuevo" value="newUsuario" type="submit" class="btn btn-primary">Registrarse</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div><!-- panel body -->
        </div>
      </div><!-- content -->
    </div>
  </div>


  </div>
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>
</body>

</html>