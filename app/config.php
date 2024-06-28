<?php

// Define constantes para la conexión a la base de datos
define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','parqueo');

// Construye la cadena de conexión usando las constantes definidas
$servidor="mysql:dbname=".BD.";host=".SERVIDOR;

try{
        // Intenta conectarse a la base de datos usando PDO
    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "La conexión a la base de datos fue exitosa";
}catch (PDOException $e){
    // echo "Error a la base de datos";
    echo "<script>alert('Error en la conexión a la base de datos');</script>";
}

// Define una URL

$URL='http://localhost/www.sisparqueo.com';

// Define un estado de registro
$estado_del_registro = "1";

?>
