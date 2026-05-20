<?php
	require_once("../pantalib/php/objetos/Sistema.php");
	header('Content-Type: text/html; charset=UTF-8');
	session_start();
	
	// INICIA PROCESO PARA ESTABLECER IDIOMA DE SISTEMA
	
	if (isset($_SESSION['Sistema'])) {
	}
	else {
		$_SESSION['Sistema'] = new Sistema(1, "laboratorio", 0);
	}
?>
<HTML>
	<HEAD>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>
		<link rel="stylesheet" href="../pantalib/css/pantalasa_taller.css">
		<link rel="stylesheet" href="../pantalib/css/pantalasa_taller_filelist.css">
		<link rel="stylesheet" href="../pantalib/css/gris_css.css">
		<link rel="stylesheet" href="../pantalib/css/blanco_css.css">
		<link rel="stylesheet" href="../pantalib/css/negro_css.css">
		<link rel="stylesheet" href="../pantalib/css/groove_css.css">
		<link rel="stylesheet" href="../pantalib/css/crosscfc_modal.css">
		<link rel="stylesheet" href="../pantalib/css/gradilla38_taller.css">
		<link rel="stylesheet" href="../pantalib/fontawesome/css/all.css">
		<script src="../pantalib/jquery/jquery.js"></script>
		<script src="../pantalib/javascript/objetos/System.js"></script>
		<script src="../pantalib/javascript/objetos/Pantalla.js"></script>
		<script src="../pantalib/javascript/objetos/Maqueta.js"></script>
		<script src="../pantalib/javascript/objetos/Formulario.js"></script>
		<script src="../pantalib/javascript/objetos/Control.js"></script>
		<script src="../pantalib/javascript/objetos/Filelist.js"></script>
		<script src="../pantalib/javascript/objetos/Modal.js"></script>
		<script src="../pantalib/javascript/objetos/Setestilos2.js"></script>
		<script src="../pantalib/javascript/objetos/Nodo.js"></script>
		<script src="../pantalib/javascript/objetos/Listacheckbox.js"></script>
		<script src="../pantalib/javascript/objetos/Consulta.js"></script>
		<script src="../pantalib/javascript/objetos/Gradilla3.js"></script>
		<script src="../pantalib/javascript/objetos/Arreglos.js"></script>
		<script src="../pantalib/javascript/objetos/Imprimible.js"></script>
		<script src="../pantalib/javascript/objetos/Factura.js"></script>
		<script src="../pantalib/javascript/objetos/Cotizacion.js"></script>
		<script src="../pantalib/javascript/objetos/Documento.js"></script>
	</HEAD>
	<BODY class="pantalasa_maqueta" id="maqueta_formulario_filelist">
		LABORATORIO DE FORMULARIO Y VARIOS FILELIST
	</BODY>
</HTML>

<script>
// ****************************************************************
// ****************************************************************
// ESTABLECE VARIABLES GENERALES
// ****************************************************************
// ****************************************************************

var acumula_html = "";
var idioma = '<?php echo $_SESSION['Sistema'] -> idiomasistema; ?>';
var idioma = 2;
var orden_progresivo = 0;


var titulo_modal = "";
var aviso_modal = "";
var idrecord = 0;
var datetimerecord = "";
var namerecord = "";
var positionrecord = "";
var companyrecord = "";
var subjectrecord = "";
var phonerecord = "";
var mailrecord = "";
var filerecord = "";
var statusrecord = 0;
var textrecord = "";
var textstatus = 0;

// ****************************************************************
// ****************************************************************
// ESTABLECE SISTEMA 
// ****************************************************************
// ****************************************************************

// OBEJTO 1 Sistema "taller_laboratorio"
	var Sistema_taller = new System(1, "taller_laboratorio", "PANTALASA", "TALLER LABORTAORIO", "");

// ****************************************************************
// ****************************************************************
// ESTABLECE PANTALLA
// ****************************************************************
// ****************************************************************

// OBEJTO 2 Pantalla "FORMULARIO CON DOS FILELIST"

	var objetos_pantalla = [];
	var Pantalla_formulario_filelist = new Pantalla(idioma, 1, "index.php", "FORMULARIO DOS FILELIST", "", "", objetos_pantalla, "");
// ****************************************************************
// ****************************************************************
// MAQUETA PRINCIPAL
// ****************************************************************
// ****************************************************************

