<?php
// Incluir la biblioteca principal TCPDF
require_once('../app/templeates/TCPDF-main/tcpdf.php');
include('../app/config.php');


// Cargar la información del encabezado desde la base de datos
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
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(79,175), true, 'UTF-8', false);

// Configurar la información del documento PDF
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Sistema de parqueo');
$pdf->setTitle('Sistema de parqueo');
$pdf->setSubject('Sistema de parqueo');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// Remover el encabezado/pie de página predeterminado
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Establecer la fuente monoespaciada predeterminada
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Establecer la fuente monoespaciada predeterminada
$pdf->setMargins(5, 5, 5);
$pdf->setAutoPageBreak(true, 5);


// Establecer la escala de la imagen
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Agregar algunas cadenas dependientes del idioma (opcional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// Establecer la fuente y agregar una página
$pdf->setFont('Helvetica', '', 7);

// add a page
$pdf->AddPage();




// Crear contenido HTML para la factura
$html = '
<div>
    <p style="text-align: center">
        <b>'.$nombre_parqueo.'</b> <br>
        '.$actividad_empresa.' <br>
        SUCURSAL No '.$sucursal.' <br>
        '.$direccion.' <br>
        ZONA: '.$zona.' <br>
        TELÉFONO: '.$telefono.' <br>
        '.$departamento_ciudad.' - '.$pais.' <br>
        --------------------------------------------------------------------------------
         <b>FACTURA Nro.</b> 00001
        --------------------------------------------------------------------------------
        <div style="text-align: left">
           
            <b>DATOS DEL CLIENTE</b> <br>
            <b>SEÑOR(A): </b> JONATHAN SNACHEZ<br>
            <b>placa(A): </b> SJVN22<br>
            <b>NIT/CI.: </b> 12345678  <br>
            <b>Fecha de la factura: </b> La Paz, 11 de octubre de 2022  <br>
            -------------------------------------------------------------------------------- <br>
        <b>De: </b> 11/10/2022 <b>Hora: </b>18:00<br>
        <b>A: </b> 11/10/2022  <b>Hora: </b>20:00<br>
        <b>Tiempo:  </b> 2 horas en el cuvicúlo 10<br>
         -------------------------------------------------------------------------------- <br>
         <table border="1" cellpadding="3">
         <tr>
            <td style="text-align: center" width="99px"><b>Detalle</b></td>    
            <td style="text-align: center" WIDTH="45PX"><b>Precio</b></td>    
            <td style="text-align: center" width="45px"><b>Cantidad</b></td>    
            <td style="text-align: center" width="45px"><b>Total</b></td>    
         </tr>
         <tr>
            <td>Servicio de parqueo de 2 horas</td>
            <td style="text-align: center">Bs. 10</td>
            <td style="text-align: center">1</td>
            <td style="text-align: center">Bs. 10</td>
         </tr>
         </table>
         <p style="text-align: right">
         <b>Monto Total: </b> Bs. 10
        </p>
        <p>
            <b>Son: </b>Diez 00/100 Bs.
        </p>
        <br>
         -------------------------------------------------------------------------------- <br>
         <b>USUARIO:</b> FREDDY EDDY HILARI MICHUA <br><br><br><br><br><br><br><br><br>
         
        <p style="text-align: center">
        </p>
        <p style="text-align: center">"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS, EL USO ILÍCITO DE ÉSTA SERÁ SANCIONADO DE ACUERDO A LA LEY"
        </p>
        <p style="text-align: center"><b>GRACIAS POR SU PREFERENCIA</b></p>
        
        </div>
    </p>
    

</div>
';

// Escribir el contenido HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');


// Agregar un código QR a la factura
$style = array(
    'border' => 0,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

$QR = 'Factura realizada por el sistema de paqueo HILARI WEB, al cliente Freddy Hilari con nit: 837737277323 
con el vehiculo con numero de placa 3983FREDD y esta factura se genero en 21 de octubre de 2022 a hr: 18:00';
$pdf->write2DBarcode($QR,'QRCODE,L',  22,105,35,35, $style);




// Cerrar y mostrar el documento PDF
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
