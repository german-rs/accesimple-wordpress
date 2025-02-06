<?php
// includes/boton-menu.php

if (!defined('ABSPATH')) {
    exit; // Salir si se accede directamente
}

/**
 * Agrega un botón de menú en la página de inicio.
 * El botón se muestra solo si el usuario está en la página principal.
 */
function agregar_boton_menu() {
    $url_img = 'boton_menu.webp';

    if (is_front_page()) { 
        $ruta_imagen = obtener_url_imagen($url_img);
        echo '<div class="' . esc_attr('accesibilidad') . '"><img id="accesibilidad__boton" class="' . esc_attr('accesibilidad__boton') . '" src="' . esc_url($ruta_imagen) . '" alt="' . esc_attr('Menú accesibilidad') . '"></div>';
    }
}
add_action('wp_body_open', 'agregar_boton_menu');