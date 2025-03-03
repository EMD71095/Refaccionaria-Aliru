<?php
$ordenes = ControladorOrdenes::consultaOrdenesview();

?>


<div class="container mt-5">
    <div class="row">
        <div class="col">
            <a class="btn btn-success" href="reporteCotizacion.php" target="new" style="margin-bottom: 22px;"><i class="fa fa-file"></i> Imprimir reporte completo de cotizaciones</a>
            <table class="table text-center" id="myTable">
                <thead>
                    <tr>
                        <th style="text-align: center;" scope="col">ID</th>
                        <th style="text-align: center;" scope="col">Nombre de usuario</th>
                        <th style="text-align: center;" scope="col">Fecha</th>
                        <th style="text-align: center;" scope="col">Total</th>
                        <th style="text-align: center;" scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($ordenes as $row => $item) {
                        echo '<tr>
                            <th style="text-align: center;" scope="row">' . $item[0] . '</th>
                            <td>' . $item[1] . '</td>
                            <td>' . $item[2] . '</td>
                            <td>' . $item[3] . '</td>
                            <td>
                                <a class="btn btn-info text-center" href="pdf.php?id_orden=' . $item[0] . '&id_usuario=' . $item[4] . '" target="new"><i class="fa fa-file" aria-hidden="true"></i> Imprimir cotización</a>
                            </td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>