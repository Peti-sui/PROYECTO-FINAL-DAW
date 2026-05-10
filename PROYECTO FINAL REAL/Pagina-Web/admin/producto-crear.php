<?php
/* Activar la visualizacion de errores para facilitar la depuracion */
error_reporting(E_ALL);
ini_set('display_errors', 1);

/* Incluir los archivos necesarios para la configuracion y las funciones */
require_once '../includes/config.php';
require_once '../includes/funciones.php';

/* Verificar que el usuario haya iniciado sesion como administrador */
if (!isset($_SESSION['admin_logueado'])) {
    header('Location: login.php');
    exit();
}

/* Obtener todas las categorias disponibles para el selector del formulario */
$categorias = $conn->query("SELECT * FROM categorias");
$mensaje = '';

/* Procesar el formulario de creacion de producto */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria_id = $_POST['categoria_id'];
    $stock = $_POST['stock'];

    /* Crear una carpeta unica para las imagenes del nuevo producto */
    $carpeta_unica = '../uploads/' . uniqid() . '/';
    mkdir($carpeta_unica, 0777, true);

    /* Ruta relativa para almacenar en la base de datos */
    $carpeta_bd = 'uploads/' . basename($carpeta_unica) . '/';

    /* Extensiones de imagen permitidas */
    $extensiones_permitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif'];
    $errores_archivos = [];

    /* Subir las imagenes seleccionadas a la carpeta creada */
    if (isset($_FILES['imagenes']) && !empty($_FILES['imagenes']['name'][0])) {
        foreach ($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {
            $nombre_archivo = $_FILES['imagenes']['name'][$key];
            $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

            /* Validar la extension del archivo */
            if (!in_array($extension, $extensiones_permitidas)) {
                $errores_archivos[] = $nombre_archivo;
                continue;
            }

            /* Mover el archivo subido a la carpeta del producto */
            if ($_FILES['imagenes']['error'][$key] === 0) {
                move_uploaded_file($tmp_name, $carpeta_unica . $nombre_archivo);
            }
        }
    }

    /* Mostrar alerta si hay archivos no permitidos */
    if (!empty($errores_archivos)) {
        echo '<script>alert("Archivos no permitidos: ' . implode(", ", $errores_archivos) . '");</script>';
    } else {
        /* Insertar el producto en la base de datos */
        $stmt = $conn->prepare("INSERT INTO productos (nombre, descripcion, precio, carpeta_imagenes, categoria_id, stock) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdsii", $nombre, $descripcion, $precio, $carpeta_bd, $categoria_id, $stock);

        if ($stmt->execute()) {
            /* Redirigir al panel principal si la operacion fue exitosa */
            header('Location: index.php?creado=1');
            exit();
        } else {
            $error = "Error al crear: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto - SWAGSCORD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../src/styles/style.css">
</head>

<body style="background-color: #440203" class="admin-panel">
    <header>
        <a href="index.php">
            <img class="logo-header" src="../img/logo-SWAGSCORD.png" alt="Logo-Marca">
        </a>
        <a href="index.php" style="color: inherit;">
            <div class="SWAGSCORD-ADMIN">SWAGSCORD - ADMIN</div>
        </a>
        <div class="hamburger2" id="hamburgerBtn">
            <span></span><span></span><span></span>
        </div>
        <ul class="nav-menu2" id="navMenu">
            <li><a href="index.php" class="nav-link2">Panel</a></li>
            <li><a href="producto-crear.php" class="nav-link2">Nuevo Producto</a></li>
            <li><a href="../index.php" class="nav-link2">Ver Tienda</a></li>
            <li><a href="logout.php" class="nav-link2" style="color: #ffaa00;">Cerrar Sesión</a></li>
        </ul>
    </header>

    <main class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-white">Crear Nuevo Producto</h1>
            <a href="index.php" class="btn btn-secondary">← Volver</a>
        </div>

        <?php echo $mensaje; ?>

        <div class="card bg-dark text-white p-4">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label>Precio (€)</label>
                    <input type="number" step="0.01" name="precio" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Categoría</label>
                    <select name="categoria_id" class="form-control">
                        <?php while ($cat = $categorias->fetch_assoc()): ?>
                            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nombre']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Imágenes (puedes seleccionar varias)</label>
                    <input type="file" name="imagenes[]" class="form-control" accept="image/*" multiple required>
                    <small class="text-muted">Selecciona todas las fotos del producto</small>
                </div>
                <div class="mb-3">
                    <label>Stock</label>
                    <input type="number" name="stock" class="form-control" value="0">
                </div>
                <button type="submit" class="btn btn-danger">Crear Producto</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </main>

    <footer>
        <div class="position-relative">
            <div class="d-flex justify-content-center align-items-center gap-3">
                <img class="metodos-pagos" src="../img/metodos-pago.png">
                <img class="bizum" src="../img/Bizum.png">
            </div>
            <div class="copy position-absolute start-50 translate-middle-x text-center w-100"
                style="background-color: white;">
                copyright © 2026 SWAGSCORD. Todos los derechos reservados.
                Página realizada por Kevin Alejandro Ramos Bernal - Scoo
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../src/app/script.js"></script>
</body>

</html>