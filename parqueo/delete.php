<?php
// Verificar si se ha enviado un ID válido
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Incluir el archivo de configuración de la base de datos
    include('../app/config.php');

    // Obtener el ID del espacio a eliminar
    $id_map = $_GET['id'];

    // Intentar eliminar el espacio de la base de datos
    try {
        // Preparar y ejecutar la consulta de eliminación
        $query = $pdo->prepare("DELETE FROM tb_mapeos WHERE id_map = :id_map");
        $query->bindParam(':id_map', $id_map);
        $query->execute();

        // Redirigir de nuevo a la página de listado de espacios después de eliminar
        header("Location: mapeo-de-vehiculos.php");
        exit();
    } catch(PDOException $e) {
        // Manejar errores de la base de datos, si es necesario
        echo "Error al eliminar el espacio: " . $e->getMessage();
    }
} else {
    // Si no se proporciona un ID válido, redirigir de vuelta a la página de listado de espacios
    header("Location: mapeo-de-vehiculos.php");
    exit();
}
?>
