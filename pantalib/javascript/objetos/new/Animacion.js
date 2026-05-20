function Animacion(configuraciones) {
	this.configuraciones = configuraciones;
}

Animacion.prototype.ejecuta = function() {


    if (this.configuraciones[0]===1) {
        alert("ESTOY ACTIVANDO UNA ANIMACIÓN DE TIPO SCROLL");
        window.addEventListener('scroll', () => {
            console.log('hay movimiento de scroll');
            var nuevaPosicion = window.scrollY;
            var posicionAnterior = this.configuraciones[1];
            if (nuevaPosicion > posicionAnterior) {

            }
            else {
                if (nuevaPosicion > posicionAnterior) {
                    console.log('hay movimiento de scroll hacia abajo');
                }
                else {
                    console.log('hay movimiento de scroll hacia arriba');
                };
            };

        });
    }


};
