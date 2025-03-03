<?php

$producto_orden = ControladorOrdenes::consultaDetalleOrdenView();


$eliminar = new ControladorOrdenes;  //no array de regreso
$eliminar->eliminarProductoOrden();

$nuevo = new ControladorOrdenes;
$nuevo->insertarOrden();


?>

<style>
    form {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin-left: 400px;
    }

    label {
        margin-right: 10px;
    }

    input {
        margin-right: 10px;
    }

    .mi-div {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 300px;
        height: 200px;
        background-color: lightblue;
        text-align: center;
    }

    /* Media query para pantallas pequeñas */
    @media (max-width: 768px) {
        form {
            flex-direction: column;
            margin-left: 0;
            text-align: center;
        }

        .mi-div {
            width: 100%;
            height: auto;
        }

        input,
        label {
            margin: 5px 0;
        }
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <table class="table text-center" id="myTable">
                <thead>
                    <tr>
                        <th style="text-align: center;" scope="col">Producto</th>
                        <th style="text-align: center;" scope="col">Cantidad</th>
                        <th style="text-align: center;" scope="col">Precio unitario</th>
                        <th style="text-align: center;" scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($producto_orden as $row => $item) {
                        echo '<tr>
                    <td>' . $item[2] . '</td>
                    <td>' . $item[4] . '</td>
                    <td>$' . $item[5] . '</td>
                    <td>
                        <a class="btn btn-danger btn-circle btn-sm" onclick="deleteConfirmation(' . $item[6] . ')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>';
                        $total += ($item[4] * $item[5]);
                    }
                    ?>
                </tbody>
            </table>

            <div class="row" id="mi-div">
                <div class="col-md-6 offset-md-3" style="align-content: center;">
                    <form action="" method="POST" class="form-inline">
                        <label for="total" class="mr-2">TOTAL:</label>
                        <input type="text" class="form-control fw-bold" style="max-width: 100px; text-align: center;" value="<?= "$" . number_format($total, 2) ?>" readonly>
                        <input type="hidden" value="<?= $total ?>" id="total" name="total">
                        <?php
                        if ($total == 0) {
                        } else {
                            echo '<button class="btn btn-success ml-2" name="finalizar" type="submit">Continuar</button>';
                        }
                        ?>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>


<script type="text/javascript">
    function deleteConfirmation(id) {
        swal({
                title: "¿Estás seguro?",
                text: "Se eliminara del carrito",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, eliminalo!",
                cancelButtonText: "No, cancelalo!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    console.log(id);
                    window.location.href = "index.php?seccion=carrito&eliminar=1&id_producto=" + id;
                    //swal("Deleted!", "Your imaginary file has been deleted.", "success");
                } else {
                    swal("Cancelado", "El producto esta a salvo :)", "error");
                }
            });
    }
</script>