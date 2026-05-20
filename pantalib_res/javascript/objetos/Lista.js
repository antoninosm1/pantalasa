function Lista() {
	this.head = null;
}
Lista.prototype.add = function(value) {
    alert("estoy en add");
    if (this.head==null) {
        alert("esta vacia la lista voy a crear nodo cabeza");
        this.head = new Nodo(value);    
    }
    else {
        alert("no esta vacia la lista voy a aumentar enlace next");
        let refe = this.head;
        while (refe.next != null) {
            refe = refe.next;
        }
        refe.next = new Nodo(value);    
    } 
};	   						



