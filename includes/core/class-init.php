<?php
/**
 * Archivo: class-init.php
 * 
 * Descripción: 
 * Este archivo contiene la clase `Init`, que es el núcleo del plugin Accesimple WordPress.
 * Se encarga de la inicialización del plugin, la gestión de hooks y la carga de recursos
 * necesarios (CSS y JS) en el frontend. La clase sigue el patrón Singleton para garantizar
 * que solo exista una instancia durante la ejecución del plugin.
 */

namespace Accesimple\Core;

use Accesimple\Frontend\Accessibility_Button;
use Accesimple\Frontend\Accessibility_Panel;

class Init {
    /**
     * Instancia única de la clase (patrón Singleton).
     *
     * @var Init|null
     */
    private static $instance = null;

    /**
     * Devuelve la instancia única de la clase.
     *
     * Este método implementa el patrón Singleton, que garantiza que solo exista una instancia
     * de la clase `Init` en todo el ciclo de vida del plugin. Si la instancia no existe, se crea;
     * de lo contrario, se devuelve la instancia existente.
     *
     * @return Init
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor privado para evitar la instanciación directa.
     *
     * El constructor es privado para garantizar que la clase solo pueda ser instanciada
     * a través del método `get_instance()`. Esto es parte del patrón Singleton.
     */
    private function __construct() {
        $this->init_hooks();
    }

    /**
     * Registra los hooks de WordPress necesarios para el plugin.
     *
     * Este método se llama durante la construcción de la clase y se encarga de registrar
     * las acciones y filtros de WordPress que el plugin necesita para funcionar correctamente.
     */
    private function init_hooks() {
        // Registrar los assets (CSS y JS) del plugin.
        add_action('wp_enqueue_scripts', [$this, 'register_assets']);
        
        // Registrar los componentes del frontend.
        add_action('wp_body_open', [Accessibility_Button::class, 'render']);
        add_action('wp_footer', [Accessibility_Panel::class, 'render']);
    }

    /**
     * Registra y encola los assets del plugin (CSS y JS).
     *
     * Este método se ejecuta durante el hook `wp_enqueue_scripts` y se encarga de registrar
     * y encolar los archivos CSS y JS necesarios para el funcionamiento del plugin.
     * Los assets solo se cargan en la página de inicio (`is_front_page()`).
     */
    public function register_assets() {
        // Verificar si la página actual es la página de inicio.
        if (is_front_page()) {

            // Registrar y encolar el archivo CSS principal del plugin.
            wp_enqueue_style(
                'accesimple-styles', // Identificador único para el archivo CSS.
                ACCESIMPLE_URL . 'assets/css/styles.css', // Ruta al archivo CSS.
                [], // Dependencias (ninguna en este caso).
                ACCESIMPLE_VERSION // Versión del archivo (para evitar problemas de caché).
            );
            
            // Registrar y encolar el archivo JS del panel de accesibilidad.
            wp_enqueue_script(
                'accesimple-panel', // Identificador único para el archivo JS.
                ACCESIMPLE_URL . 'assets/js/accessibility-panel.js', // Ruta al archivo JS.
                [], // Dependencias (ninguna en este caso).
                ACCESIMPLE_VERSION, // Versión del archivo.
                true // Cargar el script en el pie de página.
            );

             // Registrar y encolar el archivo JS de características de accesibilidad.
            wp_enqueue_script(
                'accesimple-features', // Identificador único para el archivo JS.
                ACCESIMPLE_URL . 'assets/js/accessibility-features.js', // Ruta al archivo JS.
                ['accesimple-panel'], // Dependencias (requiere el script 'accesimple-panel').
                ACCESIMPLE_VERSION, // Cargar el script en el pie de página.
                true
            );
        }
    }
}
