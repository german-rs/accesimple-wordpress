<?php
/**
 * Plugin Name: Accesimple WordPress
 * Plugin URI:  https://github.com/german-rs/accesimple-wordpress
 * Description: Plugin de accesibilidad para wordpress.
 * Version:     1.0
 * Author:      Germán Riveros
 * Author URI:  https://germanriveros.cl
 * License: GPL-3.0
 */


 if (!defined('ABSPATH')) {
    exit;
}

// Definir constantes
define('ACCESIMPLE_VERSION', '1.0.0');
define('ACCESIMPLE_PATH', plugin_dir_path(__FILE__));
define('ACCESIMPLE_URL', plugin_dir_url(__FILE__));

// Autoloader
spl_autoload_register(function ($class) {
    // Solo procesar nuestras clases
    if (strpos($class, 'Accesimple\\') !== 0) {
        return;
    }

    // Convertir namespace a ruta de archivo
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = str_replace('Accesimple', '', $file);
    $file = ACCESIMPLE_PATH . 'includes' . strtolower($file) . '.php';

    // Modificar la última parte del nombre del archivo para usar guiones
    $file_parts = explode(DIRECTORY_SEPARATOR, $file);
    $file_parts[count($file_parts) - 1] = 'class-' . str_replace('_', '-', $file_parts[count($file_parts) - 1]);
    $file = implode(DIRECTORY_SEPARATOR, $file_parts);

    if (file_exists($file)) {
        require_once $file;
    } 
});


// Inicializar el plugin
add_action('plugins_loaded', function() {
    
    if (class_exists('Accesimple\\Core\\Init')) {
        
        Accesimple\Core\Init::get_instance();
    } 
});

 ?>
