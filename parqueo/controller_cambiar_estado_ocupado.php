<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 6/10/2022
 * Time: 10:59
 */

include('../app/config.php');

// Obtener el identificador del espacio de estacionamiento a partir de la URL
$cuviculo = $_GET['cuviculo'];
$estado_espacio = "OCUPADO";


// Obtener la fecha y hora actual en el formato deseado
date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

// Preparar la sentencia SQL para actualizar el estado del espacio de estacionamiento
$sentencia = $pdo->prepare("UPDATE tb_mapeos SET
estado_espacio = :estado_espacio,
fyh_actualizacion = :fyh_actualizacion 
WHERE id_map = :id_map");

// Asociar los valores a los parámetros de la sentencia preparada
$sentencia->bindParam(':estado_espacio',$estado_espacio);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_map',$cuviculo);

// Ejecutar la sentencia SQL y verificar si la actualización fue exitosa
if($sentencia->execute()){
    echo "se actualizo el registro de la manera correcta";
    ?>
   <!-- <script>location.href = "../usuarios/";</script> -->
    <?php
}else{
    echo "error al actualizar el registro";
}