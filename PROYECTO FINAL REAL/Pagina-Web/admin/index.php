<?php
/* Verificar si el usuario ha iniciado sesion como administrador */
require_once '../includes/config.php';
require_once '../includes/funciones.php';

if (!isset($_SESSION['admin_logueado'])) {
    /* Si no hay sesion activa, redirigir al formulario de login */
    header('Location: login.php');
    exit();
}

/* Consulta para obtener todos los productos junto con el nombre de su categoria */
$productos = $conn->query("
    SELECT p.*, c.nombre as categoria 
    FROM productos p 
    LEFT JOIN categorias c ON p.categoria_id = c.id 
    ORDER BY p.id DESC
");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - SWAGSCORD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
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
            <h1 class="text-white">Panel de Administracion</h1>
            <span class="text-white" style="font-size: 20px;">Bienvenido,
                <?php echo $_SESSION['admin_usuario']; ?></span>
        </div>

        <!-- Formulario de busqueda de productos -->
        <div class="card bg-dark text-white p-3 mb-4">
            <form method="GET" class="row g-3">
                <div class="col-md-8">
                    <input type="text" name="buscar" class="form-control"
                        placeholder="Buscar por nombre, descripción o categoría..."
                        value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : ''; ?>">
                </div>
                <div class="buscar col-md-2">
                    <button type="submit" class="btn btn-primary w-100"
                        style="background-color:#D4AF37; color: #1A1A1A;border:none;">Buscar</button>
                </div>
                <div class=" limpiar col-md-2">
                    <a href="index.php" class="btn w-100"
                        style="background-color:#E5E5E5; color: #440203; border:none; ">Limpiar</a>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    /* Obtener el termino de busqueda ingresado por el usuario */
                    $buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';
                    if (!empty($buscar)) {
                        /* Filtrar productos por nombre, descripcion o categoria */
                        $productos = $conn->query("
                            SELECT p.*, c.nombre as categoria 
                            FROM productos p 
                            LEFT JOIN categorias c ON p.categoria_id = c.id 
                            WHERE p.nombre LIKE '%$buscar%' 
                            OR p.descripcion LIKE '%$buscar%' 
                            OR c.nombre LIKE '%$buscar%'
                            ORDER BY p.id DESC
                        ");
                    } else {
                        /* Mostrar todos los productos si no hay busqueda */
                        $productos = $conn->query("
                            SELECT p.*, c.nombre as categoria 
                            FROM productos p 
                            LEFT JOIN categorias c ON p.categoria_id = c.id 
                            ORDER BY p.id DESC
                        ");
                    }

                    /* Recorrer cada producto para mostrar sus datos en la tabla */
                    while ($prod = $productos->fetch_assoc()):
                        /* Buscar la primera imagen del producto en su carpeta */
                        $carpeta_fisica = '../' . $prod['carpeta_imagenes'];
                        $imagenes = glob($carpeta_fisica . "*.{jpg,jpeg,png,gif,webp,avif,svg,JPG,JPEG,PNG,GIF,WEBP,AVIF,SVG}", GLOB_BRACE);
                        $primera = !empty($imagenes) ? str_replace('../', '', $imagenes[0]) : '';
                        ?>
                        <tr>
                            <td><?php echo $prod['id']; ?></td>
                            <td>
                                <?php if ($primera): ?>
                                    <img src="../<?php echo $primera; ?>" width="50" height="50" style="object-fit: cover;">
                                <?php else: ?>
                                    <span class="text-muted">Sin imagen</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($prod['nombre']); ?></td>
                            <td><?php echo $prod['categoria']; ?></td>
                            <td><?php echo number_format($prod['precio'], 2); ?> €</td>
                            <td><?php echo $prod['stock']; ?> ud</td>
                            <td style="max-width: 300px;">
                                <?php echo htmlspecialchars(substr($prod['descripcion'], 0, 80)); ?>...
                            </td>
                            <td>
                                <!-- Botones para editar o eliminar el producto -->
                                <a href="producto-editar.php?id=<?php echo $prod['id']; ?>"
                                    class="btn btn-primary text-white btn-sm" style="margin-bottom:10px;">Editar</a>
                                <a href="producto-eliminar.php?id=<?php echo $prod['id']; ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar este producto?')"
                                    style="margin-bottom:10px;">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <!-- Mostrar el termino de busqueda si se ha realizado una consulta -->
        <?php if (isset($_GET['buscar']) && !empty($_GET['buscar'])): ?>
            <p class="text-white mt-3">Resultados para: <strong><?php echo htmlspecialchars($_GET['buscar']); ?></strong>
            </p>
        <?php endif; ?>
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