<?php

// Iniciar sesión
session_start();
// Verificar si existe una sesión de usuario activa
if(isset($_SESSION['usuario_sesion'])) {
        // Obtener el nombre de usuario de la sesión
    $usuario_sesion = $_SESSION['usuario_sesion'];

        // Consultar la información del usuario en la base de datos
    $query_usuario_sesion = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$usuario_sesion' AND estado = '1' ");
    $query_usuario_sesion->execute();
    $usuarios_sesions = $query_usuario_sesion->fetchAll(PDO::FETCH_ASSOC);
        // Recorrer los resultados de la consulta
    foreach($usuarios_sesions as $usuarios_sesion){
        $id_user_sesion = $usuarios_sesion['id'];
        $nombres_sesion = $usuarios_sesion['nombres'];
        $email_sesion = $usuarios_sesion['email'];
        $rol_sesion = $usuarios_sesion['rol'];

    }
}else{
        // Si no hay sesión activa, mostrar un mensaje de advertencia y redirigir al usuario a la página de inicio de sesión
    echo "para ingresar a esta plataforma debe de iniciar sesión";
    header('Location: '.$URL.'/login');
}

//echo "Bienvenido Administrador";

?>