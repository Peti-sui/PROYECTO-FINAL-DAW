<?php
/**
 * Obtiene todas las imágenes de una carpeta
 * @param string $carpeta Ruta relativa a la carpeta (ej: "img/Accesorios/MI-PRODUCTO/")
 * @return array Lista de rutas de imágenes encontradas
 */
function obtenerImagenesDeCarpeta($carpeta)
{
    $imagenes = [];

    /*  Extensiones de imagen válidas */
    $extensiones = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif', 'svg'];

    /* Convertir ruta relativa a ruta absoluta del servidor */
    $ruta_absoluta = $_SERVER['DOCUMENT_ROOT'] . '/' . $carpeta;

    /*  También probar con ruta relativa directa */
    if (!is_dir($ruta_absoluta) && is_dir($carpeta)) {
        $ruta_absoluta = $carpeta;
    }

    if (is_dir($ruta_absoluta)) {
        $archivos = scandir($ruta_absoluta);
        foreach ($archivos as $archivo) {
            if ($archivo == '.' || $archivo == '..')
                continue;

            $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
            if (in_array($extension, $extensiones)) {
                /* Guardar ruta relativa (para HTML) */
                $imagenes[] = $carpeta . $archivo;
            }
        }
    }

    return $imagenes;
}

/**
 * Obtiene solo la primera imagen de una carpeta (para carruseles)
 * @param string $carpeta Ruta relativa a la carpeta
 * @return string Ruta de la primera imagen o cadena vacía
 */
function obtenerPrimeraImagen($carpeta)
{
    $imagenes = obtenerImagenesDeCarpeta($carpeta);
    return !empty($imagenes) ? $imagenes[0] : '';
}

/**
 * Escapa texto para HTML (seguridad)
 */
function h($texto)
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}
?>