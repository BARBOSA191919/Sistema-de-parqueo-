<?php
include('../app/config.php');
// Se incluye el archivo que contiene los datos del usuario en sesión
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

            <h2>Eliminación de la información</h2>

            <br>
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <?php
                        //Se obtiene el ID de la información a eliminar

                        $id_informacion_get = $_GET['id'];
                        $query_informacions = $pdo->prepare("SELECT * FROM tb_informaciones WHERE estado = '1' AND id_informacion = '$id_informacion_get' ");
                        $query_informacions->execute();
                        $informacions = $query_informacions->fetchAll(PDO::FETCH_ASSOC);
                        foreach($informacions as $informacion){

                        // Se obtienen los datos de la información a eliminar
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
                            <!-- Se muestran los datos de la información a eliminar -->
                                <div class="col-md-5">
                                    <label for="">Nombre del parqueo <span style="color: red"><b></b></span></label>
                                    <input type="text" class="form-control" id="nombre_parqueo" value="<?php echo $nombre_parqueo; ?>" disabled>
                                </div>
                                <div class="col-md-5">
                                    <label for="">Actividad de la empresa <span style="color: red"><b></b></span></label>
                                    <input type="text" class="form-control" id="actividad_empresa" value="<?php echo $actividad_empresa; ?>" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label for="">Sucursal <span style="color: red"><b></b></span></label>
                                    <input type="text" class="form-control" id="sucursal" value="<?php echo $sucursal; ?>" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Dirección <span style="color: red"><b></b></span></label>
                                    <input type="text" class="form-control" id="direccion" value="<?php echo $direccion; ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Zona <span style="color: red"><b></b></span></label>
                                    <input type="text" class="form-control" id="zona" value="<?php echo $zona; ?>" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Teléfono <span style="color: red"><b></b></span></label>
                                    <input type="text" class="form-control" id="telefono" value="<?php echo $telefono; ?>" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Departamento o ciudad <span style="color: red"><b></b></span></label>
                                    <input type="text" class="form-control" id="departamento_ciudad" value="<?php echo $departamento_ciudad; ?>" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="">País <span style="color: red"><b></b></span></label>
                                    <input type="text" class="form-control" id="pais" value="<?php echo $pais; ?>" disabled>
                                </div>
                            </div>

                            <hr>

                                                        <!-- Botones para cancelar o eliminar -->
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="informaciones.php" class="btn btn-default btn-block">Cancelar</a>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-danger btn-block" id="btn_borrar_informacion">
                                        Eliminar
                                    </button>
                                </div>
                            </div>

                                                        <!-- Div para mostrar la respuesta del servidor -->
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
<?php include('../layout/admin/footer_link.php'); ?> <!-- Se incluyen los enlaces JavaScript -->
</body>
</html>


<script>
    $('#btn_borrar_informacion').click(function () {
        // Se obtiene el ID de la información a eliminar
        var id_informacion = '<?php echo $id_informacion_get; ?>';

        // Se envía una solicitud al controlador para eliminar la información
        var url = 'controller_delete_informaciones.php';
            $.get(url,{id_informacion:id_informacion},function (datos) {
                $('#respuesta').html(datos); // Se muestra la respuesta del servidor en el div de respuesta
            });

    });
</script>
