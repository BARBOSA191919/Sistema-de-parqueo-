<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 21/10/2022
 * Time: 07:37
 */

include('../app/config.php');

// Obtener los datos enviados por GET
$cantidad = $_GET['cantidad'];
$detalle = $_GET['detalle'];
$precio = $_GET['precio'];
$id_precio = $_GET['id_precio'];

// Obtener la fecha y hora actual
date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

// Preparar la consulta SQL para actualizar los datos en la tabla tb_precios
$sentencia = $pdo->prepare("UPDATE tb_precios SET
cantidad = :cantidad,
detalle = :detalle,
precio = :precio,
fyh_actualizacion = :fyh_actualizacion 
WHERE id_precio = :id_precio");

// Asociar los parámetros de la consulta con las variables
$sentencia->bindParam(':cantidad',$cantidad);
$sentencia->bindParam(':detalle',$detalle);
$sentencia->bindParam(':precio',$precio);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_precio',$id_precio);

// Ejecutar la consulta
if($sentencia->execute()){
    echo 'success';
//header('Location:' .$URL.'/');
    ?>
    <script>location.href = "index.php";</script>
    <?php
}else{
    echo 'error al registrar a la base de datos';
}