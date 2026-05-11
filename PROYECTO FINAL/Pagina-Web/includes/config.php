<?php
/* Iniciar la sesion para gestionar la autenticacion del administrador */
session_start();

/* Datos de conexion a la base de datos */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'swagscord';

/* Establecer la conexion con MySQL */
$conn = new mysqli($host, $user, $pass, $db);

/* Verificar si la conexion fue exitosa */
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

/* Configurar el juego de caracteres para evitar problemas con tildes y caracteres especiales */
$conn->set_charset("utf8mb4");
?>