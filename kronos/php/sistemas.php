<?php
	require_once "../../pantalib/php/objetos/new/Sistema.php";
	require_once "../../pantalib/php/objetos/new/User.php";
	require_once "../../pantalib/php/objetos/new/Log.php";
	require_once "Conexion_kronos.php";
	require_once "../../pantalib/php/objetos/new/Session.php";
	header('Content-Type: text/html; charset=UTF-8');
	session_start();
	if (!isset($_SESSION['Sistema'])) {
		header('Location: ../cryona__kronos.php');
	}
	header('Content-Type: text/html; charset=UTF-8');

// ESTABLECEMOS PARAMETROS DE LOG
	$_SESSION['logPhp']->configuraciones[2] = '../logs/';

// LOGEAMOS INICIO
	$_SESSION['logPhp']->configuraciones[1] = ' ';
	$_SESSION['logPhp']->escribe_log();
	$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
	$_SESSION['logPhp']->escribe_log();
	$_SESSION['logPhp']->escribe_log();
	$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS sistemas.php';
	$_SESSION['logPhp']->escribe_log();
	$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
	$_SESSION['logPhp']->escribe_log();
	$_SESSION['logPhp']->escribe_log();
	$_SESSION['logPhp']->configuraciones[1] = ' ';
	$_SESSION['logPhp']->escribe_log();

	$sistema_config = $_SESSION['Sistema']->configuraciones;

?>
<!DOCTYPE html>
<html lang="es_MX">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SISTEMAS / KRONOS</title>
        <link rel="icon" href="icons8-favicon.gif" type="image/x-icon">
		<link rel="stylesheet" href="../../pantalib/fontawesome/css/all.css">
		<link rel="stylesheet" href="../../pantalib/css/kronos.css">
		<link rel="stylesheet" href="../../pantalib/css/kronos_sis.css">
		<script src="../../pantalib/jquery/jquery.js"></script>
		
		<script src="../../pantalib/javascript/objetos/mvvm/model/System.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/model/Session.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/model/Phpmail.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/model/Consulta.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/model/Valor.js"></script>

		<script src="../../pantalib/javascript/objetos/mvvm/view/Form.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Maqueta.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Elementos.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Input.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Button.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Link.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Modal.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Elemento.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Grid.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Load.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Texto.js"></script>
    
		<script src="../../pantalib/javascript/objetos/mvvm/viewmodel/Pantalla.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/viewmodel/Evaluacion.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/viewmodel/Metodos.js"></script>
	</head>
    <body class="maqueta_base" id="ID_KRONOS_BODY">
        SISTEMAS / KRONOS
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


// ** COMIENZA JS KRONOS: sistemas.php PÁGINA PARA ADMINISTRAR SISTEMAS


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









































// CLASES DEL MODELO MANEJO DE DATOS




































// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE UNO: ESTABLECE DATOS INICIALES CLASES DEL MODELO

// ****************************************************************
// ****************************************************************
// ****************************************************************








// ****************************************************************
// BLOQUE UNO: 01 ESTABLECE CLASES PARA MANEJAR SESION PHP Y SISTEMA
// ****************************************************************


// CLASE........: Session
// INSTANCIA....: Session_revisa
// DESCRIPCION..: Instancia para administrar sesión de PHP 
	
	var idioma = '<?php echo json_encode($_SESSION['Sistema'] -> configuraciones[2]); ?>';
    var sistema_id = <?php echo json_encode($sistema_config[0]); ?>;
	var sistema_tech_name = <?php echo json_encode($sistema_config[1]); ?>;
	var ruta = <?php echo json_encode($sistema_config[3]); ?>;
	var idCode = 1;
	var statusSessiono = [1, 2, 3, 4, 5];
	var statusCheck = 1;
	var scarlet = [idCode, statusSessiono, statusCheck, 0];
	var scriptPhp = ['session_cierra_kronos.php', 'session_abre_kronos.php'];
	var metodoPhp = 'POST';
	var configuraciones = [scarlet, scriptPhp, metodoPhp];
	var codigos = [''];
	var Session_revisa = new Session(configuraciones, codigos);

// CLASE........: System
// INSTANCIA....: Sistema_kronos
// DESCRIPCION..: Instancia para administrar información del Sistema 
	
	var Sistema_kronos = new System(sistema_id, sistema_tech_name, 'kronos', 'INICIALIZA SISTEMAS PANTALASA Y SUPER USUARIOS', '');


// ****************************************************************
// BLOQUE UNO: 02 INSTANCIAS PARA MANEJAR CONSULTAS
// ****************************************************************


// CLASE........: Consulta
// INSTANCIA....: Consulta_gradilla
// DESCRIPCION..: Consulta que se ejecuta para actualizar gradilla desde la BD

		var statusConsulta = 0;
		var scriptPhp = 'consulta_gradilla_sistemas.php';
		var metodoPhp = 'POST';
		var filtro = [];
		var posicionCallback = 0;
		var metodosCallback01 = ['Metodos_gradilla.ejecuta()'];
		var metodosCallback = [metodosCallback01]; 
		var callback = [posicionCallback, metodosCallback];
		var lotes = [0, 5000, 0, 0];
		var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
		var codigos = ['', ''];
		var elementos = [''];	
		var Consulta_gradilla = new Consulta(configuraciones, codigos, elementos);

	// CLASE........: Consulta
	// INSTANCIA....: Consulta_baja_sistema
	// DESCRIPCION..: Consulta que se ejecuta para traer desde la BD un registro elegido en gradilla
	
		var statusConsulta = 0;
		var scriptPhp = 'consulta_baja_sistema.php';
		var metodoPhp = 'POST';
		var filtro = [''];
		var posicionCallback = 0;
		var metodosCallback01 = ['Metodos_baja.ejecuta()'];
		var metodosCallback02 = ['Metodos_graba_baja.ejecuta()'];
		var metodosCallback03 = ['Metodos_actualiza_baja.ejecuta()'];
		var metodosCallback04 = ['Metodos_refresca_localidad_c.ejecuta()'];
		var metodosCallback = [metodosCallback01, metodosCallback02, metodosCallback03, metodosCallback04]; 
		var callback = [posicionCallback, metodosCallback];
		var lotes = [0, 5000, 0, 0];
		var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
		var codigos = ['', ''];
		var elementos = [''];	
		var Consulta_baja_registro = new Consulta(configuraciones, codigos, elementos);


