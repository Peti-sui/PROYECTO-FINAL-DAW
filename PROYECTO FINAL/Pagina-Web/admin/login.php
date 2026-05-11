<?php
/* Incluir la configuracion de la base de datos para gestionar las sesiones */
require_once '../includes/config.php';

/* Procesar el formulario cuando se envia mediante POST */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    /* Preparar y ejecutar la consulta para verificar las credenciales del administrador */
    $stmt = $conn->prepare("SELECT * FROM admin WHERE usuario = ? AND password = ?");
    $stmt->bind_param("ss", $usuario, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    /* Si las credenciales son correctas, iniciar sesion y redirigir al panel */
    if ($result->num_rows === 1) {
        $_SESSION['admin_logueado'] = true;
        $_SESSION['admin_usuario'] = $usuario;
        header('Location: index.php');
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - SWAGSCORD</title>
    <link rel="stylesheet" href="./">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../src/styles/style.css" />
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <h2>SWAGSCORD<br><span style="font-size: 18px;">Panel Administración</span></h2>
            <!-- Mostrar mensaje de error si las credenciales son incorrectas -->
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <label>Usuario</label>
                    <input type="text" name="usuario" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn-login">Entrar al Panel</button>
            </form>
        </div>
    </div>
</body>

</html>