<?php
// Incluir el archivo de configuración de la aplicación
include('../app/config.php');
// Incluir los datos de sesión del usuario administrador
include('../layout/admin/datos_usuario_sesion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
<link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/110/PNG/96/studebaker_station_wagon_18541.png" type="image/x-icon"><!--para agregar el icono a la pagina -->
    <?php include('../layout/admin/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include('../layout/admin/menu.php'); ?>
    <div class="content-wrapper">
        <br>
        <div class="container">

            <h2>Actualización de la información</h2>

            <br>
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Registre los datos con mucho cuidado</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>


                        <?php
                        // Obtener el ID de la información a actualizar desde la URL
                        $id_informacion_get = $_GET['id'];
                        $query_informacions = $pdo->prepare("SELECT * FROM tb_informaciones WHERE estado = '1' AND id_informacion = '$id_informacion_get' ");
                        $query_informacions->execute();
                        $informacions = $query_informacions->fetchAll(PDO::FETCH_ASSOC);
                        foreach($informacions as $informacion){
                            // Obtener los datos del parqueo
                            $id_informacion = $informacion['id_informacion'];
                            $nombre_parqueo = $informacion['nombre_parqueo'];
                            $actividad_empresa = $informacion['actividad_empresa'];
                            $sucursal = $informacion['sucursal'];
                            $direccion = $informacion['direccion'];
                            $zona = $informacion['zona'];
                            $telefono = $informacion['telefono'];
                            $departamento_ciudad = $informacion['departamento_ciudad'];
                            $pais = $informacion['pais'];
                        }
                        ?>

                        <div class="card-body" style="display: block;">

                            <div class="row">
                                <div class="col-md-5">
                                    <label for="">Nombre del parqueo <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="nombre_parqueo" value="<?php echo $nombre_parqueo; ?>">
                                </div>
                                <div class="col-md-5">
                                    <label for="">Actividad de la empresa <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="actividad_empresa" value="<?php echo $actividad_empresa; ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Sucursal <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="sucursal" value="<?php echo $sucursal; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Dirección <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="direccion" value="<?php echo $direccion; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Zona <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="zona" value="<?php echo $zona; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Teléfono <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="telefono" value="<?php echo $telefono; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Departamento o ciudad <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="departamento_ciudad" value="<?php echo $departamento_ciudad; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="">País <span style="color: red"><b>*</b></span></label>
                                    <input type="text" class="form-control" id="pais" value="<?php echo $pais; ?>">
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="informaciones.php" class="btn btn-default btn-block">Cancelar</a>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-success btn-block" id="btn_actualizar_informacion">
                                        Actualizar
                                    </button>
                                </div>
                            </div>
                            <!-- Aquí se mostrará la respuesta del servidor -->

                            <div id="respuesta">

                            </div>


                        </div>

                    </div>



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
        // JavaScript para manejar la acción de actualización
    $('#btn_actualizar_informacion').click(function () {

                // Obtener los valores de los campos del formulario
        var nombre_parqueo = $('#nombre_parqueo').val();
        var actividad_empresa = $('#actividad_empresa').val();
        var sucursal = $('#sucursal').val();
        var direccion = $('#direccion').val();
        var zona = $('#zona').val();
        var telefono = $('#telefono').val();
        var departamento_ciudad = $('#departamento_ciudad').val();
        var pais = $('#pais').val();
        var id_informacion = '<?php echo $id_informacion_get; ?>';

        // Validar que los campos obligatorios no estén vacíos
        if(nombre_parqueo == ""){
            alert('Debe de llenar el campo nombre del parqueo');
            $('#nombre_parqueo').focus();
        }else if(actividad_empresa == ""){
            alert('Debe de llenar el campo actividad de la empresa');
            $('#actividad_empresa').focus();
        }else if(sucursal == ""){
            alert('Debe de llenar el campo sucursal');
            $('#sucursal').focus();
        }else if(direccion == ""){
            alert('Debe de llenar el campo dirección');
            $('#direccion').focus();
        }else if(zona == ""){
            alert('Debe de llenar el campo zona');
            $('#zona').focus();
        }else if(telefono == ""){
            alert('Debe de llenar el campo telefono');
            $('#telefono').focus();
        }else if(departamento_ciudad == ""){
            alert('Debe de llenar el campo departamento o ciudad');
            $('#departamento_ciudad').focus();
        }else if(pais == ""){
            alert('Debe de llenar el campo país');
            $('#pais').focus();
        }else{
            // Si todos los campos están completos, realizar la actualización
            // Realizar la petición AJAX al servidor para actualizar la información
            var url = 'controller_update_informaciones.php';
            $.get(url,{nombre_parqueo:nombre_parqueo,actividad_empresa:actividad_empresa,sucursal:sucursal,direccion:direccion,zona:zona,telefono:telefono,departamento_ciudad:departamento_ciudad,pais:pais,id_informacion:id_informacion},function (datos) {
                $('#respuesta').html(datos);   // Mostrar la respuesta del servidor en el div de respuesta
            });
        }
    });
</script>