// OBJETO 3 Maqueta MAQUETA_PRINCIPAL_TALLER que es la maqueta principal de 4 posiciones
	var inglesIdioma = ["THIS IS THE PANTALASA WORKSHOP SCREEN", "BODY", "FOOT"];
	var espanolIdioma = ["ESTA ES LA PANTALLA DE TALLER PANTALASA", "CUERPO", "PIE"];
	var portuguesIdioma = ["ESSA É A TELA DO WORKSHOP PANTALASA", "CORPO", "PÉ"];
	var francesIdioma = ["C'EST L'ÉCRAN DE L'ATELIER PANTALASA", "CORPS", "PIED"];
	var alemanIdioma = ["DIES IST DER BILDSCHIRM DER PANTALASA-WERKSTATT", "KÖRPER", "FUSS"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var parametros01 = ["area_taller", "area_taller", "area_taller"];
	var parametros02 = ["ID_CABEZA_TALLER", "ID_CUERPO_TALLER", "ID_PIE_TALLER"];
	var parametros = [parametros01, parametros02, 1];
	var Maqueta_principal = new Maqueta(controlIdioma, 3, parametros, "contenedor_maqueta_taller", "MAQUETA_PRINCIPAL_TALLER", "#maqueta_formulario_filelist", "");
	Maqueta_principal.generahtml();
	Maqueta_principal.imprimehtml();
	Pantalla_formulario_filelist.objetos.push(Maqueta_principal);

// ****************************************************************
// ****************************************************************
// FORMULARIO
// ****************************************************************
// ****************************************************************

// OBEJTO 10 Formulario ID_FORMULARIO para establecer variables para la validación
// y envio de formulario, se inserta en la clase cuerpo_01 
	var inglesIdioma = ["THE FIELDS: ", "THE FIELD: ", "ARE REQUIRED. "," IS REQUIRED. "," SENDING. "," THE MESSAGE IS BEING SENT. WAIT A MOMENT. "];
	var espanolIdioma = ["LOS CAMPOS: ", "EL CAMPO: ", "SON OBLIGATORIOS. ", "ES OBLIGATORIO. ", "ENVIANDO. ", "EL MENSAJE ESTA SIENDO ENVIADO. ESPERE UN MOMENTO. "];
	var portuguesIdioma = ["OS CAMPOS: ", "O CAMPO: ", "SÃO OBRIGATÓRIOS. "," É OBRIGATÓRIO. "," ENVIANDO. "," A MENSAGEM ESTÁ SENDO ENVIADA. AGUARDE UM MOMENTO. "];
	var francesIdioma = ["LES CHAMPS : ", "LE CHAMP : ", "SONT OBLIGATOIRES. "," EST OBLIGATOIRE. "," ENVOI. "," LE MESSAGE EST EN COURS D'ENVOI. ATTENDEZ UN MOMENT. "];
	var alemanIdioma = ["DIE FELDER: ", "DAS FELD:", "SIND ERFORDERLICH. ", "ES ZWINGEND ERFORDERLICH IST. ", "SENDEN. ", "DIE NACHRICHT WIRD GESENDET. WARTEN SIE EINEN MOMENT. "];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
    var especificaciones = [controlIdioma, "php/envia_formulario.php", "post", 5, 0, 0, "", "", 0, 0, "esta es prueba", 1];
	var camposFormularioNombre = ["numero", "nombre", "descripcion", "lista_01", "lista_02"];
	var camposFormularioTipo = [9, 2, 2, 11, 11];
	var camposFormularioId = ["ID_FORMULARIO_CAMPO_NUMERO", "ID_FORMULARIO_CAMPO_NOMBRE", "ID_FORMULARIO_CAMPO_DESCRIPCION", "ID_CAMPO_DESCRIPCION_LISTA_01", "ID_CAMPO_DESCRIPCION_LISTA_02"];
	var camposFormularioValorInicial = [0, "", "", "", ""];
	var camposFormularioObligatorio = [1, 1, 0, 0, 1];
	var camposFormularioTipoValor = [2, 1, 1, 4, 4];
	var camposFormularioObjetos = ["", "", "", "", ""];
	var camposFormulario = [camposFormularioNombre, camposFormularioTipo, camposFormularioId, camposFormularioValorInicial, camposFormularioObligatorio, camposFormularioTipoValor, camposFormularioObjetos];
	var html = ["formulario_taller", "ID_FORMULARIO_TALLER", "#ID_CUERPO_TALLER", ""];
	var Formulario = new Formulario(especificaciones, camposFormulario, html);
	Formulario.generahtml();
	Formulario.imprimehtml();
	Pantalla_formulario_filelist.objetos.push(Formulario);

// ****************************************************************
// ****************************************************************
// MAQUETA FORMULARIO
// ****************************************************************
// ****************************************************************

// OBEJTO 11 Maqueta MAQUETA_CONTENEDOR_FORMULARIO maqueta de 5 elementos para organizar el formulario
// se inserta en el id ID_FORMULARIO
	var inglesIdioma = ["WORK AREA. FORM EXERCISE AND TWO FILELIST", "GENERAL", "GENERAL DOS", "LIST 1", "LIST 2", "AREA 1", "AREA 2", "AREA 3", "<img src='../dora/src/app/componentes/Logo/logo.jpg'>", "BUTTONS"];
	var espanolIdioma = ["AREA DE TRABAJO. EJERCICIO FORMULARIO Y DOS FILELIST", "GENERALES", "GENERALES 2", "LISTA 1", "LISTA 2", "AREA 1", "AREA 2", "AREA 3", "AREA 4", "BOTONES"];
	var portuguesIdioma = ["ÁREA DE TRABALHO. FORMA DE EXERCÍCIO E DUAS FILELISTAS", "GERAIS", "GERAIS 2", "LISTA 1", "LISTA 2", "AREA 1", "AREA 2", "AREA 3", "AREA 4", "BOTÕES"];
	var francesIdioma = ["ZONE DE TRAVAIL. FORMULAIRE EXERCICE ET DEUX LISTE DE FICHIER", "GÉNÉRAL", "GÉNÉRAL 2", "LISTE 1", "LISTE 2", "AREA 1", "AREA 2", "AREA 3", "AREA 4", "BOUTONS"];
	var alemanIdioma = ["ARBEITSBEREICH. FORMÜBUNG UND ZWEI DATEILISTE", "ALLGEMEIN", "ALLGEMEIN 2", "LISTE 1", "LISTE 2", "AREA 1", "AREA 2", "AREA 3", "AREA 4", "TASTEN"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var parametros01 = ["formulario_titulo", "formulario_generales", "formulario_generales_2", "formulario_lista_01", "formulario_lista_02", "formulario_area_controles", "formulario_area_controles", "formulario_area_controles", "formulario_area_controles", "formulario_botones"];
	var parametros02 = ["ID_FORMULARIO_TITULO", "ID_FORMULARIO_GENERALES", "ID_FORMULARIO_GENERALES_2", "ID_FORMULARIO_LISTA_01", "ID_FORMULARIO_LISTA_02", "ID_FORMULARIO_AREA_01", "ID_FORMULARIO_AREA_02", "ID_FORMULARIO_AREA_03", "ID_FORMULARIO_AREA_04", "ID_FORMULARIO_BOTONES"];
	var parametros = [parametros01, parametros02, 1];
	var Maqueta_formulario = new Maqueta(controlIdioma, 10, parametros, "contenedor_formulario", "MAQUETA_CONTENEDOR_FORMULARIO", "#ID_FORMULARIO_TALLER", "");
	Maqueta_formulario.generahtml();
	Maqueta_formulario.imprimehtml();
	Pantalla_formulario_filelist.objetos.push(Maqueta_formulario);

// OBEJTO 13 Maqueta MAQUETA_CONTENEDOR_GENERALES maqueta de 6 elementos para organizar el generales
// que se inserta en ID_FORMULARIO_GENERALES
	var inglesIdioma = ["NUMBER (*):", "", "NAME (*):", "", "DESCRIPTION:", ""];
	var espanolIdioma = ["NÚMERO (*):", "", "NOMBRE (*):", "", "DESCRIPCIÓN:", ""];
	var portuguesIdioma = ["NÚMERO (*):", "", "NOME (*):", "", "DESCRIÇÃO:", ""];
	var francesIdioma = ["NUMERO (*) :", "", "NOM (*) :", "", "DESCRIPTION :", ""];
	var alemanIdioma = ["NUMMER (*):", "", "NAME (*):", "", "BESCHREIBUNG:", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var parametros01 = ["formulario_control_label", "formulario_control_numero", "formulario_control_label", "formulario_control_text", "formulario_control_label", "formulario_control_text"];
	var parametros02 = ["ID_FORMULARIO_NUMERO_LABEL", "ID_FORMULARIO_NUMERO_NUMERO", "ID_FORMULARIO_NOMBRE_LABEL", "ID_FORMULARIO_NOMBRE_TEXT", "ID_FORMULARIO_DESCRIPCION_LABEL", "ID_FORMULARIO_DESCRIPCION_TEXT"];
	var parametros = [parametros01, parametros02, 1];
	var Maqueta_generales = new Maqueta(controlIdioma, 6, parametros, "contenedor_generales", "MAQUETA_CONTENEDOR_GENERALES", "#ID_FORMULARIO_GENERALES", "");
	Maqueta_generales.generahtml();
	Maqueta_generales.imprimehtml();
	Pantalla_formulario_filelist.objetos.push(Maqueta_generales);

// OBEJTO ? Control CONTROL DE TIPO 9 INPUT NUMBER: ID_EDAD_FORMULARIO para capturar edad
// que se inserta en ID_FORMULARIO_EDAD_TEXT
	var inglesIdioma = ["NUMBER"];
	var espanolIdioma = ["NÚMERO"];
	var portuguesIdioma = ["NÚMERO"];
	var francesIdioma = ["NUMERO"];
	var alemanIdioma = ["NUMMER"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var contenedorControl = [0, "", ""];
	var valor = [0, "", 0, "", 30, "", 0];
	var metodos = ["", "NumeroFormulario.recogevalor()"];
	var html = ["formulario_campo_numero formulario_number", "ID_FORMULARIO_CAMPO_NUMERO", "#ID_FORMULARIO_NUMERO_NUMERO", "", "numero", 1];
	var NumeroFormulario = new Control(controlIdioma, contenedorControl, 0, 9, valor, metodos, html);
	NumeroFormulario.generahtml();
	NumeroFormulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = NumeroFormulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(NumeroFormulario);

// OBEJTO 14 Control CONTROL DE TIPO 2 INPUT : ID_NAME_FORMULARIO para capturar nombre
// que se inserta en ID_FORMULARIO_NAME_TEXT
	var inglesIdioma = ["NAME"];
	var espanolIdioma = ["NOMBRE"];
	var portuguesIdioma = ["NOME"];
	var francesIdioma = ["NOM"];
	var alemanIdioma = ["NAME"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var contenedorControl = [0, "", ""];
	var valor = [0, "", 0, "", 30, "", 0];
	var metodos = ["", "NombreFormulario.recogevalor()"];
	var html = ["formulario_campo_nombre formulario_campo_text", "ID_FORMULARIO_CAMPO_NOMBRE", "#ID_FORMULARIO_NOMBRE_TEXT", "", "nombre", 1];
	var NombreFormulario = new Control(controlIdioma, contenedorControl, 0, 2, valor, metodos, html);
	NombreFormulario.generahtml();
	NombreFormulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = NombreFormulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(NombreFormulario);

// OBEJTO 14 Control CONTROL DE TIPO 2 INPUT : ID_NAME_FORMULARIO para capturar nombre
// que se inserta en ID_FORMULARIO_NAME_TEXT
	var inglesIdioma = ["DESCRIPTION"];
	var espanolIdioma = ["DESCRIPCIÓN"];
	var portuguesIdioma = ["DESCRIÇÃO"];
	var francesIdioma = ["DESCRIPTION"];
	var alemanIdioma = ["BESCHREIBUNG"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var contenedorControl = [0, "", ""];
	var valor = [0, "", 0, "", 30, "", 0];
	var metodos = ["", "DescripcionFormulario.recogevalor()"];
	var html = ["formulario_campo_descripcion formulario_campo_text", "ID_FORMULARIO_CAMPO_DESCRIPCION", "#ID_FORMULARIO_DESCRIPCION_TEXT", "", "descripcion"];
	var DescripcionFormulario = new Control(controlIdioma, contenedorControl, 0, 2, valor, metodos, html, 1);
	DescripcionFormulario.generahtml();
	DescripcionFormulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = DescripcionFormulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(DescripcionFormulario);

// OBEJTO 2 Maqueta MAQUETA_CONTENEDOR_GENERALES maqueta de 6 elementos para organizar el generales 2
// que se inserta en ID_FORMULARIO_GENERALES
	var inglesIdioma = ["COLORS (*):", "", "DATE ​​(*):", "", "LANGUAGES:", ""];
	var espanolIdioma = ["COLORES (*):", "", "FECHA (*):", "", "IDIOMAS:", ""];
	var portuguesIdioma = ["CORES (*):", "", "DATA (*):", "", "IDIOMAS:", ""];
	var francesIdioma = ["COULEURS (*) :", "", "DATE(*) :", "", "LANGUES :", ""];
	var alemanIdioma = ["FARBEN (*):", "", "DATUM (*):", "", "SPRACHEN:", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var parametros01 = ["formulario_control_label", "formulario_control_radius", "formulario_control_label", "formulario_control_fecha", "formulario_control_label", "formulario_control_combo"];
	var parametros02 = ["ID_FORMULARIO_COLORES_LABEL", "ID_FORMULARIO_COLORES_RADIUS", "ID_FORMULARIO_FECHA_LABEL", "ID_FORMULARIO_FECHA_FECHA", "ID_FORMULARIO_IDIOMAS_LABEL", "ID_FORMULARIO_IDIOMAS_COMBO"];
	var parametros = [parametros01, parametros02, 1];
	var Maqueta_generales_2 = new Maqueta(controlIdioma, 6, parametros, "contenedor_generales", "MAQUETA_CONTENEDOR_GENERALES_2", "#ID_FORMULARIO_GENERALES_2", "");
	Maqueta_generales_2.generahtml();
	Maqueta_generales_2.imprimehtml();
	Pantalla_formulario_filelist.objetos.push(Maqueta_generales_2);

// NUM: ?
// OBEJTO: Control
// TIPO: 7 RADIO BUTTON
// ID: ID_COLORES_FORMULARIO
// SE COLOCA DENTRO: ID_FORMULARIO_COLORES_RADIUS
// DESCRIPCIÓN: Botones de radio para decidir color

	var inglesIdioma = ["COLORS", " Grey ", " White ", " Black ", " Groove ", "COLORS (*): "];
	var espanolIdioma = ["COLORES", " Gris ", " Blanco ", " Negro ", " Groove ", "COLORES (*): "];
	var portuguesIdioma = ["CORES", " Cinza ", " Branco ", " Preto ", " Groove ", "CORES (*): "];
	var francesIdioma = ["COULEURS", " Gris ", " Blanc ", " Noir ", " Groove ", "COULEURS (*): "];
	var alemanIdioma = ["FARBEN", " Grau ", " Weiß ", " Schwarz ", " Groove ", "FARBEN (*):"];
	var efeIdioma = ["CoLOROFO", " xxxx ", " hhhh ", " jjjj ", " ggggg ", "hhhhh (*):"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma, efeIdioma];
	var controlIdioma = [5, arregloIdioma, 0];
	var contenedorControl = [0, "", ""];
	var opcionesvalor = [1, 2, 3, 4];
	var valor = [1, "", 1, "", 4, "", 0, opcionesvalor, 1];
	var onclick = ["ColoresFormulario.recogevalor_p(0), Estilos.actualizaset(1), Estilos.imprimehtml()", "ColoresFormulario.recogevalor_p(1), Estilos.actualizaset(2), Estilos.imprimehtml()", "ColoresFormulario.recogevalor_p(2), Estilos.actualizaset(3), Estilos.imprimehtml()", "ColoresFormulario.recogevalor_p(3), Estilos.actualizaset(4), Estilos.imprimehtml()"];
	var onchange = ["ColoresFormulario.recogevalor()", "ColoresFormulario.recogevalor()", "ColoresFormulario.recogevalor()", "ColoresFormulario.recogevalor()"];
	var metodos = [onclick, onchange];
	var html = ["formulario_campo_radius formulario_radius", "ID_FORMULARIO_CAMPO_COLORES", "#ID_FORMULARIO_COLORES_RADIUS", "", "colores", 1];
	var ColoresFormulario = new Control(controlIdioma, contenedorControl, 3, 7, valor, metodos, html);
	ColoresFormulario.generahtml();
	ColoresFormulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = ColoresFormulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(ColoresFormulario);

// NUM: ?
// OBEJTO: Control
// TIPO: 12 DATE (FECHA)
// ID: ID_FECHA_FORMULARIO
// SE COLOCA DENTRO: ID_FORMULARIO_FECHA_FECHA
// DESCRIPCIÓN: Control de tipo date para capturar una fecha

	var inglesIdioma = ["DATE"];
	var espanolIdioma = ["FECHA"];
	var portuguesIdioma = ["FECHA"];
	var francesIdioma = ["FECHA"];
	var alemanIdioma = ["FECHA"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var contenedorControl = [0, "", ""];
	var valor = [0, "2018-07-22", 0, "2018-07-22", 30, "", 0];
	var metodos = ["", "FechaFormulario.recogevalor()"];
	var html = ["formulario_campo_fecha formulario_fecha", "ID_FORMULARIO_CAMPO_FECHA", "#ID_FORMULARIO_FECHA_FECHA", "", "fecha", 1];
	var FechaFormulario = new Control(controlIdioma, contenedorControl, 0, 12, valor, metodos, html);
	FechaFormulario.generahtml();
	FechaFormulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = FechaFormulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(FechaFormulario);

// NUM: ?
// OBEJTO: Control
// TIPO: 8 LISTA TENDEDERO
// ID: ID_IDIOMAS_FORMULARIO
// SE COLOCA DENTRO: ID_FORMULARIO_IDIOMAS_COMBO
// DESCRIPCIÓN: Lista tendedero en combo para decidir idioma

	var inglesIdioma = ["IDIOMA", "English", "Spanish", "Portuguese", "French", "German", "IDIOMA: "];
	var espanolIdioma = ["IDIOMA", "Ingles", "Español", "Portugues", "Frances", "Aleman", "IDIOMA: "];
	var portuguesIdioma = ["IDIOMA", "inglês", "espanhol", "português", "francês", "alemão", "IDIOMA: "];
	var francesIdioma = ["IDIOMA", "Anglais", "Espagnol", "Portugais", "Français", "Allemand", "IDIOMA: "];
	var alemanIdioma = ["IDIOMA", "Englisch", "Spanisch", "Portugiesisch", "Französisch", "Deutsch", "IDIOMA: "];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma, 0];
	var contenedorControl = [0, "", ""];
	var opcionesvalor = [0, 1, 2, 3, 4];
	var valor = [idioma, "", idioma, "", 5, "", 0, opcionesvalor, 1];
	var metodos = ["", "IdiomaFormulario.recogevalor(), Pantalla_formulario_filelist.idiomalocal(IdiomaFormulario.valor[2]), Pantalla_formulario_filelist.traduce(), Estilos.imprimehtml(), ListaCheckbox.normaliza_estructura()"];
	var html = ["formulario_campo_listcombo formulario_listcombo", "ID_FORMULARIO_CAMPO_IDIOMAS", "#ID_FORMULARIO_IDIOMAS_COMBO", "", "idiomas", 1];
	var IdiomaFormulario = new Control(controlIdioma, contenedorControl, 0, 8, valor, metodos, html);
	IdiomaFormulario.generahtml();
	IdiomaFormulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = IdiomaFormulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(IdiomaFormulario);

///////////////// INPUT FILE //////////////////++++++++************************

	var inglesIdioma = ["FILE LIST ONE", "BODY FILELIST", "BUTON FILELIST", "FOOT FILELIST", "ADD FILE", "", "", "FILE LIST ONE"];
	var espanolIdioma = ["LISTA DE ARCHIVOS UNO", "CUERPO DE FILELIST", "BOTON DE FILELIST", "PIE DE FILELIST", "AÑADIR ARCHIVO", "", "", "LISTA DE ARCHIVOS UNO"];
	var portuguesIdioma = ["LISTA DE ARQUIVOS UM", "CORPO DE FILELIST", "BOTÃO FILELIST", "PÉ DE FILELIST", "SEUBE ARCHIVU", "", "", "LISTA DE ARQUIVOS UM"];
	var francesIdioma = ["LISTE DE FICHIER UN", "CORPS LISTE FICHIER", "BOUTON LISTE FICHIER", "PIED LISTE FICHIER", "AJOUTER FICHIER", "", "", "LISTE FICHIER UN"];
	var alemanIdioma = ["AKTENLISTE EINS", "DATEILISTENKÖRPER", "DATEILISTENSCHALTER", "DATEILISTENFUSS", "DATEI HINZUFÜGEN", "", "", "DATEILISTE EINS"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var areas = [1, 1, 1, 1];
	var contenedores = [0, "", "", areas];
	var valor = [0, "", 0, "", 0, "Lista01Formulario", 0];
	var metodos = ["Lista01Formulario.clickescondido(), Lista01Formulario.anadebuton()", "Lista01Formulario.cambiavalor()"];
	var html = ["filelist_maqueta", "ID_FILELIST_MAQUETA", "#ID_FORMULARIO_LISTA_01", "", "lista01", "link_boton_formulario_medio", 1];
	var elementos = [0];
	var Lista01Formulario = new Filelist(controlIdioma, contenedores, 0, 11, valor, metodos, html, elementos);
	Lista01Formulario.generahtml();
	Lista01Formulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = Lista01Formulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(Lista01Formulario);

	var inglesIdioma = ["FILE LIST TWO (*)", "BODY FILELIST", "BUTON FILELIST", "FOOT FILELIST", "ADD FILE", "", "", "FILE LIST TWO"];
	var espanolIdioma = ["LISTA DE ARCHIVOS DOS (*)", "CUERPO DE FILELIST", "BOTON DE FILELIST", "PIE DE FILELIST", "AÑADIR ARCHIVO", "", "", "LISTA DE ARCHIVOS DOS"];
	var portuguesIdioma = ["LISTA DE ARQUIVOS DOIS (*)", "CORPO DE FILELIST", "BOTÃO FILELIST", "PÉ DE FILELIST", "SEUBE ARCHIVU", "", "", "LISTA DE ARQUIVOS DOIS"];
	var francesIdioma = ["LISTE DE FICHIER DEUX (*)", "CORPS LISTE FICHIER", "BOUTON LISTE FICHIER", "PIED LISTE FICHIER", "AJOUTER FICHIER", "", "", "LISTE DE FICHIER DEUX"];
	var alemanIdioma = ["AKTENLISTE ZWEI (*)", "DATEILISTENKÖRPER", "DATEILISTENSCHALTER", "DATEILISTENFUSS", "DATEI HINZUFÜGEN", "", "", "DATEILISTE ZWEI"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var areas = [1, 1, 1, 1];
	var contenedores = [0, "", "", areas];
	var valor = [0, "", 0, "", 0, "Lista02Formulario", 0];
	var metodos = ["Lista02Formulario.clickescondido(), Lista02Formulario.anadebuton()", "Lista02Formulario.cambiavalor()"];
	var html = ["filelist_maqueta", "ID_FILELIST02_MAQUETA", "#ID_FORMULARIO_LISTA_02", "", "lista02", "link_boton_formulario_medio", 1];
	var elementos = [0];
	var Lista02Formulario = new Filelist(controlIdioma, contenedores, 0, 11, valor, metodos, html, elementos);
	Lista02Formulario.generahtml();
	Lista02Formulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = Lista02Formulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(Lista02Formulario);

////////////////////////////////////////////////////////////////////////////
///////////////// AREA 01 PARA CHECHBOX ////////////////////////////////////
////////////////////////////////////////////////////////////////////////////

// NUM: ?
// OBEJTO: Maqueta
// ID: MAQUETA_CONTENEDOR_CHECKBOX
// SE COLOCA DENTRO: ID_FORMULARIO_AREA_01
// DESCRIPCIÓN: Maqueta de QUINCE posiciones para controlar una serie de seis checkbox de cuatro niveles

	var inglesIdioma = ["", "AMÉRICA", "", "NORTAMERICA", "", "MEXICO", "", "SURESTE", "", "EU", "", "MIDWEST", "AFRICA", "", "NORTAFRICA", "", "CENTRALAFRICA", "ASIA"];
	var espanolIdioma = ["", "AMÉRICA", "", "NORTAMERICA", "", "MEXICO", "", "SURESTE", "", "EU", "", "MIDWEST", "AFRICA", "", "NORTAFRICA", "", "CENTRALAFRICA", "ASIA"];
	var portuguesIdioma = ["", "AMÉRICA", "", "NORTAMERICA", "", "MEXICO", "", "SURESTE", "", "EU", "", "MIDWEST", "AFRICA", "", "NORTAFRICA", "", "CENTRALAFRICA", "ASIA"];
	var francesIdioma = ["", "AMÉRICA", "", "NORTAMERICA", "", "MEXICO", "", "SURESTE", "", "EU", "", "MIDWEST", "AFRICA", "", "NORTAFRICA", "", "CENTRALAFRICA", "ASIA"];
	var alemanIdioma = ["", "AMÉRICA", "", "NORTAMERICA", "", "MEXICO", "", "SURESTE", "", "EU", "", "MIDWEST", "AFRICA", "", "NORTAFRICA", "", "CENTRALAFRICA", "ASIA"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var parametros01 = ["formulario_espacio_indent", "formulario_control_check_primer", "formulario_control_check_espacio", "formulario_control_check_segundo", "formulario_control_check_espacio2", "formulario_control_check_tercero", "formulario_control_check_espacio3", "formulario_control_check_cuarto", "formulario_control_check_espacio", "formulario_control_check_segundo", "formulario_control_check_espacio", "formulario_control_check_tercero", "formulario_control_check_primer", "formulario_control_check_espacio", "formulario_control_check_segundo", "formulario_control_check_espacio", "formulario_control_check_segundo", "formulario_control_check_primer"];
	var parametros02 = ["ID_MUNDO", "ID_AMERICA_CHECK", "ID_NORTAMERICA_ESPACIO", "ID_NORTAMERICA_CHECK", "ID_MEXICO_ESPACIO", "ID_MEXICO_CHECK", "ID_SURESTE_ESPACIO", "ID_SURESTE_CHECK", "ID_EU_ESPACIO", "ID_EU_CHECK", "ID_MIDWEST_ESPACIO", "ID_MIDWEST_CHECK", "ID_AFRICA_CHECK", "ID_NORTAFRICA_ESPACIO", "ID_NORTAFRICA_CHECK", "ID_CENTRALAFRICA_ESPACIO", "ID_CENTRALAFRICA_CHECK", "ID_ASIA_CHECK"];
	var parametros = [parametros01, parametros02, 1];
	var Maqueta_generales_2 = new Maqueta(controlIdioma, 18, parametros, "contenedor_areacheckbox", "MAQUETA_CONTENEDOR_CHECKBOX", "#ID_FORMULARIO_AREA_01", "");
	Maqueta_generales_2.generahtml();
	Maqueta_generales_2.imprimehtml();
	Pantalla_formulario_filelist.objetos.push(Maqueta_generales_2);

// NUM: ?
// OBEJTO: Control
// TIPO: 13 CHECKBOX
// ID: ID_FORMULARIO_CAMPO_AMERICA
// SE COLOCA DENTRO: #ID_AMERICA_CHECK
// DESCRIPCIÓN: Checkbox para seleccionar América

	var inglesIdioma = [" AMERICA"];
	var espanolIdioma = [" AMÉRICA"];
	var portuguesIdioma = [" AMÉRICA"];
	var francesIdioma = [" AMÉRIQUE"];
	var alemanIdioma = [" AMERIKA"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var contenedorControl = [0, "", ""];
	var valor = [0, "", 1, "", 30, "", 0];
	var metodos = ["ListaCheckbox.aplicareglas([2, 1, 1, 0, 1, AmericaFormulario])", "AmericaFormulario.recogevalor()"];
	var html = ["formulario_campo_america formulario_campo_check", "ID_FORMULARIO_CAMPO_AMERICA", "#ID_AMERICA_CHECK", "", "america", 1];
	var AmericaFormulario = new Control(controlIdioma, contenedorControl, 0, 13, valor, metodos, html);
	AmericaFormulario.generahtml();
	AmericaFormulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = AmericaFormulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(AmericaFormulario);

// NUM: ?
// OBEJTO: Control
// TIPO: 13 CHECKBOX
// ID: ID_FORMULARIO_CAMPO_NORTAMERICA
// SE COLOCA DENTRO: #ID_NORTAMERICA_CHECK
// DESCRIPCIÓN: Checkbox para seleccionar Norte América

	var inglesIdioma = [" NORTH AMERICA"];
	var espanolIdioma = [" AMÉRICA DEL NORTE"];
	var portuguesIdioma = [" AMÉRICA DO NORTE"];
	var francesIdioma = [" AMÉRIQUE DU NORD"];
	var alemanIdioma = [" NORDAMERIKA"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var contenedorControl = [0, "", ""];
	var valor = [0, "", 0, "", 30, "", 0];
	var metodos = ["ListaCheckbox.aplicareglas([2, 4, 2, 1, 2, NortAmericaFormulario])", "NortAmericaFormulario.recogevalor()"];
	var html = ["formulario_campo_nortamerica formulario_campo_check", "ID_FORMULARIO_CAMPO_NORTAMERICA", "#ID_NORTAMERICA_CHECK", "", "nortamerica", 1];
	var NortAmericaFormulario = new Control(controlIdioma, contenedorControl, 0, 13, valor, metodos, html);
	NortAmericaFormulario.generahtml();
	NortAmericaFormulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = NortAmericaFormulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(NortAmericaFormulario);

// NUM: ?
// OBEJTO: Control
// TIPO: 13 CHECKBOX
// ID: ID_FORMULARIO_CAMPO_MEXICO
// SE COLOCA DENTRO: #ID_MEXICO_CHECK
// DESCRIPCIÓN: Checkbox para seleccionar Norte México

	var inglesIdioma = [" MEXICO"];
	var espanolIdioma = [" MÉXICO"];
	var portuguesIdioma = [" MÉXICO"];
	var francesIdioma = [" MEXIQUE"];
	var alemanIdioma = [" MEXIKO"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var contenedorControl = [0, "", ""];
	var valor = [0, "", 1, "", 30, "", 0];
	var metodos = ["ListaCheckbox.aplicareglas([2, 7, 4, 4, 1, MexicoFormulario])", "MexicoFormulario.recogevalor()"];
	var html = ["formulario_campo_mexico formulario_campo_check", "ID_FORMULARIO_CAMPO_MEXICO", "#ID_MEXICO_CHECK", "", "mexico", 1];
	var MexicoFormulario = new Control(controlIdioma, contenedorControl, 0, 13, valor, metodos, html);
	MexicoFormulario.generahtml();
	MexicoFormulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = MexicoFormulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(MexicoFormulario);

// NUM: ?
// OBEJTO: Control
// TIPO: 13 CHECKBOX
// ID: ID_FORMULARIO_CAMPO_SURESTE
// SE COLOCA DENTRO: #ID_SURESTE_CHECK
// DESCRIPCIÓN: Checkbox para seleccionar Norte Sureste

	var inglesIdioma = [" SOUTHEAST"];
	var espanolIdioma = [" SURESTE"];
	var portuguesIdioma = [" SUDESTE"];
	var francesIdioma = [" SUD-EST"];
	var alemanIdioma = [" SÜD-OST"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var contenedorControl = [0, "", ""];
	var valor = [0, "", 1, "", 30, "", 0];
	var metodos = ["ListaCheckbox.aplicareglas([2, 9, 5, 7, 0, SuresteFormulario])", "SuresteFormulario.recogevalor()"];
	var html = ["formulario_campo_sureste formulario_campo_check", "ID_FORMULARIO_CAMPO_SURESTE", "#ID_SURESTE_CHECK", "", "sureste", 1];
	var SuresteFormulario = new Control(controlIdioma, contenedorControl, 0, 13, valor, metodos, html);
	SuresteFormulario.generahtml();
	SuresteFormulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = SuresteFormulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(SuresteFormulario);

// NUM: ?
// OBEJTO: Control
// TIPO: 13 CHECKBOX
// ID: ID_FORMULARIO_CAMPO_EU
// SE COLOCA DENTRO: #ID_EU_CHECK
// DESCRIPCIÓN: Checkbox para seleccionar Norte EU

	var inglesIdioma = [" USA"];
	var espanolIdioma = [" EE.UU"];
	var portuguesIdioma = [" EUA"];
	var francesIdioma = [" ETATS-UNIS"];
	var alemanIdioma = [" EUA"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var contenedorControl = [0, "", ""];
	var valor = [0, "", 1, "", 30, "", 0];
	var metodos = ["ListaCheckbox.aplicareglas([2, 8, 4, 4, 1, EuFormulario])", "EuFormulario.recogevalor()"];
	var html = ["formulario_campo_eu formulario_campo_check", "ID_FORMULARIO_CAMPO_EU", "#ID_EU_CHECK", "", "eu", 1];
	var EuFormulario = new Control(controlIdioma, contenedorControl, 0, 13, valor, metodos, html);
	EuFormulario.generahtml();
	EuFormulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = EuFormulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(EuFormulario);

// NUM: ?
// OBEJTO: Control
// TIPO: 13 CHECKBOX
// ID: ID_FORMULARIO_CAMPO_MIDWEST
// SE COLOCA DENTRO: #ID_MIDWEST_CHECK
// DESCRIPCIÓN: Checkbox para seleccionar Midwest de EU

	var inglesIdioma = [" MIDWEST"];
	var espanolIdioma = [" MEDIO OESTE"];
	var portuguesIdioma = [" CENTRO OESTE"];
	var francesIdioma = [" MOYEN-OUEST"];
	var alemanIdioma = [" MITTLERER WESTEN"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var contenedorControl = [0, "", ""];
	var valor = [0, "", 1, "", 30, "", 0];
	var metodos = ["ListaCheckbox.aplicareglas([2, 10, 5, 8, 0, MidwestFormulario])", "MidwestFormulario.recogevalor()"];
	var html = ["formulario_campo_midwest formulario_campo_check", "ID_FORMULARIO_CAMPO_MIDWEST", "#ID_MIDWEST_CHECK", "", "midwest", 1];
	var MidwestFormulario = new Control(controlIdioma, contenedorControl, 0, 13, valor, metodos, html);
	MidwestFormulario.generahtml();
	MidwestFormulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = MidwestFormulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(MidwestFormulario);

// NUM: ?
// OBEJTO: Control
// TIPO: 13 CHECKBOX
// ID: ID_FORMULARIO_CAMPO_AFRICA
// SE COLOCA DENTRO: #ID_AFRICA_CHECK
// DESCRIPCIÓN: Checkbox para seleccionar África

	var inglesIdioma = [" AFRICA"];
	var espanolIdioma = [" ÁFRICA"];
	var portuguesIdioma = [" ÁFRICA"];
	var francesIdioma = [" AFRIQUE"];
	var alemanIdioma = [" AFRIKA"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var contenedorControl = [0, "", ""];
	var valor = [1, "", 1, "", 30, "", 0];
	var metodos = ["ListaCheckbox.aplicareglas([2, 2, 1, 0, 2, AfricaFormulario])", "AfricaFormulario.recogevalor()"];
	var html = ["formulario_campo_africa formulario_campo_check", "ID_FORMULARIO_CAMPO_AFRICA", "#ID_AFRICA_CHECK", "", "africa", 1];
	var AfricaFormulario = new Control(controlIdioma, contenedorControl, 0, 13, valor, metodos, html);
	AfricaFormulario.generahtml();
	AfricaFormulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = AfricaFormulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(AfricaFormulario);

// NUM: ?
// OBEJTO: Control
// TIPO: 13 CHECKBOX
// ID: ID_FORMULARIO_CAMPO_NORTAFRICA
// SE COLOCA DENTRO: #ID_NORTAFRICA_CHECK
// DESCRIPCIÓN: Checkbox para seleccionar Norte de África

	var inglesIdioma = [" NORTH OF AFRICA"];
	var espanolIdioma = [" NORTE DE ÁFRICA"];
	var portuguesIdioma = [" NORTE DA ÁFRICA"];
	var francesIdioma = [" NORD DE L'AFRIQUE"];
	var alemanIdioma = [" NORDEN VON AFRIKA"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var contenedorControl = [0, "", ""];
	var valor = [0, "", 0, "", 30, "", 0];
	var metodos = ["ListaCheckbox.aplicareglas([2, 5, 3, 2, 0, NortAfricaFormulario])", "NortAfricaFormulario.recogevalor()"];
	var html = ["formulario_campo_nortafrica formulario_campo_check", "ID_FORMULARIO_CAMPO_NORTAFRICA", "#ID_NORTAFRICA_CHECK", "", "nortafrica", 1];
	var NortAfricaFormulario = new Control(controlIdioma, contenedorControl, 0, 13, valor, metodos, html);
	NortAfricaFormulario.generahtml();
	NortAfricaFormulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = NortAfricaFormulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(NortAfricaFormulario);

// NUM: ?
// OBEJTO: Control
// TIPO: 13 CHECKBOX
// ID: ID_FORMULARIO_CAMPO_CENTRALAFRICA
// SE COLOCA DENTRO: #ID_CENTRALAFRICA_CHECK
// DESCRIPCIÓN: Checkbox para seleccionar Norte de África

	var inglesIdioma = [" CENTRAL AFRICA"];
	var espanolIdioma = [" ÁFRICA CENTRAL"];
	var portuguesIdioma = [" ÁFRICA CENTRAL"];
	var francesIdioma = [" AFRIQUE CENTRALE"];
	var alemanIdioma = [" ZENTRALAFRIKA"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var contenedorControl = [0, "", ""];
	var valor = [0, "", 0, "", 30, "", 0];
	var metodos = ["ListaCheckbox.aplicareglas([2, 6, 3, 2, 0, CentralAfricaFormulario])", "CentralAfricaFormulario.recogevalor()"];
	var html = ["formulario_campo_centralafrica formulario_campo_check", "ID_FORMULARIO_CAMPO_CENTRALAFRICA", "#ID_CENTRALAFRICA_CHECK", "", "centralafrica", 1];
	var CentralAfricaFormulario = new Control(controlIdioma, contenedorControl, 0, 13, valor, metodos, html);
	CentralAfricaFormulario.generahtml();
	CentralAfricaFormulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = CentralAfricaFormulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(CentralAfricaFormulario);

// NUM: ?
// OBEJTO: Control
// TIPO: 13 CHECKBOX
// ID: ID_FORMULARIO_CAMPO_CENTRALAFRICA
// SE COLOCA DENTRO: #ID_CENTRALAFRICA_CHECK
// DESCRIPCIÓN: Checkbox para seleccionar Norte de África

	var inglesIdioma = [" ASIA"];
	var espanolIdioma = [" ASIA"];
	var portuguesIdioma = [" ASIA"];
	var francesIdioma = [" ASIE"];
	var alemanIdioma = [" ASIEN"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var contenedorControl = [0, "", ""];
	var valor = [0, "", 1, "", 30, "", 0];
	var metodos = ["ListaCheckbox.aplicareglas([2, 3, 1, 0, 0, AsiaFormulario])", "AsiaFormulario.recogevalor()"];
	var html = ["formulario_campo_asia formulario_campo_check", "ID_FORMULARIO_CAMPO_ASIA", "#ID_ASIA_CHECK", "", "asia", 1];
	var AsiaFormulario = new Control(controlIdioma, contenedorControl, 0, 13, valor, metodos, html);
	AsiaFormulario.generahtml();
	AsiaFormulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = AsiaFormulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(AsiaFormulario);

// NUM: ?
// OBEJTO: Listacheckbox
// NO SE IMPRIME EN EL HTML
// DESCRIPCIÓN: Estructura de una serie de Objetos Checkbox predifinidos en una Estructura de Datos de
// ARBOL NO BINARIO, UTILIZANDO EL OBJETO Nodo, para administrar jerarquias de decisión
// SE DECLARA UN NODO PRINCIPAL 
	var NodoRaiz = new Nodo([1, 0, 0, 0, 3, "Mundo"]);
	var ListaCheckbox = new Listacheckbox(NodoRaiz);

// Agregar nodos al primer nivel

	ListaCheckbox.agregarNodo([1, 0, 0, 0, 3, "Mundo"], [2, 1, 1, 0, 1, AmericaFormulario]);
	ListaCheckbox.agregarNodo([1, 0, 0, 0, 3, "Mundo"], [2, 2, 1, 0, 2, AfricaFormulario]);
	ListaCheckbox.agregarNodo([1, 0, 0, 0, 3, "Mundo"], [2, 3, 1, 0, 0, AsiaFormulario]);

// Agregar nodos al segundo nivel
	ListaCheckbox.agregarNodo([2, 1, 1, 0, 1, AmericaFormulario], [2, 4, 2, 1, 2, NortAmericaFormulario]);

	ListaCheckbox.agregarNodo([2, 2, 1, 0, 2, AfricaFormulario], [2, 5, 3, 2, 0, NortAfricaFormulario]);
	ListaCheckbox.agregarNodo([2, 2, 1, 0, 2, AfricaFormulario], [2, 6, 3, 2, 0, CentralAfricaFormulario]);

// Agregar nodos al tercer nivel

	ListaCheckbox.agregarNodo([2, 4, 2, 1, 2, NortAmericaFormulario], [2, 7, 4, 4, 1, MexicoFormulario]);
	ListaCheckbox.agregarNodo([2, 4, 2, 1, 2, NortAmericaFormulario], [2, 8, 4, 4, 1, EuFormulario]);

// Agregar nodos al cuarto nivel

	ListaCheckbox.agregarNodo([2, 7, 4, 4, 1, MexicoFormulario], [2, 9, 5, 7, 0, SuresteFormulario]);
	ListaCheckbox.agregarNodo([2, 8, 4, 4, 1, EuFormulario], [2, 10, 5, 8, 0, MidwestFormulario]);

	ListaCheckbox.normaliza_estructura();


// CREANDO NUEVA GRADILLA


	var inglesIdioma = ["FILE LIST ONE", "BODY FILELIST", "BUTON FILELIST", "FOOT FILELIST", "ADD FILE", "", "", "FILE LIST ONE"];
	var espanolIdioma = ["LISTA DE ARCHIVOS UNO", "CUERPO DE FILELIST", "BOTON DE FILELIST", "PIE DE FILELIST", "AÑADIR ARCHIVO", "", "", "LISTA DE ARCHIVOS UNO"];
	var portuguesIdioma = ["LISTA DE ARQUIVOS UM", "CORPO DE FILELIST", "BOTÃO FILELIST", "PÉ DE FILELIST", "SEUBE ARCHIVU", "", "", "LISTA DE ARQUIVOS UM"];
	var francesIdioma = ["LISTE DE FICHIER UN", "CORPS LISTE FICHIER", "BOUTON LISTE FICHIER", "PIED LISTE FICHIER", "AJOUTER FICHIER", "", "", "LISTE FICHIER UN"];
	var alemanIdioma = ["AKTENLISTE EINS", "DATEILISTENKÖRPER", "DATEILISTENSCHALTER", "DATEILISTENFUSS", "DATEI HINZUFÜGEN", "", "", "DATEILISTE EINS"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var areas = [1, 1, 1, 1];
	var contenedores = [0, "", "", areas];
	var valor = [0, "", 0, "", 0, "Lista01Formulario", 0];
	var metodos = ["Lista03Formulario.clickescondido(), Lista03Formulario.anadebuton()", "Lista03Formulario.cambiavalor()"];
	var html = ["filelist_maqueta", "ID_FILELIST_MAQUETA03", "#ID_FORMULARIO_AREA_02", "", "lista03", "link_boton_formulario_medio", 1];
	var elementos = [0];
	var Lista03Formulario = new Filelist(controlIdioma, contenedores, 0, 11, valor, metodos, html, elementos);
	Lista03Formulario.generahtml();
	Lista03Formulario.imprimehtml();
	Formulario.campos[6][orden_progresivo] = Lista03Formulario;
	orden_progresivo = orden_progresivo + 1;
	Pantalla_formulario_filelist.objetos.push(Lista03Formulario);






///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////

// OBEJTO 2 Maqueta MAQUETA_GRADILLA maqueta de 5 elementos para organizar la gradilla
// que se inserta en ID_FORMULARIO_AREA_02

/*

	var inglesIdioma = ["TITLE GRID", "CONTROL GRID", "BODY GRID", "FOOT GRID"];
	var espanolIdioma = ["TITULO GRADILLA", "CONTROLES GRADILLA", "CUERPO GRADILLA", "PIE GRADILLA"];
	var portuguesIdioma = ["TITULO GRADILLA", "CONTROLES GRADILLA", "CUERPO GRADILLA", "PIE GRADILLA"];
	var francesIdioma = ["TITULO GRADILLA", "CONTROLES GRADILLA", "CUERPO GRADILLA", "PIE GRADILLA"];
	var alemanIdioma = ["TITULO GRADILLA", "CONTROLES GRADILLA", "CUERPO GRADILLA", "PIE GRADILLA"];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var parametros01 = ["formulario_area_grid", "formulario_area_grid", "formulario_area_grid", "formulario_area_grid"];
	var parametros02 = ["ID_FORMULARIO_GRID_TITULO", "ID_FORMULARIO_GRID_CONTROLES", "ID_FORMULARIO_GRID_CUERPO", "ID_FORMULARIO_GRID_PIE"];
	var parametros = [parametros01, parametros02, 1];
	var Maqueta_grid = new Maqueta(controlIdioma, 4, parametros, "contenedor_grid", "MAQUETA_CONTENEDOR_GRID", "#ID_FORMULARIO_AREA_02", "");
	Maqueta_grid.generahtml();
	Maqueta_grid.imprimehtml();
	Pantalla_formulario_filelist.objetos.push(Maqueta_grid);


*/


////////////////////////////////////////////////////////////////////////////
///////////////// AREA DE BOTONES //////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////

// OBEJTO 25 Control CONTROL DE TIPO 5 BOTON : ID_LINK_CLEAR_FORMULARIO para limpiar el formulario
// que se inserta en un acumulador
	
	var inglesIdioma = ["CLEAN", ""];
	var espanolIdioma = ["LIMPIAR", ""];
	var portuguesIdioma = ["LIMPAR", ""];
	var francesIdioma = ["FAIRE LE MÉNAGE", ""];
	var alemanIdioma = ["SAUBER", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var contenedorControl = [0, "", ""];
	var valor = [0, "", 0, "", 0];
	var metodos = ["Formulario.clearformulario()", ""];
	var html = ["link_boton_formulario", "ID_LINK_CLEAR_FORMULARIO", "#ID_FORMULARIO_BOTONES", "", "clear", 1];
	var LinkClearFormulario = new Control(controlIdioma, contenedorControl, 0, 5, valor, metodos, html);
	LinkClearFormulario.generahtml();
	LinkClearFormulario.imprimehtml();
	Pantalla_formulario_filelist.objetos.push(LinkClearFormulario);
	
// OBEJTO 25 Control CONTROL DE TIPO 5 BOTON : ID_LINK_SEND_FORMULARIO para limpiar el formulario
// que se inserta en un acumulador y luego a ID_FORMULARIO_AREABOTONES
	var inglesIdioma = ["SEND", ""];
	var espanolIdioma = ["ENVIAR", ""];
	var portuguesIdioma = ["ENVIAR", ""];
	var francesIdioma = ["ENVOYER", ""];
	var alemanIdioma = ["SCHICKEN", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var contenedorControl = [0, "", ""];
	var valor = [0, "", 0, "", 0];
	var metodos = ["Formulario.formularioenvia()", ""];
	var html = ["link_boton_formulario", "ID_LINK_SEND_FORMULARIO", "#ID_FORMULARIO_BOTONES", "", "send", 2];
	var LinkSendFormulario = new Control(controlIdioma, contenedorControl, 0, 5, valor, metodos, html);
	LinkSendFormulario.generahtml();
	LinkSendFormulario.imprimehtml();
	Pantalla_formulario_filelist.objetos.push(LinkSendFormulario);

// NUM: ?
// OBEJTO: Setcolor
// DESCRIPCIÓN: Para aplicar diferentes esquemas de color

	var inglesIdiomaGris = ["CROSSCFC GRAY", "WHITE ON INDUSTRIAL AND AUSTERE GRAY"];
	var inglesIdiomaBlanco = ["WHITE", "BLACK ON AUSTERE WHITE"];
	var inglesIdiomaNegro = ["BLACK", "WHITE ON BLACK DARK"];
	var inglesIdiomaGroove = ["GROOVE", "PSYCHO PRUEBA"];

	var espanolIdiomaGris = ["GRIS CROSSCFC", "BLANCO SOBRE GRIS INDUSTRIAL Y AUSTERO"];
	var espanolIdiomaBlanco = ["BLANCO", "NEGRO SOBRE BLANCO AUSTERO"];
	var espanolIdiomaNegro = ["NEGRO", "BLANCO SOBRE NEGRO DARK"];
	var espanolIdiomaGroove = ["GROOVE", "PSYCHO PRUEBA"];

	var portuguesIdiomaGris = ["CROSSCFC GREY", "BRANCO SOBRE INDUSTRIAL E AUSTERE GREY"];
	var portuguesIdiomaBlanco = ["BRANCO", "PRETO SOBRE BRANCO AUSTERO"];
	var portuguesIdiomaNegro = ["PRETO", "BRANCO SOBRE PRETO ESCURO"];	
	var portuguesIdiomaGroove = ["GROOVE", "PSYCHO PRUEBA"];

	var francesIdiomaGris = ["CROSSCFC GRIS", "BLANC SUR GRIS INDUSTRIEL ET AUSTERE"] ;
	var francesIdiomaBlanco = ["BLANC", "NOIR SUR BLANC AUSTERE"] ;
	var francesIdiomaNegro = ["NOIR", "BLANC SUR NOIR FONCÉ"] ;
	var francesIdiomaGroove = ["GROOVE", "PSYCHO PRUEBA"];

	var alemanIdiomaGris = ["CROSSCFC GREY", "WHITE ON INDUSTRIAL AND AUSTERE GREY"];
	var alemanIdiomaBlanco = ["WEISS", "SCHWARZ AUF STRÜNEM WEIß"];
	var alemanIdiomaNegro = ["SCHWARZ", "WEISS AUF SCHWARZ DUNKEL"];
	var alemanIdiomaGroove = ["GROOVE", "PSYCHO PRUEBA"];

	var inglesIdioma = [inglesIdiomaGris, inglesIdiomaBlanco, inglesIdiomaNegro, inglesIdiomaGroove];
	var espanolIdioma = [espanolIdiomaGris, espanolIdiomaBlanco, espanolIdiomaNegro, espanolIdiomaGroove];
	var portuguesIdioma = [portuguesIdiomaGris, portuguesIdiomaBlanco, portuguesIdiomaNegro, portuguesIdiomaGroove];
	var francesIdioma = [francesIdiomaGris, francesIdiomaBlanco, francesIdiomaNegro, francesIdiomaGroove];
	var alemanIdioma = [alemanIdiomaGris, alemanIdiomaBlanco, alemanIdiomaNegro, alemanIdiomaGroove];
	
	var arregloIdioma = [inglesIdioma, espanolIdioma, portuguesIdioma, francesIdioma, alemanIdioma];
	var controlIdioma = [idioma, arregloIdioma];

	var especificaciones = [controlIdioma, 4, Pantalla_formulario_filelist];

	var valores = [1, 1];

	var areasGrisId = ["MAQUETA_PRINCIPAL_TALLER", "ID_CUERPO_TALLER", "ID_FORMULARIO_GENERALES"];
	var areasGrisClases01 = ["colores_gris", "posicionamiento_gris"];
	var areasGrisClases02 = ["colores_gris", "posicionamiento_gris"];
	var areasGrisClases03 = ["colores_verde", "posicionamiento_verde"];
	var areasGrisClases = [areasGrisClases01, areasGrisClases02, areasGrisClases03];
	var areasGris = [areasGrisId, areasGrisClases]

	var areasBlancoId = ["MAQUETA_PRINCIPAL_TALLER", "ID_CUERPO_TALLER", "ID_FORMULARIO_GENERALES"];
	var areasBlancoClases01 = ["colores_blanco", "posicionamiento_blanco"];
	var areasBlancoClases02 = ["colores_blanco", "posicionamiento_blanco"];
	var areasBlancoClases03 = ["colores_verde", "posicionamiento_verde"];
	var areasBlancoClases = [areasBlancoClases01, areasBlancoClases02, areasBlancoClases03];
	var areasBlanco = [areasBlancoId, areasBlancoClases]

	var areasNegroId = ["MAQUETA_PRINCIPAL_TALLER", "ID_CUERPO_TALLER", "ID_FORMULARIO_GENERALES"];
	var areasNegroClases01 = ["colores_negro", "posicionamiento_negro"];
	var areasNegroClases02 = ["colores_negro", "posicionamiento_negro"];
	var areasNegroClases03 = ["colores_verde", "posicionamiento_verde"];
	var areasNegroClases = [areasNegroClases01, areasNegroClases02, areasNegroClases03];
	var areasNegro = [areasNegroId, areasNegroClases]

	var areasGrooveId = ["MAQUETA_PRINCIPAL_TALLER", "ID_CUERPO_TALLER", "ID_FORMULARIO_GENERALES"];
	var areasGrooveClases01 = ["colores_groove", "posicionamiento_groove"];
	var areasGrooveClases02 = ["colores_groove", "posicionamiento_groove"];
	var areasGrooveClases03 = ["colores_verde", "posicionamiento_verde"];
	var areasGrooveClases = [areasGrooveClases01, areasGrooveClases02, areasGrooveClases03];
	var areasGroove = [areasGrooveId, areasGrooveClases]

	var areas = [areasGris, areasBlanco, areasNegro, areasGroove]	

	var Estilos = new Setestilos2(especificaciones, valores, areas);
	Estilos.imprimehtml();

</script>
 