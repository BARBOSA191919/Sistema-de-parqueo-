<?php include('app/config.php');?> <!-- Incluye el archivo de configuración -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA DE PARQUEO</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> <!-- Enlace al archivo CSS de Bootstrap -->
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/110/PNG/96/studebaker_station_wagon_18541.png" type="image/x-icon"><!--para agregar el icono a la pagina -->

</head>
<body style="background-image: url('public/imagenes/fondo.jpg');
    background-repeat: no-repeat;
    z-index: -3;
    background-size: 100vw 100vh">

<!-- Creacion del menu de pagina de inicio- tarjeta adecuada -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="<?php echo $URL;?>/public/imagenes/auto1.png" width="20" height="30" alt="" loading="lazy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
<!-- trae sus respectivos enlace para enviarlos a  la informacion adecuada y se plantea a la izquierda de la pagina-->

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">INICIO <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://web.facebook.com/ParkingOficial/?_rdc=1&_rdr" target="_blank">SOBRE NOSOTROS</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    PROMOCIONES
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="https://www.parking.net.co/#/landing/enlaces-web" target="_blank">MENSUALES</a>
                    <a class="dropdown-item" href="https://www.parking.net.co/#/beparking/registro" target="_blank">DÍAS</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="https://www.parking.net.co/#/retentionCertificates/createUser" target="_blank">FICHAS</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://api.whatsapp.com/send?phone=3173620608&text=Felipe%20Sanch%C3%A9z" target="_blank">CONTACTANOS</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </form>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Ingresar
        </button>
    </div>
</nav>

<br>

<div class="container">
    <div class="row">
        <?php
                // Consulta a la base de datos para obtener los espacios de estacionamiento
        $query_mapeos = $pdo->prepare("SELECT * FROM tb_mapeos WHERE estado = '1' ");
        $query_mapeos->execute();
        $mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
        foreach($mapeos as $mapeo){
            // Iteración sobre los espacios de estacionamiento
            $id_map = $mapeo['id_map'];
            $nro_espacio = $mapeo['nro_espacio'];
            $estado_espacio = $mapeo['estado_espacio'];

            // Si el espacio está libre, mostrar un botón verde
            if($estado_espacio == "LIBRE"){ ?>
                <div class="col">
                    <center>
                        <h2><?php echo $nro_espacio;?></h2>
                        <button class="btn btn-success" style="width: 100%;height: 114px">
                            <p><?php echo $estado_espacio;?></p>
                        </button>
                    </center>
                </div>
                <?php
            }
            // Si el espacio está ocupado, mostrar un botón azul con la imagen de un auto

            if($estado_espacio == "OCUPADO"){ ?>
                <div class="col">
                    <center>
                        <h2><?php echo $nro_espacio;?></h2>
                        <button class="btn btn-info">
                            <img src="<?php echo $URL;?>/public/imagenes/auto1.png" width="60px" alt="">
                        </button>
                        <p><?php echo $estado_espacio;?></p>
                    </center>
                </div>
                <?php
            }
            ?>

            <?php
        }
        ?>


    </div>
</div>
<!--implementacion de jsquery, popper y bostrap para el diseño -->
    <script src="public/js/jquery-3.5.1.min.js"></script>
    <script src="public/js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="public/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>







<!-- Modal para iniciar sesión -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inicio de Sesión</h5>
                <!-- Botón para cerrar el modal -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Usuario/Email</label>
                            <input type="text" id="usuario" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input type="password" id="password" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Aquí se mostrará la respuesta del servidor -->
                <div id="respuesta">

                </div>
            </div>
            <div class="modal-footer">
                                <!-- Botón para cancelar el inicio de sesión y para ingresar -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_ingresar">Ingresar</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript para el manejo del inicio de sesión -->

<script>
        // Función que se ejecuta al hacer clic en el botón de inicio de sesión
    $('#btn_ingresar').click(function () {
        login();
    });
    // Función que se ejecuta al presionar Enter en el campo de contraseña
    $('#password').keypress(function (e) {
        if(e.width == 13){ // Verifica si la tecla presionada es Enter
            login();
        }
    });

        // Función para realizar la solicitud de inicio de sesión al servidor
    function login() {
        var usuario = $('#usuario').val();
        var password_user = $('#password').val();

        if(usuario == ""){
            alert('Debe Introducir su Usuario...');
            $('#usuario').focus();
        }else if(password_user == ""){
            alert('Debe Introducir su Contraseña...');
            $('#password').focus();
        }else{
            var url = 'login/controller_login.php' // URL del controlador de inicio de sesión
                // Realiza una solicitud POST al controlador de inicio de sesión
            $.post(url,{usuario:usuario, password_user:password_user},function (datos) {
                $('#respuesta').html(datos); // Muestra la respuesta del servidor en el elemento con id "respuesta"
            });
        }
    }

</script>

