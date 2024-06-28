<?php
//============================================================+
// File name   : Reporte de usuarios.php
// Begin       : 2003-03-04
// Last Update : 2013-05-14
//
// Description : Reporte de usuarios for TCPDF class
//               Cell stretching
//
// Author: Jonatan Sanchéz
//
// (c) Copyright:
//               Jonatan Sanchéz
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Cell stretching
 * @author Jonatan Sanchéz
 * @since 2003-03-04
 */

// Incluye la biblioteca principal TCPDF (buscar la ruta de instalación).
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
$pdf->setTitle('Reporte de usuarios');
$pdf->setSubject('Reporte de usuarios');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

$PDF_HEADER_TITLE = $nombre_parqueo;
$PDF_HEADER_STRING = $direccion.' Telf: '.$telefono;
$PDF_HEADER_LOGO = 'auto4.jpg';
// Establecer datos de encabezado predeterminados
$pdf->setHeaderData($PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);

// Establecer fuentes de encabezado y pie de página
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Establecer fuente monoespaciada predeterminada
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Establecer márgenes
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// Establecer saltos de página automáticos
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Establecer factor de escala de imagen
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Establecer algunas cadenas dependientes del idioma (opcional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// Establecer fuente
$pdf->setFont('Helvetica', '', 11);

// Agregar una página
$pdf->AddPage();

// Crear algún contenido HTML
$html = '
<P><b>Reporte del Listado de Usuarios</b></P>
<table border="1" cellpadding="4">
<tr>
<td style="background-color: #c0c0c0;text-align: center">Nro</td>
<td style="background-color: #c0c0c0;text-align: center">Nombres</td>
<td style="background-color: #c0c0c0;text-align: center">Email</td>
<td style="background-color: #c0c0c0;text-align: center">Rol</td>
</tr>
';
$contador = 0;
$query_usuario = $pdo->prepare("SELECT * FROM tb_usuarios WHERE estado = '1' ");
$query_usuario->execute();
$usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios as $usuario){
    $id = $usuario['id'];
    $nombres = $usuario['nombres'];
    $email = $usuario['email'];
    $rol = $usuario['rol'];
    $contador = $contador + 1;

    $html .= '
    <tr>
    <td style="text-align: center">'.$contador.'</td>
    <td >'.$nombres.'</td>
    <td>'.$email.'</td>
    <td>'.$rol.'</td>
    </tr>
    ';


}

$html.='
</table>
';

// Salida del contenido HTML
$pdf->writeHTML($html, true, false, true, false, '');

// Cerrar y generar el documento PDF
$pdf->Output('Reporte de usuarios.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
