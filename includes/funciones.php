<?php
// includes/funciones.php

if (!defined('ABSPATH')) {
    exit; // Salir si se accede directamente
}

/**
 * Obtiene la URL de una imagen desde la carpeta assets/images.
 *
 * @param string $nombre_imagen Nombre del archivo de la imagen.
 * @return string URL completa de la imagen.
 */
function obtener_url_imagen($nombre_imagen) {
    return plugins_url('../assets/images/' . $nombre_imagen, __FILE__);
}
