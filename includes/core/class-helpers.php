<?php
/**
 * Archivo: class-helpers.php
 * 
 * Descripción:
 * Este archivo contiene la clase `Helpers`, que proporciona métodos estáticos para
 * realizar tareas comunes en el plugin, como obtener URLs de imágenes y cargar plantillas.
 */
namespace Accesimple\Core;

class Helpers {
    /**
     * Obtiene la URL completa de una imagen ubicada en la carpeta `assets/images` del plugin.
     *
     * Este método es útil para generar dinámicamente la URL de imágenes que se encuentran
     * en el directorio de assets del plugin.
     *
     * @param string $image_name Nombre del archivo de imagen (por ejemplo, 'logo.png').
     * @return string URL completa de la imagen.
     */
    public static function get_image_url($image_name) {
        return plugins_url('assets/images/' . $image_name, dirname(__DIR__));
    }

    /**
     * Obtiene e incluye un archivo de plantilla desde la carpeta `templates` del plugin.
     *
     * Este método permite cargar plantillas PHP y pasarles variables opcionales. Las plantillas
     * deben estar ubicadas en la carpeta `templates` del plugin.
     *
     * @param string $template_name Nombre del archivo de plantilla sin la extensión .php.
     * @param array $vars Variables a pasar a la plantilla (opcional).
     */
    public static function get_template($template_name, $vars = array()) {

        // Construye la ruta completa al archivo de plantilla.
        $template_path = ACCESIMPLE_PATH . 'templates/' . $template_name . '.php';
        
        // Verifica si el archivo de plantilla existe.
        if (file_exists($template_path)) {

            // Si se proporcionan variables, se extraen para que estén disponibles en la plantilla.
            if (!empty($vars)) {
                extract($vars);
            }

            // Incluye el archivo de plantilla.
            include $template_path;
        }
    }
}
