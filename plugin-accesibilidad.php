<?php
/**
 * Plugin Name: Complemento universal de accesibilidad web
 * Description: Plugin de accesibilidad universal para wordpress.
 * Version:     1.0
 * Author:      Germán Riveros
 * Author URI:  https://germanriveros.cl
 */


//Verificación de seguridad.
if (!defined('ABSPATH')) {
    exit;
}

function agregar_boton_menu() {
    $url_img = 'assets/images/boton_menu.webp';

    if (is_front_page()) { 
        $ruta_imagen = plugins_url($url_img, __FILE__);
        echo '<div class="' . esc_attr('menu-imagen') . '"><img src="' . esc_url($ruta_imagen) . '" alt="' . esc_attr('Menú accesibilidad') . '"></div>';
    }
}

add_action('wp_body_open', 'agregar_boton_menu');

function agregar_estilos_plugin() {

    if(is_front_page()) {
        $url_estilos = 'assets/css/styles.css';
        wp_enqueue_style('mi-primer-plugin-estilos', plugins_url($url_estilos, __FILE__));
    }


}

add_action('wp_enqueue_scripts', 'agregar_estilos_plugin');



?>

