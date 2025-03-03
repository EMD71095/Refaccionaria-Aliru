<?php
require_once 'modelo/Conexion.php';
require_once 'controlador/ControladorOrdenes.php';

$sql = "SELECT * from detalle_orden_view where id_orden = ".$_GET["id_orden"].";";
$query = Conexion::conectar()->query($sql);
$array = $query->fetch_all();

//$cliente = $_GET["id_usuario"];

$pet = "SELECT nombre FROM usuarios WHERE id = ".$_GET["id_usuario"];
$fila = Conexion::conectar()->query($pet);
$res = $fila->fetch_assoc();
$cliente = $res["nombre"];

/* --- funciones php que permiten obtener fecha y hora ---- */
//America/Mexico_City
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d");
$hora = date("h:i:s A");
/* ----- Configuración para generar el documento pdf ----- */
require_once('TCPDF/tcpdf.php');
$pdf = new TCPDF('P', 'mm', 'LETTER', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ALIRU');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(10, 10, 10, false);
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetFont('Helvetica', '', 10);
$pdf->addPage();
/* ----- Configuración para generar el documento pdf ----- */

/* --- la variable $contenido es un String con toda la estructura(html) 
    datos(php o calculos o variables) y estilos(CSS o estilos en linea) 
    que queremos en el documento ---*/
$contenido = '
        <table border="0" cellspacing="0" style="text-align: center;">
            <tr>
                <th><img src="img/aliru_logo.jpg" width="150px"/></th>
                <th text-align="center">
                    <h1 class="text-center">ALIRU</h1>
                    <p>AVENIDA DE LA ROSA #647 COLONIA RUBÉN JARAMILLO, Gómez Palacio Centro, Mexico</p>
                    <h4>Cotización de venta</h4>
                </th>
                <th>Fecha de impresión:' . $fecha . '</th>
            </tr>
            </table>
            <br>
            <br>';
$contenido .= '
        <table border="1" cellspacing="0" style="text-align: center;">
        <tr>
            <th> Producto</th>
            <th> Precio unitario</th>
            <th> Cantidad</th>
            <th> Subtotales</th>
        </tr>';
$total = 0;
foreach ($array as $row => $item) {
    $contenido .= '
        <tr>
        <th> ' . $item[2] . '</th>
        <th> $' . $item[5] . '</th>
        <th> ' . $item[4] . '</th>
        <th> $' . ($item[5]*$item[4]) . '</th>
    </tr>
        ';
        $total += ($item[5]*$item[4]);
}
$contenido .= '        
        </table>
    ';

$contenido .= '  
<h4 style="text-align: right;">Total de la cotización: $'.$total.'.°° </h4>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p style="text-align: center;">'.$cliente.', gracias por tu preferencia :)</p>
        
    ';




/* -------------- configuracion de salida del pdf ------------------ */
$pdf->writeHTML($contenido, true, 0, true, 0);
$pdf->lastPage();
$nombreDoc = $fecha;
$pdf->output($nombreDoc . '.pdf', 'I');
