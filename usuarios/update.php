<?php
include('../app/config.php');
include('../layout/admin/datos_usuario_sesion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('../layout/admin/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include('../layout/admin/menu.php'); ?>
    <div class="content-wrapper">
        <br>
        <div class="container">


            <!--Obtiene el ID del usuario de la URL-->
            <?php
            $id_get = $_GET['id'];
            $query_usuario = $pdo->prepare("SELECT * FROM tb_usuarios WHERE id = '$id_get' AND estado = '1' ");
            $query_usuario->execute();
            $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
            foreach($usuarios as $usuario) {
                //se obtiene los datos de los usuarios
                $id = $usuario['id'];
                $nombres = $usuario['nombres'];
                $email = $usuario['email'];
                $password_user = $usuario['password_user'];
            }
            ?>

            <h2>Actualización del Usuario</h2>

            <!--se crea el formulario de edicion-->

            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        <div class="card card-success" style="border: 1px solid #777777">
                            <div class="card-header">
                                <h3 class="card-title">Edición del Usuario</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" value="<?php echo $nombres;?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" id="email" value="<?php echo $email;?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" class="form-control" id="password_user" value="<?php echo $password_user;?>">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" id="btn_editar">Actualizar</button>
                                    <a href="<?php echo $URL;?>/usuarios/" class="btn btn-default">Cancelar</a>
                                </div>
                                <div id="respuesta">

                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>

        </div>

    </div>
    <!-- enlaces necesarios para agarra el admin con footer -->
    <?php include('../layout/admin/footer.php'); ?>
</div>
<?php include('../layout/admin/footer_link.php'); ?>
</body>
</html>


<script>
    $('#btn_editar').click(function () {
        var nombres = $('#nombres').val(); // Obtiene el valor del campo Nombres
        var email = $('#email').val(); // Obtiene el valor del campo emai
        var password_user = $('#password_user').val(); // Obtiene el valor del campo contraseña
        var id_user = '<?php echo $id_get = $_GET['id'];?>'; // Obtiene el ID del usuario de la URL

        if(nombres == ""){
            alert('Debe de llenar el campo nombres');
            $('#nombres').focus();
        }else if(email == ""){
            alert('Debe de llenar el campo de email');
            $('#email').focus();
        }else if(password_user == ""){
            alert('Debe de llenar el campo de password');
            $('#password_user').focus();
        }else{
            var url = 'controller_update.php'; // Define la URL del controlador PHP encargado de actualizar el usuario
            // Realiza una petición GET al controlador PHP enviando los datos del usuario y el ID del usuario a actualizar
            $.get(url,{nombres:nombres, email:email, password_user:password_user,id_user:id_user},function (datos) {
                $('#respuesta').html(datos); // Inserta la respuesta del servidor en el elemento HTML con el ID 'respuesta'
            });
        }
    });
</script>
