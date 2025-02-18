<?php

namespace Accesimple\Core;

class Helpers {
    /**
     * Obtiene la URL completa de una imagen
     *
     * @param string $image_name Nombre del archivo de imagen
     * @return string URL completa de la imagen
     */
    public static function get_image_url($image_name) {
        return plugins_url('assets/images/' . $image_name, dirname(__DIR__));
    }

    /**
     * Obtiene y incluye un template
     *
     * @param string $template_name Nombre del template sin extensión .php
     * @param array $vars Variables a pasar al template (opcional)
     */
    public static function get_template($template_name, $vars = array()) {
        $template_path = ACCESIMPLE_PATH . 'templates/' . $template_name . '.php';
        
        if (file_exists($template_path)) {
            if (!empty($vars)) {
                extract($vars);
            }
            include $template_path;
        }
    }
}
