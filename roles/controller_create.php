<?php
/**
 * Created by PhpStorm.
 * User: NEIVA YORK
 * Date: 5/9/2024
 * Time: 17:25
 */
include('../app/config.php');

$nombre = $_GET['nombre'];

// Establece la zona horaria para obtener la fecha y hora actual.
date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");

// Prepara una sentencia SQL para insertar un nuevo rol en la tabla 'tb_roles'.

$sentencia = $pdo->prepare("INSERT INTO tb_roles 
        (nombre,  fyh_creacion, estado) 
VALUES (:nombre, :fyh_creacion,:estado)");

$sentencia->bindParam('nombre',$nombre);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

    // Si la ejecución es exitosa, muestra un mensaje de éxito y redirige a la página de inicio.
if($sentencia->execute()){
    echo "registro satisfactorio";
    //header('index.php');
    ?>
    <script>location.href = "index.php";</script>
    <?php
}else{
    echo "no se pudo registrar a la base de datos";
}