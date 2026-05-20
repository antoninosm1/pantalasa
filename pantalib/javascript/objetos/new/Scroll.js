function Scroll(configuraciones, limites) {
	this.configuraciones = configuraciones;
	this.limites = limites;
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

Scroll.prototype.ejecuta = function() {
    if (this.configuraciones[1]===1) {

        //alert("ESTOY ACTIVANDO UNA ANIMACIÓN DE TIPO SCROLL");

        window.addEventListener('scroll', () => {
            console.log('hay movimiento de scroll');

            let elemento = document.querySelector(this.configuraciones[0]);

            let nuevaPosicion = elemento.scrollTop;
            let posicionAnterior = this.configuraciones[2];
            let max = elemento.scrollHeight - elemento.clientHeight;
            let limites = this.limites[0];
            let areas = limites + 1;
            if (nuevaPosicion > posicionAnterior) {

                console.log('hay movimiento de scroll hacia abajo');

                let elementos = document.querySelectorAll(".opcion_menu");

                elementos.forEach(el => {
                    if (el.classList.contains("opcion_menu_invisible")) {
                        el.classList.remove("opcion_menu_invisible");
                        el.classList.add("opcion_menu_visible");
                    }
                    else {
                    };
                });

            } 
            else {
                if (nuevaPosicion < posicionAnterior) {
                    console.log('hay movimiento de scroll hacia arriba');

                    let elementos = document.querySelectorAll(".opcion_menu");

                    elementos.forEach(el => {
                        if (!el.classList.contains("opcion_menu_invisible")) {
                           el.classList.remove("opcion_menu_visible");
                           el.classList.add("opcion_menu_invisible");
                        }
                        else {
                        };
                    });
                }
            } 

            this.configuraciones[2] = nuevaPosicion;

        });
    };
};

Scroll.prototype.ejecuta_postales = function() {

    if (this.configuraciones[1] === 1) {

        window.addEventListener(
            'scroll',
            () => {

                // POSICION ACTUAL DEL SCROLL

                let nuevaPosicion = window.scrollY;

                // ALTURA DEL VIEWPORT

                let alturaPantalla = window.innerHeight;

                // AREA ACTUAL

                let nuevaArea = Math.floor(
                    nuevaPosicion / alturaPantalla
                );

                // AREA ANTERIOR

                let areaAnterior = this.limites[2];

                // SI CAMBIÓ DE AREA

                if (nuevaArea !== areaAnterior) {

                    // REMOVER POSTAL ACTIVA

                    let activas = document.querySelectorAll(".postal_activa");

                    activas.forEach(
                        el => {

                            el.classList.remove("postal_activa");

                        }
                    );

                    // ACTIVAR NUEVA POSTAL

                    let selector =
                        this.limites[1][nuevaArea];

                    let postal =
                        document.querySelector(selector);

                    if (postal) {

                        postal.classList.add("postal_activa");

                    }

                    // GUARDAR NUEVA AREA

                    this.limites[2] = nuevaArea;
                }

                // GUARDAR POSICION

                this.configuraciones[2] = nuevaPosicion;

            }
        );
    }
};