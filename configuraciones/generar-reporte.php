<?php
//============================================================+
// File name   : example_004.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 004 for TCPDF class
//               Cell stretching
//
// Author:Jonathan Sanchez
//
// (c) Copyright:
//               Jonathan Sanche
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Cell stretching
 * @authorJonathan Sanche
 * @since 2003-03-04
 */

// Se incluye la biblioteca TCPDF
require_once('../app/templeates/TCPDF-main/tcpdf.php');
// Se incluye el archivo de configuración de la aplicación
include('../app/config.php');


// Se carga el encabezado del PDF con información de una de las informaciones
$query_informacions = $pdo->prepare("SELECT * FROM tb_informaciones WHERE estado = '1' ");
$query_informacions->execute();
$informacions = $query_informacions->fetchAll(PDO::FETCH_ASSOC);
    // Se obtienen los datos de la primera información
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


// Se crea una nueva instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Se establece la información del documento
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('TCPDF Example 004');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// Se establece el encabezado del PDF con información del parqueo
$PDF_HEADER_TITLE = $nombre_parqueo;
$PDF_HEADER_STRING = $direccion.' Telf: '.$telefono;
$PDF_HEADER_LOGO = 'auto4.jpg';
$pdf->setHeaderData($PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);

// Se establecen las fuentes y los márgenes del documento
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Se establecen algunas cadenas de idioma (opcional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// Se establece la fuente del documento
$pdf->setFont('Helvetica', '', 11);

// Se añade una página al PDF
$pdf->AddPage();

// Se crea contenido HTML para mostrar el listado de informaciones en una tabla
$html = '
<P><b>Reporte del Listado de informaciones</b></P>
<table border="1" cellpadding="4">
<tr>
<td style="background-color: #c0c0c0;text-align: center" width="40px" >Nro</td>
<td style="background-color: #c0c0c0;text-align: center" >Nombre del parqueo</td>
<td style="background-color: #c0c0c0;text-align: center" >Actividad de la empresa</td>
<td style="background-color: #c0c0c0;text-align: center" >Sucursal</td>
<td style="background-color: #c0c0c0;text-align: center" >Dirección</td>
<td style="background-color: #c0c0c0;text-align: center" >Zona</td>
<td style="background-color: #c0c0c0;text-align: center" >Teléfono</td>
<td style="background-color: #c0c0c0;text-align: center" >Departamento o ciudad</td>
<td style="background-color: #c0c0c0;text-align: center" >país</td>
</tr>
';
$contador = 0;
// Se obtienen todas las informaciones activas de la base de datos y se agregan a la tabla
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
    $contador = $contador + 1;

    $html .= '
    <tr>
    <td style="text-align: center">'.$contador.'</td>
    <td style="text-align: center">'.$nombre_parqueo.'</td>
    <td style="text-align: center">'.$actividad_empresa.'</td>
    <td style="text-align: center">'.$sucursal.'</td>
    <td style="text-align: center">'.$direccion.'</td>
    <td style="text-align: center">'.$zona.'</td>
    <td style="text-align: center">'.$telefono.'</td>
    <td style="text-align: center">'.$departamento_ciudad.'</td>
    <td style="text-align: center">'.$pais.'</td>
    </tr>
    ';


}

$html.='
</table>
';

// Se agrega el contenido HTML al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Se cierra y se muestra el documento PDF
$pdf->Output('example_004.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
