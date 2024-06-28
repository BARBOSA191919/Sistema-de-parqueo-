<?php
/**
 * Created by PhpStorm.
 * User: NEIVA YORK
 * Date: 5/04/2024
 * Time: 11:02
 */

include('../app/config.php');

//Se obtienen los datos del USUARIO a eliminar desde el formulario.
$id_user = $_GET['id_user'];
$estado_inactivo = "0";

// Se establece la zona horaria para la fecha y hora de creación del usuario.
date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

//  Se prepara la sentencia SQL para eliminar en la base de datos.
$sentencia = $pdo->prepare("UPDATE tb_usuarios SET
estado = :estado,
fyh_eliminacion = :fyh_eliminacion 
WHERE id = :id");
//  Se asocian los valores de las variables con los parámetros de la consulta.

$sentencia->bindParam(':estado',$estado_inactivo);
$sentencia->bindParam(':fyh_eliminacion',$fechaHora);
$sentencia->bindParam(':id',$id_user);

//  Se ejecuta la sentencia SQL. Si la ejecución es exitosa, se muestra un mensaje de éxito y se
// redirige al usuario a la página de asignación de roles. En caso contrario, se muestra un mensaje de error.
if($sentencia->execute()){
    echo "se elimino el registro de la manera correcta";
    ?>
    <script>location.href = "../usuarios/";</script>
    <?php
}else{
    echo "error al eliminar el registro";
}