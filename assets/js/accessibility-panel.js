document.addEventListener('DOMContentLoaded', function () {
    const botonAccesibilidad = document.querySelector('.accesibilidad__boton');
    const botonCerrar = document.querySelector('.accesibilidad_cerrar_icono');
    const menuAccesibilidad = document.querySelector('.menu-accesibilidad');

    const MENU_VISIBLE_CLASS = 'menu-accesibilidad--visible';
    
    function mostrarMenu() {
        menuAccesibilidad.classList.add(MENU_VISIBLE_CLASS);
        botonAccesibilidad.setAttribute('aria-expanded', 'true');
        menuAccesibilidad.setAttribute('aria-hidden', 'false');
    }

    function ocultarMenu() {
        menuAccesibilidad.classList.remove(MENU_VISIBLE_CLASS);
        botonAccesibilidad.setAttribute('aria-expanded', 'false');
        menuAccesibilidad.setAttribute('aria-hidden', 'true');
    }

    function toggleMenu() {
        const estaVisible = menuAccesibilidad.classList.contains(MENU_VISIBLE_CLASS);
        if (estaVisible) {
            ocultarMenu();
        } else {
            mostrarMenu();
        }
    }

    if (botonAccesibilidad && menuAccesibilidad) {
        botonAccesibilidad.setAttribute('aria-haspopup', 'true');
        botonAccesibilidad.setAttribute('aria-expanded', 'false');
        menuAccesibilidad.setAttribute('aria-hidden', 'true');
        
        botonAccesibilidad.addEventListener('click', toggleMenu);

        botonAccesibilidad.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                toggleMenu();
            }
        });
    }

    if (botonCerrar) {
        botonCerrar.addEventListener('click', ocultarMenu);
        
        botonCerrar.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                ocultarMenu();
            }
        });
    }

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && menuAccesibilidad.classList.contains(MENU_VISIBLE_CLASS)) {
            ocultarMenu();
        }
    });
});