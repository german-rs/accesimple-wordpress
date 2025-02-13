<?php
/**
 * Plugin Name: Accesimple WordPress
 * Plugin URI:  https://github.com/german-rs/accesimple-wordpress
 * Description: Plugin de accesibilidad para wordpress.
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
require_once plugin_dir_path(__FILE__) . 'includes/scripts.php';
require_once plugin_dir_path(__FILE__) . 'includes/panel-accesibilidad.php';

?>

