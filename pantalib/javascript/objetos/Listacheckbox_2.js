function Listacheckbox(raiz) {
	this.raiz = raiz;
}

Listacheckbox.prototype.agregarNodo = function(padre, dato) {
    const nodoPadre = this.buscarNodo(this.raiz, padre);
    if (nodoPadre) {
        const nuevoNodo = new Nodo(dato);
        nodoPadre.Siguiente.push(nuevoNodo);
    }
};

Listacheckbox.prototype.buscarNodo  = function(nodo, dato) {
    if (nodo.Dato[5] === dato[5]) {
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

Listacheckbox.prototype.imprime_estructura = function() {
    this.imprimirRecursivo(this.raiz);
};

Listacheckbox.prototype.imprimirRecursivo = function(nodo) {
    if (nodo  == this.raiz) {
        alert(nodo.Dato[5]);
    }
    else {
        alert(nodo.Dato[5].html[1]);
    }
    for (const hijo of nodo.Siguiente) {
        this.imprimirRecursivo(hijo);
    }
};

Listacheckbox.prototype.checa_estructura = function() {
    this.checaRecursivo(this.raiz);
};

Listacheckbox.prototype.checaRecursivo = function(nodo) {
    if (nodo !== this.raiz) {
        nodo.Dato[5].checa();
    }
    for (const hijo of nodo.Siguiente) {
        this.checaRecursivo(hijo);
    }
};

Listacheckbox.prototype.nocheca_estructura = function() {
    this.nochecaRecursivo(this.raiz);
};

Listacheckbox.prototype.nochecaRecursivo = function(nodo) {
    if (nodo !== this.raiz) {
        nodo.Dato[5].nocheca();
    }
    for (const hijo of nodo.Siguiente) {
        this.nochecaRecursivo(hijo);
    }
};

Listacheckbox.prototype.normaliza_estructura = function() {
    alert("estoy en normaliza estructura");
};

/*

Listacheckbox.prototype.normaliza_estructura = function() {
    alert("estoy en normaliza estructura");
//    this.normalizaRecursivo(this.raiz);
};
Listacheckbox.prototype.normalizaRecursivo = function(nodo) {
    if (nodo !== this.raiz) {
        if (document.getElementById(nodo.Dato[5].html[1]).checked) {
            this.normalizaRecursivo2(nodo, nodo);
        }
        else {
            alert(nodo.Dato[5].html[1]+" SIN CHECK");
            this.normalizaRecursivo3(nodo, nodo);
        }
    }
    for (const hijo of nodo.Siguiente) {
        this.normalizaRecursivo(hijo);
    }
};
Listacheckbox.prototype.normalizaRecursivo2 = function(nodo2, nodo_c) {

    if (nodo2 !== nodo_c) {
        document.getElementById(nodo2.Dato[5].html[1]).enabled = true;
        nodo2.Dato[5].checa();
    }
    for (const hijo2 of nodo2.Siguiente) {
        this.normalizaRecursivo2(hijo2);
    }
};

Listacheckbox.prototype.normalizaRecursivo3 = function(nodo3, nodo_c) {
    if (nodo3 !== nodo_c) {
        document.getElementById(nodo3.Dato[5].html[1]).disabled = true;
        nodo3.Dato[5].nocheca();
    }
    for (const hijo3 of nodo3.Siguiente) {
        this.normalizaRecursivo3(hijo3);
    }
};
*/

