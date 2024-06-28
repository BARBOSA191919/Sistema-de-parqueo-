<?php
// Incluye la libreria TCPDF 
require_once('../app/templeates/TCPDF-main/tcpdf.php');
include('../app/config.php');


// Cargar la información del encabezado desde la base de datos informacion
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


// Cargar la información del ticket desde la base de datos del tickets
$query_tickets = $pdo->prepare("SELECT * FROM tb_tickets WHERE estado = '1' ");
$query_tickets->execute();
$tickets = $query_tickets->fetchAll(PDO::FETCH_ASSOC);
foreach($tickets as $ticket){
    $id_ticket = $ticket['id_ticket'];
    $nombre_cliente = $ticket['nombre_cliente'];
    $nit_ci = $ticket['nit_ci'];
    $placa_auto = $ticket['placa_auto'];
    $cuviculo = $ticket['cuviculo'];
    $fecha_ingreso = $ticket['fecha_ingreso'];
    $hora_ingreso = $ticket['hora_ingreso'];
    $user_sesion = $ticket['user_sesion'];
}


// Crear un nuevo documento PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(79,80), true, 'UTF-8', false);

// Establecer información del documento
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Jonatan Sanchéz');
$pdf->setTitle('Reporte ticket');
$pdf->setSubject('Reporte ticket');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// Establecer fuente por defecto
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Establecer márgenes
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Establecer saltos de página automáticos
$pdf->setMargins(5, 5, 5);

// Establecer escala de imagen
$pdf->setAutoPageBreak(true, 5);


// Establecer escala de imagen
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Establecer algunos textos dependientes del idioma (opcional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// Establecer fuente
$pdf->setFont('Helvetica', '', 7);

// Agregar una página
$pdf->AddPage();




// Crear contenido HTML
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
        <div style="text-align: left">
            <b>DATOS DEL CLIENTE</b> <br>
            <b>SEÑOR(A): </b> '.$nombre_cliente.' <br>
            <b>PLACA(A): </b> '.$placa_auto.' <br>
            <b>NIT/CI.: </b> '.$nit_ci.'  <br>
            -------------------------------------------------------------------------------- <br>
        <b>Cuviculo de parqueo: </b> '.$cuviculo.' <br>
        <b>Fecha de ingreso: </b> '.$fecha_ingreso.' <br>
        <b>Hora de ingreso: </b> '.$hora_ingreso.' <br>
         -------------------------------------------------------------------------------- <br>
         <b>USUARIO:</b> '.$user_sesion.'
        </div>
    </p>
    

</div>
';

// Insertar el contenido HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');


// Cerrar y generar el documento PDF
$pdf->Output('Reporte ticket.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
