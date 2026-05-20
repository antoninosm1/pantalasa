function Filelist(idioma, contenedores, etiqueta, tipo, valor, metodos, html, elementos) {
	this.idioma = idioma;
	this.contenedores = contenedores;
	this.etiqueta = etiqueta;
	this.tipo = tipo;
	this.valor = valor;
	this.metodos = metodos;
	this.html = html;
	this.elementos = elementos;
}

Filelist.prototype.generahtml = function() {
    this.html[3] = "";

    if(this.contenedores[0] == 1) {
	    this.html[3] = this.html[3]+"<DIV CLASS='"+this.contenedores[1]+"' ID='"+this.contenedores[2]+"'>";
    }
    this.html[3] = this.html[3]+"<div class='"+this.html[0]+"' id='"+this.html[1]+"'>";
    
    if(this.contenedores[3][0]==1) {
        this.html[3] = this.html[3]+"<div class='"+this.html[0]+"_area' id='"+this.html[1]+"_TITLE'>"+this.idioma[1][this.idioma[0]][0]+"</div>";
    }
    if(this.contenedores[3][1]==1) {
        this.html[3] = this.html[3]+"<div class='"+this.html[0]+"_area' id='"+this.html[1]+"_BODY'>";
            this.html[3] = this.html[3]+"<div class='"+this.html[0]+"_area_files' id='"+this.html[1]+"_BODY_FILES'>";
            this.html[3] = this.html[3]+"</div>";
            this.html[3] = this.html[3]+"<div class='"+this.html[0]+"_area_butons' id='"+this.html[1]+"_BODY_INPUT'>";
                this.html[3] = this.html[3]+"<input type='file' class='"+this.html[0]+"_inputfile' id='"+this.html[1]+"_INPUTFILE_1' name='"+this.html[4]+"' onchange='"+this.metodos[1]+"'>";
            this.html[3] = this.html[3]+"</div>";
        this.html[3] = this.html[3]+"</div>";
    }
    if(this.contenedores[3][2]==1) {
        this.html[3] = this.html[3]+"<div class='"+this.html[0]+"_area' id='"+this.html[1]+"_BUTON'>";
        this.html[3] = this.html[3]+"<input type='button' class='"+this.html[5]+"' id='"+this.html[1]+"_BUTON_LINK' name='"+this.html[4]+"' value='"+this.idioma[1][this.idioma[0]][4]+"' onclick='"+this.metodos[0]+"'>";
        this.html[3] = this.html[3]+"</div>";
    }
    if(this.contenedores[3][3]==1) {
        this.html[3] = this.html[3]+"<div class='"+this.html[0]+"_area' id='"+this.html[1]+"_FOOT'>"+this.idioma[1][this.idioma[0]][3]+"</div>";
    }
    this.html[3] = this.html[3]+"</div>";
    if (this.contenedores[0] == 1) {
	    this.html[3] = this.html[3]+"</DIV>";
    }

};	   						
Filelist.prototype.clickescondido = function() {
	document.getElementById(this.html[1]+"_INPUTFILE_"+(this.elementos[0]+1)).click();
};	   						
Filelist.prototype.anadebuton = function() {
    this.elementos[0]=(this.elementos[0]+1);
    this.html[3]="<input type='file' class='"+this.html[0]+"_inputfile' id='"+this.html[1]+"_INPUTFILE_"+(this.elementos[0]+1)+"' name='"+this.html[4]+"' onchange='"+this.metodos[1]+"' value=''>";
    $("#"+this.html[1]+"_BODY_INPUT").append(this.html[3]);
};	   						
Filelist.prototype.cambiavalor = function() {
    let n = 0;
    let x = this.elementos[0];
    let acumula_html_filelist = "";
    while (n < x) {
        if (document.getElementById(this.html[1]+"_INPUTFILE_"+(n+1)).value!="") {
            var file_puente = document.getElementById(this.html[1]+"_INPUTFILE_"+(n+1)).value;
            file_puente = file_puente.replace("fakepath", "...");
            acumula_html_filelist = acumula_html_filelist+"<div class='"+this.html[0]+"_inputfile_desc'>"+file_puente+"</div>";
            acumula_html_filelist = acumula_html_filelist+"<div class='"+this.html[0]+"_inputfile_remove'>";
            acumula_html_filelist = acumula_html_filelist+"<a href='#' class='"+this.html[0]+"_inputfile_remove_buton' onclick='"+this.valor[5]+".borravalor("+(n+1)+")'><span class='"+this.html[0]+"_inputfile_remove_buton_icono fa-solid fa-square-minus'></span>"+this.idioma[1][this.idioma[0]][5]+"</a>";
            acumula_html_filelist = acumula_html_filelist+"</div>";
        }
        n++;
    }
    $("#"+this.html[1]+"_BODY_FILES").html(acumula_html_filelist);
};	   						
Filelist.prototype.borravalor = function(reng_id) {
    document.getElementById(this.html[1]+"_INPUTFILE_"+(reng_id)).value = "";
    this.cambiavalor();
};	   						

Filelist.prototype.limpia = function() {

	this.valor[0] = 0;
	this.valor[1] = "";
	this.valor[2] = 0;
	this.valor[3] = "";
	this.elementos[0] = 0;

	this.generahtml();
	this.imprimehtml();

};	   						



Filelist.prototype.imprimehtml = function() {

	$(this.html[2]).html(this.html[3]);

};	   						



Filelist.prototype.verificavacio = function() {
	if (this.elementos[0]==0) {
		this.valor[6] = 1;
	}
    	else {
		this.valor[6] = 0;
    
    }
};	   						
Filelist.prototype.traduce = function(par_idioma) {
    this.idioma[0][0] = par_idioma;
};	   						
