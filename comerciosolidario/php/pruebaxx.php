<?php
// VINCULAMOS CLASES PHP
?>
<!DOCTYPE html>
<html lang="es_MX">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>COMERCIO SOLIDARIO</title>
        <link rel="icon" href="../icons8-favicon.gif" type="image/x-icon">
		<link rel="stylesheet" href="../../pantalib/css/comerciosolidario_puntos.css">
		<link rel="stylesheet" href="../../pantalib/css/comerciosolidario_puntos_mantenimiento.css">
		<link rel="stylesheet" href="../../pantalib/fontawesome/css/all.css">
		<script src="../../pantalib/jquery/jquery.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Radio.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Input.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Textodinamico.js"></script>
    </head>
    <body class="maqueta_base" id="ID_PRUEBA">
		<DIV ID="ID_RADIO"></DIV>
		<BR>
		<DIV ID="ID_CAJA"></DIV>
		<BR>
		<DIV ID="ID_NUMERO"></DIV>
		<BR>
		<DIV ID="ID_TITULO"></DIV>
    </body>
</html>
<script>
	
	var idioma = 0;

	// CLASE........: Radio
	// INSTANCIA....: Radio_orden_lista
	// SE INSERTA EN: #ID_RADIO	
	// DESCRIPCION..: Genera opciones para establecer el orden de la lista de puntos
	// IMPRESION....: Inmediato, sustitutivo

	var inglesElementos = ['ID', 'NAME', 'DESCRIPTION'];
	var inglesIdioma = ['ORDER OPTIONS:', inglesElementos];
	var espanolElementos = ['ID', 'NOMBRE', 'DESCRIPCIÓN'];
	var espanolIdioma = ['OPCIONES DE ORDÉN:', espanolElementos];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var etiquetaRadio = 1
	var renglon01 = ['', 0];
	var elementosEspeciales = [];
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, etiquetaRadio, elementosEspeciales];
	var etiquetas = ['radio_group', 'ID_DATOS_OPTION_01', '#ID_RADIO', 'select_datos_01'];
	var codigos = [''];
	var elementosValor = [1, 2, 3];
	var elementosMetodos = [
		
		' ONCHANGE="Radio_orden_lista.actualizavalor(0)"',
		' ONCHANGE="Radio_orden_lista.actualizavalor(1)"',
		' ONCHANGE="Radio_orden_lista.actualizavalor(2)"'
	
	];
	
	var elementos = [elementosValor, elementosMetodos];
	var valores = [1, 1];
	var metodos = [''];
	var Radio_orden_lista = new Radio(configuraciones, etiquetas, codigos, elementos, valores, metodos);
	Radio_orden_lista.generahtml();
	Radio_orden_lista.imprimehtml();

	// CLASE........: Radio
	// INSTANCIA....: Radio_filtro_caja
	// SE INSERTA EN: #ID_PUNTOS_TRABAJO_04_02_03_02	
	// DESCRIPCION..: Genera opciones para establecer el orden de la lista de puntos
	// IMPRESION....: Espera llamada, sustitutivo

	var inglesElementos = ['CON CAJA', 'SIN CAJA', 'AMBOS'];
	var inglesIdioma = ['OPCIONES DE ORDÉN:', inglesElementos];
	var espanolElementos = ['CON CAJA', 'SIN CAJA', 'AMBOS'];
	var espanolIdioma = ['OPCIONES DE ORDÉN:', espanolElementos];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var etiquetaRadio = 0;
	var renglon01 = ['', 0];
	var elementosEspeciales = [];
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, etiquetaRadio, elementosEspeciales];
	var etiquetas = ['radio_group', 'ID_DATOS_OPTION_02', '#ID_CAJA', 'select_datos_02'];
	var codigos = [''];
	var elementosValor = [1, 2, 3];
	var elementosMetodos = [
		
		' ONCHANGE="Radio_filtro_caja.actualizavalor(0)"',
		' ONCHANGE="Radio_filtro_caja.actualizavalor(1)"',
		' ONCHANGE="Radio_filtro_caja.actualizavalor(2)"'
	
	];
	
	var elementos = [elementosValor, elementosMetodos];
	var valores = [1, 1];
	var metodos = [''];
	var Radio_filtro_caja = new Radio(configuraciones, etiquetas, codigos, elementos, valores, metodos);

	// CLASE........: Input
	// INSTANCIA....: Input_registros_pagina
	// SE INSERTA EN: #ID_NUMERO	
	// DESCRIPCION..: Genera control para introducir numero de registros por página
	// IMPRESION....: Espera llamada, sustitutivo

	var inglesElementos = [''];
	var inglesIdioma = ['RECORDS ON PAGE: ', inglesElementos];
	var espanolElementos = [''];
	var espanolIdioma = ['REGISTROS POR PÁGINA: ', espanolElementos];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var tipoInput = 'number';
	var anchoInput = 5;
	var etiquetaInput = 1;
	var configuraciones = [controlIdioma, tipoImpresion, tipoInput, anchoInput, etiquetaInput];
	var etiquetas = ['input_numero', 'ID_REGISTROS_PAGINA', '#ID_NUMERO', 'num_registros'];
	var codigos = ['', ''];
	var valores = [15, 15];
	var metodos = [' ONCHANGE="Input_registros_pagina.actualizavalor()"'];
	var Input_registros_pagina = new Input(configuraciones, etiquetas, codigos, valores, metodos);
	Input_registros_pagina.generahtml();
	Input_registros_pagina.imprimehtml();

	// CLASE........: Textodinamico
	// INSTANCIA....: Textodinamico_titulo_grid
	// SE INSERTA EN: #ID_TITULO	
	// DESCRIPCION..: Imprime titulo del grid
	// IMPRESION....: Inmediata, sustitutivo

	var inglesElementos = ['POINT LIST', ' ORDER ID', ' ORDER NAME', ' ORDER DESC', ' WITH CASHBOX', ' NO CASHBOX'];
	var inglesIdioma = ['LIST TITLE: ', inglesElementos];
	var espanolElementos = ['LISTA DE PUNTOS', ' POR ID', ' POR NOMBRE', ' POR DESCRIPCIÓN', ' CON CAJA', ' SIN CAJA'];
	var espanolIdioma = ['TÍTULO DE LISTA :', espanolElementos];
	var germanElementos = ['POINT LIST', ' ORDER ID', ' ORDER NAME', ' ORDER DESC', 'WITH CASHBOX', ' WITH CASHBOX'];
	var germanIdioma = ['LISTENTITEL: ', germanElementos];
	var arregloIdioma = [inglesIdioma, espanolIdioma, germanElementos];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var etiqueta = 1;
	var configuraciones = [controlIdioma, tipoImpresion, etiqueta];
	var etiquetas = ['titulo_grid', 'ID_CAMPO_TITULO_GRID', '#ID_TITULO', 'grid_titulo'];
	var codigos = ['', ''];
	var valores = ['TITULO INICIAL', 'TITULO INICIAL'];
	
	var class_ante01_01_01 = [[0, 1, 0, 0]];
	var class_ante02_01_01 = [[0, 1, 1, 0]];
	var class_resultado_01_01 = [[0, 1, '', 0]];
	var class_condicion_01_01 = [[1, class_ante01_01_01, class_ante02_01_01], class_resultado_01_01];

	var class_parte_01 = [class_condicion_01_01];

	var class_valor = [class_parte_01];		

	var fuenteClass = [class_valor, []];	

