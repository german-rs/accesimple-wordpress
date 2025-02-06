<?php
// includes/panel-accesibilidad.php

if (!defined('ABSPATH')) {
    exit; // Salir si se accede directamente
}

/**
 * Genera el HTML del panel de accesibilidad.
 */
function generar_panel_accesibilidad() {
    echo '
    <div class="menu-accesibilidad">
        <h2>Herramientas de accesibilidad</h2>
        <button class="accesibilidad__opcion" data-accion="aumentar-texto">Aumentar texto</button>
        <button class="accesibilidad__opcion" data-accion="disminuir-texto">Disminuir texto</button>
        <button class="accesibilidad__opcion" data-accion="alto-contraste">Alto contraste</button>
        <button class="accesibilidad__opcion" data-accion="modo-oscuro">Modo oscuro</button>
    </div>';
}
add_action('wp_footer', 'generar_panel_accesibilidad');