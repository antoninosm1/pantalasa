function Panel(configuraciones, etiquetas, codigos, elementos) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.elementos = elementos;
}
Panel.prototype.generahtml = function() {
    this.codigos[0] = '';
	this.codigos[0] = '<DIV CLASS="'+this.etiquetas[0]+'" ID="'+this.etiquetas[1]+'">';
    if (this.elementos.length > 0) {
        
        var i = 0;
        var toggle = 0;
        while(i < this.elementos.length) {
            if (this.configuraciones[1][0]==0) {
                this.codigos[0] = this.codigos[0] + '<DIV CLASS="'+this.etiquetas[0]+'_class" ID="'+this.etiquetas[1]+'_'+(i+1)+'">';
            }
            else {
                if (toggle==0) {
                    this.codigos[0] = this.codigos[0] + '<DIV CLASS="'+this.etiquetas[0]+'_class" ID="'+this.etiquetas[1]+'_'+(i+1)+'">';
                    toggle = 1;
                }
                else {
                    this.codigos[0] = this.codigos[0] + '<DIV CLASS="'+this.etiquetas[0]+'_class_x" ID="'+this.etiquetas[1]+'_'+(i+1)+'">';
                    toggle = 0;
                }
            }
            if (this.esArray(this.elementos[i])) {
    
                var ii = 0;
                var toggle = 0;
                while(ii < this.elementos[i].length) {
                    if (this.configuraciones[1][1]==0) {
                        this.codigos[0] = this.codigos[0] + '<DIV CLASS="'+this.etiquetas[0]+'_class_sub" ID="'+this.etiquetas[1]+'_'+(i+1)+'_'+(ii+1)+'">';
                    }
                    else {
                        if (toggle==0) {
                            this.codigos[0] = this.codigos[0] + '<DIV CLASS="'+this.etiquetas[0]+'_class_sub" ID="'+this.etiquetas[1]+'_'+(i+1)+'_'+(ii+1)+'">';
                            toggle = 1;
                        }
                        else {
                            this.codigos[0] = this.codigos[0] + '<DIV CLASS="'+this.etiquetas[0]+'_class_sub_x" ID="'+this.etiquetas[1]+'_'+(i+1)+'_'+(ii+1)+'">';
                            toggle = 0;
                        }
                    }
                    if (this.esArray(this.elementos[i][ii])) {
       
                        var iii = 0;
                        var toggle = 0;
                        while(iii < this.elementos[i][ii].length) {
                            if (this.configuraciones[1][2]==0) {
                                this.codigos[0] = this.codigos[0] + '<DIV CLASS="'+this.etiquetas[0]+'_class_sub_sub" ID="'+this.etiquetas[1]+'_'+(i+1)+'_'+(ii+1)+'_'+(iii+1)+'">';
                            }
                            else {
                                if (toggle==0) {
                                    this.codigos[0] = this.codigos[0] + '<DIV CLASS="'+this.etiquetas[0]+'_class_sub_sub" ID="'+this.etiquetas[1]+'_'+(i+1)+'_'+(ii+1)+'_'+(iii+1)+'">';
                                    toggle = 1;
                                }
                                else {
                                    this.codigos[0] = this.codigos[0] + '<DIV CLASS="'+this.etiquetas[0]+'_class_sub_sub_x" ID="'+this.etiquetas[1]+'_'+(i+1)+'_'+(ii+1)+'_'+(iii+1)+'">';
                                    toggle = 0;
                                }
                            }
                            if (this.esArray(this.elementos[i][ii][iii])) {
                                var iiii = 0;
                                var toggle = 0;
                                while(iiii < this.elementos[i][ii][iii].length) {
                                    if (this.configuraciones[1][2]==0) {
                                        this.codigos[0] = this.codigos[0] + '<DIV CLASS="'+this.etiquetas[0]+'_class_sub_sub" ID="'+this.etiquetas[1]+'_'+(i+1)+'_'+(ii+1)+'_'+(iii+1)+'_'+(iiii+1)+'">';
                                    }
                                    else {
                                        if (toggle==0) {
                                            this.codigos[0] = this.codigos[0] + '<DIV CLASS="'+this.etiquetas[0]+'_class_sub_sub" ID="'+this.etiquetas[1]+'_'+(i+1)+'_'+(ii+1)+'_'+(iii+1)+'_'+(iiii+1)+'">';
                                            toggle = 1;
                                        }
                                        else {
                                            this.codigos[0] = this.codigos[0] + '<DIV CLASS="'+this.etiquetas[0]+'_class_sub_sub_x" ID="'+this.etiquetas[1]+'_'+(i+1)+'_'+(ii+1)+'_'+(iii+1)+'_'+(iiii+1)+'">';
                                            toggle = 0;
                                        }
                                    }
                                    if (this.esArray(this.elementos[i][ii][iii][iiii])) {
                        
                                    } 
                                    else {
                                        this.codigos[0] = this.codigos[0] + this.elementos[i][ii][iii][iiii];
                                    }
                                    this.codigos[0] = this.codigos[0] + '</DIV>';	
                                    iiii++;
                                }
                        
                            } 
                            else {
                                this.codigos[0] = this.codigos[0] + this.elementos[i][ii][iii];
                            }
                            this.codigos[0] = this.codigos[0] + '</DIV>';	
                            iii++;
                        }
                    
                    } 
                    else {
                        this.codigos[0] = this.codigos[0] + this.elementos[i][ii];
                    }
                    this.codigos[0] = this.codigos[0] + '</DIV>';	
                    ii++;
                }
            
            } 
            else {
                this.codigos[0] = this.codigos[0] + this.elementos[i];
            }
            this.codigos[0] = this.codigos[0] + '</DIV>';	
            i++;
        }
    
    }
	this.codigos[0] = this.codigos[0] + '</DIV>';
};
Panel.prototype.imprimehtml = function() {
    if (this.configuraciones[0]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Panel.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Panel.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Panel.prototype.esArray = function(variable) {
    return Array.isArray(variable);
};

Panel.prototype.generahtml_r = function() {
    this.codigos[0] = '';
    this.generateHTMLRecursive(this.elementos, this.etiquetas[0], this.etiquetas[1], this.configuraciones[1], 0);
    this.codigos[0] += '</DIV>';
};

Panel.prototype.generateHTMLRecursive = function(elementos, etiquetaClase, etiquetaID, configuraciones, depth) {
    var toggle = 0;
    var depthClass = "_class";
    if (toggle == 1) depthClass += "_x";
    
    if (configuraciones[depth] == 1) {
        toggle = 1 - toggle;
    }
    
    for (var i = 0; i < elementos.length; i++) {
        this.codigos[0] += '<DIV CLASS="' + etiquetaID + '_' + (i + 1) + '_CL_' + i + ' ' + etiquetaClase + '" ID="' + etiquetaID + '_' + (i + 1) + '">';
        
        if (Array.isArray(elementos[i])) {
            this.generateHTMLRecursive(elementos[i], etiquetaClase + "_sub", etiquetaID + '_' + (i + 1), configuraciones, depth + 1);
        } else {
            this.codigos[0] += elementos[i];
        }
        
        this.codigos[0] += '</DIV>';
    }
};