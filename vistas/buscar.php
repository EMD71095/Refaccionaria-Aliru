<?php
$add = new ControladorOrdenes; //respuestas boleanas
$add->add_cart();
$editar = new ControladorOrdenes; //respuestas boleanas
$editar->update_cantidad();
// Si se envió el formulario, realizar la búsqueda
if (isset($_POST['nuevo']) && $_POST['nuevo'] === 'busqueda') {
    // Obtener resultados de búsqueda
    $nombre = isset($_POST['name']) ? $_POST['name'] : '';
    $nuevo = ControladorProductos::buscarProductos($nombre);
} else {
    // Por defecto: Obtener todos los productos o manejar búsqueda vacía
    $nuevo = ControladorProductos::buscarProductos('');
}
$verificar = new ControladorOrdenes;
?>

<style>
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

<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="text-center">Buscar</h3>
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del Producto:</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Buscar" autocomplete="off">
                        </div>
                        <div class="text-center">
                            <button name="nuevo" value="busqueda" type="submit" class="btn btn-primary text-center" style="margin-top: 22px; margin-bottom: 22px;">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Mostrar resultados de búsqueda -->
    <div class="row">
        <?php
        if (!empty($nuevo)) {
            $arre = array("#5D9CEC", "#4FC1E9", "#48CFAD", "#A0D468", "#FFCE54", "#FC6E51", "#ED5565", "#AC92EC", "#EC87C0", "#F5F7FA", "#CCD1D9", "#656D78");
            $arre2 = array("#4A89DC", "#3BAFDA", "#37BC9B", "#8CC152", "#F6BB42", "#E9573F", "#DA4453", "#967ADC", "#D770AD", "#E6E9ED", "#AAB2BD", "#434A54");

            foreach ($nuevo as $row => $item) {
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
                                            <a href="index.php?seccion=detalleProducto&idProducto=' . $item[0] . '">
                                            <img src="' . $item[4] . '" alt="img de producto" style="width: 300px; height: 200px;">
                                            </a>
                                        </div>    
                                            <p style="font-size: 14px;"><strong>Descripción:</strong>' . $item[2] . '</p>
                                            <p style="font-size: 13px;"><strong>Categoría:</strong> ' . $item[5] . '</p>
                                            <p style="font-size: 13px;"><strong>Precio:</strong> $' . $item[3] . '</p>';
                $resultado = $verificar->verificar($item[0]);
                if ($resultado) {
                    echo '
                                                <div class="text-center">
                                                    <a href="index.php?seccion=inicio&update_cantidad&id_producto=' . $item[0] . '" class="btn btn-primary">Añadir uno más</a>
                                                </div>';
                } else {
                    echo '
                                                <div class="text-center">
                                                    <a href="index.php?seccion=inicio&add_cart&id_producto=' . $item[0] . '&precio_unitario=' . $item[3] . '" class="btn btn-primary">Añadir al carrito</a>
                                                </div>';
                }
                echo '</div>
                            </div>
                        </div>
                    </div>
                ';
            }
        } else {
            echo '<p>No se encontraron productos.</p>';
        }
        ?>
    </div>
</div>