function Load(configuraciones, etiquetas) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
}

Load.prototype.imprimehtml = function() {

    let self = this;  // referencia segura a la instancia

    $.ajax({
        url: self.etiquetas[0],
        type: "GET",
        dataType: "html",
        success: function (html) {
            if (self.configuraciones[0] === 0) {
                $(self.etiquetas[1]).html(html);
            } else if (self.configuraciones[0] === 1) {
                $(self.etiquetas[1]).append(html);
            }

            if (self.configuraciones[1][2] != 0) {
                var i = 0;
                while (i < self.configuraciones[1][1][self.configuraciones[1][0]].length) {
                    eval(self.configuraciones[1][1][self.configuraciones[1][0]][i]);
                    i++;
                }
            }
    
        },
        error: function () {
            console.error("Error al cargar el HTML externo.");
        }
    });
};
