<?php
//============================================================+
// File name   : PARQUEDAERO NEIVA YORK
// Begin       : 2003-03-04
// Last Update : 2013-05-14
//
// Description : Example 004 for TCPDF class
//               Cell stretching
//
// Author: JONTAHAN SANCHEZ
//
// (c) Copyright:
//              JONTAHAN SANCHEZ
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Crea un documento PDF de ejemplo TEST usando TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Cell stretching
 * @author JONTAHAN SANCHEZ
 * @since 2003-03-04
 */

// Incluye la biblioteca principal de TCPDF (busca la ruta de instalación).
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



// Crea un nuevo documento PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establece la información del documento
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Jonatan Sanchéz');
$pdf->setTitle('Listado de espacios');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');



$PDF_HEADER_TITLE = $nombre_parqueo;
$PDF_HEADER_STRING = $direccion.' Telf: '.$telefono;
$PDF_HEADER_LOGO = 'auto4.jpg';

// Establece los datos de encabezado predeterminados
$pdf->setHeaderData($PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);

// Establece las fuentes de encabezado y pie de página
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Establece la fuente monoespaciada predeterminada
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Establece los márgenes
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// Establece el factor de escala de imagen
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Establece los márgenes
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Establece algunas cadenas dependientes del idioma (opcional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// Establece la fuente
$pdf->setFont('Helvetica', '', 11);

// Agrega una página
$pdf->AddPage();


$html = '
<P><b>Reporte del Listado de espacios</b></P>
<table border="1" cellpadding="4">
<tr>
<td style="background-color: #c0c0c0;text-align: center" width="80px">Nro</td>
<td style="background-color: #c0c0c0;text-align: center" width="100px">Nro de espacio</td>
</tr>
';
$contador = 0;
$query_mapeos = $pdo->prepare("SELECT * FROM tb_mapeos WHERE estado = '1' ");
$query_mapeos->execute();
$mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
foreach($mapeos as $mapeo){
    $id_map = $mapeo['id_map'];
    $nro_espacio = $mapeo['nro_espacio'];
    $contador = $contador + 1;

    $html .= '
    <tr>
    <td style="text-align: center">'.$contador.'</td>
    <td style="text-align: center">'.$nro_espacio.'</td>
    </tr>
    ';


}

$html.='
</table>
';

// Salida del contenido HTML
$pdf->writeHTML($html, true, false, true, false, '');

// Cierra y muestra el documento PDF
$pdf->Output('parqueadero.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

