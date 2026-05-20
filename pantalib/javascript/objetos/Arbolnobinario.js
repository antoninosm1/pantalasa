function Arbolnobinario(raiz) {
	this.raiz = raiz;
}

Arbolnobinario.prototype.agregarNodo = function(padre, dato) {
    const nodoPadre = this.buscarNodo(this.raiz, padre);
    if (nodoPadre) {
        const nuevoNodo = new Nodo(dato);
        nodoPadre.Siguiente.push(nuevoNodo);
    }
};

Arbolnobinario.prototype.buscarNodo  = function(nodo, dato) {
    if (nodo.Dato === dato) {
        return nodo;
    } 
    else {
        for (const hijo of nodo.Siguiente) {
            const resultado = this.buscarNodo(hijo, dato);
            if (resultado) {
                return resultado;
            }
        }
    }
    return null;
};

Arbolnobinario.prototype.recorre = function() {
    this.recursivo(this.raiz);
};

Arbolnobinario.prototype.recursivo = function(nodo) {
    if (nodo !== this.raiz) {
        if (document.getElementById(nodo.Dato.html[1]).checked) {
            this.normalizaRecursivo2(nodo, nodo);
        }
        else {
            this.normalizaRecursivo3(nodo, nodo);
        }
    }
    for (const hijo of nodo.Siguiente) {
        this.recursivo(hijo);
    }
};
