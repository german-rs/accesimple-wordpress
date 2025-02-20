document.addEventListener('DOMContentLoaded', function() {
    // Funciones para manejar el tamaño del texto
    const textSize = {
        // Guarda el tamaño en localStorage
        saveSize(size) {
            localStorage.setItem('accesimple_text_size', size);
        },

        // Obtiene el tamaño guardado
        getSavedSize() {
            return parseInt(localStorage.getItem('accesimple_text_size')) || 100;
        },

        // Aplica el tamaño al body
        applySize(size) {
            document.body.style.fontSize = `${size}%`;
            this.saveSize(size);
        },

        // Inicializa el tamaño guardado
        init() {
            const savedSize = this.getSavedSize();
            this.applySize(savedSize);
        },

        // Aumenta el tamaño del texto
        increase() {
            const currentSize = this.getSavedSize();
            if (currentSize < accesimpleTextSize.maxSize) {
                const newSize = currentSize + accesimpleTextSize.stepSize;
                this.applySize(newSize);
            }
        },

        // Disminuye el tamaño del texto
        decrease() {
            const currentSize = this.getSavedSize();
            if (currentSize > accesimpleTextSize.minSize) {
                const newSize = currentSize - accesimpleTextSize.stepSize;
                this.applySize(newSize);
            }
        }
    };

    // Inicializa el tamaño del texto
    textSize.init();

    // Event listeners para los botones
    document.addEventListener('click', function(e) {
        const button = e.target.closest('[data-accion]');
        if (!button) return;

        switch (button.dataset.accion) {
            case 'aumentar-texto':
                textSize.increase();
                break;
            case 'disminuir-texto':
                textSize.decrease();
                break;
        }
    });
});