<?php
/**
 * Created by PhpStorm.
 * User: NEIVA YORK
 * Date: 31/04/2024
 * Time: 01:03
 */

include('../app/config.php');

//Se obtienen los datos del USUARIO PARA ACTUALIZAR desde el formulario.

$nombres = $_GET['nombres'];
$email = $_GET['email'];
$password_user = $_GET['password_user'];
$id_user = $_GET['id_user'];

// Se establece la zona horaria para la fecha y hora de creación del usuario.
date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");
//echo $nombres."-".$email."-".$password_user;

//  Se prepara la sentencia SQL para insertar la actualizacionen la base de datos.
$sentencia = $pdo->prepare("UPDATE tb_usuarios SET
nombres = :nombres,
email = :email,
password_user = :password_user,
fyh_actualizacion = :fyh_actualizacion 
WHERE id = :id");

//  Se asocian los valores de las variables con los parámetros de la consulta.
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':password_user',$password_user);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id',$id_user);

//  Se ejecuta la sentencia SQL. Si la ejecución es exitosa, se muestra un mensaje de éxito y se
// redirige al usuario a la página de asignación de roles. En caso contrario, se muestra un mensaje de error.
if($sentencia->execute()){
    echo "se actualizo el registro de la manera correcta";
    ?>
    <script>location.href = "../usuarios/";</script>
    <?php
}else{
    echo "error al actualizar el registro";
}