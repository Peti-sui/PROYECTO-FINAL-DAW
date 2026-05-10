<?php
/* Iniciar la sesion y destruir todos los datos de la misma */
session_start();
session_destroy();
/* Redirigir al formulario de login */
header('Location: login.php');
exit();
?>