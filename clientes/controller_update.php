<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 11/10/2022
 * Time: 08:15
 */
include('../app/config.php');

// Se obtienen los datos del cliente desde la URL
$nombre_cliente = $_GET['nombre_cliente'];
$nit_ci_cliente = $_GET['nit_ci_cliente'];
$placa_auto = $_GET['placa_auto'];
$id_cliente = $_GET['id_cliente'];

// Se establece la zona horaria
date_default_timezone_set("America/caracas");
// Se obtiene la fecha y hora actual
$fechaHora = date("Y-m-d h:i:s");
//echo $nombres."-".$email."-".$password_user;

// Se prepara la sentencia SQL para actualizar los datos del cliente
$sentencia = $pdo->prepare("UPDATE tb_clientes SET
nombre_cliente = :nombre_cliente,
nit_ci_cliente = :nit_ci_cliente,
placa_auto = :placa_auto,
fyh_actualizacion = :fyh_actualizacion 
WHERE id_cliente = :id_cliente");

// Se vinculan los parámetros de la sentencia con los valores obtenidos
$sentencia->bindParam(':nombre_cliente',$nombre_cliente);
$sentencia->bindParam(':nit_ci_cliente',$nit_ci_cliente);
$sentencia->bindParam(':placa_auto',$placa_auto);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_cliente',$id_cliente);

// Se ejecuta la sentencia SQL
if($sentencia->execute()){
        // Si la actualización es exitosa, se muestra un mensaje y se redirige al usuario
    echo "se actualizo el registro de la manera correcta";
    ?>
    <script>location.href = "index.php";</script>
    <?php
}else{
        // Si hay un error en la actualización, se muestra un mensaje de error
    echo "error al actualizar el registro";
}