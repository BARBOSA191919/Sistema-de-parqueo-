<?php
// Incluir la biblioteca principal TCPDF
require_once('../app/templeates/TCPDF-main/tcpdf.php');
include('../app/config.php');


// Cargar información de encabezado desde la base de datos
$query_informacions = $pdo->prepare("SELECT * FROM tb_informaciones WHERE estado = '1' ");
$query_informacions->execute();
$informacions = $query_informacions->fetchAll(PDO::FETCH_ASSOC);
foreach($informacions as $informacion){
        // Obtener información del parqueo
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


/////////// rescatar la informacion de la factura
$query_fascturas = $pdo->prepare("SELECT * FROM tb_facturaciones WHERE estado = '1' ");
$query_fascturas->execute();
$facturas = $query_fascturas->fetchAll(PDO::FETCH_ASSOC);
foreach($facturas as $factura){
    $id_facturacion = $factura['id_facturacion'];
    $id_informacion = $factura['id_informacion'];
    $nro_factura = $factura['nro_factura'];
    $id_cliente = $factura['id_cliente'];
    $fecha_factura = $factura['fecha_factura'];
    $fecha_ingreso = $factura['fecha_ingreso'];
    $hora_ingreso = $factura['hora_ingreso'];
    $fecha_salida = $factura['fecha_salida'];
    $hora_salida = $factura['hora_salida'];
    $tiempo = $factura['tiempo'];
    $cuviculo = $factura['cuviculo'];
    $detalle = $factura['detalle'];
    $precio = $factura['precio'];
    $cantidad = $factura['cantidad'];
    $total = $factura['total'];
    $monto_total = $factura['monto_total'];
    $monto_literal = $factura['monto_literal'];
    $user_sesion = $factura['user_sesion'];
    $qr = $factura['qr'];
}


/////////////////////// rescatando los datos del cliente//////////////////////////////////
$query_clientes = $pdo->prepare("SELECT * FROM tb_clientes WHERE id_cliente = '$id_cliente' AND estado = '1'  ");
$query_clientes->execute();
$datos_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_clientes as $datos_cliente){
    $id_cliente = $datos_cliente['id_cliente'];
    $nombre_cliente = $datos_cliente['nombre_cliente'];
    $nit_ci_cliente = $datos_cliente['nit_ci_cliente'];
    $placa_auto = $datos_cliente['placa_auto'];
}
/////////////////////////////////////////////////////////////////////////////////////////////




// create un nuevo docuemnto pdf
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(79,175), true, 'UTF-8', false);

// Configurar información del documento PDF
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Sistema de parqueo');
$pdf->setTitle('Sistema de parqueo');
$pdf->setSubject('Sistema de parqueo');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Configurar márgenes y saltos de página automáticos
$pdf->setMargins(5, 5, 5);
$pdf->setAutoPageBreak(true, 5);


// Establece escala de color
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
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
         <b>FACTURA Nro.</b> '.$nro_factura.'
        --------------------------------------------------------------------------------
        <div style="text-align: left">
           
            <b>DATOS DEL CLIENTE</b> <br>
            <b>SEÑOR(A): </b> '.$nombre_cliente.' <br>
            <b>PLACA(A): </b> '.$placa_auto.' <br>
            <b>NIT/CI.: </b> '.$nit_ci_cliente.'  <br>
            <b>Fecha de la factura: </b> '.$fecha_factura.' <br>
            -------------------------------------------------------------------------------- <br>
        <b>De: </b> '.$fecha_ingreso.'<b> Hora: </b>'.$hora_ingreso.'<br>
        <b>A: </b> '.$fecha_salida.'  <b>Hora: </b>'.$hora_salida.'<br>
        <b>Tiempo:  </b> '.$tiempo.'<br>
         -------------------------------------------------------------------------------- <br>
         <table border="1" cellpadding="2">
         <tr>
            <td style="text-align: center" width="99px"><b>Detalle</b></td>    
            <td style="text-align: center" WIDTH="45PX"><b>Precio</b></td>    
            <td style="text-align: center" width="45px"><b>Cantidad</b></td>    
            <td style="text-align: center" width="45px"><b>Total</b></td>    
         </tr>
         <tr>
            <td>'.$detalle.'</td>
            <td style="text-align: center">Bs. '.$precio.'</td>
            <td style="text-align: center">'.$cantidad.'</td>
            <td style="text-align: center">Bs. '.$total.'</td>
         </tr>
         </table>
         <p style="text-align: right">
         <b>Monto Total: </b> Bs. '.$monto_total.'
        </p>
        <p>
            <b>Son: </b>'.$monto_literal.'
        </p>
        <br>
         -------------------------------------------------------------------------------- <br>
         <b>USUARIO:</b> '.$user_sesion.' <br><br><br><br><br><br><br><br>
         
        <p style="text-align: center">
        </p>
        <p style="text-align: center">"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS. SU USO IMPROPIO SERÁ SANCIONADO POR LEY."
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

$pdf->write2DBarcode($qr,'QRCODE,L',  22,109,30,30, $style);




// Cerrar y mostrar el documento PDF
$pdf->Output('factura.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
