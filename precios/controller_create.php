<?php
/**
 * Created by PhpStorm.
 * User: Jonatan Sanchéz
 * Date: 20/10/2022
 * Time: 22:26
 */

 /**
 * Script para registrar un nuevo precio en la base de datos.
 * Este script recibe datos por GET y los inserta en la tabla tb_precios.
 * Se espera recibir los siguientes parámetros por GET:
 * - cantidad: la cantidad del producto o servicio.
 * - detalle: descripción detallada del producto o servicio.
 * - precio: precio del producto o servicio.
 */


include('../app/config.php');

// Obtener los datos enviados por GET
$cantidad = $_GET['cantidad'];
$detalle = $_GET['detalle'];
$precio = $_GET['precio'];

// Obtener la fecha y hora actual
date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

// Preparar la consulta SQL para insertar los datos en la tabla tb_precios
$sentencia = $pdo->prepare('INSERT INTO tb_precios
(cantidad,detalle,precio, fyh_creacion, estado)
VALUES ( :cantidad,:detalle,:precio,:fyh_creacion,:estado)');

// Asociar los parámetros de la consulta con las variables
$sentencia->bindParam(':cantidad',$cantidad);
$sentencia->bindParam(':detalle',$detalle);
$sentencia->bindParam(':precio',$precio);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

// Ejecutar la consulta
if($sentencia->execute()){
    echo 'success';
        // Redirigir al usuario a la página principal
    ?>
    <script>location.href = "index.php";</script>
<?php
}else{
    echo 'error al registrar a la base de datos';
}