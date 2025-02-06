// assets/js/script.js
document.addEventListener('DOMContentLoaded', function () {
    const botonAccesibilidad = document.getElementById('accesibilidad__boton');
    const menuAccesibilidad = document.querySelector('.menu-accesibilidad');

    if (botonAccesibilidad && menuAccesibilidad) {
        botonAccesibilidad.addEventListener('click', function () {
            // Alternar la visibilidad del panel
            if (menuAccesibilidad.style.display === 'none' || menuAccesibilidad.style.display === '') {
                menuAccesibilidad.style.display = 'block';
            } else {
                menuAccesibilidad.style.display = 'none';
            }
        });
    }
});