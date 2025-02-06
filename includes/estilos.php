<?php
// includes/estilos.php

if (!defined('ABSPATH')) {
    exit; // Salir si se accede directamente
}

/**
 * Agrega los estilos al botón de accesibilidad del plugin.
 * Los estilos se cargan solo en la página de inicio.
 */
function agregar_estilos_plugin() {
    if (is_front_page()) {
        $url_estilos = '../assets/css/styles.css';
        wp_enqueue_style('mi-primer-plugin-estilos', plugins_url($url_estilos, __FILE__));
    }
}
add_action('wp_enqueue_scripts', 'agregar_estilos_plugin');