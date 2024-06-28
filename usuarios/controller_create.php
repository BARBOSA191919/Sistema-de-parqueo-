<?php
/**
 * Created by PhpStorm.
 * User: NEIVA YORK
 * Date: 27/4/2024
 * Time: 00:02
 */

include('../app/config.php');

//Se obtienen los datos del nuevo usuario desde el formulario.
$nombres = $_GET['nombres'];
$email = $_GET['email'];
$password_user = $_GET['password_user'];

// Se establece la zona horaria para la fecha y hora de creación del usuario.
date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

//  Se prepara la sentencia SQL para insertar el nuevo usuario en la base de datos.

$sentencia = $pdo->prepare("INSERT INTO tb_usuarios 
        (nombres,  email,  password_user, fyh_creacion, estado) 
VALUES (:nombres, :email, :password_user,:fyh_creacion,:estado)");

//  Se asocian los valores de las variables con los parámetros de la consulta.

$sentencia->bindParam('nombres',$nombres);
$sentencia->bindParam('email',$email);
$sentencia->bindParam('password_user',$password_user);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

//  Se ejecuta la sentencia SQL. Si la ejecución es exitosa, se muestra un mensaje de éxito y se
// redirige al usuario a la página de asignación de roles. En caso contrario, se muestra un mensaje de error.
if($sentencia->execute()){
    echo "registro satisfactorio";
    //header('index.php');
    ?>
    <script>location.href = "../roles/asignar.php";</script>
<?php
}else{
    echo "no se pudo registrar a la base de datos";
}