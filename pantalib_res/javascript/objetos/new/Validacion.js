function Validacion(configuraciones, elementos) {
	this.configuraciones = configuraciones;
	this.elementos = elementos;
}
Validacion.prototype.ejecuta = function() {

// PRIMER PASO INICIALIZAR VALORES Y RECORRER EL ARREGLO DE VALORES A VALIDAR

this.configuraciones[1][0] = 0;
this.configuraciones[1][1] = [];
this.configuraciones[1][2] = [];
this.configuraciones[1][4] = '';
var $sw_primer_error = 0;

var i = 0;

while(i < this.elementos[0].length) {

    // SEGUNDO PASO DETERMINAR TIPO DE VALIDACIÓN. 0 = VALORES VACIOS, 1 = VALORES ESPECIALES
    
    if (this.elementos[2][i]==0) {

        // OPCIÓN VALORES VACIOS

        // TERCER PASO DETERMINAR TIPO DE VALOR A VALIDAR. 0 = STRING, 1 = NUMBER
    
        if (this.elementos[1][i]==0) {

            // OPCION VALORES VACIOS TIPO CADENA

            // CUARTO PASO RESOLVER PARA CADENA VACIA
        
            if (this.elementos[0][i]=='') {

                // ERROR CADENA VACIA
    
                this.configuraciones[1][0] = 1;
                this.configuraciones[1][1].push(1);
                this.configuraciones[1][2].push(this.elementos[5][i][0]);
                var conector_espacio = '';
                if ($sw_primer_error == 0) {
                    $sw_primer_error = 1;
                    conector_espacio = ' ';
                }
                else {
                    conector_espacio = '. ';
                }
                this.configuraciones[1][4] = this.configuraciones[1][4] +  conector_espacio + this.elementos[5][i][0];
            
            }
    
            //  QUINTO PASO RESOLVER PARA VALOR NULL
        
            if (this.elementos[0][i]==null) {

                // ERROR VALOR NULL

                this.configuraciones[1][0] = 1;
                this.configuraciones[1][1].push(2);
                this.configuraciones[1][2].push(this.elementos[5][i][1]);
                var conector_espacio = '';
                if ($sw_primer_error == 0) {
                    $sw_primer_error = 1;
                    conector_espacio = ' ';
                }
                else {
                    conector_espacio = '. ';
                }
                this.configuraciones[1][4] = this.configuraciones[1][4] +  conector_espacio + this.elementos[5][i][0];
            
            }
        
        }
        
    }


    // SEGUNDO PASO DETERMINAR TIPO DE VALIDACIÓN. 0 = VALORES VACIOS, 1 = VALORES ESPECIALES

    if (this.elementos[2][i]==1) {

        // OPCIÓN VALORES ESPECIALES

        // TERCER PASO HACER UN CICLO POR CADA VALOR ESPECIAL A CONSIDERAR
    
        var ii = 0;

        while(ii < this.elementos[3][i].length) {

            // CUARTO PASO COMPARAR VALOR ESPECIAL

            if (this.elementos[3][i][ii]==this.elementos[0][i]) {

                // QUINTO PASO RESOLVER PARA DETECCIÓN VALOR ESPECIAL
    
                this.configuraciones[1][0] = 1;
                this.configuraciones[1][1].push(this.elementos[4][i][ii]);
                this.configuraciones[1][2].push(this.elementos[5][i][ii]);
                var conector_espacio = '';
                if ($sw_primer_error == 0) {
                    $sw_primer_error = 1;
                    conector_espacio = ' ';
                }
                else {
                    conector_espacio = '. ';
                }
                this.configuraciones[1][4] = this.configuraciones[1][4] +  conector_espacio + this.elementos[5][i][ii];
            }

            ii++;

        }

    }
    i++;

}

if (this.configuraciones[1][0] == 0) {
    // VALIDACION CORRECTA
    eval(this.configuraciones[1][3][0]); 
}
if (this.configuraciones[1][0] == 1) {
    // VALIDACION FALLIDA
    var i = 0;
    while(i < this.configuraciones[1][2].length) {
        i++;
    }
    eval(this.configuraciones[1][3][1]); 
}
};	   						
Validacion.prototype.recibe_validacion = function(parametros) {

    this.elementos[0][parametros[0]] = parametros[1];

};	   						
