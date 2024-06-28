<?php
/**
 * Created by PhpStorm.
 *  * Script para registrar un nuevo ticket de estacionamiento en la base de datos.
 * User: HILARIWEB
 * Date: 3/10/2022
 * Time: 11:55
 */


include('../app/config.php');

// Obtener los parámetros enviados por GET
$placa = $_GET['placa'];
$placa = strtoupper($placa);//convierte todo a mayuscula
$nombre_cliente = $_GET['nombre_cliente'];
$nit_ci = $_GET['nit_ci'];
$cuviculo = $_GET['cuviculo'];
$fecha_ingreso = $_GET['fecha_ingreso'];
$hora_ingreso = $_GET['hora_ingreso'];
$user_sesion = $_GET['user_session'];
$estado_ticket = "OCUPADO";

// Obtener la fecha y hora actual en formato adecuado
date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

// Preparar y ejecutar la consulta para insertar el nuevo ticket en la base de datos
$sentencia = $pdo->prepare('INSERT INTO tb_tickets
(placa_auto,nombre_cliente,nit_ci,cuviculo,fecha_ingreso,hora_ingreso,estado_ticket,user_sesion, fyh_creacion, estado)
VALUES ( :placa_auto,:nombre_cliente,:nit_ci,:cuviculo,:fecha_ingreso,:hora_ingreso,:estado_ticket,:user_sesion,:fyh_creacion,:estado)');

// Vincular los parámetros a los marcadores de posición en la consulta
$sentencia->bindParam(':placa_auto',$placa);
$sentencia->bindParam(':nombre_cliente',$nombre_cliente);
$sentencia->bindParam(':nit_ci',$nit_ci);
$sentencia->bindParam(':cuviculo',$cuviculo);
$sentencia->bindParam(':fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam(':hora_ingreso',$hora_ingreso);
$sentencia->bindParam(':estado_ticket',$estado_ticket);
$sentencia->bindParam(':user_sesion',$user_sesion);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro); // Variable $estado_del_registro no definida

// Si la consulta se ejecuta correctamente
if($sentencia->execute()){
    echo 'success'; // Mensaje de éxito
    ?>
    <script>location.href = "tickets/generar_ticket.php";</script> <!-- Redireccionar a la página de generación de ticket -->
    <?php
}else{
    echo 'error al registrar a la base de datos';
}