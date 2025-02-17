<?php
// includes/panel-accesibilidad.php

if (!defined('ABSPATH')) {
    exit; // Salir si se accede directamente
}

/**
 * Genera el HTML del panel de accesibilidad.
 */

// function generar_panel_accesibilidad() {
//     echo '
//     <div class="menu-accesibilidad">
//         <h2>Menú de accesibilidad 2</h2>
//         <button class="accesibilidad__opcion" data-accion="aumentar-texto">Aumentar texto</button>
//         <button class="accesibilidad__opcion" data-accion="disminuir-texto">Disminuir texto</button>
//         <button class="accesibilidad__opcion" data-accion="alto-contraste">Alto contraste</button>
//         <button class="accesibilidad__opcion" data-accion="modo-oscuro">Modo oscuro</button>
//     </div>
//     ';
// }


function generar_panel_accesibilidad() {
    $imagen_logo = 'accesimple-logo.webp';
    $imagen_cerrar = 'cerrar.svg';
    $ruta_imagen = obtener_url_imagen($imagen_logo);
    $ruta_imagen_cerrar = obtener_url_imagen($imagen_cerrar);

    ob_start();
    ?>

    <div class="menu-accesibilidad">
        <header class="accesibilidad__header">
            <h2 class="accesibilidad__title">Menú de accesibilidad</h2>
            <img class="accesibilidad_cerrar_icono" src="<?php echo esc_url($ruta_imagen_cerrar) ?>" alt="imagen de close">
        </header>    

        <main class="main container">
            <button class="accesibilidad__opcion" data-accion="aumentar-texto">Aumentar texto</button>
            <button class="accesibilidad__opcion" data-accion="disminuir-texto">Disminuir texto</button>
            <button class="accesibilidad__opcion" data-accion="alto-contraste">Alto contraste</button>
            <button class="accesibilidad__opcion" data-accion="modo-oscuro">Modo oscuro</button>
        </main>

        <footer class="accesibilidad__footer">
            <img src="<?php echo esc_url($ruta_imagen) ?>" alt="logo accesimple">
            <div class="footer-container__text">
                <p class="footer__text--title">ACCESIMPLE</p>
                <p class="footer__text--author">por Germán Riveros</p>
            </div>
        </footer>
    </div>


    <?php
    echo ob_get_clean(); 
}




add_action('wp_footer', 'generar_panel_accesibilidad');