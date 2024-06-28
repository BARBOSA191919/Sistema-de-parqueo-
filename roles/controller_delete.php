<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 7/9/2024
 * Time: 17:36
 */

include('../app/config.php');

// Obtiene el ID del rol a desactivar de la URL utilizando el método GET.
$id_rol = $_GET['id_rol'];
$estado_inactivo = "0";

// Establece la zona horaria para obtener la fecha y hora actual.
date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("UPDATE tb_roles SET
estado = :estado,
fyh_eliminacion = :fyh_eliminacion 
WHERE id_rol = :id_rol");

// Prepara una sentencia SQL para actualizar el estado del rol a inactivo en la tabla 'tb_roles'.
$sentencia->bindParam(':estado',$estado_inactivo);
$sentencia->bindParam(':fyh_eliminacion',$fechaHora);
$sentencia->bindParam(':id_rol',$id_rol);

    // Si la ejecución es exitosa, muestra un mensaje de éxito y redirige a la página de roles.
if($sentencia->execute()){
    echo "se elimino el registro de la manera correcta";
    ?>
    <script>location.href = "../roles/";</script>
    <?php
}else{
    echo "error al eliminar el registro";
}