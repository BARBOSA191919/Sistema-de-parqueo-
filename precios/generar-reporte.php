<?php
//============================================================+
// File name   : reporte de precios
// Begin       : 2003-03-04
// Last Update : 2013-05-14
//
// Description : Example 004 for TCPDF class
//               Cell stretching
//
// Author: Jonatan Sanchez
//
// (c) Copyright:
//               Jonatan Sanchez
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Cell stretching
 * @author Jonatan Sanchez
 * @since 2003-03-04
 */

// Incluir la biblioteca principal de TCPDF (buscar la ruta de instalación).
require_once('../app/templeates/TCPDF-main/tcpdf.php');
include('../app/config.php');


//cargar el encabezado
$query_informacions = $pdo->prepare("SELECT * FROM tb_informaciones WHERE estado = '1' ");
$query_informacions->execute();
$informacions = $query_informacions->fetchAll(PDO::FETCH_ASSOC);
foreach($informacions as $informacion){
    $id_informacion = $informacion['id_informacion'];
    $nombre_parqueo = $informacion['nombre_parqueo'];
    $actividad_empresa = $informacion['actividad_empresa'];
    $sucursal = $informacion['sucursal'];
    $direccion = $informacion['direccion'];
    $zona = $informacion['zona'];
    $telefono = $informacion['telefono'];
    $departamento_ciudad = $informacion['departamento_ciudad'];
    $pais = $informacion['pais'];
}


// Crear un nuevo documento PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establecer información del documento
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Jonatan Sanchéz');
$pdf->setTitle('Reporte de precios');
$pdf->setSubject('Reporte de precios');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

$PDF_HEADER_TITLE = $nombre_parqueo;
$PDF_HEADER_STRING = $direccion.' Telf: '.$telefono;
$PDF_HEADER_LOGO = 'auto4.jpg';
// Establecer datos del encabezado
$pdf->setHeaderData($PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);

// Establecer fuentes del encabezado y pie de página
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Establecer márgenes
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// margenes
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// paginas auto
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// Establecer fuente
$pdf->setFont('Helvetica', '', 11);

// Agregar una página
$pdf->AddPage();

// crea un contenido html
$html = '
<P><b>Reporte del Listado de precios</b></P>
<table border="1" cellpadding="4">
<tr>
<td style="background-color: #c0c0c0;text-align: center" width="80px">Nro</td>
<td style="background-color: #c0c0c0;text-align: center" >Cantidad</td>
<td style="background-color: #c0c0c0;text-align: center" >Detalle</td>
<td style="background-color: #c0c0c0;text-align: center" >Precio</td>
</tr>
';
$contador_precio = 0;
$query_precios = $pdo->prepare("SELECT * FROM tb_precios WHERE estado = '1'  ");
$query_precios->execute();
$datos_precios = $query_precios->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_precios as $datos_precio){
    $contador_precio = $contador_precio + 1;
    $id_precio = $datos_precio['id_precio'];
    $cantidad = $datos_precio['cantidad'];
    $detalle = $datos_precio['detalle'];
    $precio = $datos_precio['precio'];

    $html .= '
    <tr>
    <td style="text-align: center">'.$contador_precio.'</td>
    <td style="text-align: center">'.$cantidad.'</td>
    <td style="text-align: center">'.$detalle.'</td>
    <td style="text-align: center">'.$precio.'</td>
    </tr>
    ';


}

$html.='
</table>
';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('Reporte de precios.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