///////////////////////


	var texto_ante01_01_01 = [[0, 1, 1, 0]];
	var texto_ante02_01_01 = [[0, 1, 1, 0]];
	var texto_resultado_01_01 = [[0, 3, 0, 0]];
	var texto_condicion_01_01 = [[1, texto_ante01_01_01, texto_ante02_01_01], texto_resultado_01_01];

	var texto_ante01_01_02 = [[0, 1, 1, 0]];
	var texto_ante02_01_02 = [[0, 4, [0, 0], 0]];
	var texto_resultado_01_02 = [[0, 3, 1, 0]];
	var texto_condicion_01_02 = [[1, texto_ante01_01_02, texto_ante02_01_02], texto_resultado_01_02];

	var texto_ante01_01_03 = [[0, 1, 2, 0]];
	var texto_ante02_01_03 = [[0, 4, [0, 0], 0]];
	var texto_resultado_01_03 = [[0, 3, 2, 0]];
	var texto_condicion_01_03 = [[1, texto_ante01_01_03, texto_ante02_01_03], texto_resultado_01_03];

	var texto_ante01_01_04 = [[0, 1, 3, 0]];
	var texto_ante02_01_04 = [[0, 4, [0, 0], 0]];
	var texto_resultado_01_04 = [[0, 3, 3, 0]];
	var texto_condicion_01_04 = [[1, texto_ante01_01_04, texto_ante02_01_04], texto_resultado_01_04];

	var texto_ante01_01_05 = [[0, 1, 1, 0]];
	var texto_ante02_01_05 = [[0, 4, [1, 0], 0]];
	var texto_resultado_01_05 = [[0, 3, 4, 0]];
	var texto_condicion_01_05 = [[1, texto_ante01_01_05, texto_ante02_01_05], texto_resultado_01_05];

	var texto_ante01_01_05 = [[0, 1, 1, 0]];
	var texto_ante02_01_05 = [[0, 4, [1, 0], 0]];
	var texto_resultado_01_05 = [[0, 3, 4, 0]];
	var texto_condicion_01_05 = [[1, texto_ante01_01_05, texto_ante02_01_05], texto_resultado_01_05];

	var texto_parte_01 = [texto_condicion_01_01, texto_condicion_01_02, texto_condicion_01_03, texto_condicion_01_04, texto_condicion_01_05];

	var texto_valor = [texto_parte_01];		

	var fuenteTexto = [texto_valor, [Radio_orden_lista, Radio_filtro_caja]];	

////////////////////////////////////////
	
	var fuentes = [fuenteClass, fuenteTexto];
	
	var Textodinamico_titulo_grid = new Textodinamico(configuraciones, etiquetas, codigos, valores, fuentes);
	Textodinamico_titulo_grid.generahtml();
	Textodinamico_titulo_grid.imprimehtml();

</script>