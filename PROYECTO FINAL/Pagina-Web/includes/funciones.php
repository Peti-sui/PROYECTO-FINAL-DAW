<?php
/* Funcion para obtener todas las imagenes de una carpeta */
function obtenerImagenesDeCarpeta($carpeta)
{
    $imagenes = [];

    /* Extensiones de imagen validas */
    $extensiones = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif', 'svg'];

    /* Convertir ruta relativa a ruta absoluta del servidor */
    $ruta_absoluta = $_SERVER['DOCUMENT_ROOT'] . '/' . $carpeta;

    /* Probar tambien con ruta relativa directa */
    if (!is_dir($ruta_absoluta) && is_dir($carpeta)) {
        $ruta_absoluta = $carpeta;
    }

    /* Escanear la carpeta si existe */
    if (is_dir($ruta_absoluta)) {
        $archivos = scandir($ruta_absoluta);
        foreach ($archivos as $archivo) {
            if ($archivo == '.' || $archivo == '..')
                continue;

            $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
            if (in_array($extension, $extensiones)) {
                /* Guardar ruta relativa para usar en HTML */
                $imagenes[] = $carpeta . $archivo;
            }
        }
    }

    return $imagenes;
}

/* Funcion para obtener solo la primera imagen de una carpeta (util para carruseles del index) */
function obtenerPrimeraImagen($carpeta)
{
    $imagenes = obtenerImagenesDeCarpeta($carpeta);
    return !empty($imagenes) ? $imagenes[0] : '';
}

/* Funcion para escapar texto HTML y prevenir XSS */
function h($texto)
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}
?>