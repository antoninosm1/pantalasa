<?php
// VINCULAMOS CLASES
    require_once "../../pantalib/php/objetos/new/Sistema.php";
    require_once "Conexion_comerciosolidario.php";
    require_once "../../pantalib/php/objetos/new/Consulta.php";
    require_once "../../pantalib/php/objetos/new/User.php";
    require_once "../../pantalib/php/objetos/new/Log.php";
    session_start();
	header( 'Content-type: text/html; charset=utf-8' );

// ESTABLECEMOS PARAMETROS DE LOG
	$_SESSION['logPhp']->configuraciones[2] = '../logs/';

// LOGEAMOS INICIO
    $_SESSION['logPhp']->configuraciones[1] = ' ';
    $_SESSION['logPhp']->escribe_log();
    $_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
    $_SESSION['logPhp']->escribe_log();
    $_SESSION['logPhp']->escribe_log();
    $_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS consulta_login.php';
    $_SESSION['logPhp']->escribe_log();
    $_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
    $_SESSION['logPhp']->escribe_log();
    $_SESSION['logPhp']->escribe_log();
    $_SESSION['logPhp']->configuraciones[1] = ' ';
    $_SESSION['logPhp']->escribe_log();

// HACEMOS INSTANCIA DEL OBJETO Consulta	
    $numero_elementos = 11;
    $tables = ["usuarios LEFT JOIN comunidad ON usuarios.comunidad = comunidad.id"];
    $user = $_POST['user_login'];
    $parametro01 = [0, [[0, "correo", 0, $user, 0]], 0];
    $pass = sha1($_POST['pass_login']);
    $parametro02 = [0, [[0, "password", 0, $pass, 0]], 0];
    $lista_parametros = [$parametro01, $parametro02];
    $where = [1, $lista_parametros]; 
    $order_order = 0;
    $order_elementos = ["usuarios.id"];
    $order = [1, $order_order, $order_elementos];
    $sistema = $_SESSION['Sistema'];
    $status = 0;
    $tipo = 1;
    $limites = [0, 0, 0, 0, 0, 0];
    $registros = 0;
    $excell = [0, '', 0, '', '', '', '', ''];
    $nombre = 'INST::: consultalogin';
    $recupera = 0;
    $configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excell, $nombre, $recupera];
    $codigos = ['', '', [], '', '', ''];
    $elementos_campos = [
        
    "usuarios.id",
    "usuarios.comunidad",
    "comunidad.nombre",
    "comunidad.apellido",
    "comunidad.alias",
    "usuarios.correo",
    "usuarios.password",
    "usuarios.status",
    "usuarios.privilegios",
    "usuarios.modalidad",
    "usuarios.confirma"
    
    ];
    $elementos_nombres = [
        
    "id",
    "comunidad",
    "nombre",
    "apellido",
    "alias",
    "correo",
    "password",
    "status",
    "privilegios",
    "modalidad",
    "confirma"
    
    ];
    $elementos_tipos = [2, 2, 1, 1, 1, 1, 1, 2, 2, 2, 2];
    $elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos];
    $consultalogin = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
    $consultalogin->construye();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
    $consultalogin->ejecuta();

// LOGEAMOS INICIO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_login.php ESTA ES LA CONSULTA: '.$consultalogin->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_login.php ESTA ES LA RESPUESTA: '.$consultalogin->codigos[1];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

// ARMAMOS VARIABLE $datos_registro COMO UN ARREGLO QUE CONTIENE EN CADA POSICION 
// A SU VEZ LA POSICIÓN DEL ARREGLO GENERADO POR LA CADENA JSON QUE CONTIENE LA 
// CONSULTA GENERADA EN EL OBJETO Consulta LA VARIABLE SE PASA COMO PARAMETRO DEL 
// METODO obtener_registro() DEL OBJETO Consulta  
    
//$datos_registro = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$datos_registro = [0, 1, 2, 3, 4, 5, 7, 8, 9];

// EJECUTAMOS METODO confirma_actualiza() DEL OBJETO User PASANDO COMO PRIMER PARAMETRO
// EL STATUS DEL OBJETO Consulta Y COMO SEGUNDO PARAMETRO EL METODO obtener_registro()
// DEL OBJETO Consulta Y REGRESA UN ARREGLO CON LOS VALORES OBTENIDOS

// LOGEAMOS INICIO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_login.php STATUS DE CONSULTA..: '.$consultalogin->configuraciones[6];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_login.php ARREGLO DE DATOS....: '.implode(", ", $datos_registro);
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();


//$_SESSION['User']->confirma_actualiza_status($consultalogin->configuraciones[6], $consultalogin->obtener_registro_status($datos_registro, $consultalogin->codigos[2][7]));
//$_SESSION['User']->confirma_actualiza_status($consultalogin->configuraciones[6], $consultalogin->obtener_registro_status($datos_registro), json_decode($consultalogin->codigos[1], true)[1]['confirma']);
$_SESSION['User']->confirma_actualiza($consultalogin->configuraciones[6], $consultalogin->obtener_registro_status($datos_registro));


// HACEMOS SEGUNDA INSTANCIA DEL OBJETO Consulta PARA GRABAR EL LOGIN EN BD	
    $numero_elementos = 4;
    $tables = ["bitacora"];
    $where = [0, []]; 
    $order_order = 0;
    $order_elementos = [];
    $order = [0, 0, []];
    $sistema = $_SESSION['Sistema'];
    $status = 0;
    $tipo = 2;
    $limites = [0, 0, 0, 0, 0, 0];
    $registros = 0;
    $excell = [0, '', 0, '', '', '', '', ''];
    $nombre = 'INST::: grabalogin';
    $recupera = 0;
    $configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excell, $nombre, $recupera];
    $codigos = ['', '', [], '', '', ''];
    $elementos_campos = ["id", "usuario", "fechahora", "log"];
    $elementos_nombres = ["id", "usuario", "fechahora", "log"];
    $elementos_tipos = [3, 2, 4, 1];
    $elementos_valores = [0, $_SESSION['User']->elementos[0][0], "", "LOGIN: ".$_SESSION['User']->elementos[0][2]." ".$_SESSION['User']->elementos[0][3]." ".$_SESSION['User']->elementos[0][4]];
    $elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos, $elementos_valores];
    $grabalogin = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL SEGUNDO OBJETO Consulta	
    $grabalogin->construye_confirmacion($consultalogin->configuraciones[6]);

// EJECUTAMOS METODO ejecuta() DEL SEGUNDO OBJETO Consulta	
    $grabalogin->ejecuta_confirmacion($consultalogin->configuraciones[6]);

// RETORNAMOS VARIABLE codigos[1] DEL PRIMER OBJETO Consulta	
    echo $consultalogin->codigos[1];

$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' consulta_login.php ESTE ES EL JSON DE RESPUESTA: '.$consultalogin->codigos[1];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

// LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS consulta_login.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
                                                                                                                                                                                                                                                            