<?php
require_once '../includes/config.php';

if (!isset($_SESSION['admin_logueado'])) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'] ?? 0;

$result = $conn->query("SELECT carpeta_imagenes FROM productos WHERE id = $id");
if ($result && $row = $result->fetch_assoc()) {
    $carpeta = $row['carpeta_imagenes'];
    if (is_dir($carpeta)) {
        $archivos = glob($carpeta . "*");
        foreach ($archivos as $archivo) {
            if (is_file($archivo))
                unlink($archivo);
        }
        rmdir($carpeta);
    }
}

$conn->query("DELETE FROM productos WHERE id = $id");
header('Location: index.php');
exit();
?>