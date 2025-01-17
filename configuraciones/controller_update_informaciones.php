<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 28/9/2022
 * Time: 16:56
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
$id_informacion = $_GET['id_informacion'];

date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

// Se prepara la sentencia SQL para actualizar los datos de la información en la tabla tb_informaciones
$sentencia = $pdo->prepare("UPDATE tb_informaciones SET
nombre_parqueo = :nombre_parqueo,
actividad_empresa = :actividad_empresa,
sucursal = :sucursal,
direccion = :direccion,
zona = :zona,
telefono = :telefono,
departamento_ciudad = :departamento_ciudad,
pais = :pais,
fyh_actualizacion = :fyh_actualizacion 
WHERE id_informacion = :id_informacion");

// Se vinculan los parámetros de la sentencia preparada con los valores correspondientes
$sentencia->bindParam(':nombre_parqueo',$nombre_parqueo);
$sentencia->bindParam(':actividad_empresa',$actividad_empresa);
$sentencia->bindParam(':sucursal',$sucursal);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':zona',$zona);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':departamento_ciudad',$departamento_ciudad);
$sentencia->bindParam(':pais',$pais);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_informacion',$id_informacion);

// Se ejecuta la sentencia SQL
if($sentencia->execute()){
    echo 'success';
//header('Location:' .$URL.'/');
    ?>
    <script>location.href = "informaciones.php";</script>
    <?php
}else{
    echo 'error al registrar a la base de datos';
}