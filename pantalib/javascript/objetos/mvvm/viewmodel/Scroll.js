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

function Scroll(configuraciones, limites) {

    this.configuraciones = configuraciones;
    this.limites = limites;

}

Scroll.prototype.ejecuta_pantallas = function() {

    console.log(
        "INICIA ejecuta_pantallas()"
    );

    // VALIDAMOS STATUS

    console.log(
        "STATUS SCROLL:",
        this.configuraciones[1]
    );

    if (this.configuraciones[1] === 1) {

        console.log(
            "SCROLL ACTIVADO"
        );

        // IMPRIMIMOS CONFIGURACIÓN

        console.log(
            "POSTALES CONFIG:",
            this.limites
        );

        // ESCUCHAMOS SCROLL

        window.addEventListener(

            'scroll',

            () => {

                console.log(
                    "-----------------------------------"
                );

                console.log(
                    "EVENTO SCROLL DETECTADO"
                );

                // POSICIÓN ACTUAL

                let nuevaPosicion =
                    window.scrollY;

                console.log(
                    "window.scrollY:",
                    nuevaPosicion
                );

                // ALTURA PANTALLA

                let alturaPantalla =
                    window.innerHeight;

                console.log(
                    "window.innerHeight:",
                    alturaPantalla
                );

                // ÁREA CALCULADA

                let nuevaArea =
                    Math.floor(
                        nuevaPosicion /
                        alturaPantalla
                    );

                console.log(
                    "NUEVA AREA CALCULADA:",
                    nuevaArea
                );

                // CONTROL DE LÍMITE

                if (nuevaArea >= this.limites[0]) {

                    console.log(
                        "AREA EXCEDE LIMITE"
                    );

                    nuevaArea =
                        this.limites[0] - 1;

                }

                console.log(
                    "AREA FINAL:",
                    nuevaArea
                );

                // ÁREA ANTERIOR

                let areaAnterior =
                    this.limites[2];

                console.log(
                    "AREA ANTERIOR:",
                    areaAnterior
                );

                // VALIDAMOS CAMBIO

                if (nuevaArea !== areaAnterior) {

                    console.log(
                        "CAMBIO DE AREA DETECTADO"
                    );

                    // ACTIVAS

                    let activas =
                        document.querySelectorAll(
                            "."+this.configuraciones[3]
                        );

                    console.log(
                        "POSTALES ACTIVAS:",
                        activas.length
                    );

                    // REMOVER ACTIVAS

                    activas.forEach(

                        el => {

                            console.log(
                                "REMOVIENDO CLASE A:",
                                el
                            );

                            el.classList.remove(
                                this.configuraciones[3]
                            );

                        }

                    );

                    // SELECTOR NUEVO

                    let selector =
                        this.limites[1][nuevaArea];

                    console.log(
                        "SELECTOR NUEVO:",
                        selector
                    );

                    // BUSCAR POSTAL

                    let postal =
                        document.querySelector(
                            selector
                        );

                    console.log(
                        "POSTAL ENCONTRADA:",
                        postal
                    );

                    // VALIDAR POSTAL

                    if (postal) {

                        console.log(
                            "AGREGANDO CLASE"
                        );

                        postal.classList.add(
                            this.configuraciones[3]
                        );

                    }
                    else {

                        console.log(
                            "ERROR: NO EXISTE POSTAL"
                        );

                    }

                    // GUARDAR ÁREA

                    this.limites[2] =
                        nuevaArea;

                    console.log(
                        "NUEVA AREA GUARDADA:",
                        this.limites[2]
                    );

                }
                else {

                    console.log(
                        "NO HAY CAMBIO DE AREA"
                    );

                }

                // GUARDAR POSICIÓN

                this.configuraciones[2] =
                    nuevaPosicion;

                console.log(
                    "POSICION GUARDADA:",
                    this.configuraciones[2]
                );

            }

        );

    }
    else {

        console.log(
            "SCROLL DESACTIVADO"
        );

    }

};

