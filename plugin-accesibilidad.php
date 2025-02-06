<?php
/**
 * Plugin Name: Complemento universal de accesibilidad web
 * Plugin URI:  https://github.com/german-rs/plugin-accesibilidad-wp
 * Description: Plugin de accesibilidad universal para wordpress.
 * Version:     1.0
 * Author:      Germán Riveros
 * Author URI:  https://germanriveros.cl
 */


//Verificación de seguridad.
if (!defined('ABSPATH')) {
    exit;
}

// Carga los archivos de la carpeta includes
require_once plugin_dir_path(__FILE__) . 'includes/funciones.php';
require_once plugin_dir_path(__FILE__) . 'includes/boton-menu.php';
require_once plugin_dir_path(__FILE__) . 'includes/estilos.php';


?>

