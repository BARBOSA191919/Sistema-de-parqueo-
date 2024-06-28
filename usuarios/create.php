<?php
// Incluir archivos de configuración y de datos de usuario de sesión
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

            <h2>Creación de un nuevo Usuario</h2>

            <!--FOMULARIO PARA NUEVO USUARIO -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card" style="border: 1px solid #606060">
                            <div class="card-header" style="background-color: #007bff;color: #ffffff;">
                                <h4>Nuevo Usuario</h4>
                            </div>
                            <div class="card-body">
                               <div class="form-group">
                                   <label for="">Nombres</label>
                                   <input type="text" class="form-control" id="nombres">
                               </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" class="form-control" id="password_user">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" id="btn_guardar">Guardar</button>
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
    <!-- /.content-wrapper -->
    <?php include('../layout/admin/footer.php'); ?>
</div>
<?php include('../layout/admin/footer_link.php'); ?>
</body>
</html>


<script>
    $('#btn_guardar').click(function () { // Función que se ejecuta al hacer clic en el botón Guardar
        var nombres = $('#nombres').val(); // Obtiene el valor del campo Nombres , email y contraseña
        var email = $('#email').val();
        var password_user = $('#password_user').val();

        if(nombres == ""){ // Verifica si el campo Nombres está vacío
            alert('Debe de llenar el campo nombres'); // Muestra una alerta si el campo Nombres está vacío
            $('#nombres').focus(); // Hace foco en el campo Nombres y asu con el email y contra
        }else if(email == ""){
            alert('Debe de llenar el campo de email');
            $('#email').focus();
        }else if(password_user == ""){
            alert('Debe de llenar el campo de password');
            $('#password_user').focus();
        }else{ // Si todos los campos están llenos
            var url = 'controller_create.php';
            $.get(url,{nombres:nombres, email:email, password_user:password_user},function (datos) { // Realiza una petición GET al controlador PHP enviando los datos del usuario
                $('#respuesta').html(datos);  // Muestra la respuesta del servidor en el elemento con el id 'respuesta'
            });
        }
    });
</script>
