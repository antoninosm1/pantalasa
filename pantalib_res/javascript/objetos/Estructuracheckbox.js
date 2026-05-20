function Estructuracheckbox(especificaciones, estructura) {
	this.especificaciones = especificaciones;
	this.estructura = estructura;
}
////////////////////////////////////////////////////////////////////////////
//// EXPLICACIÓN DE LA ESTRUCTURA DEL OBJETO Estructuracheckbox PARA LA CARACTERISTICA estructura,
//// LA PRIMERA POSICIÓN ES ID PROGRESIVO, SEGUNDA POSICIÓN ES PADRE, TERCERA POSICIÓN ES HIJOS,
//// CUARTA POSICIÓN ES POSICION DENTRO DE SU NIVEL, QUINTA POSICIÓN ES NIVEL,
//// SEXTA POSICIÓN OBJETO DE TIPO CHECKBOX RELACIONADO
////////////////////////////////////////////////////////////////////////////

Estructuracheckbox.prototype.muestraestructura = function() {

    for (var contador = 0; contador < this.estructura.length; contador++) {
        alert("ID PROGRESIVO: "+this.estructura[contador][0]+" PADRE: "+this.estructura[contador][1]+" HIJOS: "+this.estructura[contador][2]+" POSICIÓN DENTRO DE SU NICHO: "+this.estructura[contador][3]+" NIVEL: "+this.estructura[contador][4]+" OBJETO: "+this.estructura[contador][5].html[1])
    }

};	   						
Estructuracheckbox.prototype.normalizarestructura = function() {
    for (var contador = 0; contador < this.estructura.length; contador++) {
        /*
        if (getElementById(this.estructura[contador][5].html[1]).checked == True) {
// VAMOS A REVISAR SI EXISTE UN CHECK EN EL SEGUNDO NIVEL

            for (var contador2 = (contador+1); contador2 < ((this.estructura.length-(contador+1))); contador2++) {
                alert("ID PROGRESIVO: "+this.estructura[contador2][0]+" PADRE: "+this.estructura[contador2][1]+" HIJOS: "+this.estructura[contador2][2]+" POSICIÓN DENTRO DE SU NICHO: "+this.estructura[contador2][3]+" NIVEL: "+this.estructura[contador2][4]+" OBJETO: "+this.estructura[contador2][5].html[1])
            }

        }
        else {
            alert("ID PROGRESIVO: "+this.estructura[contador2][0]+" PADRE: "+this.estructura[contador2][1]+" HIJOS: "+this.estructura[contador2][2]+" POSICIÓN DENTRO DE SU NICHO: "+this.estructura[contador2][3]+" NIVEL: "+this.estructura[contador2][4]+" OBJETO: "+this.estructura[contador2][5].html[1])

        }
        */
    }
};	   						






Estructuracheckbox.prototype.prendeestructura = function() {
    for (var contador = 0; contador < this.estructura.length; contador++) {
        this.estructura[contador][5].checa();  
    }

};	   						
Estructuracheckbox.prototype.aplicareglas = function(id, padre, hijos, posicion, nivel) {
    alert("ID PROGRESIVO: "+id+" PADRE: "+padre+" HIJOS: "+hijos+" POSICIÓN DENTRO DE SU NICHO: "+posicion+" NIVEL: "+nivel+" OBJETO: "+this.estructura[id-1][5].html[1])
};	   						
