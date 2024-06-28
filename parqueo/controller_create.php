<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 13/9/2022
 * Time: 09:55
 */

include('../app/config.php');

// Obtener los datos del espacio de estacionamiento desde la URL
$nro_espacio = $_GET['nro_espacio'];
$estado_espacio = $_GET['estado_espacio'];
$obs = $_GET['obs'];

// Obtener la fecha y hora actual en el formato deseado

date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

// Preparar la sentencia SQL para insertar un nuevo registro en la tabla tb_mapeos
$sentencia = $pdo->prepare("INSERT INTO tb_mapeos 
        (nro_espacio, estado_espacio, obs, fyh_creacion, estado) 
VALUES (:nro_espacio,:estado_espacio,:obs,:fyh_creacion,:estado)");

// Asociar los valores a los parámetros de la sentencia preparada
$sentencia->bindParam('nro_espacio',$nro_espacio);
$sentencia->bindParam('estado_espacio',$estado_espacio);
$sentencia->bindParam('obs',$obs);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

// Ejecutar la sentencia SQL y verificar si el registro se insertó correctamente
if($sentencia->execute()){
    echo "registro satisfactorio";
    //header('index.php');
    ?>
    <script>location.href = "mapeo-de-vehiculos.php";</script>
    <?php
}else{
    echo "no se pudo registrar a la base de datos";
}
