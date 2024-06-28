<?php

include('../app/config.php');

session_start();

// Obtener el usuario y la contraseña del formulario
$usuario_user = $_POST['usuario'];
$password_user = $_POST['password_user'];

// Verificar si se envió el formulario de inicio de sesión
$form_login = "";
if($_POST['form_login']){
    $form_login = 'true';
}

// Inicializar las variables para almacenar el email y la contraseña de la tabla
$email_tabla = ''; $password_tabla = '';

// Consultar la base de datos para verificar las credenciales del usuario
$query_login = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$usuario_user' AND password_user = '$password_user' AND estado = '1' ");
$query_login->execute();
$usuarios = $query_login->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios as $usuario){
    $email_tabla = $usuario['email'];
    $password_tabla = $usuario['password_user'];
}

// Verificar si las credenciales son correctas
if(($usuario_user == $email_tabla)&&($password_user == $password_tabla)){
    if($form_login==""){ ?>
        <div class="alert alert-success" role="alert">
            Usuario Correcto
        </div>
        <script>location.href = "principal.php";</script>
        <?php
    }else{ ?>
        <div class="alert alert-success" role="alert">
            Usuario Correcto
        </div>
        <script>location.href = "../principal.php";</script>
        <?php
    }
    ?>

    <?php
    $_SESSION['usuario_sesion'] = $email_tabla;
}else{
        // Mostrar un mensaje de error si las credenciales son incorrectas
    ?>
    <div class="alert alert-danger" role="alert">
        Error al introducir sus datos
    </div>
    <script>$('#password').val("");$('#password').focus();</script>
    <?php
}


