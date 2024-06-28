<?php

include('../app/config.php');

// Iniciar la sesión
session_start();
// Verificar si existe una sesión de usuario activa
if(isset($_SESSION['usuario_sesion'])) {
        // Destruir la sesión actual
    session_destroy();
        // Redirigir al usuario a la página de inicio
    header("Location: ".$URL."/");
}