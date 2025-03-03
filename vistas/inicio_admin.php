<?php
$producto = ControladorProductos::consultaProductosview();
// $part = Modeloproductos::selectproductosgrafica();
// $array = $part->fetch_all();
$ca = new ControladorOrdenes;
$totalOrdenes = $ca->countOrdenes();


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
        margin-top: 350px;
        margin-bottom: 200px;
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
        <span>(<b>Excelente</b>: <a href="index.php?seccion=grafica">Ver grafíca de cotizaciones</a>)</span>
    </h2>
</div>

<div class="col-md-2 producto-card">
    <div class="color-swatches">
        <div class="swatches">
            <div class="clearfix">
                <div style="background-color: #5D9CEC; height: 15px;" class="pull-left light"></div>
                <div style="background-color: #4A89DC; height: 15px;" class="pull-right dark"></div>
            </div>
            <div class="infos">
                <h4>Cotizaciones realizadas:</h4>
                <h5 style="text-align: center;"><?php echo $totalOrdenes; ?></h5>
                <div class="text-center">
                    <a href="index.php?seccion=ordenes" class="btn btn-primary">Ver detalle</a>
                </div>
            </div>
        </div>
    </div>
</div>

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
                    <h4 class="text-center" style="font-size: 24px;">' . $item[1] . '</h4>
                        <div class="text-center">
                            <img src="' . $item[4] . '" alt="img de producto" style="width: 300px; height: 200px;   ">
                        </div>    
                        <p style="font-size: 14px;"><strong>Descripción:</strong>' . $item[2] . '</p>
                            <p style="font-size: 13px;"><strong>Categoría:</strong> ' . $item[5] . '</p>
                            <p style="font-size: 13px;"><strong>Precio:</strong> $' . $item[3] . '</p>
                            <div class="text-center">
                                <a href="index.php?seccion=detalleProducto&idProducto=' . $item[0] . '" class="btn btn-primary">Ver detalle</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    ';
}
?>
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
