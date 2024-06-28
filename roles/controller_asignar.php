<?php
/**
 * Created by PhpStorm.
 * User: NEIVA YORK
 * Date: 8/9/2024
 * Time: 17:58
 */

 // Incluye el archivo de configuración para establecer la conexión a la base de datos.
include('../app/config.php');

// Obtiene los datos del formulario utilizando el método POST.
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$id_user = $_POST['id_user'];
$rol = $_POST['rol'];

// Establece la zona horaria para obtener la fecha y hora actual.
date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

// Prepara una sentencia SQL para actualizar el rol del usuario en la tabla 'tb_usuarios'.
$sentencia = $pdo->prepare("UPDATE tb_usuarios SET
rol = :rol
WHERE id = :id");
$sentencia->bindParam(':rol',$rol);
$sentencia->bindParam(':id',$id_user);

    // Si la ejecución es exitosa, muestra un mensaje de éxito y redirige a la página de asignación de roles.
if($sentencia->execute()){
    echo "Se asigno el rol de manera correcta";
    ?>
    <script>location.href = "../roles/asignar.php";</script>
    <?php
}else{
    echo "error al asignar el rol al usuario";
}