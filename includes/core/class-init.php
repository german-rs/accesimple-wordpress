<?php


namespace Accesimple\Core;

use Accesimple\Frontend\Accessibility_Button;
use Accesimple\Frontend\Accessibility_Panel;

class Init {
    private static $instance = null;

    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        $this->init_hooks();
    }

    private function init_hooks() {
        // Registrar assets
        add_action('wp_enqueue_scripts', [$this, 'register_assets']);
        
        // Registrar componentes del frontend.
        add_action('wp_body_open', [Accessibility_Button::class, 'render']);
        add_action('wp_footer', [Accessibility_Panel::class, 'render']);
    }

    /**
     * Registra y encola los assets del plugin.
     */
    public function register_assets() {

        if (is_front_page()) {
            wp_enqueue_style(
                'accesimple-styles',
                ACCESIMPLE_URL . 'assets/css/styles.css',
                [],
                ACCESIMPLE_VERSION
            );

            wp_enqueue_script(
                'accesimple-panel',
                ACCESIMPLE_URL . 'assets/js/accessibility-panel.js',
                [],
                ACCESIMPLE_VERSION,
                true
            );

            wp_enqueue_script(
                'accesimple-features',
                ACCESIMPLE_URL . 'assets/js/accessibility-features.js',
                ['accesimple-panel'],
                ACCESIMPLE_VERSION,
                true
            );
        }
    }
}
