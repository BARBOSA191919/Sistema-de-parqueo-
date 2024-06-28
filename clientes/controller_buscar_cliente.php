<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 19/9/2022
 * Time: 17:05
 */

 // Se incluye el archivo de configuración
include('../app/config.php');

// Se obtienen los parámetros de la URL
$placa = $_GET['placa'];
$id_map = $_GET['id_map'];

$placa = strtoupper($placa);//convierte todo a mayuscula

//echo "buscando la placa ".$placa;
// Se inicializan variables para la información del cliente
$id_cliente ='';
$nombre_cliente = '';
$nit_ci_cliente = '';

// Se busca el cliente en la base de datos
$query_buscars = $pdo->prepare("SELECT * FROM tb_clientes WHERE estado = '1' AND placa_auto = '$placa' ");
$query_buscars->execute();
$buscars = $query_buscars->fetchAll(PDO::FETCH_ASSOC);
foreach($buscars as $buscar){
    $id_cliente = $buscar['id_cliente'];
    $nombre_cliente = $buscar['nombre_cliente'];
    $nit_ci_cliente = $buscar['nit_ci_cliente'];
}

// Si el cliente no existe, se muestran campos para registrar uno nuevo
if($nombre_cliente == ""){
   // echo "el cliente es nuevo";
    ?>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Nombre: <span><b style="color: red">*</b></span></label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nombre_cliente<?php echo $id_map;?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">NIT/CI: <span><b style="color: red">*</b></span></label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nit_ci<?php echo $id_map;?>">
        </div>
    </div>
<?php
    // Si el cliente existe, se muestran sus datos

}else{
   // echo $nombre_cliente." - ".$nit_ci_cliente;
    ?>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Nombre: <span><b style="color: red">*</b></span></label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nombre_cliente<?php echo $id_map;?>" value="<?php echo $nombre_cliente; ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">NIT/CI: <span><b style="color: red">*</b></span></label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nit_ci<?php echo $id_map;?>" value="<?php echo $nit_ci_cliente; ?>" >
        </div>
    </div>
<?php
}



// Se busca si hay tickets asociados a la placa
$contador_ticket = 0;
$query_tickets = $pdo->prepare("SELECT * FROM tb_tickets WHERE placa_auto = '$placa' AND estado_ticket = 'OCUPADO' AND estado = '1'  ");
$query_tickets->execute();
$datos_tickets = $query_tickets->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_tickets as $datos_ticket){
    $contador_ticket = $contador_ticket + 1;
}
// Si no hay tickets asociados, se habilita el botón para registrar uno nuevo
if($contador_ticket == "0"){
    echo "no hay ningun registro igual";
    ?>
    <script>
        $('#btn_registrar_ticket<?php echo $id_map;?>').removeAttr('disabled');
    </script>
    <?php
}else{
   // echo "este vehicúlo ya esta dentro del parqueo";
       // Si hay tickets asociados, se muestra un mensaje y se deshabilita el botón para registrar
    ?>
    <div class="alert alert-danger">
        Este vehicúlo ya esta dentro del parqueo
    </div>
    <script>
        $('#btn_registrar_ticket<?php echo $id_map;?>').attr('disabled','disabled');
    </script>
<?php
}




?>