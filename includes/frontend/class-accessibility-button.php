<?php

namespace Accesimple\Frontend;

use Accesimple\Core\Helpers;

class Accessibility_Button {
    public static function render() {

        
        if (!is_front_page()) {
            error_log('No es página principal - saliendo');
            return;
        }

        // Variables y rutas
        $url_img = 'btn-menu.webp';
        $ruta_imagen = Helpers::get_image_url($url_img);
        error_log('URL de la imagen generada: ' . $ruta_imagen);


        // Renderizar el botón
        echo '<div class="' . esc_attr('accesibilidad') . '">' .
            '<img id="accesibilidad__boton" ' .
            'class="' . esc_attr('accesibilidad__boton') . '" ' .
            'src="' . esc_url($ruta_imagen) . '" ' .
            'alt="' . esc_attr('Menú accesibilidad') . '">' .
            '</div>';

    }
}
