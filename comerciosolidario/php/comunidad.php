<?php
// VINCULAMOS CLASES PHP
	require_once "../../pantalib/php/objetos/new/Sistema.php";
	require_once "../../pantalib/php/objetos/new/User.php";
	require_once "../../pantalib/php/objetos/new/Log.php";
	require_once "../../pantalib/php/objetos/new/Session.php";
	session_start();
	if (!isset($_SESSION['Sistema'])) {
		header('Location: ../index.php');
	}
	header('Content-Type: text/html; charset=UTF-8');

// ESTABLECEMOS PARAMETROS DE LOG
	$_SESSION['logPhp']->configuraciones[2] = '';

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
		<link rel="stylesheet" href="../../pantalib/css/comerciosolidario_comunidad.css">
		<link rel="stylesheet" href="../../pantalib/css/comerciosolidario_comunidad_crud.css">
		<link rel="stylesheet" href="../../pantalib/css/comerciosolidario_comunidad_informes.css">
		<link rel="stylesheet" href="../../pantalib/css/comerciosolidario_comunidad_lista.css">
		<link rel="stylesheet" href="../../pantalib/css/comerciosolidario_comunidad_grid.css">
		<link rel="stylesheet" href="../../pantalib/css/comerciosolidario_comunidad_captura.css">
		<link rel="stylesheet" href="../../pantalib/fontawesome/css/all.css">
		<script src="../../pantalib/jquery/jquery.js"></script>

		<script src="../../pantalib/javascript/objetos/mvvm/model/Session.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/model/System.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/model/Consulta.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/model/Valor.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/model/Dato.js"></script>

		<script src="../../pantalib/javascript/objetos/mvvm/view/Maqueta.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Html.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Menu.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Modal.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Load.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Texto.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Grid.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Elemento.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Radio.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Radiopcion.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Input.js"></script>

		<script src="../../pantalib/javascript/objetos/mvvm/viewmodel/Pantalla.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/viewmodel/Screenx.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/viewmodel/Metodos.js"></script>

	</head>
    <body class="maqueta_base" id="ID_COMERCIOSOLIDARIO_COMUNIDAD">
		COMERCIO SOLIDARIO...
    </body>
</html>
<script>








////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////


// ** // ** // ** // ** // ** // ** // ** // ** // **
//////////////////////////////////////////
// ** // ** // ** // ** // ** // ** // ** // ** // **
//////////////////////////////////////////


// ** COMIENZA JS


// ** // ** // ** // ** // ** // ** // ** // ** // **
//////////////////////////////////////////
// ** // ** // ** // ** // ** // ** // ** // ** // **
//////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////































// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE UNO: ESTABLECE DATOS INICIALES CLASES MODELO

// ****************************************************************
// ****************************************************************
// ****************************************************************




































// ****************************************************************
// MODELS: CLASES PARA MANEJAR SESION PHP Y SISTEMA
// ****************************************************************


// CLASE........: Session
// INSTANCIA....: Session_comunidad
// DESCRIPCION..: Objeto para guardar información de la session PHP en JS
// HTML.........: Se genera despues de ser creado
	
	var idioma = <?php echo json_encode($_SESSION['Sistema'] -> configuraciones[2]); ?>;
    var sistema_id = <?php echo json_encode($_SESSION['Sistema'] -> configuraciones[0]); ?>;
    var sistema_tech_name = <?php echo json_encode($_SESSION['Sistema'] -> configuraciones[1]); ?>;
	var usuarioID = <?php echo json_encode($_SESSION['User'] -> elementos[0][0]); ?>;
	var usuarioName = <?php echo json_encode($_SESSION['User'] -> elementos[0][4]." ".$_SESSION['User'] -> elementos[0][3]); ?>;
	var usuarioStatus = <?php echo json_encode($_SESSION['User'] -> elementos[0][7]); ?>;
	var session = <?php echo json_encode($_SESSION['session'] -> configuraciones[0]); ?>;
	var idCode = 2;
	var statusSessiono = [1, 2, 3, 4];
	var statusCheck = 1;
	var scarlet = [idCode, statusSessiono, statusCheck, usuarioStatus];
	var scriptPhp = ['session_cierra_comerciosolidario.php', 'session_abre_comerciosolidario.php'];
	var metodoPhp = 'POST';
	var configuraciones = [scarlet, scriptPhp, metodoPhp];
	var codigos = [''];
	var Session_comunidad = new Session(configuraciones, codigos);
	Session_comunidad.revisa(usuarioID, session, 'salida.php');

// CLASE........: System
// INSTANCIA....: Sistema_comerciosolidario
// DESCRIPCION..: Instancia para administrar sesión de PHP 
	
	var Sistema_comerciosolidario = new System(sistema_id, sistema_tech_name, 'COMERCIO SOLIDARIO', 'PLATAFORMA DE COMERCIO SOLIDARIO', '');


// ****************************************************************
// MODELS: CLASES PARA IR AL BACKEND
// ****************************************************************






	
// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //

// PUNTO DE INICIO

// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //



//////////////////////////////////////////
//////////////////////////////////////////
//////                              //////
//////                              //////
//////////////////////////////////////////
//////////////////////////////////////////
//////                              //////
//////                              //////
//////////////////////////////////////////
//////////////////////////////////////////




///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
//////////////////////
//////////////////
//////////////
//////////
//////
//






	// CLASE........: Consulta
	// INSTANCIA....: Consulta_comunidad
	// DESCRIPCION..: Consulta que se ejecuta para actualizar grid de comunidad

	var statusConsulta = 0;
	var scriptPhp = 'consulta_comunidad.php';
	var metodoPhp = 'POST';
	var valorOrden = 1;
	var valorFiltro = 0;
	var filtro = [1, 3];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_consulta_comunidad.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_comunidad = new Consulta(configuraciones, codigos, elementos);


	// CLASE........: Consulta
	// INSTANCIA....: Consulta_kronos
	// DESCRIPCION..: Sólo se usa una vez 

	var statusConsulta = 0;
	var scriptPhp = 'kronos_comunidad.php';
	var metodoPhp = 'POST';
	var valorOrden = 1;
	var valorFiltro = 0;
	var filtro = [1, 3];
	var posicionCallback = 0;
	var metodosCallback01 = [];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_kronos = new Consulta(configuraciones, codigos, elementos);


