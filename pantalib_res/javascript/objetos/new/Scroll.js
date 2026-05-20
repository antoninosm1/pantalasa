function Scroll(configuraciones) {
	this.configuraciones = configuraciones;
}
Scroll.prototype.esconde = function() {
    const scrollableArea = document.querySelector(this.configuraciones[0]);
// Ejemplo: Ocultar la barra de desplazamiento cuando no se usa
    let isScrolling;
    scrollableArea.addEventListener('scroll', () => {
        window.clearTimeout(isScrolling);
        scrollableArea.style.overflowY = 'scroll';
    
        isScrolling = setTimeout(() => {
            scrollableArea.style.overflowY = 'hidden';
        }, 1000); // 1 segundo después de terminar de desplazar
    });
};
