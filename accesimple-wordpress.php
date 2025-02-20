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


/*
 * Este bloque de código asegura que el archivo no se pueda acceder 
 * directamente desde fuera de WordPress. ABSPATH es una constante definida 
 * por WordPress que representa la ruta absoluta al directorio de instalación 
 * de WordPress. Si no está definida, el script se detiene.
 */
 if (!defined('ABSPATH')) {
    exit;
}

//Constantes del plugin.
define('ACCESIMPLE_VERSION', '1.0.0'); // Versión actual del plugin.
define('ACCESIMPLE_PATH', plugin_dir_path(__FILE__)); // Ruta absoluta al directorio del plugin.
define('ACCESIMPLE_URL', plugin_dir_url(__FILE__)); // URL absoluta al directorio del plugin.

// Autoloader.
/**
 * Registra una función de autoload que se ejecuta automáticamente cuando 
 * se intenta instanciar una clase que no ha sido cargada aún. Esto es parte 
 * de las mejores prácticas de PHP para evitar cargar manualmente las clases.
 */
spl_autoload_register(function ($class) {
    
    /**
     * Verifica si la clase pertenece al namespace Accesimple. Si no es así, 
     * la función de autoload no hace nada. Esto asegura que solo se carguen 
     * las clases específicas del plugin.
     */
    if (strpos($class, 'Accesimple\\') !== 0) {
        return;
    }

    
    // Convierte el namespace de la clase en una ruta de archivo.
    /**
     * Reemplaza todas las barras invertidas (\) en el namespace con 
     * el separador de directorio del sistema operativo (DIRECTORY_SEPARATOR), 
     * que es / en Unix/Linux y \ en Windows.
     */
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    /**
     * Elimina la parte del namespace base (Accesimple) de la ruta, ya que no 
     * es necesario para construir la ruta del archivo.
     */
    $file = str_replace('Accesimple', '', $file);

    /**
     * Construye la ruta completa del archivo.
     * ACCESIMPLE_PATH: Es la ruta absoluta al directorio del plugin.
     * strtolower($file): Convierte la ruta a minúsculas para asegurar que sea compatible 
     * con sistemas de archivos que distinguen entre mayúsculas y minúsculas.
     */
    $file = ACCESIMPLE_PATH . 'includes' . strtolower($file) . '.php';


    // Se modifica la última parte del nombre del archivo para usar guiones.
    /**
     * Divide la ruta del archivo en un array, usando el separador de directorio (/ o \).
     */
    $file_parts = explode(DIRECTORY_SEPARATOR, $file);

    /**
     * Accede al último elemento del array, que es el nombre del archivo (init.php).
     * Se añade el prefijo 'class-' y se reemplazan guiones bajos (_) por guiones (-).
     */
    $file_parts[count($file_parts) - 1] = 'class-' . str_replace('_', '-', $file_parts[count($file_parts) - 1]);
    
    /**
     * Vuelve a unir las partes del array en una ruta de archivo completa.
     */
    $file = implode(DIRECTORY_SEPARATOR, $file_parts);

    // Si el archivo existe, se carga.
    if (file_exists($file)) {
        require_once $file;
    } 
});


// Inicializar el plugin.
/**
 * Este código se ejecuta cuando WordPress ha cargado todos los plugins. 
 * Es un hook de WordPress que asegura que el plugin se inicialice después 
 * de que WordPress y otros plugins estén listos.
 */
add_action('plugins_loaded', function() {
    
    /**
     * Verifica si la clase Accesimple\Core\Init existe.
     * Si la clase existe, se llama al método get_instance() de la clase Init.
     * Esto sugiere que se está utilizando el patrón Singleton para garantizar 
     * una única instancia de la clase.
     */
    if (class_exists('Accesimple\\Core\\Init')) {
        
        Accesimple\Core\Init::get_instance();
    } 
});

 ?>