// ****************************************************************
// MODELS: CLASES PARA MANEJAR DATOS BASE DEL AREA DE FILTROS
// ****************************************************************
	

	// CLASE........: Dato
	// INSTANCIA....: Dato_orden_lista
	// DESCRIPCION..: Dato para manejar el orden de la lista, objeto que  sólo puede recibir
	//                su valor por un llamado externo y debe estar inicializado desde el principio
	
		var instancia_name = 'Dato_orden_lista';
		var configuraciones = [instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var dato_actual = 1;
		var dato_inicial = 1;
		var datos = [dato_actual, dato_inicial];
		var Dato_orden_lista = new Dato(configuraciones, estructura, datos);
		Dato_orden_lista.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_filtro_usuario_lista
	// DESCRIPCION..: Dato para manejar el filtro de la lista, objeto que  sólo puede recibir
	//                su valor por un llamado externo y debe estar inicializado desde el principio
	
		var instancia_name = 'Dato_filtro_usuario_lista';
		var configuraciones = [instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var dato_actual = 3;
		var dato_inicial = 3;
		var datos = [dato_actual, dato_inicial];
		var Dato_filtro_usuario_lista = new Dato(configuraciones, estructura, datos);
		Dato_filtro_usuario_lista.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_registros_pagina
	// DESCRIPCION..: Dato para manejar el numero de registros por página
	
		var instancia_name = 'Dato_registros_pagina';
		var configuraciones = [instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var dato_actual = 5;
		var dato_inicial = 5;
		var datos = [dato_actual, dato_inicial];
		var Dato_registros_pagina = new Dato(configuraciones, estructura, datos);
		Dato_registros_pagina.inicializa_dato();


// ****************************************************************
// MODELS: CLASES PARA MANEJAR DATOS BASE DE TRABAJO
// ****************************************************************

	// CLASE........: Dato
	// INSTANCIA....: Dato_status_registro
	// DESCRIPCION..: Dato para manejar el numero de registros por página
	
		var instancia_name = 'Dato_status_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var dato_actual = 0;
		var dato_inicial = 0;
		var datos = [dato_actual, dato_inicial];
		var Dato_status_registro = new Dato(configuraciones, estructura, datos);
		Dato_status_registro.inicializa_dato();
	
	// CLASE........: Dato
	// INSTANCIA....: Dato_modalidad_captura
	// DESCRIPCION..: Dato para manejar el numero de registros por página
	
		var instancia_name = 'Dato_status_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var dato_actual = 0;
		var dato_inicial = 0;
		var datos = [dato_actual, dato_inicial];
		var Dato_modalidad_captura = new Dato(configuraciones, estructura, datos);
		Dato_modalidad_captura.inicializa_dato();
	
	// CLASE........: Dato
	// INSTANCIA....: Dato_id_registro
	// DESCRIPCION..: Dato para manejar el numero de registros por página
	
		var instancia_name = 'Dato_id_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var dato_actual = 0;
		var dato_inicial = 0;
		var datos = [dato_actual, dato_inicial];
		var Dato_id_registro = new Dato(configuraciones, estructura, datos);
		Dato_id_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_nombre_registro
	// DESCRIPCION..: Dato para manejar el nombre del registro
	
		var instancia_name = 'Dato_nombre_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var dato_actual = '';
		var dato_inicial = '';
		var datos = [dato_actual, dato_inicial];
		var Dato_nombre_registro = new Dato(configuraciones, estructura, datos);
		Dato_nombre_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_descripcion_registro
	// DESCRIPCION..: Dato para manejar la descripción del registro
	
		var instancia_name = 'Dato_descripcion_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var dato_actual = '';
		var dato_inicial = '';
		var datos = [dato_actual, dato_inicial];
		var Dato_descripcion_registro = new Dato(configuraciones, estructura, datos);
		Dato_descripcion_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_statuscaja_registro
	// DESCRIPCION..: Dato para manejar el estado de la caja del registro
	
		var instancia_name = 'Dato_statuscaja_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var dato_actual = 0;
		var dato_inicial = 0;
		var datos = [dato_actual, dato_inicial];
		var Dato_statuscaja_registro = new Dato(configuraciones, estructura, datos);
		Dato_statuscaja_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_usuariocaja_registro
	// DESCRIPCION..: Dato para manejar el usuario que esta en uso de la caja del registro
	
		var instancia_name = 'Dato_usuario_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var dato_actual = 0;
		var dato_inicial = 0;
		var datos = [dato_actual, dato_inicial];
		var Dato_usuariocaja_registro = new Dato(configuraciones, estructura, datos);
		Dato_usuariocaja_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_fecha_registro
	// DESCRIPCION..: Dato para manejar la fecha de creación del registro
	
		var instancia_name = 'Dato_fecha_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var dato_actual = '';
		var dato_inicial = '';
		var datos = [dato_actual, dato_inicial];
		var Dato_fecha_registro = new Dato(configuraciones, estructura, datos);
		Dato_fecha_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_creador_registro
	// DESCRIPCION..: Dato para manejar el usuario creador del registro
	
		var instancia_name = 'Dato_creador_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var dato_actual = 0;
		var dato_inicial = 0;
		var datos = [dato_actual, dato_inicial];
		var Dato_creador_registro = new Dato(configuraciones, estructura, datos);
		Dato_creador_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_almacen_registro
	// DESCRIPCION..: Dato para manejar el almacen al cual esta vinculado el registro
	
		var instancia_name = 'Dato_almacen_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var dato_actual = 0;
		var dato_inicial = 0;
		var datos = [dato_actual, dato_inicial];
		var Dato_almacen_registro = new Dato(configuraciones, estructura, datos);
		Dato_almacen_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_caja_registro
	// DESCRIPCION..: Dato para manejar si el registro tiene caja
	
		var instancia_name = 'Dato_caja_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var dato_actual = 0;
		var dato_inicial = 0;
		var datos = [dato_actual, dato_inicial];
		var Dato_caja_registro = new Dato(configuraciones, estructura, datos);
		Dato_caja_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_actualizacion_registro
	// DESCRIPCION..: Dato para manejar si el registro tiene caja
	
		var instancia_name = 'Dato_actualizacion_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var dato_actual = '';
		var dato_inicial = '';
		var datos = [dato_actual, dato_inicial];
		var Dato_actualizacion_registro = new Dato(configuraciones, estructura, datos);
		Dato_actualizacion_registro.inicializa_dato();






















// ****************************************************************
// MODELS: CLASES PARA MANEJAR VALORES PARA BAJAR REGISTRO
// ****************************************************************

	// CLASE........: Valor
	// INSTANCIA....: Valor_baja_nombre
	// DESCRIPCION..: Valor para bajar descripcion del registro
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_baja_nombre';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = '';
		var valor_inicial = [0, ''];
		var valores = [valor_actual, valor_inicial];
	
		var antecedente01_01 = [[0, 1, 1, 0]];
		var antecedente02_01 = [[0, 1, 1, 0]];
		var resultado_01 = [[1, 10, ['dato_02', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
	
		var parte_01 = [condicion_01];

		var adn = [parte_01];		

		var clasesFuentes = [Consulta_comunidad];
		
		var fuentes = [adn, clasesFuentes];

		var Valor_baja_nombre = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_baja_descripcion
	// DESCRIPCION..: Valor para bajar descripcion del registro
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_baja_descripcion';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = '';
		var valor_inicial = [0, ''];
		var valores = [valor_actual, valor_inicial];
	
		//var antecedente01_01 = [[0, 11, 1, 0]];
		var antecedente01_01 = [[0, 1, 1, 0]];
		var antecedente02_01 = [[0, 1, 1, 0]];
		var resultado_01 = [[1, 10, ['dato_03', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
	
		var parte_01 = [condicion_01];

		var adn = [parte_01];		

		var clasesFuentes = [Consulta_comunidad];
		
		var fuentes = [adn, clasesFuentes];

		var Valor_baja_descripcion = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_baja_statuscaja
	// DESCRIPCION..: Valor para bajar el status de la caja del registro
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_baja_statuscaja';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];
	
		var antecedente01_01 = [[0, 1, 1, 0]];
		var antecedente02_01 = [[0, 1, 1, 0]];
		var resultado_01 = [[1, 10, ['dato_04', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
	
		var parte_01 = [condicion_01];

		var adn = [parte_01];		

		var clasesFuentes = [Consulta_comunidad];
		
		var fuentes = [adn, clasesFuentes];

		var Valor_baja_statuscaja = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_baja_usuariocaja
	// DESCRIPCION..: Valor para bajar el usuario de la caja del registro
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_baja_usuariocaja';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];
	
		var antecedente01_01 = [[0, 1, 1, 0]];
		var antecedente02_01 = [[0, 1, 1, 0]];
		var resultado_01 = [[1, 10, ['dato_05', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
	
		var parte_01 = [condicion_01];

		var adn = [parte_01];		

		var clasesFuentes = [Consulta_comunidad];
		
		var fuentes = [adn, clasesFuentes];

		var Valor_baja_usuariocaja = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_baja_fecha
	// DESCRIPCION..: Valor para bajar la fecha de creación del registro
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_baja_fecha';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];
	
		var antecedente01_01 = [[0, 1, 1, 0]];
		var antecedente02_01 = [[0, 1, 1, 0]];
		var resultado_01 = [[1, 10, ['dato_06', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
	
		var parte_01 = [condicion_01];

		var adn = [parte_01];		

		var clasesFuentes = [Consulta_comunidad];
		
		var fuentes = [adn, clasesFuentes];

		var Valor_baja_fecha = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_baja_creador
	// DESCRIPCION..: Valor para bajar la fecha de creación del registro
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_baja_creador';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];
	
		var antecedente01_01 = [[0, 1, 1, 0]];
		var antecedente02_01 = [[0, 1, 1, 0]];
		var resultado_01 = [[1, 10, ['dato_07', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
	
		var parte_01 = [condicion_01];

		var adn = [parte_01];		

		var clasesFuentes = [Consulta_comunidad];
		
		var fuentes = [adn, clasesFuentes];

		var Valor_baja_creador = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_baja_almacen
	// DESCRIPCION..: Valor para bajar el alamcen vinculado al registro
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_baja_almacen';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];
	
		var antecedente01_01 = [[0, 1, 1, 0]];
		var antecedente02_01 = [[0, 1, 1, 0]];
		var resultado_01 = [[1, 10, ['dato_08', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
	
		var parte_01 = [condicion_01];

		var adn = [parte_01];		

		var clasesFuentes = [Consulta_comunidad];
		
		var fuentes = [adn, clasesFuentes];

		var Valor_baja_almacen = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_baja_caja
	// DESCRIPCION..: Valor para bajar si el registro tiene caja
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_baja_caja';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];
	
		var antecedente01_01 = [[0, 1, 1, 0]];
		var antecedente02_01 = [[0, 1, 1, 0]];
		var resultado_01 = [[1, 10, ['dato_09', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
	
		var parte_01 = [condicion_01];

		var adn = [parte_01];		

		var clasesFuentes = [Consulta_comunidad];
		
		var fuentes = [adn, clasesFuentes];

		var Valor_baja_caja = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_baja_actualizacion
	// DESCRIPCION..: Valor para bajar si el registro tiene caja
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_baja_actualizacion';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];
	
		var antecedente01_01 = [[0, 1, 1, 0]];
		var antecedente02_01 = [[0, 1, 1, 0]];
		var resultado_01 = [[1, 10, ['dato_10', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
	
		var parte_01 = [condicion_01];

		var adn = [parte_01];		

		var clasesFuentes = [Consulta_comunidad];
		
		var fuentes = [adn, clasesFuentes];

		var Valor_baja_actualizacion = new Valor(configuraciones, estructura, valores, fuentes);

	

// ****************************************************************
// MODELS: CLASES PARA MANEJAR VALORES DE GRID
// ****************************************************************
	

	// CLASE........: Valor
	// INSTANCIA....: Valor_texto_titulo_grid
	// DESCRIPCION..: Valor para establecer el texto del titulo del grid
	//                cambiar valor de Valor_status_registro
	
		var inglesIdioma = ['LISTA DE COMUNIDAD', ' POR ID', ' POR NOMBRE', ' POR FECHA DE CREACIÓN', ' CON CAJA', ' SIN CAJA'];
		var espanolIdioma = ['LISTA DE COMUNIDAD', ' POR ID', ' POR NOMBRE', ' POR FECHA DE CREACIÓN', ' CON CAJA', ' SIN CAJA'];
		var germanIdioma = ['LISTA DE COMUNIDAD', ' POR ID', ' POR NOMBRE', ' POR FECHA DE CREACIÓN', ' CON CAJA', ' SIN CAJA'];
		var arregloIdioma = [inglesIdioma, espanolIdioma, germanIdioma];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_texto_titulo_grid';
		var tipoImpresion = 0;
		var configuraciones = [controlIdioma, registro, instancia_name, tipoImpresion];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = '';
		var valor_inicial = ['', ''];
		var valores = [valor_actual, valor_inicial];

		var antecedente01_01 = [[0, 1, 0, 0]];
		var antecedente02_01 = [[0, 1, 0, 0]];
		var resultado_01 = [[1, 2, 0, 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];

		var antecedente01_02 = [[0, 11, 0, 0]];
		var antecedente02_02 = [[0, 1, 1, 0]];
		var resultado_02 = [[1, 2, 1, 0]];
		var condicion_02 = [[1, antecedente01_02, antecedente02_02], resultado_02];

		var antecedente01_03 = [[0, 11, 0, 0]];
		var antecedente02_03 = [[0, 1, 2, 0]];
		var resultado_03 = [[1, 2, 2, 0]];
		var condicion_03 = [[1, antecedente01_03, antecedente02_03], resultado_03];

		var antecedente01_04 = [[0, 11, 0, 0]];
		var antecedente02_04 = [[0, 1, 3, 0]];
		var resultado_04 = [[1, 2, 3, 0]];
		var condicion_04 = [[1, antecedente01_04, antecedente02_04], resultado_04];

		var antecedente01_05 = [[0, 11, 1, 0]];
		var antecedente02_05 = [[0, 1, 1, 0]];
		var resultado_05 = [[1, 2, 4, 0]];
		var condicion_05 = [[1, antecedente01_05, antecedente02_05], resultado_05];

		var antecedente01_06 = [[0, 11, 1, 0]];
		var antecedente02_06 = [[0, 1, 2, 0]];
		var resultado_06 = [[1, 2, 5, 0]];
		var condicion_06 = [[1, antecedente01_06, antecedente02_06], resultado_06];

		var parte_01 = [condicion_01, condicion_02, condicion_03, condicion_04, condicion_05, condicion_06];
		var adn = [parte_01];		
		var clasesFuentes = [Dato_orden_lista, Dato_filtro_usuario_lista];
		var fuentes = [adn, clasesFuentes];
		var Valor_texto_titulo_grid = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_grid_click
	// DESCRIPCION..: Valor para establecer el id que se recoge con click en registro de grid
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_grid_click';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];
		
		var antecedente01_01 = [[0, 1, 0, 0]];
		var antecedente02_01 = [[0, 1, 0, 0]];
		var resultado_01 = [[1, 10, ['dato_01', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
		var parte_01 = [condicion_01];
		var adn = [parte_01];		
		var clasesFuentes = [Consulta_comunidad];
		
		var fuentes = [adn, clasesFuentes];
		var Valor_grid_click = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_grid_clases
	// DESCRIPCION..: Valor para establecer las clases de las celdas del grid
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_grid_clases';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = '';
		var valor_inicial = [0, ''];
		var valores = [valor_actual, valor_inicial];

		var antecedente01_01 = [[0, 1, 0, 0]];
		var antecedente02_01 = [[0, 1, 0, 0]];
		var resultado_01 = [[1, 1, ' insulina kramina_t', 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
		var parte_01 = [condicion_01];
		var adn = [parte_01];		
		var clasesFuentes = [Consulta_comunidad];
		var fuentes = [adn, clasesFuentes];

		var Valor_grid_clases = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_grid_id_valor
	// DESCRIPCION..: Valor para establecer el valor que se imprime en la celda en el grid
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_grid_id_valor';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];
		var antecedente01_01 = [[0, 1, 0, 0]];
		var antecedente02_01 = [[0, 1, 0, 0]];
		var resultado_01 = [[1, 10, ['dato_01', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
		var parte_01 = [condicion_01];
		var adn = [parte_01];		
		var clasesFuentes = [Consulta_comunidad];
		var fuentes = [adn, clasesFuentes];
		var Valor_grid_id_valor = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_grid_nombre_valor
	// DESCRIPCION..: Valor para establecer el valor que se imprime en la celda en el grid
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_grid_nombre_valor';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];
		var antecedente01_01 = [[0, 1, 0, 0]];
		var antecedente02_01 = [[0, 1, 0, 0]];
		var resultado_01 = [[1, 10, ['dato_02', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
		var parte_01 = [condicion_01];
		var adn = [parte_01];		
		var clasesFuentes = [Consulta_comunidad];
		var fuentes = [adn, clasesFuentes];
		var Valor_grid_nombre_valor = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_grid_descripcion_valor
	// DESCRIPCION..: Valor para establecer el valor que se imprime en la celda en el grid
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_grid_descripcion_valor';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];
		var antecedente01_01 = [[0, 1, 0, 0]];
		var antecedente02_01 = [[0, 1, 0, 0]];
		var resultado_01 = [[1, 10, ['dato_03', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
		var parte_01 = [condicion_01];
		var adn = [parte_01];		
		var clasesFuentes = [Consulta_comunidad];
		var fuentes = [adn, clasesFuentes];
		var Valor_grid_descripcion_valor = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_grid_caja_valor
	// DESCRIPCION..: Valor para establecer el valor que se imprime en la celda en el grid
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_grid_caja_valor';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];

		var antecedente01_01 = [[0, 10, ['dato_09', 0], 0]];
		var antecedente02_01 = [[0, 1, 0, 0]];
		var resultado_01 = [[1, 1, 'NO', 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
		
		var antecedente01_02 = [[0, 10, ['dato_09', 0], 0]];
		var antecedente02_02 = [[0, 1, 1, 0]];
		var resultado_02= [[1, 1, 'SI', 0]];
		var condicion_02 = [[1, antecedente01_02, antecedente02_02], resultado_02];
		
		var parte_01 = [condicion_01, condicion_02];
		var adn = [parte_01];		
		var clasesFuentes = [Consulta_comunidad];
		var fuentes = [adn, clasesFuentes];
		var Valor_grid_caja_valor = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_grid_estado_valor
	// DESCRIPCION..: Valor para establecer el valor que se imprime en la celda en el grid
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_grid_estado_valor';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];

		var antecedente01_01 = [[0, 10, ['dato_04', 0], 0]];
		var antecedente02_01 = [[0, 1, 0, 0]];
		var resultado_01 = [[1, 1, 'ABIERTO', 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
		
		var antecedente01_02 = [[0, 10, ['dato_04', 0], 0]];
		var antecedente02_02 = [[0, 1, 1, 0]];
		var resultado_02= [[1, 1, 'EN USO', 0]];
		var condicion_02 = [[1, antecedente01_02, antecedente02_02], resultado_02];
		
		var parte_01 = [condicion_01, condicion_02];
		var adn = [parte_01];		
		var clasesFuentes = [Consulta_comunidad];
		var fuentes = [adn, clasesFuentes];
		var Valor_grid_estado_valor = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_grid_fecha_valor
	// DESCRIPCION..: Valor para establecer el valor que se imprime en la celda en el grid
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_grid_estado_valor';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];

		var antecedente01_01 = [[0, 1, 0, 0]];
		var antecedente02_01 = [[0, 1, 0, 0]];
		var resultado_01 = [[1, 10, ['dato_06', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
		
		var parte_01 = [condicion_01];
		var adn = [parte_01];		
		var clasesFuentes = [Consulta_comunidad];
		var fuentes = [adn, clasesFuentes];
		var Valor_grid_fecha_valor = new Valor(configuraciones, estructura, valores, fuentes);

// ****************************************************************
// MODELS: INSTANCIAS PARA MANEJAR VALORES DE IMPRESIÓN
// ****************************************************************

	// CLASE........: Valor
	// INSTANCIA....: Valor_texto_status
	// DESCRIPCION..: Valor para establecer el texto variable del status se actualiza al
	//                cambiar valor de Valor_status_registro
	
		var inglesIdioma = ['NO SYSTEM LOG SELECTED', 'SYSTEM LOG SELECTED', 'CAPTURING NEW SYSTEM LOG'];
		var espanolIdioma = ['NO HAY REGISTRO DE SISTEMA SELECCIONADO', 'REGISTRO DE SISTEMA SELECCIONADO', 'CAPTURANDO NUEVO REGISTRO DE SISTEMA'];
		var germanIdioma = ['KEIN SYSTEMPROTOKOLL AUSGEWÄHLT', 'SYSTEMPROTOKOLL AUSGEWÄHLT', 'NEUES SYSTEMPROTOKOLL WIRD ERFASST'];
		var arregloIdioma = [inglesIdioma, espanolIdioma, germanIdioma];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_texto_status';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = '';
		var valor_inicial = [0, ''];
		var valores = [valor_actual, valor_inicial];
	
		var antecedente01_01 = [[0, 11, 0, 0]];
		var antecedente02_01 = [[0, 1, 0, 0]];
		var resultado_01 = [[1, 2, 0, 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
	
		var antecedente01_02 = [[0, 11, 0, 0]];
		var antecedente02_02 = [[0, 1, 1, 0]];
		var resultado_02 = [[1, 2, 1, 0]];
		var condicion_02 = [[1, antecedente01_02, antecedente02_02], resultado_02];
	
		var antecedente01_03 = [[0, 11, 0, 0]];
		var antecedente02_03 = [[0, 1, 2, 0]];
		var resultado_03 = [[1, 2, 2, 0]];
		var condicion_03 = [[1, antecedente01_03, antecedente02_03], resultado_03];
	
		var parte_01 = [condicion_01, condicion_02, condicion_03];

		var adn = [parte_01];		

		var clasesFuentes = [Dato_status_registro];
		
		var fuentes = [adn, clasesFuentes];

		var Valor_texto_status = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_texto_id
	// DESCRIPCION..: Valor para establecer el texto variable del id se actualiza al
	//                cambiar valor de Valor_dato_id_registro
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_texto_id';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = '';
		var valor_inicial = [0, ''];
		var valores = [valor_actual, valor_inicial];
	
		var antecedente01_01 = [[0, 1, 0, 0]];
		var antecedente02_01 = [[0, 1, 0, 0]];
		var resultado_01 = [[1, 1, 'ID: ', 0],[1, 11, 0, 0],[1, 1, ' ', 0],[1, 11, 1, 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
	
		var parte_01 = [condicion_01];

		var adn = [parte_01];		

		var clasesFuentes = [Dato_id_registro, Dato_nombre_registro];
		
		var fuentes = [adn, clasesFuentes];

		var Valor_texto_id = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_texto_descripcion
	// DESCRIPCION..: Valor para establecer el texto variable de la descripción se actualiza al
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_texto_descripcion';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = '';
		var valor_inicial = [0, ''];
		var valores = [valor_actual, valor_inicial];
	
		//var antecedente01_01 = [[0, 11, 1, 0]];
		var antecedente01_01 = [[0, 1, 1, 0]];
		var antecedente02_01 = [[0, 1, 1, 0]];
		var resultado_01 = [[1, 11, 0, 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
	
		var parte_01 = [condicion_01];

		var adn = [parte_01];		

		var clasesFuentes = [Dato_descripcion_registro, Dato_status_registro];
		
		var fuentes = [adn, clasesFuentes];

		var Valor_texto_descripcion = new Valor(configuraciones, estructura, valores, fuentes);

	// CLASE........: Valor
	// INSTANCIA....: Valor_texto_modalidad_captura
	// DESCRIPCION..: Valor para establecer el texto variable de la modalidad
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_texto_modalidad_captura';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = '';
		var valor_inicial = [0, ''];
		var valores = [valor_actual, valor_inicial];
	
		var antecedente01_01 = [[0, 11, 0, 0]];
		var antecedente02_01 = [[0, 1, 1, 0]];
		var resultado_01 = [[1, 1, 'CAPTURANDO NUEVO REGISTRO DE PUNTO', 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
	
		var parte_01 = [condicion_01];

		var adn = [parte_01];		

		var clasesFuentes = [Dato_modalidad_captura];
		
		var fuentes = [adn, clasesFuentes];

		var Valor_texto_modalidad_captura = new Valor(configuraciones, estructura, valores, fuentes);



































// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE DOS: ESTABLECE IMPRESIÓN DE PANTALLA CLASES VIEW

// ****************************************************************
// ****************************************************************
// ****************************************************************




































// ****************************************************************
// BLOQUE DOS: 01 MAQUETA GENERAL Y MODALES
// ****************************************************************


// CLASE........: Maqueta
// INSTANCIA....: maqueta_01
// ID...........: ID_GEN_MAQUETA
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_COMUNIDAD	
// DESCRIPCION..: Maqueta principal de 3 posiciones
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo
	
	var inglesIdioma = ["BODY", "MODAL", "MODAL OPCION"];
	var espanolIdioma = ["CUERPO", "MODAL", "MODAL OPCION"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_01", "ID_GEN_MAQUETA", "#ID_COMERCIOSOLIDARIO_COMUNIDAD"];
	var codigos = [""];
	var elementosClass = ["area_cuerpo", "modal_oculto", "modal_oculto"];
	var elementosId = ["ID_GEN_CUERPO", "ID_GEN_MODAL", "ID_GEN_MODAL_OPCION"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01 = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01.generahtml();
	maqueta_01.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_comunidad
// ID...........: ID_COMERCIOSOLIDARIO_MODAL_X
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_BODY	
// DESCRIPCION..: Ventana modal para ir por datos
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, adicional

	var inglesIdioma = [""];
	var espanolIdioma = [""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 1;
	var botonCerrar = "";
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, botonCerrar];
	var etiquetas = ["ventana_modal", "ID_COMERCIOSOLIDARIO_MODAL_X", "#ID_COMERCIOSOLIDARIO_COMUNIDAD", "#ID_COMERCIOSOLIDARIO_MODAL_TITULO_X", "#ID_COMERCIOSOLIDARIO_MODAL_AVISO_X"];
	var codigos = [""];
	var Modal_comunidad = new Modal(configuraciones, etiquetas, codigos);
	Modal_comunidad.generahtml();
	Modal_comunidad.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_comunidad_modal
// ID...........: ID_COMERCIOSOLIDARIO_MODAL_MAQUETA
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_MODAL	
// DESCRIPCION..: Maqueta de 3 posiciones para organizar ventana modal para ir por datos
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado sustitutivo
	
	var inglesIdioma = ["WAIT A MOMENT", "DATA CONSULTING", ""];
	var espanolIdioma = ["ESPERE UN MOMENTO", "CONSULTANDO DATOS", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_ventana_modal", "ID_COMERCIOSOLIDARIO_MODAL_MAQUETA_X", "#ID_COMERCIOSOLIDARIO_MODAL_X"];
	var codigos = [""];
	var elementosClass = ["titulo_ventana", "area_aviso_modal", "area_button_modal"];
	var elementosId = ["ID_COMERCIOSOLIDARIO_MODAL_TITULO_X", "ID_COMERCIOSOLIDARIO_MODAL_AVISO_X", "ID_COMERCIOSOLIDARIO_MODAL_BUTTON_X"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_comunidad_modal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_comunidad_modal.generahtml();
	Maqueta_comunidad_modal.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_comunidad_opcion
// ID...........: ID_COMERCIOSOLIDARIO_MODAL_OPCION
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_BODY	
// DESCRIPCION..: Ventana modal para pedir opción
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado adicional
	
	var inglesIdioma = [""];
	var espanolIdioma = [""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 1;
	var botonCerrar = "";
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, botonCerrar];
	var etiquetas = ["ventana_modal", "ID_COMERCIOSOLIDARIO_MODAL_OPCION", "#ID_COMERCIOSOLIDARIO_BODY", "#ID_COMERCIOSOLIDARIO_MODAL_OPCION_TITULO", "#ID_COMERCIOSOLIDARIO_MODAL_OPCION_AVISO"];
	var codigos = [""];
	var Modal_comunidad_opcion = new Modal(configuraciones, etiquetas, codigos);
	Modal_comunidad_opcion.generahtml();
	Modal_comunidad_opcion.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_comunidad_modal_opcion
// ID...........: ID_COMERCIOSOLIDARIO_MODAL_OPCION_MAQUETA
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_MODAL_OPCION	
// DESCRIPCION..: Maqueta de 3 posiciones para organizar ventana modal para pedir opción
// HTML.........: Espera metodo
// IMPRESION....: Espera metodo, sustitutivo
	
	var inglesIdioma = ["AVISO", "CAMPO VACIO O NULO", ""];
	var espanolIdioma = ["AVISO", "CAMPO VACIO O NULO", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_ventana_modal", "ID_COMERCIOSOLIDARIO_MODAL_OPCION_MAQUETA", "#ID_COMERCIOSOLIDARIO_MODAL_OPCION"];
	var codigos = [""];
	var elementosClass = ["titulo_ventana", "area_aviso_modal", "area_button_modal"];
	var elementosId = ["ID_COMERCIOSOLIDARIO_MODAL_OPCION_TITULO", "ID_COMERCIOSOLIDARIO_MODAL_OPCION_AVISO", "ID_COMERCIOSOLIDARIO_MODAL_OPCION_BUTTON"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_comunidad_modal_opcion = new Maqueta(configuraciones, etiquetas, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Ok_modal
// ID...........: ID_OK_MODAL
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir ok en modal opcion
// HTML.........: Espera metodo
// IMPRESION....: Espera metodo, sustituye contenido

	var titulosIngles = ['OK'];
	var iconosIngles = ['fa-solid fa-thumbs-up'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['OK'];
	var iconosEspanol = ['fa-solid fa-thumbs-up'];
	var enlacesEspanol = ['javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var ElementoIcono = 1;
	var OrdenIcono = 0;
	var Icono = [ElementoIcono, OrdenIcono];
	var Link = 1;
	var valoresValidcacion = [];
	var tiposValoresValidacion = [];
	var statusValidacion = [];
	var Validacion = [valoresValidcacion];
	var configuraciones = [controlIdioma, tipoImpresion, Icono, Link];
	var etiquetas = ["boton_link_icono_chico", "ID_OK_MODAL", "#ID_COMERCIOSOLIDARIO_MODAL_OPCION_BUTTON", "ok_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_comunidad_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Ok_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);


// ****************************************************************
// VIEW: MAQUETA DEL AREA DE TRABAJO
// ****************************************************************


// CLASE........: Maqueta
// INSTANCIA....: maqueta_principal
// ID...........: ID_GEN_MAQUETA_PRINCIPAL
// SE INSERTA EN: #ID_GEN_CUERPO	
// DESCRIPCION..: Maqueta principal de 3 posiciones
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo
	
	var inglesIdioma = ["STATUS", "HEAD", "BODY"];
	var espanolIdioma = ["ESTADO", "CABEZA", "CUERPO"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_principal", "ID_GEN_MAQUETA_PRINCIPAL", "#ID_GEN_CUERPO"];
	var codigos = [""];
	var elementosClass = ["area_cinta", "area_cabeza", "area_trabajo"];
	var elementosId = ["ID_GEN_01", "ID_GEN_02", "ID_GEN_03"];
	var elementos = [elementosClass, elementosId];
	var maqueta_principal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_principal.generahtml();
	maqueta_principal.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_user
// ID...........: ID_GEN_01_MAQUETA
// SE INSERTA EN: #ID_GEN_01	
// DESCRIPCION..: Maqueta para organizar la cinta de status
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo
	
	var inglesIdioma = ["COMERCIO SOLIDARIO SYSTEM", "", "USER"];
	var espanolIdioma = ["ONLINE", "", "USUARIO"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["area_cinta", "ID_GEN_01_MAQUETA", "#ID_GEN_01"];
	var codigos = [""];
	var elementosClass = ["area_cinta", "area_cinta", "area_cinta"];
	var elementosId = ["ID_GEN_01_NAME", "ID_GEN_01_AVISO", "ID_GEN_01_USER"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_user = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_user.generahtml();
	Maqueta_user.imprimehtml();


// ****************************************************************
// VIEW: MAQUETA DE CINTA, CABEZA Y MENU
// ****************************************************************


// CLASE........: User_name
// INSTANCIA....: Html
// SE INSERTA EN: #ID_GEN_01_USER	
// DESCRIPCION..: Elemento para imprimir html directo con el Usuario
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo
	
	var inglesIdioma = ['USER: '+usuarioName];
	var espanolIdioma = ['USUARIO: '+usuarioName];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var configuraciones = [controlIdioma, tipoImpresion];
	var etiquetas = "#ID_GEN_01_USER";
	var codigos = "";
	var User_name = new Html(configuraciones, etiquetas, codigos);
	User_name.generahtml();
	User_name.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_cabeza
// ID...........: ID_GEN_02_MAQUETA
// SE INSERTA EN: #ID_GEN_02	
// DESCRIPCION..: Maqueta para organizar la cabeza
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo
	
	var inglesIdioma = ["<A CLASS='postit'>SISTEMA DE COMERCIO SOLIDARIO</A>", "MENU"];
	var espanolIdioma = ["<A CLASS='postit'>PLATAFORMA DE COMERCIO SOLIDARIO</A>", "MENU"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 2;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["area_cabecera", "ID_GEN_02_MAQUETA", "#ID_GEN_02"];
	var codigos = [""];
	var elementosClass = ["area_titulo_pantalla", "area_menu_centro"];
	var elementosId = ["ID_GEN_02_TITULO", "ID_GEN_02_MENUCENTRO"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_cabeza = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_cabeza.generahtml();
	Maqueta_cabeza.imprimehtml();

// CLASE........: Menu
// INSTANCIA....: Menu_central
// ID...........: ID_GEN_02_MENUCENTRO_ELEMENTOS
// SE INSERTA EN: #ID_GEN_02_MENUCENTRO	
// DESCRIPCION..: Menu de elementos para navegar a las diferentes pantallas
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo

	var titulosIngles = ['COMERCIAR', 'USER', 'USERS', 'SUPPORT', 'RESUME', 'EXIT'];
	var iconosIngles = ['fa-solid fa-user', 'fa-solid fa-user', 'fa-solid fa-user-group disabled', 'fa-solid fa-handshake disabled', 'fa-solid fa-table', 'fa-solid fa-door-open'];
	var enlacesIngles = ['javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['COMERCIAR', 'PUNTOS', 'PRODUCTOS', 'ACOPIO', 'CONFIGURACIÓN', 'SALIR'];
	var iconosEspanol = ['fa-solid fa-handshake-angle', 'fa-solid fa-arrows-to-circle', 'fa-solid fa-boxes-stacked', 'fa-solid fa-boxes-packing', 'fa-solid fa-gears', 'fa-solid fa-door-open'];
	var enlacesEspanol = ['javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 6;
	var tipoImpresion = 0;
	var tipoMenu = 0;
	var nivelesStatus = [1, 2, 3, 4];
	var statusUno = [1, 1, 1, 1, 1, 1]; 
	var statusDos = [1, 1, 1, 1, 1, 1]; 
	var statusTres = [1, 1, 1, 1, 1, 1]; 
	var statusCuatro = [1, 1, 1, 1, 1, 1]; 
	var statusArreglo = [statusUno, statusDos, statusTres, statusCuatro];
	var statusUser = [usuarioStatus, nivelesStatus, statusArreglo];
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoMenu, statusUser];
	var etiquetas = ['menu_elementos', 'ID_GEN_02_MENUCENTRO_ELEMENTOS', '#ID_GEN_02_MENUCENTRO'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_dark', 'boton_menu_dark', 'boton_menu_dark', 'boton_menu_dark', 'boton_menu_dark', 'boton_menu_dark'];
	var elementosId = ['ID_GEN_02_MENUCENTRO_ELEMENTOS_01', 'ID_GEN_02_MENUCENTRO_ELEMENTOS_02', 'ID_GEN_02_MENUCENTRO_ELEMENTOS_03', 'ID_GEN_02_MENUCENTRO_ELEMENTOS_04', 'ID_GEN_02_MENUCENTRO_ELEMENTOS_05', 'ID_GEN_02_MENUCENTRO_ELEMENTOS_06'];
	var elementosIcono = [1, 1, 1, 1, 1, 1];
	var elementosOrdenIcono = [0, 0, 0, 0, 0, 0];
	var elementosMetodos = [
		
		[['ONCLICK'], ['window.location.replace(`comerciar.php`)']],
		[['ONCLICK'], ['window.location.replace(`puntos.php`)']],
		[['ONCLICK'], ['window.location.replace(`productos.php`)']],
		[['ONCLICK'], ['window.location.replace(`acopio.php`)']],
		[['ONCLICK'], ['window.location.replace(`configuracion.php`)']],
		[['ONCLICK'], ['window.location.replace(`salir.php`)']]
	
	];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos];
	var Menu_central = new Menu(configuraciones, etiquetas, codigos, elementos);
	Menu_central.generahtml_status();
	Menu_central.imprimehtml();







// XXXXXXXXXXXXXXXX









// ****************************************************************
// VIEW: CLASE PARA IMPORTAR FILE HTML DE PANTALLA TRABAJO BASE
// ****************************************************************


	// CLASE........: Load
	// INSTANCIA....: Load_comunidad_trabajo
	// SE INSERTA EN: #ID_GEN_03	
	// DESCRIPCION..: Inserta codigo HTML comunidad_trabajo.html en el area de trabajo
	// IMPRESION....: Despues de ser creado, sustitutivo

	var tipoImpresion = 0;
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_pantalla_trabajo.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var configuraciones = [tipoImpresion, callback];
	var etiquetas = ["../html/comunidad_trabajo.html", "#ID_GEN_03"];
	var Load_comunidad_trabajo = new Load(configuraciones, etiquetas);







// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //

// PUNTO DE INICIO

// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //



////////////
////////////
      //////
      //////
      //////
      //////
      //////
      //////
//////////////////
//////////////////




///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
//////////////////////
//////////////////
//////////////
//////////
//////
//







	Load_comunidad_trabajo.imprimehtml();	


// ****************************************************************
// VIEW: CLASE PARA IMPORTAR FILE HTML DE CRUD (DEFAULT)
// ****************************************************************






	
// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //

// PUNTO DE INICIO

// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //



//////////////////////////////////////////
//////////////////////////////////////////
									//////
									//////
//////////////////////////////////////////
//////////////////////////////////////////
									//////
									//////
//////////////////////////////////////////
//////////////////////////////////////////




///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
//////////////////////
//////////////////
//////////////
//////////
//////
//






	// CLASE........: Load
	// INSTANCIA....: Load_comunidad_crud
	// SE INSERTA EN: #ID_COMUNIDAD_TRABAJO_04	
	// DESCRIPCION..: Inserta codigo HTML comunidad_crud.html en el area de trabajo
	// IMPRESION....: Despues de ser creado, sustitutivo

	var tipoImpresion = 0;
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_pantalla_crud.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var configuraciones = [tipoImpresion, callback];
	var etiquetas = ["../html/comunidad_crud.html", "#ID_COMUNIDAD_TRABAJO_04"];
	var Load_comunidad_crud = new Load(configuraciones, etiquetas);


// ****************************************************************
// VIEW: CLASE PARA IMPORTAR FILE HTML DE REPORTES DE COMUNIDAD
// ****************************************************************


	// CLASE........: Load
	// INSTANCIA....: Load_comunidad_informes
	// SE INSERTA EN: #ID_COMUNIDAD_TRABAJO_04	
	// DESCRIPCION..: Inserta codigo HTML comunidad_informes.html en el area de trabajo
	// IMPRESION....: Espera llamada

	var tipoImpresion = 0;
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_pantalla_informes.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var configuraciones = [tipoImpresion, callback];
	var etiquetas = ["../html/comunidad_informes.html", "#ID_COMUNIDAD_TRABAJO_04"];
	var Load_comunidad_informes = new Load(configuraciones, etiquetas);






	
// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //

// PUNTO DE INICIO

// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //



//////////////////////////////////////////
//////////////////////////////////////////
//////
//////
//////////////////////////////////////////
//////////////////////////////////////////
                                    //////
                                    //////
//////////////////////////////////////////
//////////////////////////////////////////




///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
//////////////////////
//////////////////
//////////////
//////////
//////
//






	// CLASE........: Load
	// INSTANCIA....: Load_comunidad_lista
	// SE INSERTA EN: #ID_COMUNIDAD_CRUD_02	
	// DESCRIPCION..: Inserta codigo HTML comunidad_lista.html en el area de crud
	// IMPRESION....: Epera llamada

	var tipoImpresion = 0;
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_lista.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var configuraciones = [tipoImpresion, callback];
	var etiquetas = ["../html/comunidad_lista.html", "#ID_COMUNIDAD_CRUD_02"];
	var Load_comunidad_lista = new Load(configuraciones, etiquetas);


// ****************************************************************
// VIEW: CLASE PARA IMPORTAR FILE HTML DE CAPTURA REGISTRO
// ****************************************************************


	// CLASE........: Load
	// INSTANCIA....: Load_comunidad_captura
	// SE INSERTA EN: #ID_COMUNIDAD_CRUD_02	
	// DESCRIPCION..: Inserta codigo HTML comunidad_captura.html en el area de trabajo
	// IMPRESION....: Espera llamada 

	var tipoImpresion = 0;
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_pantalla_captura.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var configuraciones = [tipoImpresion, callback];
	var etiquetas = ["../html/comunidad_captura.html", "#ID_COMUNIDAD_CRUD_02"];
	var Load_comunidad_captura = new Load(configuraciones, etiquetas);


	// CLASE........: Menu
	// INSTANCIA....: Menu_comunidad
	// SE INSERTA EN: #ID_COMUNIDAD_TRABAJO_03	
	// DESCRIPCION..: Genera un Menu con elementos listos para trabajar con icono y texto y enlace
	// IMPRESION....: Despues de ser creado, sustitutivo

	var titulosIngles = ['INFORMES', 'ADMINISTRAR'];
	var iconosIngles = ['fa-solid fa-user', 'fa-solid fa-user'];
	var enlacesIngles = ['javascript:void(0)', 'javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['INFORMES', 'ADMINISTRAR'];
	var iconosEspanol = ['fa-solid fa-chart-column', 'fa-solid fa-file-lines'];
	var enlacesEspanol = ['javascript:void(0)', 'javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 2;
	var tipoImpresion = 0;
	var tipoMenu = 0;
	var nivelesStatus = [1, 2, 3, 4];
	var statusUno = [1, 1]; 
	var statusDos = [1, 1]; 
	var statusTres = [1, 1]; 
	var statusCuatro = [1, 1]; 
	var statusArreglo = [statusUno, statusDos, statusTres, statusCuatro];
	var statusUser = [usuarioStatus, nivelesStatus, statusArreglo];
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoMenu, statusUser];
	var etiquetas = ['menu_elementos', 'ID_GEN_03_MENUCOMUNIDAD_ELEMENTOS', '#ID_COMUNIDAD_TRABAJO_03'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro', 'boton_menu_cuadro'];
	var elementosId = ['ID_GEN_03_MENUCOMUNIDAD_ELEMENTOS_01', 'ID_GEN_03_MENUCOMUNIDAD_ELEMENTOS_02'];
	var elementosIcono = [1, 1];
	var elementosOrdenIcono = [0, 0];
	var elementosMetodos = [
		
		[['ONCLICK'], ['Load_comunidad_informes.imprimehtml()']],
		[['ONCLICK'], ['Load_comunidad_crud.imprimehtml()']]
	
	];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos];
	var Menu_comunidad = new Menu(configuraciones, etiquetas, codigos, elementos);
















// ****************************************************************
// VIEW: INSTANCIAS PARA IMPRIMIR EL GRID PRINCIPAL DE COMUNIDAD
// ****************************************************************

	// CLASE........: Texto
	// INSTANCIA....: Texto_titulo_grid
	// ID...........: ID_TITULO_GRID_COMUNIDAD
	// SE INSERTA EN: #ID_COMUNIDAD_TRABAJO_01	
	// DESCRIPCION..: Texto para imprimir el titulo del grid
	// HTML.........: Espera llamada
	// IMPRESION....: Espera llamada 

var controlIdioma = [idioma, []];
var tipoImpresion = 0;
var sentidoImpresion = 0;
var etiqueta = 0;
var configuraciones = [controlIdioma, tipoImpresion, etiqueta];
var etiquetas = ["texto_mutable", "ID_TITULO_GRID_COMUNIDAD", "#ID_TRABAJO_SIS_GRAD_TITULOGRADILLA"];
var codigos = ['', ''];

var clasesEtiqueta = [1, ' etiqueta_groove'];
var metodosEtiqueta = [0, ''];
var valorEtiqueta = [0, ''];
var clasesTexto = [0, ''];
var metodosTexto = [0, ''];
var valorTexto = [2, 0];

var adn = [clasesEtiqueta, metodosEtiqueta, valorEtiqueta, clasesTexto, metodosTexto, valorTexto];
var fuentes = [adn, [Valor_texto_titulo_grid]];
var Texto_titulo_grid = new Texto(configuraciones, etiquetas, codigos, fuentes);

	// CLASE........: Grid
	// INSTANCIA....: Grid_comunidad
	// ID...........: ID_TRABAJO_SIS_GRAD
	// SE INSERTA EN: #ID_COMUNIDAD_TRABAJO_04_03	
	// DESCRIPCION..: Gradilla de comunidad
	// HTML.........: Espera metodo
	// IMPRESION....: Espera metodo, sustituye contenido

		// IDIOMAS
		var inglesElementos = ['ID', 'NOMBRE', 'APELLIDO', 'ALIAS', 'CUENTA USUARIO', 'CREACIÓN'];
		var inglesIdioma = [inglesElementos, ''];
		var espanolElementos = ['ID', 'NOMBRE', 'APELLIDO', 'ALIAS', 'CUENTA USUARIO', 'CREACIÓN'];
		var espanolIdioma = [espanolElementos, ''];
		var arregloIdioma = [inglesIdioma, espanolIdioma];
		var controlIdioma = [idioma, arregloIdioma];
		// GENERALES
		var numeroElementos = 6;
		var tipoImpresion = 0;
		var consulta = Consulta_comunidad;
		var parametros = [0, 5];
		var titulo = [''];
		// BREAKS
		var orientacionBreaks = [0, 50];
		var orientacionFormato = [0, 1];
		var orientacion = [0, orientacionBreaks, orientacionFormato];
		// CONTROLS
		var areacontroles = [1];
		var iconoscontroles = ['fa-solid fa-backward', 'fa-solid fa-backward-step', 'fa-solid fa-forward-step', 'fa-solid fa-forward'];
		var metodoscontroles = [' ONCLICK="Metodos_inicio_posicion.ejecuta()"', ' ONCLICK="Metodos_retrocedegrid.ejecuta()"', ' ONCLICK="Metodos_avanzagrid.ejecuta()"', ' ONCLICK="Metodos_final_posicion.ejecuta()"'];
		var controles = [areacontroles, iconoscontroles, metodoscontroles];
		// VALORES
		var valorActual = [0, 0, 0];
		var valorIncial = [0, 0, 0];
		var metodoValor = 'Grid_comunidad.actualiza_valores';
		var valores = [valorActual, valorIncial, metodoValor];
	
		var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, consulta, parametros, titulo, orientacion, controles, valores];
		
		var etiquetas = ['gradilla', 'ID_TRABAJO_SIS_GRAD', '#ID_COMUNIDAD_LISTA_03'];
		
		var codigos = [''];
		
		var elementos_click = [
			
			[Valor_grid_click],
			[Valor_grid_click],
			[Valor_grid_click],
			[Valor_grid_click],
			[Valor_grid_click],
			[Valor_grid_click]
		
		]; 	
		
		var elementos_click_metodo = [
			
			'Grid_comunidad.actualiza_valor',
			'Grid_comunidad.actualiza_valor',
			'Grid_comunidad.actualiza_valor',
			'Grid_comunidad.actualiza_valor',
			'Grid_comunidad.actualiza_valor',
			'Grid_comunidad.actualiza_valor'
		
		];
		var elementos_tipo_click = [];
		var elementos_llave_valor = [];
		var elementos_ancho_valor = ['cinco', 'veinte', 'treinta', 'quince', 'diez', 'veinte'];
		var elementos_metodos = [
			
			'Metodos_elige_grid.ejecuta()',
			'Metodos_elige_grid.ejecuta()',
			'Metodos_elige_grid.ejecuta()',
			'Metodos_elige_grid.ejecuta()',
			'Metodos_elige_grid.ejecuta()',
			'Metodos_elige_grid.ejecuta()'
		
		];
		var elementos_clases = [
			
			[Valor_grid_clases],
			[Valor_grid_clases],
			[Valor_grid_clases],
			[Valor_grid_clases],
			[Valor_grid_clases],
			[Valor_grid_clases]
		
		];
		var elementos_valores = [
			
			[Valor_grid_id_valor],
			[Valor_grid_nombre_valor],
			[Valor_grid_descripcion_valor],
			[Valor_grid_caja_valor],
			[Valor_grid_estado_valor],
			[Valor_grid_fecha_valor]

		];		
		
		var elementos = [
			
			elementos_click,
			elementos_click_metodo,
			elementos_ancho_valor,
			elementos_metodos,
			elementos_clases,
			elementos_valores
		
		];

		var registrosPagina = [5, 0];
		var adn = [registrosPagina];
		var fuentes = [adn, [Dato_registros_pagina]];

		var Grid_comunidad = new Grid(configuraciones, etiquetas, codigos, elementos, fuentes);





		



// ****************************************************************
// VIEW: INSTANCIAS PARA IMPRIMIR FILTROS DE LA LISTA
// ****************************************************************

	// CLASE........: Radio
	// INSTANCIA....: Radio_orden_lista
	// SE INSERTA EN: #ID_COMUNIDAD_LISTA_02_02_02	
	// DESCRIPCION..: Genera opciones para establecer el orden de la lista de comunidad
	// IMPRESION....: Espera llamada, sustitutivo

	var inglesElementos = ['ID', 'NOMBRE', 'FECHA'];
	var inglesIdioma = ['OPCIONES DE ORDÉN:', inglesElementos];
	var espanolElementos = ['ID', 'NOMBRE', 'FECHA'];
	var espanolIdioma = ['OPCIONES DE ORDÉN:', espanolElementos];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var etiquetaRadio = 0;
	var seleccion = 1;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, etiquetaRadio, seleccion];
	var etiquetas = ['radio_group', 'ID_DATOS_OPTION_01', '#ID_COMUNIDAD_LISTA_02_02_02', 'select_datos_01'];
	var metodos = [''];
	var codigos = [''];

	var elementosSeleccion = [1, 2, 3];
	var elementosMetodos = [
		
		' ONCHANGE="Radio_orden_lista.actualizavalor(0)"',
		' ONCHANGE="Radio_orden_lista.actualizavalor(1)"',
		' ONCHANGE="Radio_orden_lista.actualizavalor(2)"'
	
	];
	
	var elementos = [elementosSeleccion, elementosMetodos];
	
	var fieldsetClass = [0, ''];
	var fieldsetMetodos = [0, ''];
	var legendClass = [0, ''];
	var legendMetodos = [0, ''];
	var legendTexto = [0, ''];
	var valorEtiqueta = [0, ''];
	var clasesTexto = [0, ''];
	var metodosTexto = [0, ''];
	var valorTexto = [2, 0];
	var adn = [clasesEtiqueta, metodosEtiqueta, valorEtiqueta, clasesTexto, metodosTexto, valorTexto];
	var fuentes = [adn, [Dato_orden_lista]];
	var Radio_orden_lista = new Radiopcion(configuraciones, etiquetas, metodos, codigos, fuentes, elementos);

	// CLASE........: Radio
	// INSTANCIA....: Radio_filtro_caja
	// SE INSERTA EN: #ID_COMUNIDAD_LISTA_02_03_02	
	// DESCRIPCION..: Genera opciones para establecer filtro de la lista de comunidad
	// IMPRESION....: Espera llamada, sustitutivo

	var inglesElementos = ['CON CAJA', 'SIN CAJA', 'AMBOS'];
	var inglesIdioma = ['OPCIONES DE FILTRO:', inglesElementos];
	var espanolElementos = ['CON CAJA', 'SIN CAJA', 'TODOS'];
	var espanolIdioma = ['OPCIONES DE FILTRO:', espanolElementos];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var etiquetaRadio = 0;
	var seleccion = 3;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, etiquetaRadio, seleccion];
	var etiquetas = ['radio_group', 'ID_DATOS_OPTION_02', '#ID_COMUNIDAD_LISTA_02_03_02', 'select_datos_02'];
	var metodos = [''];
	var codigos = [''];

	var elementosSeleccion = [1, 2, 3];
	var elementosMetodos = [
		
		' ONCHANGE="Radio_filtro_caja.actualizavalor(0)"',
		' ONCHANGE="Radio_filtro_caja.actualizavalor(1)"',
		' ONCHANGE="Radio_filtro_caja.actualizavalor(2)"'
	
	];
	
	var elementos = [elementosSeleccion, elementosMetodos];
	
	var fieldsetClass = [0, ''];
	var fieldsetMetodos = [0, ''];
	var legendClass = [0, ''];
	var legendMetodos = [0, ''];
	var legendTexto = [0, ''];
	var valorEtiqueta = [0, ''];
	var clasesTexto = [0, ''];
	var metodosTexto = [0, ''];
	var valorTexto = [2, 0];
	var adn = [clasesEtiqueta, metodosEtiqueta, valorEtiqueta, clasesTexto, metodosTexto, valorTexto];
	var fuentes = [adn, [Dato_orden_lista]];
	var Radio_filtro_caja = new Radiopcion(configuraciones, etiquetas, metodos, codigos, fuentes, elementos);

	// CLASE........: Input
	// INSTANCIA....: Input_registros_pagina
	// SE INSERTA EN: #ID_COMUNIDAD_LISTA_02_04_02	
	// DESCRIPCION..: Genera control para introducir numero de registros por página
	// IMPRESION....: Espera llamada, sustitutivo

	var inglesElementos = [''];
	var inglesIdioma = ['OPCIONES DE ORDÉN:', inglesElementos];
	var espanolElementos = [''];
	var espanolIdioma = ['OPCIONES DE ORDÉN:', espanolElementos];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var tipoInput = 'number';
	var anchoInput = 5;
	var etiquetaInput = 0;
	var configuraciones = [controlIdioma, tipoImpresion, tipoInput, anchoInput, etiquetaInput];
	var etiquetas = ['input_numero', 'ID_REGISTROS_PAGINA', '#ID_COMUNIDAD_LISTA_02_04_02', 'num_registros'];
	var codigos = ['', ''];
	var valores = [0, 0, 1];
	var metodos = [' ONCHANGE="Input_registros_pagina.actualizavalor()"'];
	var valorOrigen = [5, 0];
	var adn = [valorOrigen];
	var fuentes = [adn, [Dato_registros_pagina]];
	var Input_registros_pagina = new Input(configuraciones, etiquetas, codigos, valores, metodos, fuentes);

	// CLASE........: Menu
	// INSTANCIA....: Menu_procesa_lista
	// SE INSERTA EN: ##ID_COMUNIDAD_LISTA_02_05	
	// DESCRIPCION..: Genera un Menu con elementos listos para trabajar con icono y texto y enlace
	// IMPRESION....: Espera llamada, sustitutivo

	var titulosIngles = ['REFRESCAR LISTA'];
	var iconosIngles = ['fa-solid fa-gears'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['REFRESCAR LISTA'];
	var iconosEspanol = ['fa-solid fa-rotate'];
	var enlacesEspanol = ['javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 1;
	var tipoImpresion = 0;
	var tipoMenu = 0;
	var nivelesStatus = [1, 2, 3, 4];
	var statusUno = [1]; 
	var statusDos = [1]; 
	var statusTres = [1]; 
	var statusCuatro = [1]; 
	var statusArreglo = [statusUno, statusDos, statusTres, statusCuatro];
	var statusUser = [usuarioStatus, nivelesStatus, statusArreglo];
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoMenu, statusUser];
	var etiquetas = ['menu_elementos', 'ID_BOTON_PROCESA_LISTA', '#ID_COMUNIDAD_LISTA_02_05'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro'];
	var elementosId = ['ID_BOTON_PROCESA_LISTA_ELEMENTOS_01'];
	var elementosIcono = [1];
	var elementosOrdenIcono = [0];
	var elementosMetodos = [
		
		[['ONCLICK'], ['Metodos_procesar_lista.ejecuta()']]
	
	];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos];
	var Menu_procesa_lista = new Menu(configuraciones, etiquetas, codigos, elementos);















// ****************************************************************
// VIEW: INSTANCIAS PARA ELEMENTOS DEL AREA DE STATUS REGISTRO
// ****************************************************************


// CLASE........: Texto
// INSTANCIA....: Texto_status_registro
// ID...........: ID_STATUS_REGISTRO
// SE INSERTA EN: #ID_COMUNIDAD_CRUD_03_01	
// DESCRIPCION..: Texto para imprimir el status del registro
// HTML.........: Espera llamada
// IMPRESION....: Espera llamada 

var controlIdioma = [idioma, []];
var tipoImpresion = 0;
var sentidoImpresion = 0;
var etiqueta = 0;
var configuraciones = [controlIdioma, tipoImpresion, etiqueta];
var etiquetas = ["texto_mutable", "ID_STATUS_REGISTRO", "#ID_COMUNIDAD_CRUD_03_01"];
var codigos = ['', ''];

var clasesEtiqueta = [1, ' etiqueta_groove'];
var metodosEtiqueta = [0, ''];
var valorEtiqueta = [0, ''];
var clasesTexto = [0, ''];
var metodosTexto = [0, ''];
var valorTexto = [2, 0];

var adn = [clasesEtiqueta, metodosEtiqueta, valorEtiqueta, clasesTexto, metodosTexto, valorTexto];
var fuentes = [adn, [Valor_texto_status]];
var Texto_status_registro = new Texto(configuraciones, etiquetas, codigos, fuentes);

// CLASE........: Texto
// INSTANCIA....: Texto_id_registro
// ID...........: ID_TEXTO_ID_REGISTRO
// SE INSERTA EN: #ID_COMUNIDAD_CRUD_03_02	
// DESCRIPCION..: Texto para imprimir el status del registro
// HTML.........: Espera llamada
// IMPRESION....: Espera llamada 

var controlIdioma = [idioma, []];
var tipoImpresion = 0;
var sentidoImpresion = 0;
var etiqueta = 0;
var configuraciones = [controlIdioma, tipoImpresion, etiqueta];
var etiquetas = ["texto_mutable", "ID_TEXTO_ID_REGISTRO", "#ID_COMUNIDAD_CRUD_03_02"];
var codigos = ['', ''];

var clasesEtiqueta = [1, ' etiqueta_groove'];
var metodosEtiqueta = [0, ''];
var valorEtiqueta = [0, ''];
var clasesTexto = [0, ''];
var metodosTexto = [0, ''];
var valorTexto = [2, 0];

var adn = [clasesEtiqueta, metodosEtiqueta, valorEtiqueta, clasesTexto, metodosTexto, valorTexto];
var fuentes = [adn, [Valor_texto_id]];
var Texto_id_registro = new Texto(configuraciones, etiquetas, codigos, fuentes);

// CLASE........: Texto
// INSTANCIA....: Texto_nombre_registro
// ID...........: ID_TEXTO_NOMBRE_REGISTRO
// SE INSERTA EN: #ID_COMUNIDAD_TRABAJO_04_04_03	
// DESCRIPCION..: Texto para imprimir el status del registro
// HTML.........: Espera llamada
// IMPRESION....: Espera llamada 

var controlIdioma = [idioma, []];
var tipoImpresion = 0;
var sentidoImpresion = 0;
var etiqueta = 0;
var configuraciones = [controlIdioma, tipoImpresion, etiqueta];
var etiquetas = ["texto_mutable", "ID_TEXTO_NOMBRE_REGISTRO", "#ID_COMUNIDAD_TRABAJO_04_04_03"];
var codigos = ['', ''];

var clasesEtiqueta = [1, ' etiqueta_groove'];
var metodosEtiqueta = [0, ''];
var valorEtiqueta = [0, ''];
var clasesTexto = [0, ''];
var metodosTexto = [0, ''];
var valorTexto = [5, 0];

var adn = [clasesEtiqueta, metodosEtiqueta, valorEtiqueta, clasesTexto, metodosTexto, valorTexto];
var fuentes = [adn, [Dato_id_registro]];
var Texto_nombre_registro = new Texto(configuraciones, etiquetas, codigos, fuentes);

// CLASE........: Texto
// INSTANCIA....: Texto_descripcion_registro
// ID...........: ID_TEXTO_DESCRIPCION_REGISTRO
// SE INSERTA EN: #ID_COMUNIDAD_CRUD_03_03	
// DESCRIPCION..: Texto para imprimir el descripción del registro
// HTML.........: Espera llamada
// IMPRESION....: Espera llamada 

var controlIdioma = [idioma, []];
var tipoImpresion = 0;
var sentidoImpresion = 0;
var etiqueta = 0;
var configuraciones = [controlIdioma, tipoImpresion, etiqueta];
var etiquetas = ["texto_mutable", "ID_TEXTO_DESCRIPCION_REGISTRO", "#ID_COMUNIDAD_CRUD_03_03"];
var codigos = ['', ''];

var clasesEtiqueta = [1, ' etiqueta_groove'];
var metodosEtiqueta = [0, ''];
var valorEtiqueta = [0, ''];
var clasesTexto = [0, ''];
var metodosTexto = [0, ''];
var valorTexto = [2, 0];

var adn = [clasesEtiqueta, metodosEtiqueta, valorEtiqueta, clasesTexto, metodosTexto, valorTexto];
var fuentes = [adn, [Valor_texto_descripcion]];
var Texto_descripcion_registro = new Texto(configuraciones, etiquetas, codigos, fuentes);

	// CLASE........: Menu
	// INSTANCIA....: Menu_limpia_seleccion
	// SE INSERTA EN: #ID_COMUNIDAD_CRUD_03_04	
	// DESCRIPCION..: Genera un Menu con elementos listos para trabajar con icono y texto y enlace
	// IMPRESION....: Espera llamada, sustitutivo

	var titulosIngles = ['LIMPIA SELECCIÓN'];
	var iconosIngles = ['fa-solid fa-gears'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['LIMPIA SELECCIÓN'];
	var iconosEspanol = ['fa-solid fa-broom'];
	var enlacesEspanol = ['javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 1;
	var tipoImpresion = 0;
	var tipoMenu = 0;
	var nivelesStatus = [1, 2, 3, 4];
	var statusUno = [1]; 
	var statusDos = [1]; 
	var statusTres = [1]; 
	var statusCuatro = [1]; 
	var statusArreglo = [statusUno, statusDos, statusTres, statusCuatro];
	var statusUser = [usuarioStatus, nivelesStatus, statusArreglo];
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoMenu, statusUser];
	var etiquetas = ['menu_elementos', 'ID_BOTON_LIMPIA_SELECCION', '#ID_COMUNIDAD_CRUD_03_04'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro'];
	var elementosId = ['ID_BOTON_LIMPIA_SELECCION_ELEMENTOS_01'];
	var elementosIcono = [1];
	var elementosOrdenIcono = [0];
	var elementosMetodos = [
		
		[['ONCLICK'], ['Metodos_limpia_seleccion.ejecuta()']]
	
	];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos];
	var Menu_limpia_seleccion = new Menu(configuraciones, etiquetas, codigos, elementos);


// ****************************************************************
// VIEW: INSTANCIAS PARA ELEMENTOS DEL AREA DE MODALIDAD REGISTRO
// ****************************************************************


// CLASE........: Texto
// INSTANCIA....: Texto_modalidad_captura
// ID...........: ID_MODALIDAD
// SE INSERTA EN: #ID_COMUNIDAD_CRUD_03_03	
// DESCRIPCION..: Texto para imprimir el status de la modalidad
// HTML.........: Espera llamada
// IMPRESION....: Espera llamada 

var controlIdioma = [idioma, []];
var tipoImpresion = 0;
var sentidoImpresion = 0;
var etiqueta = 0;
var configuraciones = [controlIdioma, tipoImpresion, etiqueta];
var etiquetas = ["texto_mutable", "ID_MODALIDAD", "#ID_COMUNIDAD_CRUD_03_03"];
var codigos = ['', ''];

var clasesEtiqueta = [1, ' etiqueta_groove'];
var metodosEtiqueta = [0, ''];
var valorEtiqueta = [0, ''];
var clasesTexto = [0, ''];
var metodosTexto = [0, ''];
var valorTexto = [2, 0];

var adn = [clasesEtiqueta, metodosEtiqueta, valorEtiqueta, clasesTexto, metodosTexto, valorTexto];
var fuentes = [adn, [Valor_texto_modalidad_captura]];
var Texto_modalidad_captura = new Texto(configuraciones, etiquetas, codigos, fuentes);


// ****************************************************************
// VIEW: INSTANCIAS PARA ELEMENTOS DEL MENU CONTROLES
// ****************************************************************


// CLASE........: Menu
// INSTANCIA....: Menu_controles
// ID...........: ID_MENU_CONTROLES
// SE INSERTA EN: #ID_COMUNIDAD_CRUD_04_01	
// DESCRIPCION..: Menu de elementos para navegar los controles
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Espera llamada

	var titulosIngles = ['CREAR NUEVO PUNTO', 'GRABAR PUNTO', 'ACTUALIZAR PUNTO', 'CONSULTAR PUNTO', 'LISTAR COMUNIDAD', 'BORRAR PUNTO', 'KRONOS'];
	var iconosIngles = ['fa-solid fa-user', 'fa-solid fa-user', 'fa-solid fa-user', 'fa-solid fa-user', 'fa-solid fa-user', 'fa-solid fa-user', 'fa-solid fa-user'];
	var enlacesIngles = ['javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['CREAR NUEVO PUNTO', 'GRABAR PUNTO', 'ACTUALIZAR PUNTO', 'CONSULTAR PUNTO', 'LISTAR COMUNIDAD', 'BORRAR PUNTO', 'KRONOS'];
	var iconosEspanol = ['fa-solid fa-file-circle-plus', 'fa-solid fa-file-arrow-up', 'fa-solid fa-file-pen', 'fa-solid fa-file-circle-question', 'fa-solid fa-table-list', 'fa-solid fa-file-circle-minus', 'fa-solid fa-user-clock'];
	var enlacesEspanol = ['javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 7;
	var tipoImpresion = 0;
	var tipoMenu = 0;
	var nivelesStatus = [1, 2, 3, 4];
	var statusUno = [1, 1, 1, 1, 1, 1, 1]; 
	var statusDos = [1, 1, 1, 1, 1, 1, 1]; 
	var statusTres = [1, 1, 1, 1, 1, 1, 1]; 
	var statusCuatro = [1, 1, 1, 1, 1, 1, 1]; 
	var statusArreglo = [statusUno, statusDos, statusTres, statusCuatro];
	var statusUser = [usuarioStatus, nivelesStatus, statusArreglo];
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoMenu, statusUser];
	var etiquetas = ['menu_elementos', 'ID_MENU_CONTROLES', '#ID_COMUNIDAD_CRUD_04_01'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro', 'boton_menu_cuadro', 'boton_menu_cuadro', 'boton_menu_cuadro', 'boton_menu_cuadro', 'boton_menu_cuadro', 'boton_menu_cuadro'];
	var elementosId = ['ID_MENU_CONTROLES_01', 'ID_MENU_CONTROLES_02', 'ID_MENU_CONTROLES_03', 'ID_MENU_CONTROLES_04', 'ID_MENU_CONTROLES_05', 'ID_MENU_CONTROLES_06', 'ID_MENU_CONTROLES_07'];
	var elementosIcono = [1, 1, 1, 1, 1, 1, 1];
	var elementosOrdenIcono = [0, 0, 0, 0, 0, 0, 0];
	var elementosMetodos = [
		
		[['ONCLICK'], ['Metodos_capturar_punto.ejecuta()']],
		[['ONCLICK'], ['window.location.replace(`comerciar.php`)']],
		[['ONCLICK'], ['window.location.replace(`comerciar.php`)']],
		[['ONCLICK'], ['window.location.replace(`comerciar.php`)']],
		[['ONCLICK'], ['window.location.replace(`comerciar.php`)']],
		[['ONCLICK'], ['window.location.replace(`comunidad.php`)']],
		[['ONCLICK'], ['Consulta_kronos.ejecuta_2()']]
	
	];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos];
	var Menu_controles = new Menu(configuraciones, etiquetas, codigos, elementos);






















// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE TRES: PROCESOS Y PUENTES CLASES VIEW MODEL

// ****************************************************************
// ****************************************************************
// ****************************************************************




































// ****************************************************************
// VIEWMODEL: METODOS DE PANTALLA
// ****************************************************************


	// CLASE........: Pantalla
	// INSTANCIA....: Pantalla_comerciosolidario_gen
	// DESCRIPCION..: Clase para manejar metodos generales de pantalla
	
	var objetos_pantalla = [];
	var dimensiones = [];
	var configuraciones = [dimensiones];
	var Pantalla_comerciosolidario_gen = new Pantalla(idioma, 4, "comunidad.php", "COMERCIO SOLIDARIO COMUNIDAD", "", "", objetos_pantalla, "", Sistema_comerciosolidario, "../index.php", configuraciones);

	// CLASE........: Screenx
	// INSTANCIA....: Screen_comunidad
	// DESCRIPCION..: Clase para manejar objetos del DOM
	
	var configuraciones = [];
	var Screen_comunidad = new Screenx(configuraciones);














// ****************************************************************
// VIEWMODEL: METODOS DE DATOS
// ****************************************************************


	// CLASE........: Metodos
	// INSTANCIA....: Metodos_inicializa_datos
	// DESCRIPCION..: Metodos que se ejecutan para inicializar todos los datos
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [

		'Dato_orden_lista.inicializa_dato()',
		'Dato_filtro_usuario_lista.inicializa_dato()',
		'Dato_registros_pagina.inicializa_dato()',
		'Dato_status_registro.inicializa_dato()',
		'Dato_modalidad_captura.inicializa_dato()',
		'Dato_id_registro.inicializa_dato()',
		'Dato_nombre_registro.inicializa_dato()',
		'Dato_descripcion_registro.inicializa_dato()',
		'Dato_descripcion_registro.inicializa_dato()',
		'Dato_statuscaja_registro.inicializa_dato()',
		'Dato_usuariocaja_registro.inicializa_dato()',
		'Dato_fecha_registro.inicializa_dato()',
		'Dato_creador_registro.inicializa_dato()',
		'Dato_almacen_registro.inicializa_dato()',
		'Dato_caja_registro.inicializa_dato()',
		'Dato_actualizacion_registro.inicializa_dato()'
		
		];

		var Metodos_inicializa_datos = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_baja_datos_regitro_grid
	// DESCRIPCION..: Metodos que se ejecutan para bajar datos de la consulta desde grid
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
			'Valor_baja_nombre.recibe_registro(Number(Grid_comunidad.configuraciones[8][0][0]), Number(Grid_comunidad.configuraciones[8][0][1]))',
			'Valor_baja_descripcion.recibe_registro(Number(Grid_comunidad.configuraciones[8][0][0]), Number(Grid_comunidad.configuraciones[8][0][1]))',
			'Valor_baja_statuscaja.recibe_registro(Number(Grid_comunidad.configuraciones[8][0][0]), Number(Grid_comunidad.configuraciones[8][0][1]))',
			'Valor_baja_usuariocaja.recibe_registro(Number(Grid_comunidad.configuraciones[8][0][0]), Number(Grid_comunidad.configuraciones[8][0][1]))',
			'Valor_baja_fecha.recibe_registro(Number(Grid_comunidad.configuraciones[8][0][0]), Number(Grid_comunidad.configuraciones[8][0][1]))',
			'Valor_baja_creador.recibe_registro(Number(Grid_comunidad.configuraciones[8][0][0]), Number(Grid_comunidad.configuraciones[8][0][1]))',
			'Valor_baja_almacen.recibe_registro(Number(Grid_comunidad.configuraciones[8][0][0]), Number(Grid_comunidad.configuraciones[8][0][1]))',
			'Valor_baja_caja.recibe_registro(Number(Grid_comunidad.configuraciones[8][0][0]), Number(Grid_comunidad.configuraciones[8][0][1]))',
			'Valor_baja_actualizacion.recibe_registro(Number(Grid_comunidad.configuraciones[8][0][0]), Number(Grid_comunidad.configuraciones[8][0][1]))',
			
			'Dato_nombre_registro.actualiza_dato(Valor_baja_nombre.concatena_valor())',
			'Dato_descripcion_registro.actualiza_dato(Valor_baja_descripcion.concatena_valor())',
			'Dato_statuscaja_registro.actualiza_dato(Valor_baja_statuscaja.concatena_valor())',
			'Dato_usuariocaja_registro.actualiza_dato(Valor_baja_usuariocaja.concatena_valor())',
			'Dato_fecha_registro.actualiza_dato(Valor_baja_fecha.concatena_valor())',
			'Dato_creador_registro.actualiza_dato(Valor_baja_creador.concatena_valor())',
			'Dato_almacen_registro.actualiza_dato(Valor_baja_almacen.concatena_valor())',
			'Dato_caja_registro.actualiza_dato(Valor_baja_caja.concatena_valor())',
			'Dato_actualizacion_registro.actualiza_dato(Valor_baja_actualizacion.concatena_valor())'
		
		];

		var Metodos_baja_datos_regitro_grid = new Metodos(configuraciones, codigos, elementos);













// ****************************************************************
// VIEWMODEL: METODOS AFTER CONSULTAS
// ****************************************************************






	
// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //

// PUNTO DE INICIO

// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //



//////////////////////////////////////////
//////////////////////////////////////////
//////                              //////
//////                              //////
//////////////////////////////////////////
//////////////////////////////////////////
                                    //////
                                    //////
                                    //////
                                    //////




///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
//////////////////////
//////////////////
//////////////
//////////
//////
//






	// CLASE........: Metodos
	// INSTANCIA....: Metodos_after_consulta_comunidad
	// DESCRIPCION..: Metodos que se ejecutan despues de actualizar y filtrar gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
			'Modal_comunidad.cierra()',
			'Grid_comunidad.generahtml()',
			'Grid_comunidad.imprimehtml()',

			'Metodos_imprime_area_status_registro.ejecuta()',

			'Metodos_menu_controles_inicializa.ejecuta()',
			'Metodos_menu_controles.ejecuta()',

			'Texto_titulo_grid.generahtml()',
			'Texto_titulo_grid.imprimehtml()'
		
		];

		var Metodos_after_consulta_comunidad = new Metodos(configuraciones, codigos, elementos);












		
// ****************************************************************
// VIEWMODEL: METODOS AFTER PANTALLAS
// ****************************************************************






	
// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //

// PUNTO DE INICIO

// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //



//////////////////////////////////////////
//////////////////////////////////////////
									//////
									//////
//////////////////////////////////////////
//////////////////////////////////////////
//////
//////
//////////////////////////////////////////
//////////////////////////////////////////




///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
//////////////////////
//////////////////
//////////////
//////////
//////
//






	// CLASE........: Metodos
	// INSTANCIA....: Metodos_after_pantalla_trabajo
	// DESCRIPCION..: Metodos que se ejecutan despues de imprimir pantalla de trabajo
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Metodos_menu_comunidad_inicializa.ejecuta()',
		'Menu_comunidad.generahtml_status()',
		'Menu_comunidad.imprimehtml()',
		'Load_comunidad_crud.imprimehtml()'
	];
	var Metodos_after_pantalla_trabajo = new Metodos(configuraciones, codigos, elementos);





	
// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //

// PUNTO DE INICIO

// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //



//////                              //////
//////                              //////
//////                              //////
//////                              //////
//////////////////////////////////////////
//////////////////////////////////////////
									//////
									//////
									//////
									//////




///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
//////////////////////
//////////////////
//////////////
//////////
//////
//







	// CLASE........: Metodos
	// INSTANCIA....: Metodos_after_pantalla_crud
	// DESCRIPCION..: Metodos que se ejecutan despues de imprimir pantalla de crud
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Metodos_inicializa_datos.ejecuta()',
		'Metodos_menu_comunidad_inicializa.ejecuta()',
		'Menu_comunidad.generahtml_status()',
		'Menu_comunidad.imprimehtml()',

		'Metodos_menu_limpia_inicializa.ejecuta()',		
		'Menu_limpia_seleccion.generahtml_status()',

		'Load_comunidad_lista.imprimehtml()',
		'Metodos_screen_vacio.ejecuta()'

	];
	var Metodos_after_pantalla_crud = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_after_pantalla_informes
	// DESCRIPCION..: Metodos que se ejecutan despues de imprimir pantalla de informes
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Metodos_inicializa_datos.ejecuta()',
		'Metodos_menu_comunidad_informes.ejecuta()',
		'Menu_comunidad.generahtml_status()',
		'Menu_comunidad.imprimehtml()'

	];
	var Metodos_after_pantalla_informes = new Metodos(configuraciones, codigos, elementos);






	
// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //

// PUNTO DE INICIO

// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //



//////////////////////////////////////////
//////////////////////////////////////////
//////
//////
//////////////////////////////////////////
//////////////////////////////////////////
//////                              //////
//////                              //////
//////////////////////////////////////////
//////////////////////////////////////////




///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
//////////////////////
//////////////////
//////////////
//////////
//////
//







	// CLASE........: Metodos
	// INSTANCIA....: Metodos_after_lista
	// DESCRIPCION..: Metodos que se ejecutan despues de imprimir pantalla lista
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Metodos_imprime_area_filtro_grid.ejecuta()',
		'Metodos_comunidad_grid.ejecuta()'


	];
	var Metodos_after_lista = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_after_pantalla_captura
	// DESCRIPCION..: Metodos que se ejecutan despues de imprimir pantalla captura registro 
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Metodos_inicializa_datos.ejecuta()',
		'Dato_modalidad_captura.actualiza_dato(1)',
		'Metodos_imprime_area_modalidad_registro.ejecuta()',
		'Metodos_screen_captura.ejecuta()',
		'Metodos_menu_controles_captura.ejecuta()',
		'Menu_controles.generahtml_status()',
		'Menu_controles.imprimehtml()'		


	/*
		'Menu_comunidad.generahtml_status()',
		'Menu_comunidad.imprimehtml()',
		'Metodos_imprime_area_filtro_grid.ejecuta()',
		'Metodos_imprime_area_status_registro.ejecuta()',
		'Metodos_comunidad_grid.ejecuta()',
		'Metodos_menu_controles_inicializa.ejecuta()',		
		'Metodos_menu_controles.ejecuta()'
*/

	];
	var Metodos_after_pantalla_captura = new Metodos(configuraciones, codigos, elementos);










	



// ****************************************************************
// VIEWMODEL: METODOS DE MENU
// ****************************************************************


	// CLASE........: Metodos
	// INSTANCIA....: Metodos_menu_comunidad_inicializa
	// DESCRIPCION..: Metodos para inicializar el menu de comunidad
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Menu_comunidad.recibe_status(0, 0, 1)',
		'Menu_comunidad.recibe_status(1, 0, 1)',		
		'Menu_comunidad.recibe_status(2, 0, 1)',
		'Menu_comunidad.recibe_status(3, 0, 1)',
		
		'Menu_comunidad.recibe_status(0, 1, 0)',
		'Menu_comunidad.recibe_status(1, 1, 0)',		
		'Menu_comunidad.recibe_status(2, 1, 0)',
		'Menu_comunidad.recibe_status(3, 1, 0)'

	];
	
	var Metodos_menu_comunidad_inicializa = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_menu_comunidad_informes
	// DESCRIPCION..: Metodos para establecer el menu de comunidad para pantalla informes
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Menu_comunidad.recibe_status(0, 0, 0)',
		'Menu_comunidad.recibe_status(1, 0, 0)',		
		'Menu_comunidad.recibe_status(2, 0, 0)',
		'Menu_comunidad.recibe_status(3, 0, 0)',
		
		'Menu_comunidad.recibe_status(0, 1, 1)',
		'Menu_comunidad.recibe_status(1, 1, 1)',		
		'Menu_comunidad.recibe_status(2, 1, 1)',
		'Menu_comunidad.recibe_status(3, 1, 1)'

	];
	
	var Metodos_menu_comunidad_informes = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_menu_limpia_inicializa
	// DESCRIPCION..: Metodos para establecer lo staus iciciales del meni limpia
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Menu_limpia_seleccion.recibe_status(0, 0, 0)',
		'Menu_limpia_seleccion.recibe_status(1, 0, 0)',		
		'Menu_limpia_seleccion.recibe_status(2, 0, 0)',
		'Menu_limpia_seleccion.recibe_status(3, 0, 0)'


	];
	
	var Metodos_menu_limpia_inicializa = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_menu_controles_inicializa
	// DESCRIPCION..: Metodos para inicializar los status del menu de controles
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Menu_controles.recibe_status(0, 0, 1)',
		'Menu_controles.recibe_status(1, 0, 1)',		
		'Menu_controles.recibe_status(2, 0, 1)',
		'Menu_controles.recibe_status(3, 0, 1)',
		
		'Menu_controles.recibe_status(0, 1, 0)',
		'Menu_controles.recibe_status(1, 1, 0)',		
		'Menu_controles.recibe_status(2, 1, 0)',
		'Menu_controles.recibe_status(3, 1, 0)',
		
		'Menu_controles.recibe_status(0, 2, 0)',
		'Menu_controles.recibe_status(1, 2, 0)',		
		'Menu_controles.recibe_status(2, 2, 0)',
		'Menu_controles.recibe_status(3, 2, 0)',
		
		'Menu_controles.recibe_status(0, 3, 0)',
		'Menu_controles.recibe_status(1, 3, 0)',		
		'Menu_controles.recibe_status(2, 3, 0)',
		'Menu_controles.recibe_status(3, 3, 0)',
		
		'Menu_controles.recibe_status(0, 4, 0)',
		'Menu_controles.recibe_status(1, 4, 0)',		
		'Menu_controles.recibe_status(2, 4, 0)',
		'Menu_controles.recibe_status(3, 4, 0)',
		
		'Menu_controles.recibe_status(0, 5, 0)',
		'Menu_controles.recibe_status(1, 5, 0)',		
		'Menu_controles.recibe_status(2, 5, 0)',
		'Menu_controles.recibe_status(3, 5, 0)',

		'Menu_controles.recibe_status(0, 6, 1)',
		'Menu_controles.recibe_status(1, 6, 0)',		
		'Menu_controles.recibe_status(2, 6, 0)',
		'Menu_controles.recibe_status(3, 6, 0)'


	];
	
	var Metodos_menu_controles_inicializa = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_menu_controles_seleccionado
	// DESCRIPCION..: Metodos para establecer status del menu de controles registro seleccionado
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Menu_controles.recibe_status(0, 0, 1)',
		'Menu_controles.recibe_status(1, 0, 1)',		
		'Menu_controles.recibe_status(2, 0, 1)',
		'Menu_controles.recibe_status(3, 0, 1)',
		
		'Menu_controles.recibe_status(0, 1, 0)',
		'Menu_controles.recibe_status(1, 1, 0)',		
		'Menu_controles.recibe_status(2, 1, 0)',
		'Menu_controles.recibe_status(3, 1, 0)',
		
		'Menu_controles.recibe_status(0, 2, 1)',
		'Menu_controles.recibe_status(1, 2, 1)',		
		'Menu_controles.recibe_status(2, 2, 1)',
		'Menu_controles.recibe_status(3, 2, 1)',
		
		'Menu_controles.recibe_status(0, 3, 1)',
		'Menu_controles.recibe_status(1, 3, 1)',		
		'Menu_controles.recibe_status(2, 3, 1)',
		'Menu_controles.recibe_status(3, 3, 1)',
		
		'Menu_controles.recibe_status(0, 4, 0)',
		'Menu_controles.recibe_status(1, 4, 0)',		
		'Menu_controles.recibe_status(2, 4, 0)',
		'Menu_controles.recibe_status(3, 4, 0)',
		
		'Menu_controles.recibe_status(0, 5, 0)',
		'Menu_controles.recibe_status(1, 5, 0)',		
		'Menu_controles.recibe_status(2, 5, 0)',
		'Menu_controles.recibe_status(3, 5, 0)',

		'Menu_controles.recibe_status(0, 6, 1)',
		'Menu_controles.recibe_status(1, 6, 0)',		
		'Menu_controles.recibe_status(2, 6, 0)',
		'Menu_controles.recibe_status(3, 6, 0)'


	];
	
	var Metodos_menu_controles_seleccionado = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_menu_controles_captura
	// DESCRIPCION..: Metodos para establecer status del menu de controles captura
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

/*
	'CREAR NUEVO PUNTO 1'
	'GRABAR PUNTO 1'
	'ACTUALIZAR PUNTO 0'
	'CONSULTAR PUNTO 0'
	'LISTAR COMUNIDAD 1'
	'BORRAR PUNTO 0'
*/


		'Menu_controles.recibe_status(0, 0, 0)',
		'Menu_controles.recibe_status(1, 0, 0)',		
		'Menu_controles.recibe_status(2, 0, 0)',
		'Menu_controles.recibe_status(3, 0, 0)',
		
		'Menu_controles.recibe_status(0, 1, 1)',
		'Menu_controles.recibe_status(1, 1, 1)',		
		'Menu_controles.recibe_status(2, 1, 1)',
		'Menu_controles.recibe_status(3, 1, 1)',
		
		'Menu_controles.recibe_status(0, 2, 0)',
		'Menu_controles.recibe_status(1, 2, 0)',		
		'Menu_controles.recibe_status(2, 2, 0)',
		'Menu_controles.recibe_status(3, 2, 0)',
		
		'Menu_controles.recibe_status(0, 3, 0)',
		'Menu_controles.recibe_status(1, 3, 0)',		
		'Menu_controles.recibe_status(2, 3, 0)',
		'Menu_controles.recibe_status(3, 3, 0)',
		
		'Menu_controles.recibe_status(0, 4, 1)',
		'Menu_controles.recibe_status(1, 4, 1)',		
		'Menu_controles.recibe_status(2, 4, 1)',
		'Menu_controles.recibe_status(3, 4, 1)',
		
		'Menu_controles.recibe_status(0, 5, 0)',
		'Menu_controles.recibe_status(1, 5, 0)',		
		'Menu_controles.recibe_status(2, 5, 0)',
		'Menu_controles.recibe_status(3, 5, 0)',

		'Menu_controles.recibe_status(0, 6, 1)',
		'Menu_controles.recibe_status(1, 6, 0)',		
		'Menu_controles.recibe_status(2, 6, 0)',
		'Menu_controles.recibe_status(3, 6, 0)'

	];
	
	var Metodos_menu_controles_captura = new Metodos(configuraciones, codigos, elementos);


	






	// CLASE........: Metodos
	// INSTANCIA....: Metodos_menu_controles
	// DESCRIPCION..: Metodos para imprimir menu de controles
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Menu_controles.generahtml_status()',
		'Menu_controles.imprimehtml()'

	];
	var Metodos_menu_controles = new Metodos(configuraciones, codigos, elementos);












	

// ****************************************************************
// VIEWMODEL: METODOS DE SCREEN
// ****************************************************************


	// CLASE........: Metodos
	// INSTANCIA....: Metodos_screen_vacio
	// DESCRIPCION..: Metodos para imprimir menu de controles
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_01`, `area_status_registro_seleccionado`)',
		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_01`, `area_status_registro_captura`)',
		'Screen_comunidad.agrega_clase(`ID_COMUNIDAD_CRUD_03_01`, `area_status_registro_vacio`)',
		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_02`, `area_status_registro_seleccionado`)',
		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_02`, `area_status_registro_captura`)',
		'Screen_comunidad.agrega_clase(`ID_COMUNIDAD_CRUD_03_02`, `area_status_registro_vacio`)',
		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_03`, `area_status_registro_seleccionado`)',
		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_03`, `area_status_registro_captura`)',
		'Screen_comunidad.agrega_clase(`ID_COMUNIDAD_CRUD_03_03`, `area_status_registro_vacio`)',
	
	];
	var Metodos_screen_vacio = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_screen_seleccionado
	// DESCRIPCION..: Metodos para imprimir menu de controles
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_01`, `area_status_registro_vacio`)',
		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_01`, `area_status_registro_captura`)',
		'Screen_comunidad.agrega_clase(`ID_COMUNIDAD_CRUD_03_01`, `area_status_registro_seleccionado`)',
		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_02`, `area_status_registro_vacio`)',
		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_02`, `area_status_registro_captura`)',
		'Screen_comunidad.agrega_clase(`ID_COMUNIDAD_CRUD_03_02`, `area_status_registro_seleccionado`)',
		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_03`, `area_status_registro_vacio`)',
		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_03`, `area_status_registro_captura`)',
		'Screen_comunidad.agrega_clase(`ID_COMUNIDAD_CRUD_03_03`, `area_status_registro_seleccionado`)',
	
	];
	var Metodos_screen_seleccionado = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_screen_captura
	// DESCRIPCION..: Metodos para imprimir menu de controles
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_01`, `area_status_registro_vacio`)',
		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_01`, `area_status_registro_seleccionado`)',
		'Screen_comunidad.agrega_clase(`ID_COMUNIDAD_CRUD_03_01`, `area_status_registro_captura`)',
		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_02`, `area_status_registro_vacio`)',
		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_02`, `area_status_registro_seleccionado`)',
		'Screen_comunidad.agrega_clase(`ID_COMUNIDAD_CRUD_03_02`, `area_status_registro_captura`)',
		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_03`, `area_status_registro_vacio`)',
		'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_03`, `area_status_registro_seleccionado`)',
		'Screen_comunidad.agrega_clase(`ID_COMUNIDAD_CRUD_03_03`, `area_status_registro_captura`)',
	
	];
	var Metodos_screen_captura = new Metodos(configuraciones, codigos, elementos);














// ****************************************************************
// VIEWMODEL: METODOS IMPRIME AREAS
// ****************************************************************


	// CLASE........: Metodos
	// INSTANCIA....: Metodos_imprime_area_filtro_grid
	// DESCRIPCION..: Metodos que se ejecutan
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
			
		'Radio_orden_lista.generahtml()',
		'Radio_orden_lista.imprimehtml()',
		'Radio_filtro_caja.generahtml()',
		'Radio_filtro_caja.imprimehtml()',
		'Input_registros_pagina.generahtml()',
		'Input_registros_pagina.imprimehtml()',
		'Menu_procesa_lista.generahtml_status()',
		'Menu_procesa_lista.imprimehtml()'

	];
	var Metodos_imprime_area_filtro_grid = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_imprime_area_status_registro
	// DESCRIPCION..: Metodos que se ejecutan...
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
			
		'Texto_status_registro.generahtml()',
		'Texto_status_registro.imprimehtml()',
		'Texto_id_registro.generahtml()',
		'Texto_id_registro.imprimehtml()',
		'Texto_nombre_registro.generahtml()',
		'Texto_nombre_registro.imprimehtml()',
		'Texto_descripcion_registro.generahtml()',
		'Texto_descripcion_registro.imprimehtml()',
		'Menu_limpia_seleccion.generahtml_status()',
		'Menu_limpia_seleccion.imprimehtml()'


	];
	var Metodos_imprime_area_status_registro = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_imprime_area_modalidad_registro
	// DESCRIPCION..: Metodos que se ejecutan...
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
			
		'Texto_status_registro.generahtml()',
		'Texto_status_registro.imprimehtml()',
		
		'Texto_id_registro.generahtml()',
		'Texto_id_registro.imprimehtml()',
		
		'Texto_nombre_registro.generahtml()',
		'Texto_nombre_registro.imprimehtml()',
		
		'Texto_modalidad_captura.generahtml()',
		'Texto_modalidad_captura.imprimehtml()',
		
		'Menu_limpia_seleccion.generahtml_status()',
		'Menu_limpia_seleccion.imprimehtml()'


	];
	var Metodos_imprime_area_modalidad_registro = new Metodos(configuraciones, codigos, elementos);















// ****************************************************************
// VIEWMODEL: METODOS DE BOTONES
// ****************************************************************


	// CLASE........: Metodos
	// INSTANCIA....: Metodos_procesar_lista
	// DESCRIPCION..: Metodos que se ejecutan despues de imprimir pantalla lista
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		'Modal_comunidad.abrefijo()',	
		'Dato_orden_lista.actualiza_dato(Radio_orden_lista.configuraciones[4])',
		'Dato_filtro_usuario_lista.actualiza_dato(Radio_filtro_caja.configuraciones[4])',
		'Dato_registros_pagina.actualiza_dato(Input_registros_pagina.valores[0])',
		'Consulta_comunidad.actualizafiltro(0, Dato_orden_lista.datos[0])',
		'Consulta_comunidad.actualizafiltro(1, Dato_filtro_usuario_lista.datos[0])',
		'Grid_comunidad.registros_pagina(Dato_registros_pagina.datos[0])',
		'Consulta_comunidad.ejecuta_2()'

	];
	var Metodos_procesar_lista = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_limpia_seleccion
	// DESCRIPCION..: Metodos que se ejecutan al elegir limpiar seleccion del registro
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Dato_status_registro.inicializa_dato()',
		'Dato_id_registro.inicializa_dato()',
		'Dato_nombre_registro.inicializa_dato()',
		'Dato_descripcion_registro.inicializa_dato()',
		'Dato_modalidad_captura.inicializa_dato()',
		
		'Texto_status_registro.generahtml()',
		'Texto_status_registro.imprimehtml()',
		'Texto_id_registro.generahtml()',
		'Texto_id_registro.imprimehtml()',
		'Texto_nombre_registro.generahtml()',
		'Texto_nombre_registro.imprimehtml()',
		'Texto_descripcion_registro.generahtml()',
		'Texto_descripcion_registro.imprimehtml()',
		
		'Metodos_menu_limpia_inicializa.ejecuta()',
		'Menu_limpia_seleccion.generahtml_status()',
		'Menu_limpia_seleccion.imprimehtml()',

		'Metodos_menu_controles_inicializa.ejecuta()',
		'Menu_controles.generahtml_status()',
		'Menu_controles.imprimehtml()',
	
		'Metodos_screen_vacio.ejecuta()'

	];
	var Metodos_limpia_seleccion = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_capturar_punto
	// DESCRIPCION..: Metodos que se ejecutan para establcer pantalla de captura
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Load_comunidad_captura.imprimehtml()'

	];
	var Metodos_capturar_punto = new Metodos(configuraciones, codigos, elementos);















// ****************************************************************
// VIEWMODEL: METODOS DE GRID
// ****************************************************************






	
// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //

// PUNTO DE INICIO

// ** // ** // ** // ** // ** //
// ** // ** // ** // ** // ** //



//////////////////////////////////////////
//////////////////////////////////////////
									//////
									//////
									//////
                                    //////
                                    //////
                                    //////
                                    //////
                                    //////




///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
///////////
//////////////////////
//////////////////
//////////////
//////////
//////
//






	// CLASE........: Metodos
	// INSTANCIA....: Metodos_comunidad_grid
	// DESCRIPCION..: Metodos que se ejecutan para presentar el grid de comunidad
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_comunidad.abrefijo()',	
	'Consulta_comunidad.posicion_callback(0)',
	'Consulta_comunidad.ejecuta_2()'

	];
	
	var Metodos_comunidad_grid = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_elige_grid
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige un elemento del grid 

		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
			'Dato_status_registro.actualiza_dato(1)',
			'Dato_modalidad_captura.actualiza_dato(0)',
			'Dato_id_registro.actualiza_dato(Grid_comunidad.configuraciones[8][0][2])',
			'Metodos_baja_datos_regitro_grid.ejecuta()',
			
			
			'Menu_limpia_seleccion.recibe_status(0, 0, 1)',
			'Menu_limpia_seleccion.recibe_status(1, 0, 1)',		
			'Menu_limpia_seleccion.recibe_status(2, 0, 1)',
			'Menu_limpia_seleccion.recibe_status(3, 0, 1)',

			'Metodos_imprime_area_status_registro.ejecuta()',

			'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_01`, `area_status_registro_vacio`)',
			'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_01`, `area_status_registro_captura`)',
			'Screen_comunidad.agrega_clase(`ID_COMUNIDAD_CRUD_03_01`, `area_status_registro_seleccionado`)',
			'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_02`, `area_status_registro_vacio`)',
			'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_02`, `area_status_registro_captura`)',
			'Screen_comunidad.agrega_clase(`ID_COMUNIDAD_CRUD_03_02`, `area_status_registro_seleccionado`)',
			'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_03`, `area_status_registro_vacio`)',
			'Screen_comunidad.quita_clase(`ID_COMUNIDAD_CRUD_03_03`, `area_status_registro_captura`)',
			'Screen_comunidad.agrega_clase(`ID_COMUNIDAD_CRUD_03_03`, `area_status_registro_seleccionado`)',
		
			'Metodos_menu_controles_seleccionado.ejecuta()',
			'Menu_controles.generahtml_status()',
			'Menu_controles.imprimehtml()'
	
		
		];

		var Metodos_elige_grid = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_avanzagrid
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige avanzar una pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
			'Grid_comunidad.avanza()',
			'Grid_comunidad.generahtml()',
			'Grid_comunidad.imprimehtml()'
		
		];
		var Metodos_avanzagrid = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_inicio_posicion
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a primera pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
			'Grid_comunidad.inicializa_posicion()',
			'Grid_comunidad.generahtml()',
			'Grid_comunidad.imprimehtml()'
		
		];
		var Metodos_inicio_posicion = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_retrocedegrid
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige retroceder una página en el grid
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
			'Grid_comunidad.retrocede()',
			'Grid_comunidad.generahtml()',
			'Grid_comunidad.imprimehtml()'
		
		];
		var Metodos_retrocedegrid = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_final_posicion
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a última pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
			'Grid_comunidad.finaliza_posicion()',
			'Grid_comunidad.generahtml()',
			'Grid_comunidad.imprimehtml()'
		
		];
		var Metodos_final_posicion = new Metodos(configuraciones, codigos, elementos);


</script>