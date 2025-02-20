<?php
namespace Accesimple\Features;

class Text_Size {
    const MIN_SIZE = 100;
    const MAX_SIZE = 200;
    const STEP_SIZE = 10;

    /**
     * Inicializa los hooks necesarios
     */
    public static function init() {
        add_action('wp_enqueue_scripts', [self::class, 'enqueue_scripts']);
    }

    /**
     * Registra y carga los scripts necesarios
     */
    public static function enqueue_scripts() {
        wp_enqueue_script(
            'accesimple-text-size',
            plugins_url('assets/js/text-size.js', dirname(__DIR__)),
            ['accesimple-panel'], // Depende del panel principal
            ACCESIMPLE_VERSION,
            true
        );

        wp_localize_script(
            'accesimple-text-size',
            'accesimpleTextSize',
            [
                'minSize' => self::MIN_SIZE,
                'maxSize' => self::MAX_SIZE,
                'stepSize' => self::STEP_SIZE
            ]
        );
    }
}

// Inicializa la funcionalidad
Text_Size::init();