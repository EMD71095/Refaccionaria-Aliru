<?php

$Categoria = ControladorCategorias::getCategoria();
foreach ($Categoria as $row => $item) {
}
?>


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Detalle del categoria: <?= $item[0] ?></h3>
                </div>
                <div class="card-body">
                    Informacion: <br>
                    <p><strong>Nombre de la categoria: </strong><?= $item[1] ?></p>
                    <p><strong>Descripción de la categoria: </strong><?= $item[2] ?></p>
                </div>
                <div class="card-footer">
                    <?php
                        if($_SESSION["rol"] == 1)
                        {
                            echo '<a class="btn btn-primary btn-sm" href="index.php?seccion=categorias">Volver</a>';
                        }
                        else
                        {
                            echo '<a class="btn btn-primary btn-sm" href="index.php?seccion=categorias_u">Volver</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>