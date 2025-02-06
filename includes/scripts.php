<?php
// includes/scripts.php

if (!defined('ABSPATH')) {
    exit; // Salir si se accede directamente
}

/**
 * Agrega los scripts del plugin.
 */
function agregar_scripts_plugin() {
    if (is_front_page()) {
        $url_script = '../assets/js/script.js';
        wp_enqueue_script('script-plugin-accesibilidad', plugins_url($url_script, __FILE__), array(), null, true);
    }
}
add_action('wp_enqueue_scripts', 'agregar_scripts_plugin');