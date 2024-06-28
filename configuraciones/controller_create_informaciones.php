<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 28/9/2022
 * Time: 09:24
 */

include('../app/config.php');

// Se obtienen los datos del formulario a través de la solicitud GET
$nombre_parqueo = $_GET['nombre_parqueo'];
$actividad_empresa = $_GET['actividad_empresa'];
$sucursal = $_GET['sucursal'];
$direccion = $_GET['direccion'];
$zona = $_GET['zona'];
$telefono = $_GET['telefono'];
$departamento_ciudad = $_GET['departamento_ciudad'];
$pais = $_GET['pais'];

// Se establece la zona horaria actual
date_default_timezone_set("America/caracas");
// Se obtiene la fecha y hora actual
$fechaHora = date("Y-m-d h:i:s");

// Se prepara la sentencia SQL para insertar los datos en la tabla tb_informaciones
$sentencia = $pdo->prepare('INSERT INTO tb_informaciones
(nombre_parqueo,actividad_empresa,sucursal,direccion,zona,telefono,departamento_ciudad,pais, fyh_creacion, estado)
VALUES ( :nombre_parqueo,:actividad_empresa,:sucursal,:direccion,:zona,:telefono,:departamento_ciudad,:pais,:fyh_creacion,:estado)');

// Se vinculan los parámetros de la sentencia preparada con los datos obtenidos del formulario
$sentencia->bindParam(':nombre_parqueo',$nombre_parqueo);
$sentencia->bindParam(':actividad_empresa',$actividad_empresa);
$sentencia->bindParam(':sucursal',$sucursal);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':zona',$zona);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':departamento_ciudad',$departamento_ciudad);
$sentencia->bindParam(':pais',$pais);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

// Se ejecuta la sentencia SQL
if($sentencia->execute()){
    echo 'success'; // Se muestra un mensaje si la inserción es exitosa
//header('Location:' .$URL.'/');
    ?>
    <script>location.href = "informaciones.php";</script>
    <?php
}else{
    echo 'error al registrar a la base de datos'; // Se muestra un mensaje si ocurre un error en la inserción
}