// ****************************************************************
// BLOQUE UNO: 03 INSTANCIAS PARA MANEJAR VALORES DATOS TIPO DATOS (REGISTRO)
// ****************************************************************

	// CLASE........: Valor
	// INSTANCIA....: Valor_dato_status_registro
	// DESCRIPCION..: Valor para establecer el dato del statuss si 0 = no hay registro,
	//                1 = registro seleccionado, 2 = Nuevo registro, recibe su valor por
	// 				  los metodos inicializa_valor() y actualiza_valor(valor)

		var controlIdioma = [idioma, []];
		var registro = [0, 0];
		var instancia_name = 'Valor_dato_status_registro';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];
		var adn = [];		
		var fuentes = [adn, []];
		var Valor_dato_status_registro = new Valor(configuraciones, estructura, valores, fuentes);
		Valor_dato_status_registro.inicializa_valor();

	// CLASE........: Valor
	// INSTANCIA....: Valor_dato_id_registro
	// DESCRIPCION..: Valor para establecer el dato del id recibe su valor por los metodos
	//                inicializa_valor() y actualiza_valor(valor)

		var controlIdioma = [idioma, []];
		var registro = [0, 0];
		var instancia_name = 'Valor_dato_id_registro';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];
		var adn = [];		
		var fuentes = [adn, []];
		var Valor_dato_id_registro = new Valor(configuraciones, estructura, valores, fuentes);
		Valor_dato_id_registro.inicializa_valor();

	// CLASE........: Valor
	// INSTANCIA....: Valor_dato_nombre_registro
	// DESCRIPCION..: Valor para establecer el dato del id recibe su valor por los metodos
	//                inicializa_valor() y actualiza_valor(valor)

		var controlIdioma = [idioma, []];
		var registro = [0, 0];
		var instancia_name = 'Valor_dato_nombre_registro';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = '';
		var valor_inicial = ['', ''];
		var valores = [valor_actual, valor_inicial];

		var antecedente01_01 = [[0, 1, 0, 0]];
		var antecedente02_01 = [[0, 1, 0, 0]];
		var resultado_01 = [[1, 10, ['dato_02', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
		var parte_01 = [condicion_01];
		var adn = [parte_01];		
		var clasesFuentes = [Consulta_gradilla];
		var fuentes = [adn, clasesFuentes];

		var Valor_dato_nombre_registro = new Valor(configuraciones, estructura, valores, fuentes);
		Valor_dato_nombre_registro.inicializa_valor();

	// CLASE........: Valor
	// INSTANCIA....: Valor_dato_descripcion_registro
	// DESCRIPCION..: Valor para establecer el dato del id recibe su valor por los metodos
	//                inicializa_valor() y actualiza_valor(valor)

		var controlIdioma = [idioma, []];
		var registro = [0, 0];
		var instancia_name = 'Valor_dato_descripcion_registro';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = '';
		var valor_inicial = ['', ''];
		var valores = [valor_actual, valor_inicial];

		var antecedente01_01 = [[0, 1, 0, 0]];
		var antecedente02_01 = [[0, 1, 0, 0]];
		var resultado_01 = [[1, 10, ['dato_03', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
		var parte_01 = [condicion_01];
		var adn = [parte_01];		
		var clasesFuentes = [Consulta_gradilla];
		var fuentes = [adn, clasesFuentes];

		var Valor_dato_descripcion_registro = new Valor(configuraciones, estructura, valores, fuentes);
		Valor_dato_descripcion_registro.inicializa_valor();

	// CLASE........: Valor
	// INSTANCIA....: Valor_dato_fecha_registro
	// DESCRIPCION..: Valor para establecer el dato del id recibe su valor por los metodos
	//                inicializa_valor() y actualiza_valor(valor)

		var controlIdioma = [idioma, []];
		var registro = [0, 0];
		var instancia_name = 'Valor_dato_fecha_registro';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = '';
		var valor_inicial = ['', ''];
		var valores = [valor_actual, valor_inicial];

		var antecedente01_01 = [[0, 1, 0, 0]];
		var antecedente02_01 = [[0, 1, 0, 0]];
		var resultado_01 = [[1, 10, ['dato_04', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
		var parte_01 = [condicion_01];
		var adn = [parte_01];		
		var clasesFuentes = [Consulta_gradilla];
		var fuentes = [adn, clasesFuentes];

		var Valor_dato_fecha_registro = new Valor(configuraciones, estructura, valores, fuentes);
		Valor_dato_fecha_registro.inicializa_valor();

	// CLASE........: Valor
	// INSTANCIA....: Valor_dato_modalidad_registro
	// DESCRIPCION..: Valor para establecer el dato del id recibe su valor por los metodos
	//                inicializa_valor() y actualiza_valor(valor)

		var controlIdioma = [idioma, []];
		var registro = [0, 0];
		var instancia_name = 'Valor_dato_modalidad_registro';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var valor_actual = 0;
		var valor_inicial = [0, 0];
		var valores = [valor_actual, valor_inicial];
		var adn = [];		
		var fuentes = [adn, []];
		var Valor_dato_modalidad_registro = new Valor(configuraciones, estructura, valores, fuentes);
		Valor_dato_modalidad_registro.inicializa_valor();


// ****************************************************************
// BLOQUE UNO: 04 INSTANCIAS PARA MANEJAR VALORES DE GRID
// ****************************************************************
	

	// CLASE........: Valor
	// INSTANCIA....: Valor_grid_id_click
	// DESCRIPCION..: Valor para establecer el id que se recoge con click en registro de grid
	
		var arregloIdioma = [];
		var controlIdioma = [idioma, arregloIdioma];
		var registro = [0, 0];
		var instancia_name = 'Valor_grid_id_click';
		var configuraciones = [controlIdioma, registro, instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var valor_actual = '';
		var valor_inicial = [0, ''];
		var valores = [valor_actual, valor_inicial];
		
		var antecedente01_01 = [[0, 1, 0, 0]];
		var antecedente02_01 = [[0, 1, 0, 0]];
		var resultado_01 = [[1, 10, ['dato_01', 0], 0]];
//		var resultado_01 = [[1, 10, ['dato_01', 0], 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
		var parte_01 = [condicion_01];
		var adn = [parte_01];		
		var clasesFuentes = [Consulta_gradilla];
		
		var fuentes = [adn, clasesFuentes];
		var Valor_grid_id_click = new Valor(configuraciones, estructura, valores, fuentes);

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
		var clasesFuentes = [];
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
		var clasesFuentes = [Consulta_gradilla];
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
		var clasesFuentes = [Consulta_gradilla];
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
		var clasesFuentes = [Consulta_gradilla];
		var fuentes = [adn, clasesFuentes];
		var Valor_grid_descripcion_valor = new Valor(configuraciones, estructura, valores, fuentes);


// ****************************************************************
// BLOQUE UNO: 04 INSTANCIAS PARA MANEJAR VALORES DE IMPRESIÓN
// ****************************************************************
	
	// CLASE........: Valor
	// INSTANCIA....: Valor_texto_status
	// DESCRIPCION..: Valor para establecer el texto variable del status se actualiza al
	//                cambiar valor de Valor_status_registro
	
		var inglesIdioma = ['NO SYSTEM LOG SELECTED', 'SYSTEM LOG SELECTED', 'CAPTURING NEW SYSTEM LOG'];
		var espanolIdioma = ['XXNO HAY REGISTRO DE SISTEMA SELECCIONADO', 'REGISTRO DE SISTEMA SELECCIONADO', 'CAPTURANDO NUEVO REGISTRO DE SISTEMA'];
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
	
		var antecedente01_01 = [[0, 7, 0, 0]];
		var antecedente02_01 = [[0, 1, 0, 0]];
		var resultado_01 = [[1, 2, 0, 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
	
		var antecedente01_02 = [[0, 7, 0, 0]];
		var antecedente02_02 = [[0, 1, 1, 0]];
		var resultado_02 = [[1, 2, 1, 0]];
		var condicion_02 = [[1, antecedente01_02, antecedente02_02], resultado_02];
	
		var antecedente01_03 = [[0, 7, 0, 0]];
		var antecedente02_03 = [[0, 1, 2, 0]];
		var resultado_03 = [[1, 2, 2, 0]];
		var condicion_03 = [[1, antecedente01_03, antecedente02_03], resultado_03];
	
		var parte_01 = [condicion_01, condicion_02, condicion_03];

		var adn = [parte_01];		

		var clasesFuentes = [Valor_dato_status_registro];
		
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
		var resultado_01 = [[1, 1, 'ID: ', 0],[1, 7, 0, 0]];
		var condicion_01 = [[1, antecedente01_01, antecedente02_01], resultado_01];
	
		var parte_01 = [condicion_01];

		var adn = [parte_01];		

		var clasesFuentes = [Valor_dato_id_registro];
		
		var fuentes = [adn, clasesFuentes];

		var Valor_texto_id = new Valor(configuraciones, estructura, valores, fuentes);








































// CLASES DEL VIEW IMPRESION DE PANTALLA

























	







// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE DOS: PANTALLA HTML CON TODOS SUS ELEMENTOS CLASES VIEW

// ****************************************************************
// ****************************************************************
// ****************************************************************








// ****************************************************************
// BLOQUE DOS: 01 CLASES PARA IMPRIMIR MAQUETA GENERAL Y MODALES
// ****************************************************************


// CLASE........: Maqueta
// INSTANCIA....: maqueta_01
// ID...........: ID_GEN_MAQUETA
// SE INSERTA EN: #ID_KRONOS_BODY	
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
	var etiquetas = ["maqueta_01", "ID_GEN_MAQUETA", "#ID_KRONOS_BODY"];
	var codigos = [""];
	var elementosClass = ["area_cuerpo", "modal_oculto", "modal_oculto"];
	var elementosId = ["ID_GEN_CUERPO", "ID_GEN_MODAL", "ID_GEN_MODAL_OPCION"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01 = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01.generahtml();
	maqueta_01.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_aviso
// ID...........: ID_KRONOS_MODAL_X
// SE INSERTA EN: #ID_KRONOS_BODY	
// DESCRIPCION..: Ventana modal para avisar sin opción
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, adicional

	var inglesIdioma = [""];
	var espanolIdioma = [""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 1;
	var botonCerrar = "";
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, botonCerrar];
	var etiquetas = ["ventana_modal", "ID_KRONOS_MODAL_X", "#ID_KRONOS_BODY", "#ID_KRONOX_MODAL_TITULO_X", "#ID_KRONOS_MODAL_AVISO_X"];
	var codigos = [""];
	var Modal_aviso = new Modal(configuraciones, etiquetas, codigos);
	Modal_aviso.generahtml();
	Modal_aviso.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_aviso_modal
// ID...........: ID_KRONOS_MODAL_MAQUETA
// SE INSERTA EN: #ID_KRONOS_MODAL	
// DESCRIPCION..: Maqueta de 3 posiciones para organizar ventana modal de aviso
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado sustitutivo
	
	var inglesIdioma = ["AVISO", "PARA INICIAR ELÍGE TRABAJO", ""];
	var espanolIdioma = ["AVISO", "PARA INICIAR ELÍGE TRABAJO", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_ventana_modal", "ID_KRONOS_MODAL_MAQUETA_X", "#ID_KRONOS_MODAL_X"];
	var codigos = [""];
	var elementosClass = ["titulo_ventana", "area_aviso_modal", "area_button_modal"];
	var elementosId = ["ID_KRONOS_MODAL_TITULO_X", "ID_KRONOS_MODAL_AVISO_X", "ID_KRONOS_MODAL_BUTTON_X"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_aviso_modal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_aviso_modal.generahtml();
	Maqueta_aviso_modal.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_aviso_opcion
// ID...........: ID_KRONOS_MODAL_OPCION
// SE INSERTA EN: #ID_KRONOS_BODY	
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
	var etiquetas = ["ventana_modal", "ID_KRONOS_MODAL_OPCION", "#ID_KRONOS_BODY", "#ID_KRONOS_MODAL_OPCION_TITULO", "#ID_KRONOS_MODAL_OPCION_AVISO"];
	var codigos = [""];
	var Modal_aviso_opcion = new Modal(configuraciones, etiquetas, codigos);
	Modal_aviso_opcion.generahtml();
	Modal_aviso_opcion.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_aviso_modal_opcion
// ID...........: ID_KRONOS_MODAL_OPCION_MAQUETA
// SE INSERTA EN: #ID_KRONOS_MODAL_OPCION	
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
	var etiquetas = ["maqueta_ventana_modal", "ID_KRONOS_MODAL_OPCION_MAQUETA", "#ID_KRONOS_MODAL_OPCION"];
	var codigos = [""];
	var elementosClass = ["titulo_ventana", "area_aviso_modal", "area_button_modal"];
	var elementosId = ["ID_KRONOS_MODAL_OPCION_TITULO", "ID_KRONOS_MODAL_OPCION_AVISO", "ID_KRONOS_MODAL_OPCION_BUTTON"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_aviso_modal_opcion = new Maqueta(configuraciones, etiquetas, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Ok_modal
// ID...........: ID_OK_MODAL
// SE INSERTA EN: #ID_KRONOS_MODAL_OPCION_BUTTON	
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
	var etiquetas = ["boton_link_icono_chico", "ID_OK_MODAL", "#ID_KRONOS_MODAL_OPCION_BUTTON", "ok_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_aviso_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Ok_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);


// ****************************************************************
// BLOQUE DOS: 02 CLASES MAQUETA Y ELEMENTOS AREA DE TRABAJO
// ****************************************************************


// CLASE........: Maqueta
// INSTANCIA....: Maqueta_kronos
// ID...........: ID_KRONOS_MAQUETA
// SE INSERTA EN: #ID_GEN_CUERPO	
// DESCRIPCION..: Maqueta de diseño de la pantalla Kronos
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo

    var inglesIdioma = ["DATETIME", "LOGIN", "HOME", "TITLE SYSTEM", "EXIT", "MENU", "BAR LEFT", "PRINCIPAL", "BAR RIGHT", "RESULT", "BAR FOOT", "FOOT LEFT", "FOOT RIGHT"];
//	var espanolIdioma = ["ONLINE", "pAntalasa Software", "INICIO", "KRONOS<BR>SISTEMAS Y USUARIOS", "SALIDA", "MENU", "BARRA IZQUIERDA", "PRINCIPAL", "BARRA DERECHA", "RESULTADO", "CONTROLES", "PIE DE PÁGINA", "PIE DERECHO", "PÍE IZQUIERDO"];
	var espanolIdioma = ["ONLINE", "pAntalasa Software", "INICIO", "KRONOS<BR>ADMINISTRAR SISTEMAS", "SALIDA", "", "", "", "", "", "", "", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 13;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_kronos", "ID_KRONOS_MAQUETA", "#ID_GEN_CUERPO"];
	var codigos = [""];
	var elementosClass = ["cinta_superior", "cinta_superior", "area_home", "area_titulo", "area_exit", "area_menu", "barra_izquierda", "area_principal", "barra_derecha", "area_resultado", "pie_pagina", "cinta_pie", "cinta_pie"];
	var elementosId = ["ID_KRONOS_01", "ID_KRONOS_02", "ID_KRONOS_03", "ID_KRONOS_04", "ID_KRONOS_05", "ID_KRONOS_06", "ID_KRONOS_07", "ID_KRONOS_08", "ID_KRONOS_09", "ID_KRONOS_10", "ID_KRONOS_11", "ID_KRONOS_12", "ID_KRONOS_13"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_kronos = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_kronos.generahtml();
	Maqueta_kronos.imprimehtml();

// CLASE........: Elementos
// INSTANCIA....: Menu_izquierda
// ID...........: ID_KRONOS_MENUIZQ
// SE INSERTA EN: #ID_KRONOS_03	
// DESCRIPCION..: Menu de un sólo elemento para navegar a INICIO
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo

	var titulosIngles = ['HOME'];
	var iconosIngles = ['fa-solid fa-home'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['INICIO'];
	var iconosEspanol = ['fa-solid fa-home'];
	var enlacesEspanol = ['javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 1;
	var tipoImpresion = 0;
	var tipoMenu = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoMenu];
	var etiquetas = ['menu_elementos', 'ID_KRONOS_MENUIZQ', '#ID_KRONOS_03'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro'];
	var elementosId = ['ID_KRONOS_MENUIZQ_01'];
	var elementosIcono = [1];
	var elementosOrdenIcono = [0];
	var elementosMetodos = [[['ONCLICK'], ['window.location.replace(`../cryona__kronos.php`)']]];
	var elementosActivo = [1];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos, elementosActivo];
	var Menu_izquierda = new Elementos(configuraciones, etiquetas, codigos, elementos);
	Menu_izquierda.generahtml();
	Menu_izquierda.imprimehtml();

// CLASE........: Elementos
// INSTANCIA....: Menu_derecha
// ID...........: ID_KRONOS_MENUDER
// SE INSERTA EN: #ID_KRONOS_05	
// DESCRIPCION..: Menu de un sólo elemento para navegar a SALIDA
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo

	var titulosIngles = ['EXIT'];
	var iconosIngles = ['fa-solid fa-door-open'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['SALIDA'];
	var iconosEspanol = ['fa-solid fa-door-open'];
	var enlacesEspanol = ['javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 1;
	var tipoImpresion = 0;
	var tipoMenu = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoMenu];
	var etiquetas = ['menu_elementos', 'ID_KRONOS_MENUDER', '#ID_KRONOS_05'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro'];
	var elementosId = ['ID_KRONOS_MENUDER_01'];
	var elementosIcono = [1];
	var elementosOrdenIcono = [0];
	var elementosMetodos = [[['ONCLICK'], ['window.location.replace(`salida.php`)']]];
	var elementosActivo = [1];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos, elementosActivo];
	var Menu_derecha = new Elementos(configuraciones, etiquetas, codigos, elementos);
	Menu_derecha.generahtml();
	Menu_derecha.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_trabajo
// ID...........: ID_TRABAJO_SIS
// SE INSERTA EN: #ID_KRONOS_08	
// DESCRIPCION..: Maqueta de diseño del area de TRABAJO
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo

    var inglesIdioma = ["CHOSS YOUR WORK", "", "", "", "", ""];
	var espanolIdioma = ["ELÍGE SISTEMA O CREA UNO NUEVO", "GRADILLA", "NO HAY REGISTRO SELECCIONADO", "ID", "NOMBRE", "CONTROLES"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 6;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_trabajo", "ID_TRABAJO_SIS", "#ID_KRONOS_08"];
	var codigos = [""];
	var elementosClass = ["titulo_trabajo", "area_gradilla", "area_status", "area_id", "area_nombre", "area_controles"];
	var elementosId = ["ID_TRABAJO_SIS_01", "ID_TRABAJO_SIS_02", "ID_TRABAJO_SIS_03", "ID_TRABAJO_SIS_04", "ID_TRABAJO_SIS_05", "ID_TRABAJO_SIS_06"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_trabajo = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_trabajo.generahtml();
	Maqueta_trabajo.imprimehtml();


// ****************************************************************
// BLOQUE DOS: 03 INSTANCIA PARA IMPRIMIR EL GRID PRINCIPAL
// ****************************************************************


	// CLASE........: Grid
	// INSTANCIA....: Gradilla_sistemas
	// ID...........: ID_TRABAJO_SIS_GRAD
	// SE INSERTA EN: #ID_TRABAJO_SIS_02	
	// DESCRIPCION..: Gradilla de sistemas
	// HTML.........: Espera metodo
	// IMPRESION....: Espera metodo, sustituye contenido
	
		var inglesElementos = ['ID', 'NOMBRE', 'DESCRIPCIÓN'];
		var inglesIdioma = [inglesElementos, 'LISTA DE PUNTOS'];
		var espanolElementos = ['ID', 'NOMBRE', 'DESCRIPCIÓN'];
		var espanolIdioma = [espanolElementos, 'LISTA DE PUNTOS'];
		var arregloIdioma = [inglesIdioma, espanolIdioma];
		var controlIdioma = [idioma, arregloIdioma];
		
		var numeroElementos = 3;
		var tipoImpresion = 0;
		var consulta = Consulta_gradilla;
		var parametros = [0, 15];
		var titulo = ['LISTA DE SISTEMAS'];
		
		var orientacionBreaks = [0, 720];
		var orientacionFormato = [0, 1];
		var orientacion = [0, orientacionBreaks, orientacionFormato];
		// CONTROLS
		var areacontroles = [1];
		var iconoscontroles = ['fa-solid fa-backward', 'fa-solid fa-backward-step', 'fa-solid fa-forward-step', 'fa-solid fa-forward'];
		var metodoscontroles = [' ONCLICK="Metodos_inicio_posicion.ejecuta()"', ' ONCLICK="Metodos_retrocedegrid.ejecuta()"', ' ONCLICK="Metodos_avanzagrid.ejecuta()"', ' ONCLICK="Metodos_final_posicion.ejecuta()"'];
		var controles = [areacontroles, iconoscontroles, metodoscontroles];

		var valorIncial = [0, 0, 0];
		var valorActual = [0, 0, 0];
		var metodoValor = 'Gradilla_sistemas.actualiza_valores';
		var valores = [valorActual, valorIncial, metodoValor];
	
		var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, consulta, parametros, titulo, orientacion, controles, valores];
		
		var etiquetas = ['gradilla', 'ID_TRABAJO_SIS_GRAD', '#ID_TRABAJO_SIS_02'];
		
		var codigos = [''];
		
		var elementos_click = [[Valor_grid_id_click], [Valor_grid_id_click], [Valor_grid_id_click]]; 	
		var elementos_click_metodo = ['Gradilla_sistemas.actualiza_valor', 'Gradilla_sistemas.actualiza_valor', 'Gradilla_sistemas.actualiza_valor'];
		var elementos_tipo_click = [0, 0, 0];
		var elementos_llave_valor = ['dato_01', 'dato_01', 'dato_01'];
		var elementos_ancho_valor = ['diez', 'veinte', 'setenta'];
		var elementos_metodos = ['Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()'];
		var elementos_clases = [[Valor_grid_clases], [Valor_grid_clases], [Valor_grid_clases]];
		var elementos_valores = [[Valor_grid_id_valor], [Valor_grid_nombre_valor], [Valor_grid_descripcion_valor]];		
		var elementos = [elementos_click, elementos_click_metodo, elementos_ancho_valor, elementos_metodos, elementos_clases, elementos_valores];

		var Gradilla_sistemas = new Grid(configuraciones, etiquetas, codigos, elementos);


// ****************************************************************
// BLOQUE DOS: 04 INSTANCIA PARA IMPRIMIR MENUS
// ****************************************************************


// CLASE........: Elementos
// INSTANCIA....: Menu_central
// ID...........: ID_KRONOS_CONT
// SE INSERTA EN: #ID_KRONOS_06	
// DESCRIPCION..: Menu de elementos para navegar a las diferentes pantallas
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo

	var titulosIngles = ['LIST', 'NEW SYSTEM', 'USERS', "CHANGES"];
	var iconosIngles = ['fa-solid fa-list', 'fa-solid fa-plus', 'fa-solid fa-plus', 'fa-solid fa-table-list'];
	var enlacesIngles = ['javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['LISTA', 'NUEVO SISTEMA', 'BORRAR SISTEMA', 'DATOS'];
	var iconosEspanol = ['fa-solid fa-list', 'fa-solid fa-plus', 'fa-solid fa-trash-can', 'fa-solid fa-rectangle-list'];
	var enlacesEspanol = ['javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 4;
	var tipoImpresion = 0;
	var tipoMenu = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoMenu];
	var etiquetas = ['menu_elementos_d', 'ID_KRONOS_CENT', '#ID_TRABAJO_SIS_06'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro_d', 'boton_menu_cuadro_d', 'boton_menu_cuadro_d', 'boton_menu_cuadro_d'];
	var elementosId = ['ID_KRONOS_CONT_01', 'ID_KRONOS_CONT_02', 'ID_KRONOS_CONT_03', 'ID_KRONOS_CONT_04'];
	var elementosIcono = [1, 1, 1, 1];
	var elementosOrdenIcono = [0, 0, 0, 0];
	var elementosMetodos = [[['ONCLICK'], ['Metodos_elige_lista.ejecuta()']], [['ONCLICK'], ['Metodos_elige_alta.ejecuta()']], [['ONCLICK'], ['Metodos_elige_baja.ejecuta()']], [['ONCLICK'], ['Metodos_elige_cambios.ejecuta()']]];
	var elementosActivo = [0, 1, 0, 0];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos, elementosActivo];
	var Menu_central = new Elementos(configuraciones, etiquetas, codigos, elementos);
	Menu_central.generahtml();
	Menu_central.imprimehtml();

// CLASE........: Elementos
// INSTANCIA....: Menu_controles
// ID...........: ID_KRONOS_CONT
// SE INSERTA EN: #ID_KRONOS_06	
// DESCRIPCION..: Menu de elementos para navegar a las diferentes pantallas
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo

	var titulosIngles = ['LIST', 'NEW SYSTEM'];
	var iconosIngles = ['fa-solid fa-eraser', 'fa-solid fa-eraser'];
	var enlacesIngles = ['javascript:void(0)', 'javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['GRABAR', 'LIMPIAR CAPTURA'];
	var iconosEspanol = ['fa-solid fa-floppy-disk', 'fa-solid fa-eraser'];
	var enlacesEspanol = ['javascript:void(0)', 'javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 2;
	var tipoImpresion = 0;
	var tipoMenu = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoMenu];
	var etiquetas = ['menu_elementos_d', 'ID_KRONOS_CONT', '#ID_TRABAJO_SIS_05'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro_d', 'boton_menu_cuadro_d'];
	var elementosId = ['ID_KRONOS_CONT_01', 'ID_KRONOS_CONT_02'];
	var elementosIcono = [1, 1];
	var elementosOrdenIcono = [0, 0];
	var elementosMetodos = [[['ONCLICK'], ['Metodos_elige_lista.ejecuta()']], [['ONCLICK'], ['Metodos_elige_alta.ejecuta()']]];
	var elementosActivo = [1, 1];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos, elementosActivo];
	var Menu_controles = new Elementos(configuraciones, etiquetas, codigos, elementos);


// ****************************************************************
// BLOQUE DOS: 05 INSTANCIAS PARA IMPRIMIR AREA DE TRABAJO
// ****************************************************************


// CLASE........: Maqueta
// INSTANCIA....: Maqueta_trabajo
// ID...........: ID_TRABAJO_SIS
// SE INSERTA EN: #ID_KRONOS_08	
// DESCRIPCION..: Maqueta de diseño del area de TRABAJO
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Espera metodo

    var inglesIdioma = ["CHOSS YOUR WORK", "", "", ""];
	var espanolIdioma = ["CAPTURA INFORMACIÓN DE NUEVO SISTEMA", "AREA CAPTURA", "GRABAR", "MENU"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 4;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_trabajo", "ID_TRABAJO_SIS_CAP", "#ID_KRONOS_08"];
	var codigos = [""];
	var elementosClass = ["titulo_trabajo", "area_captura", "area_controles", "area_controles"];
	var elementosId = ["ID_TRABAJO_SIS_CAP_01", "ID_TRABAJO_SIS_CAP_02", "ID_TRABAJO_SIS_CAP_03", "ID_TRABAJO_SIS_CAP_04"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_trabajo_02 = new Maqueta(configuraciones, etiquetas, codigos, elementos);

	// CLASE........: Load
	// INSTANCIA....: Load_altas
	// SE INSERTA EN: #ID_GEN_CUERPO	
	// DESCRIPCION..: Inserta codigo HTML en un elemento del DOM
	// IMPRESION....: Despues de ser creado, sustitutivo

	var tipoImpresion = 0;
	var configuraciones = [tipoImpresion];
	var etiquetas = ["../html/sistemas_altas.html", "#ID_TRABAJO_SIS_CAP_02"];
	var Load_altas = new Load(configuraciones, etiquetas);


// ****************************************************************
// BLOQUE DOS: 06 TEXTOS DE LA PANTALLA
// ****************************************************************

// CLASE........: Texto
// INSTANCIA....: Texto_status
// ID...........: ID_TEXTO_STATUS
// SE INSERTA EN: #ID_TRABAJO_SIS_03	
// DESCRIPCION..: Texto para imprimir el status del registro
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Inmediato

var controlIdioma = [idioma, []];
var tipoImpresion = 0;
var sentidoImpresion = 0;
var etiqueta = 0;
var configuraciones = [controlIdioma, tipoImpresion, etiqueta];
var etiquetas = ["texto_mutable", "ID_TEXTO_STATUS", "#ID_TRABAJO_SIS_03"];
var codigos = ['', ''];
var clasesEtiqueta = [0, ''];
var metodosEtiqueta = [0, ''];
var valorEtiqueta = [0, ''];
var clasesTexto = [0, ''];
var metodosTexto = [0, ''];
var valorTexto = [2, 0];
var adn = [clasesEtiqueta, metodosEtiqueta, valorEtiqueta, clasesTexto, metodosTexto, valorTexto];
var fuentes = [adn, [Valor_texto_status]];
var Texto_status = new Texto(configuraciones, etiquetas, codigos, fuentes);

// CLASE........: Texto
// INSTANCIA....: Texto_id
// ID...........: ID_TEXTO_ID
// SE INSERTA EN: #ID_TRABAJO_SIS_04	
// DESCRIPCION..: Texto para imprimir el id del registro
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Inmediato

var controlIdioma = [idioma, []];
var tipoImpresion = 0;
var sentidoImpresion = 0;
var etiqueta = 0;
var configuraciones = [controlIdioma, tipoImpresion, etiqueta];
var etiquetas = ["texto_mutable", "ID_TEXTO_ID", "#ID_TRABAJO_SIS_04"];
var codigos = ['', ''];
var clasesEtiqueta = [0, ''];
var metodosEtiqueta = [0, ''];
var valorEtiqueta = [0, ''];
var clasesTexto = [0, ''];
var metodosTexto = [0, ''];
var valorTexto = [2, 0];
var adn = [clasesEtiqueta, metodosEtiqueta, valorEtiqueta, clasesTexto, metodosTexto, valorTexto];
var fuentes = [adn, [Valor_texto_id]];
var Texto_id = new Texto(configuraciones, etiquetas, codigos, fuentes);

// CLASE........: Texto
// INSTANCIA....: Texto_nombre
// ID...........: ID_TEXTO_NOMBRE
// SE INSERTA EN: #ID_TRABAJO_SIS_05	
// DESCRIPCION..: Texto para imprimir el nombre del registro
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Inmediato

var controlIdioma = [idioma, []];
var tipoImpresion = 0;
var sentidoImpresion = 0;
var etiqueta = 0;
var configuraciones = [controlIdioma, tipoImpresion, etiqueta];
var etiquetas = ["texto_mutable", "ID_TEXTO_NOMBRE", "#ID_TRABAJO_SIS_05"];
var codigos = ['', ''];
var clasesEtiqueta = [0, ''];
var metodosEtiqueta = [0, ''];
var valorEtiqueta = [0, ''];
var clasesTexto = [0, ''];
var metodosTexto = [0, ''];
var valorTexto = [3, 0];
var adn = [clasesEtiqueta, metodosEtiqueta, valorEtiqueta, clasesTexto, metodosTexto, valorTexto];
var fuentes = [adn, [Valor_dato_nombre_registro]];
var Texto_nombre = new Texto(configuraciones, etiquetas, codigos, fuentes);
















	





















// CLASES DEL VIEWMODEL PROCESOS












































// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE TRES: OPERACIONES Y METODOS CLASES VIEWMODEL

// ****************************************************************
// ****************************************************************
// ****************************************************************








// ****************************************************************
// BLOQUE TRES: 01 CLASE PARA ADMINISTRAR REFRESCOS DE PANTALLA
// ****************************************************************


// CLASE........: Pantalla
// INSTANCIA....: Pantalla_kronos
// DESCRIPCION..: Instancia para administrar los refrescos de la Pantalla

	var objetos_pantalla = [];	
	var dimensiones = [];
	var configuraciones = [dimensiones];
	var Pantalla_kronos = new Pantalla(idioma, 1, "cryona__kronos.php", "CREA SISTEMAS MySql - PHP - Js - JQuery - HTML Y SUPER USUARIOS", "", "", objetos_pantalla, "", Sistema_kronos, "php/home.php", configuraciones);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_imprime_valores
	// DESCRIPCION..: Metodos que se ejecutan para imprimir todos los valores de la pantalla
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Texto_status.generahtml()',
		'Texto_status.imprimehtml()',
		'Texto_id.generahtml()',
		'Texto_id.imprimehtml()',
		'Texto_nombre.generahtml()',
		'Texto_nombre.imprimehtml()'
	
	]
		
	var Metodos_imprime_valores = new Metodos(configuraciones, codigos, elementos);






// ****************************************************************
// BLOQUE TRES: 02 METODOS DE MODAL
// ****************************************************************


// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_aviso
// DESCRIPCION..: Metodos para desplegar Modal para avisar que se debe hacer para iniciar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Maqueta_aviso_modal_opcion.contenido([0, "AVISO"])',
		'Maqueta_aviso_modal_opcion.contenido([1, "PARA INICIAR ELÍGE TRABAJO"])',
		'Maqueta_aviso_modal_opcion.generahtml()',
		'Maqueta_aviso_modal_opcion.imprimehtml()',
		'Ok_modal.generahtml()',
		'Ok_modal.imprimehtml()',
		'Modal_aviso_opcion.abrefijo()'
	
	];
	var Metodos_modal_aviso = new Metodos(configuraciones, codigos, elementos);


// ****************************************************************
// BLOQUE TRES: 03 METODOS DE LA GRADILLA
// ****************************************************************


	// CLASE........: Metodos
	// INSTANCIA....: Metodos_gradilla
	// DESCRIPCION..: Metodos que se ejecutan despues de actualizar y filtrar gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
			'Modal_aviso.cierra()',
			'Gradilla_sistemas.generahtml()',
			'Gradilla_sistemas.imprimehtml()'
		
		];
		
		var Metodos_gradilla = new Metodos(configuraciones, codigos, elementos);
		
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_avanzagrid
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige avanzar una pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
			'Gradilla_sistemas.avanza()',
			'Gradilla_sistemas.generahtml()',
			'Gradilla_sistemas.imprimehtml()'
		
		];
		var Metodos_avanzagrid = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_inicio_posicion
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a primera pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
			'Gradilla_sistemas.inicializa_posicion()',
			'Gradilla_sistemas.generahtml()',
			'Gradilla_sistemas.imprimehtml()'
		
		];
		var Metodos_inicio_posicion = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_retrocedegrid
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir una pagina atras en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
			'Gradilla_sistemas.retrocede()',
			'Gradilla_sistemas.generahtml()',
			'Gradilla_sistemas.imprimehtml()'
		
		];
		var Metodos_retrocedegrid = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_final_posicion
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a última pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
			'Gradilla_sistemas.finaliza_posicion()',
			'Gradilla_sistemas.generahtml()',
			'Gradilla_sistemas.imprimehtml()'
		
		];
		var Metodos_final_posicion = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_elige_grid
	// DESCRIPCION..: Metodos que se ejecutan al elegir un registro en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [

			'Valor_dato_status_registro.actualiza_valor(1)',
			'Valor_dato_id_registro.actualiza_valor(Gradilla_sistemas.configuraciones[8][0][2])',
			'Valor_dato_nombre_registro.recibe_registro(Number(Gradilla_sistemas.configuraciones[8][0][0]), Number(Gradilla_sistemas.configuraciones[8][0][1]))',
			'Valor_dato_nombre_registro.concatena_valor()',

			'Metodos_imprime_valores.ejecuta()'

		];
		
		var Metodos_elige_grid = new Metodos(configuraciones, codigos, elementos);


// ****************************************************************
// BLOQUE TRES: 04 METODOS DE BOTONES
// ****************************************************************


	// CLASE........: Metodos
	// INSTANCIA....: Metodos_elige_lista
	// DESCRIPCION..: Metodos que se ejecutan al elegir lista de sistemas
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Maqueta_trabajo.generahtml()',
		'Maqueta_trabajo.imprimehtml()',
		'Modal_aviso.abrefijo()',
		'Consulta_gradilla.ejecuta_2()',
		'Menu_central.recibe_area_impresion(`#ID_TRABAJO_SIS_06`)',
		'Menu_central.establece_activos([0, 1, 0, 0])',
		'Menu_central.generahtml()',
		'Menu_central.imprimehtml()',
		'Load_altas.imprimehtml()'
	
	]
		
	var Metodos_elige_lista = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_elige_alta
	// DESCRIPCION..: Metodos que se ejecutan al elegir crear nuevo registro de sistema
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Load_altas.imprimehtml()',
		'Maqueta_trabajo_02.generahtml()',
		'Maqueta_trabajo_02.imprimehtml()',

		'Menu_central.recibe_area_impresion(`#ID_TRABAJO_SIS_CAP_04`)',
		'Menu_central.establece_activos([1, 0, 0, 0])',
		'Menu_central.generahtml()',
		'Menu_central.imprimehtml()',

		'Menu_controles.recibe_area_impresion(`#ID_TRABAJO_SIS_CAP_03`)',
		'Menu_controles.establece_activos([1, 1])',
		'Menu_controles.generahtml()',
		'Menu_controles.imprimehtml()',

		'Record_sistemas.modo_alta()',
		'Record_inicializa_valores()'
	
	]
		
	var Metodos_elige_alta = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_elige_graba
	// DESCRIPCION..: Metodos que se ejecutan al elegir grabar sistema
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Maqueta_trabajo_02.generahtml()',
		'Maqueta_trabajo_02.imprimehtml()',
		'Menu_central.recibe_area_impresion(`#ID_TRABAJO_SIS_CAP_04`)',
		'Menu_central.establece_activos([1, 0, 0, 0])',
		'Menu_central.generahtml()',
		'Menu_central.imprimehtml()',
		'Menu_controles.recibe_area_impresion(`#ID_TRABAJO_SIS_CAP_03`)',
		'Menu_controles.establece_activos([1, 1])',
		'Menu_controles.generahtml()',
		'Menu_controles.imprimehtml()',
		'Load_altas.imprimehtml()'
	
	]
		
	var Metodos_elige_graba = new Metodos(configuraciones, codigos, elementos);

// *************//************//***************
// *************//************//***************
// *************//************//***************

// *************//************//***************
// *************//************//***************
// *************//************//***************

// *************//************//***************
// *************//************//***************
// *************//************//***************

// *************//************//***************
// *************//************//***************
// *************//************//***************

// *************//************//***************
// *************//************//***************
// *************//************//***************

// *************//************//***************
// *************//************//***************
// *************//************//***************

// *************//************//***************
// *************//************//***************
// *************//************//***************

// *************//************//***************
// *************//************//***************
// *************//************//***************

// *************//************//***************
// *************//************//***************
// *************//************//***************

// *************//************//***************
// *************//************//***************
// *************//************//***************

// *************//************//***************
// *************//************//***************
// *************//************//***************
// PUNTOS DE ACCESO
// *************//************//***************
// *************//************//***************
// *************//************//***************

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_iniciales
	// DESCRIPCION..: Metodos que se ejecutan al iniciar la pantalla
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Texto_status.generahtml()',
		'Texto_status.imprimehtml()',
		'Texto_id.generahtml()',
		'Texto_id.imprimehtml()',
		'Texto_nombre.generahtml()',
		'Texto_nombre.imprimehtml()',
		'Modal_aviso.abrefijo()',
		'Consulta_gradilla.ejecuta_2()'
	
	]
		
	var Metodos_iniciales = new Metodos(configuraciones, codigos, elementos);
	
	Metodos_iniciales.ejecuta();
	


</script>
