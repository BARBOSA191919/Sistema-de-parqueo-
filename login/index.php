<?php
include('../app/config.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sesión Parqueadero</title>
    <!-- Indica al navegador que sea sensible al ancho de pantalla -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- stilos -->
    <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
    <!-- iconos -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!--  bootstrap -->
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/110/PNG/96/studebaker_station_wagon_18541.png" type="image/x-icon"><!--para agregar el icono a la pagina -->
    <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://www.carroya.com/noticias/sites/default/files/entradillas/432216777nidoo-parqueaderos-cy.jpg" rel="stylesheet">
    <!-- Estilo para el fondo -->
    <style>
    .login-page {
    background-image: url('https://erroreshistoricos.com/wp-content/uploads/2023/01/cuales-son-las-medidas-de-un-aparcamiento.jpg');
    background-size: cover;
}

.login-logo a {
    color: red !important; /* Cambia el color del texto a blanco */
    font-size: 24px; /* Cambia el tamaño del texto */
    font-weight: bold; /* Texto en negrita */
    font-family: 'Arial', sans-serif; /* Cambia el tipo de letra */
}

.login-card-body {
    background: rgba(255, 255, 255, 0.7); /* Fondo blanco con opacidad del 70% */
        backdrop-filter: blur(5x); /* Efecto de desenfoque para mejorar la transparencia */
}
.card {
    background: rgba(255, 255, 255, 0.4); /* Fondo blanco con opacidad del 70% */
}
    </style>

</head>

<body class="hold-transition login-page" >


<center>
    <img src="<?php echo $URL;?>/public/imagenes/auto1.png" width="100px" alt=""> <br><br>
</center>
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>SISTEMA DE</b> PARQUEO</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Inicio de sesión</p>

                <!--    METODOLOGIA PARA INICIAR SESION Y LA CREACION DE LA SESION -->

            <form action="controller_login.php" method="post">
                <input type="text" name="form_login" value="form_login" hidden>
                <div class="input-group mb-3">
                    <input type="email" name="usuario" class="form-control" placeholder="Email" > 
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <img src="https://cdn.icon-icons.com/icons2/1826/PNG/96/4202011emailgmaillogomailsocialsocialmedia-115677_115624.png" height="20" width="20">

                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password_user" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <img src="https://cdn.icon-icons.com/icons2/1880/PNG/96/iconfinder-lock-4341303_120563.png" height="20" width="20">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- SE INGRESA -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                    </div>
                    
                </div>
            </form>
            
        </div>
        
    </div>
</div>


<!-- jQuery -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>

</body>
</html>
