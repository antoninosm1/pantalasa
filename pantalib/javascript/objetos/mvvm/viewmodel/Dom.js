function Dom(configuraciones) {
	this.configuraciones = configuraciones;
}
Dom.prototype.quita_clase = function(idelemento, clasex) {


    if (document.getElementById(idelemento)) {
        console.log('ELEMENTO EXISTE, VOY A REMOVER CLASE: '+clasex+' EN EL ELEMENTO: '+idelemento);
       document.getElementById(idelemento).classList.remove(clasex);
    } else {
        console.log('NO EXISTE EL ID '+idelemento+' NO SE EJECUTÓ, REMOCIÓN DE CLASE: '+clasex);
    }

};
Dom.prototype.agrega_clase = function(idelemento, clasex) {

    if (document.getElementById(idelemento)) {
        console.log('ELEMENTO EXISTE, VOY A ADHERIR CLASE: '+clasex+' EN EL ELEMENTO: '+idelemento);
        document.getElementById(idelemento).classList.add(clasex);
    } else {
        console.log('NO EXISTE EL ID '+idelemento+' NO SE EJECUTÓ, ADESIÓN DE CLASE: '+clasex);
    }
};
