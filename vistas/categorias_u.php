<?php
$producto = ControladorCategorias::Filtrar();
$nuevo = new ControladorOrdenes; //respuestas boleanas
$nuevo->add_cart();
$editar = new ControladorOrdenes; //respuestas boleanas
$editar->update_cantidad();
$verificar = new ControladorOrdenes;
$nom = $_GET["name"];
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
</style>

<div class="content-row">
    <h2 class="content-row-title"><?php echo 'Productos publicados en la categoría "' . $nom . '": ' . count($producto); ?>
        <span>(<b>Ojo</b>: <a href="index.php?seccion=inicio">Ver todos los productos</a>)</span>
    </h2>

    <div>
        <?php

        $arre = array("#5D9CEC", "#4FC1E9", "#48CFAD", "#A0D468", "#FFCE54", "#FC6E51", "#ED5565", "#AC92EC", "#EC87C0", "#F5F7FA", "#CCD1D9", "#656D78");
        $arre2 = array("#4A89DC", "#3BAFDA", "#37BC9B", "#8CC152", "#F6BB42", "#E9573F", "#DA4453", "#967ADC", "#D770AD", "#E6E9ED", "#AAB2BD", "#434A54");

        foreach ($producto as $row => $item) {
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
        ?>
    </div>
</div>