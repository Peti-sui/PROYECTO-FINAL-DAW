<?php
/* Incluir la configuracion de la base de datos */
require_once '../includes/config.php';

/* Verificar que el usuario haya iniciado sesion como administrador */
if (!isset($_SESSION['admin_logueado'])) {
    header('Location: login.php');
    exit();
}

/* Obtener el ID del producto a eliminar desde la URL */
$id = $_GET['id'] ?? 0;

/* Obtener la carpeta de imagenes del producto para borrarla */
$result = $conn->query("SELECT carpeta_imagenes FROM productos WHERE id = $id");
if ($result && $row = $result->fetch_assoc()) {
    $carpeta = $row['carpeta_imagenes'];
    /* Eliminar todos los archivos de la carpeta del producto */
    if (is_dir($carpeta)) {
        $archivos = glob($carpeta . "*");
        foreach ($archivos as $archivo) {
            if (is_file($archivo))
                unlink($archivo);
        }
        /* Eliminar la carpeta vacia */
        rmdir($carpeta);
    }
}

/* Eliminar el producto de la base de datos */
$conn->query("DELETE FROM productos WHERE id = $id");
/* Redirigir al panel principal */
header('Location: index.php');
exit();
?>