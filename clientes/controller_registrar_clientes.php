<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 6/10/2022
 * Time: 11:52
 */

include('../app/config.php');

// Se obtienen los datos del cliente desde la URL
$nombre_cliente = $_GET['nombre_cliente'];
$nit_ci_cliente = $_GET['nit_ci'];
$placa_auto = $_GET['placa'];

// Se establece la zona horaria
date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");


// Se inicializa un contador para verificar si el cliente ya está registrado
$contador_cliente = 0;
// Se ejecuta una consulta para buscar al cliente en la base de datos
$query_clientes = $pdo->prepare("SELECT * FROM tb_clientes WHERE placa_auto = '$placa_auto' AND estado = '1'  ");
$query_clientes->execute();
$datos_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_clientes as $datos_cliente){
    $contador_cliente = $contador_cliente + 1;
}
// Si el cliente no está registrado, se procede a registrarlo
if($contador_cliente == "0"){   
    echo "no hay ningun registro igual";
        // Se prepara la sentencia SQL para insertar al nuevo cliente en la base de datos
    $sentencia = $pdo->prepare('INSERT INTO tb_clientes
(nombre_cliente,nit_ci_cliente,placa_auto, fyh_creacion, estado)
VALUES ( :nombre_cliente,:nit_ci_cliente,:placa_auto,:fyh_creacion,:estado)');

    // Se vinculan los parámetros de la sentencia con los valores obtenidos
    $sentencia->bindParam(':nombre_cliente',$nombre_cliente);
    $sentencia->bindParam(':nit_ci_cliente',$nit_ci_cliente);
    $sentencia->bindParam(':placa_auto',$placa_auto);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    $sentencia->bindParam('estado',$estado_del_registro);

        // Se ejecuta la sentencia SQL
    if($sentencia->execute()){
        echo 'success';
//header('Location:' .$URL.'/');
    }else{
        echo 'error al registrar a la base de datos';
    }
}else{
        // Si el cliente ya está registrado, se muestra un mensaje
    echo "este cliente ya es encuentra registrado";
}


