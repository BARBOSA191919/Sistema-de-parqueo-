<?php
include('../app/config.php');
// Incluye los datos de sesión del usuario administrador.
include('../layout/admin/datos_usuario_sesion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('../layout/admin/head.php'); ?> <!--Incluye el encabezado HTML común para todas las páginas administrativas. ?> -->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include('../layout/admin/menu.php'); ?>
    <div class="content-wrapper">
        <br>
        <div class="container">

            <h2>Creación de un nuevo rol</h2>

                        <!-- Contenedor principal -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card" style="border: 1px solid #606060">
                            <div class="card-header" style="background-color: #007bff;color: #ffffff;">
                                <h4>Nuevo Rol</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" class="form-control" id="nombre">
                                </div>
                                    <!-- Botones para guardar el nuevo rol o cancelar la acción -->

                                <div class="form-group">
                                    <button class="btn btn-primary" id="btn_guardar">Guardar</button>
                                    <a href="<?php echo $URL;?>/roles/" class="btn btn-default">Cancelar</a>
                                </div>
                            <!-- Div para mostrar la respuesta del servidor -->
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
    $('#btn_guardar').click(function () {
                // Obtiene el nombre del nuevo rol ingresado por el usuario
        var nombre = $('#nombre').val();

            // Verifica si el campo del nombre está vacío
        if(nombre == ""){
            alert('Debe de llenar el campo nombre');
            $('#nombre').focus(); // Hace foco en el campo del nombre para que el usuario lo complete
        }else{
        // Si el nombre no está vacío, realiza una solicitud GET al script de controlador para crear el nuevo rol

            var url = 'controller_create.php';
            $.get(url,{nombre:nombre},function (datos) {
                $('#respuesta').html(datos); // Muestra la respuesta del servidor en el contenedor de respuesta
            });
        }
    });
</script>
