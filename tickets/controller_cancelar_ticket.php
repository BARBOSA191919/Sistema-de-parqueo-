<?php
/**
 * Created by PhpStorm.
 * User: NEIVA TORK
 * Date: 7/04/2024
 * Time: 13:06
 */

include('../app/config.php');


// Obtener los parámetros enviados por GET
$id_ticket = $_GET['id'];
$cuviculo = $_GET['cuviculo'];

// Estado inactivo para el ticket
$estado_inactivo = "0";

// Obtener la fecha y hora actual en formato adecuado
date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

// Preparar y ejecutar la consulta para actualizar el estado del ticket
$sentencia = $pdo->prepare("UPDATE tb_tickets SET
estado = :estado,
fyh_eliminacion = :fyh_eliminacion 
WHERE id_ticket = :id_ticket");

$sentencia->bindParam(':estado',$estado_inactivo);
$sentencia->bindParam(':fyh_eliminacion',$fechaHora);
$sentencia->bindParam(':id_ticket',$id_ticket);

    // Actualizar el estado del espacio de estacionamiento asociado al ticket a "LIBRE"
if($sentencia->execute()){

    //actualizando el estado del cuviculo de ocupado a libre
    $estado_espacio = "LIBRE";
    $sentencia2 = $pdo->prepare("UPDATE tb_mapeos SET
    estado_espacio = :estado_espacio,
    fyh_actualizacion = :fyh_actualizacion 
    WHERE nro_espacio = :nro_espacio");

    $sentencia2->bindParam(':estado_espacio',$estado_espacio);
    $sentencia2->bindParam(':fyh_actualizacion',$fechaHora);
    $sentencia2->bindParam(':nro_espacio',$cuviculo);

        // Si la consulta de actualización del espacio de estacionamiento se ejecuta correctamente
    if($sentencia2->execute()){
        echo "se actualizo el estado del civuculo a libre";
        echo "se elimino el registro de la manera correcta";
        ?>
        <script>location.href = "../principal.php";</script>
        <?php
    }else{
        echo "error al actualizar el campo nro de espacio del cuviculo";
    }

}else{
    echo "error al eliminar el registro";
}