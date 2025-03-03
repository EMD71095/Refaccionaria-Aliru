<?php
$ordenes = ControladorOrdenes::consultaOrdenesUsuario();

?>


<div class="container mt-5">
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="index.php?seccion=inicio" style="margin-bottom: 22px;">¡Seguir comprando!</a>
            <table class="table text-center" id="myTable">
                <thead>
                    <tr>
                        <th style="text-align: center;" scope="col">ID</th>
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
                            <td>' . $item[2] . '</td>
                            <td>$' . $item[3] . '</td>
                            <td>
                            <a class="btn btn-info text-center" href="pdf.php?id_orden=' . $item[0] . '&id_usuario='.$_SESSION["id"].'" target="new"><i class="fa fa-file" aria-hidden="true"></i> Imprimir cotización</a>
                            </td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script type="text/javascript">
    function deleteConfirmation(id) {
        swal({
                title: "¿Estás seguro?",
                text: "No volveras a recuperar el usuario",
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
                    window.location.href = "index.php?seccion=usuarios&eliminar=1&idUsuario=" + id;
                } else {
                    swal("Cancelado", "El usuario esta a salvo :)", "error");
                }
            });
    }
</script>