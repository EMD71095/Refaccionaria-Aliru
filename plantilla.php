<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Aliru | Refaccioones para remolques</title>
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="shortcut icon" href="favicon_16.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="bookmark" href="favicon_16.ico" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="dist/css/site.min.css">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="dist/js/site.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  <!-- Notificaciones con Sweet alert -->
  <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- icono -->
  <link rel="icon" href="img/aliru_logo.ico" type="image/x-icon">
</head>

<body>

  <?php
  include 'vistas/navbar.php';
  include 'vistas/sidebar.php';
  ?>
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
            $obj = new ControladorVistas;
            $obj->cargarSeccion();
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>


  </div>
  <!-- Diseño de tablas con datatables -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>
</body>

</html>