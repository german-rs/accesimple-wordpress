<?php
namespace Accesimple\Frontend;

use Accesimple\Core\Helpers;

class Accessibility_Panel {
    public static function render() {

        $imagen_logo = 'accesimple-logo.webp';
        $imagen_cerrar = 'cerrar.svg';
        $ruta_imagen = Helpers::get_image_url($imagen_logo);
        $ruta_imagen_cerrar = Helpers::get_image_url($imagen_cerrar);

        ob_start();
        ?>

        <div class="menu-accesibilidad">
            <?php
            Helpers::get_template('header-panel', [
                'titulo' => 'Menú de accesibilidad',
                'ruta_imagen_cerrar' => $ruta_imagen_cerrar,
                'alt_imagen' => 'imagen de close'
            ]);
            ?> 

            <main class="main container">

                <?php 
                Helpers::get_template('boton', [
                    'clase_boton' => 'accesibilidad__opcion',
                    'accion' => 'aumentar-texto',
                    'texto_boton' => 'Aumentar texto'
                ]);

                Helpers::get_template('boton', [
                    'clase_boton' => 'accesibilidad__opcion',
                    'accion' => 'disminuir-texto',
                    'texto_boton' => 'Disminuir texto'
                ]);

                Helpers::get_template('boton', [
                    'clase_boton' => 'accesibilidad__opcion',
                    'accion' => 'alto-contraste',
                    'texto_boton' => 'Alto contraste'
                ]);

                Helpers::get_template('boton', [
                    'clase_boton' => 'accesibilidad__opcion',
                    'accion' => 'modo-oscuro',
                    'texto_boton' => 'Modo oscuro'
                ]);

                ?>

            </main>

           <?php 
           Helpers::get_template('footer-panel',[
            'ruta_imagen' => $ruta_imagen,
            'alt_img_logo' => 'Logo Accesimple',
            'titulo_footer' => 'ACCESIMPLE',
            'autor' => 'Por Germán Riveros'
           ]);
           ?>
        </div>

        <?php
        echo ob_get_clean();
    }
}

add_action('wp_footer', [Accessibility_Panel::class, 'render']);
