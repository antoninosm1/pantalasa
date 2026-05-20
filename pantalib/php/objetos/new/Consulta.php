<?php
// DEFINICION DE LA CLASE Consulta
	class Consulta
	
	{
		
		public $configuraciones;
		public $codigos;
		public $elementos;
		
		public function __construct($configuraciones, $codigos, $elementos) 
		
		{
			$this->configuraciones = $configuraciones;
			$this->codigos = $codigos;
			$this->elementos = $elementos;
		}                              

/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// METODO CONSTRUYE ////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
        public function construye() 
		
        {

// LOGEAMOS
//$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
//$_SESSION['logPhp']->escribe_log();
//$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' Consulta.php. METODO: Construye(). INSTANCIA: '.$this->configuraciones[11];
//$_SESSION['logPhp']->escribe_log();
//$_SESSION['logPhp']->configuraciones[1] = 'ESTA ES LA POSICION INICIO EN OBJETO: '.$this->configuraciones[8][1];
//$_SESSION['logPhp']->escribe_log();
//$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
//$_SESSION['logPhp']->escribe_log();
//$_SESSION['logPhp']->configuraciones[1] = ' ';
//$_SESSION['logPhp']->escribe_log();

/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// INICIA PROCESO DE TIPO SELECT DENTRO DEL METODO CONSTRUYE ////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($this->configuraciones[7]==1) {
    $this->codigos[0] = '';
    $select_cadena = '';
    $tables_cadena = '';
    $where_cadena = '';
    $order_cadena = '';

// VAMOS A CONSTRUIR LA CADENA DE SELECT A PARTIR DE UNA SERIE DE ELEMENTOS			
        
    $i = 0;
    while ($i < $this->configuraciones[0]) {
        if ($i==0) {
            $select_cadena = 'SELECT '.$this->elementos[0][$i];
        }
        if ($i>0) {
            $select_cadena = $select_cadena.', '.$this->elementos[0][$i];
        } 
        $i++;
    }			

// VAMOS A CONSTRUIR LA CADENA DE TABLAS A PARTIR DE UNA CADENA DE TABLAS			

    $tables_cadena = $tables_cadena.' FROM '.$this->configuraciones[1][0];

// VAMOS A CONSTRUIR LA CADENA DE CONDICION A PARTIR DE UN ARREGLO DE CONDICIONES			
    
// INSPECCIONAMOS SI LA CONSULTA LLEVA FILTRO CUANDO: $this->configuraciones[2][0]==1

    if ($this->configuraciones[2][0]==1) {
        $i = 0;
        $where_cadena = ' WHERE';

// HACEMOS UN CICLO MAESTRO TANTAS VECES COMO ELEMENTOS TENGA EL ARREGLO: $this->configuraciones[2][1]
// QUE CORRESPONDE AL CONTENEDOR DE LOS FILTROS CONCATENADOS EN ESTA CONSULTA
        
        while ($i < count($this->configuraciones[2][1])) {

// INSPECIONAMOS SI NO ES EL PRIMER FILTRO PARA CONCATENAR UNA CONEXION 0 = AND, 1 = OR
            
            if ($i > 0) {

// INSPECIONAMOS EL TIPO DE CONEXION CON LA POSICIÓN $this->configuraciones[2][1][$i][0] 0 = AND = 1 OR
                
                if ($this->configuraciones[2][1][$i][0]==0) {
                    $where_cadena = $where_cadena.' AND';
                }
                if ($this->configuraciones[2][1][$i][0]==1) {
                    $where_cadena = $where_cadena.' OR';
                }
            } 

// CONCATENAMOS LA APERTURA DE PARENTESIS POR CADA FILTRO
            
            $where_cadena = $where_cadena.' (';
// HACEMOS UN SUB CICLO POR CADA ELEMENTO DE SUBFILTRO POR CADA FILTRO
            $ii = 0;
            while ($ii < count($this->configuraciones[2][1][$i][1])) {
// INSPECIONAMOS SI NO ES EL PRIMER ELEMENTO DEL SUBFILTRO PARA CONCATENAR UNA CONEXION 0 = AND, 1 = OR
                if ($ii > 0) {
// INSPECIONAMOS EL TIPO DE CONEXION CON LA POSICIÓN $this->configuraciones[2][1][$i][1][$ii][0] 0 = AND = 1 OR
                    if ($this->configuraciones[2][1][$i][1][$ii][0]==0) {
                        $where_cadena = $where_cadena.' AND ';
                    }
                    if ($this->configuraciones[2][1][$i][1][$ii][0]==1) {
                        $where_cadena = $where_cadena.' OR ';
                    }
                } 
// CONCATENAMOS EL PRIMER MIEMBRO DE LA ECUACIÓN
                $where_cadena = $where_cadena.$this->configuraciones[2][1][$i][1][$ii][1];
// INSPECIONAMOS EL TIPO DE OPERADOR CON LA POSICIÓN $this->configuraciones[2][1][$i][1][$ii][2]
// 0 = '=' (ES IGUAL), 1 = '<>' (NO ES IGUAL), 2 = 'IS NULL', 3 = 'IS NOT NULL', 4 = '>' (MAYOR QUE), 5 = '<' (MENOR QUE)
// 6 = 'BETWEEN', 7 = '>' NOW()
                if ($this->configuraciones[2][1][$i][1][$ii][2]==0) {
                    $where_cadena = $where_cadena.' = "'.$this->configuraciones[2][1][$i][1][$ii][3].'"';
                }
                if ($this->configuraciones[2][1][$i][1][$ii][2]==1) {
                    $where_cadena = $where_cadena.' <> "'.$this->configuraciones[2][1][$i][1][$ii][3].'"';
                }
                if ($this->configuraciones[2][1][$i][1][$ii][2]==2) {
                    $where_cadena = $where_cadena.' IS NULL';
                }
                if ($this->configuraciones[2][1][$i][1][$ii][2]==3) {
                    $where_cadena = $where_cadena.' IS NOT NULL';
                }
                if ($this->configuraciones[2][1][$i][1][$ii][2]==4) {
                    $where_cadena = $where_cadena.' > "'.$this->configuraciones[2][1][$i][1][$ii][3].'"';
                }
                if ($this->configuraciones[2][1][$i][1][$ii][2]==5) {
                    $where_cadena = $where_cadena.' < "'.$this->configuraciones[2][1][$i][1][$ii][3].'"';
                }
                if ($this->configuraciones[2][1][$i][1][$ii][2]==6) {
                    $where_cadena = $where_cadena.' BETWEEN "'.$this->configuraciones[2][1][$i][1][$ii][3][0].'" AND "'.$this->configuraciones[2][1][$i][1][$ii][3][1].'"';
                }
                if ($this->configuraciones[2][1][$i][1][$ii][2]==7) {
                    $where_cadena = $where_cadena.' > NOW()';
                }
                $ii++;
            }
// CONCATENAMOS EL CIERRE DE PARENTESIS POR CADA FILTRO
            $where_cadena = $where_cadena.')';
//    $parametro02 = [1, [[0, "Password", 0, $pass, 1]], 0];
            $i++;
        }			
    }			

// VAMOS A CONSTRUIR LA CADENA DE ORDEN A PARTIR DE UN ARREGLO DE CAMPOS			
    
    if ($this->configuraciones[3][0]==1) {
        $i = 0;
        $order_cadena = ' ORDER BY ';
        while ($i < count($this->configuraciones[3][2])) {
            if ($i==0) {
                $order_cadena = $order_cadena.$this->configuraciones[3][2][$i];
            }
            else {
                $order_cadena = $order_cadena.', '.$this->configuraciones[3][2][$i];
            }
            $i++;
        }
        if ($this->configuraciones[3][1]==1) {
            $order_cadena = $order_cadena.' DESC';
        }			
    }			

// VAMOS A CONSTRUIR LA CADENA DE LIMITES A PARTIR DE UNA CONFIGURACIÓN			
    
    if ($this->configuraciones[8][0]==1) {

// LOGEAMOS
//$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
//$_SESSION['logPhp']->escribe_log();
//$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' Consulta.php '.$this->configuraciones[11].' ESTA ES LA POSICION INICIO EN OBJETO: ';
//$_SESSION['logPhp']->escribe_log();
//$_SESSION['logPhp']->configuraciones[1] = $this->configuraciones[8][1];
//$_SESSION['logPhp']->escribe_log();
//$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
//$_SESSION['logPhp']->escribe_log();
//$_SESSION['logPhp']->configuraciones[1] = ' ';
//$_SESSION['logPhp']->escribe_log();

        $order_cadena = $order_cadena.' LIMIT '.$this->configuraciones[8][1].', '.$this->configuraciones[8][2];
    }			

// VAMOS A CONCATENAR LA CADENA FINAL			
    $this->codigos[0] = $this->codigos[0].$select_cadena.$tables_cadena.$where_cadena.$order_cadena;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// INICIA PROCESO DE TIPO INSERT ////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($this->configuraciones[7]==2) {
    $insert_cadena = 'INSERT INTO '.$this->configuraciones[1][0];
    $campos_cadena = '';
    $elementos_visibles = 0;
    $values_cadena = '';
// VAMOS A CONSTRUIR LA CADENA DE CAMPOS A INSERTAR A PARTIR DE LA SERIE DE ELEMENTOS			
    $i = 0;
    while ($i < $this->configuraciones[0]) {
        if ($i==0) {
            if ($this->elementos[2][$i]==3) {
                $campos_cadena = ' (';
            }
            else {
                $campos_cadena = ' ('.$this->elementos[0][$i];
                $elementos_visibles = 1;
            }
        }
        else {
            if ($this->elementos[2][$i]==3) {
            }
            else {
                if ($elementos_visibles==1) {
                    $campos_cadena = $campos_cadena.', '.$this->elementos[0][$i];
                }
                else {
                    $campos_cadena = $campos_cadena.$this->elementos[0][$i];
                }
                $elementos_visibles = 1;
            }
        }
        $i++;
    }
    $campos_cadena = $campos_cadena.') VALUES';
    $elementos_visibles = 0;
    $i = 0;
    while ($i < $this->configuraciones[0]) {
        if ($i==0) {
            if ($this->elementos[2][$i]==3) {
                $values_cadena = ' (';
            }
            else {
                if ($this->elementos[2][$i]==1) {
                    $values_cadena = ' ("'.$this->elementos[3][$i].'"';
                }
                if ($this->elementos[2][$i]==2) {
                    $values_cadena = ' ('.$this->elementos[3][$i];
                }
                if ($this->elementos[2][$i]==4) {
                    $values_cadena = ' ("'.date('Y-m-d H:i:s').'"';
                }
                $elementos_visibles = 1;
            }
        }
        else {
            if ($this->elementos[2][$i]==3) {
            }
            else {
                if ($this->elementos[2][$i]==1) {
                    if ($elementos_visibles==1) {
                        $values_cadena = $values_cadena.', "'.$this->elementos[3][$i].'"';
                    }
                    else {
                        $values_cadena = $values_cadena.'"'.$this->elementos[3][$i].'"';
                    }
                }
                if ($this->elementos[2][$i]==2) {
                    if ($elementos_visibles==1) {
                        $values_cadena = $values_cadena.', '.$this->elementos[3][$i];
                    }
                    else {
                        $values_cadena = $values_cadena.$this->elementos[3][$i];
                    }
                }
                if ($this->elementos[2][$i]==4) {
                    if ($elementos_visibles==1) {
                        $values_cadena = $values_cadena.', "'.date('Y-m-d H:i:s').'"';
                    }
                    else {
                        $values_cadena = $values_cadena.'"'.date('Y-m-d H:i:s').'"';
                    }
                }
                $elementos_visibles = 1;
            }
        }
        $i++;
    }
    $values_cadena = $values_cadena.')';
    $this->codigos[0] = $this->codigos[0].$insert_cadena.$campos_cadena.$values_cadena;

}
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// INICIA PROCESO DE TIPO UPDATE ////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($this->configuraciones[7]==3) {
    $insert_cadena = 'UPDATE '.$this->configuraciones[1][0].' SET ';
    $elementos_visibles = 0;
    $values_cadena = '';
    $where_cadena = '';
// VAMOS A CONSTRUIR LA CADENA DE CAMPOS A INSERTAR A PARTIR DE LA SERIE DE ELEMENTOS			

    $i = 0;
    while ($i < count($this->elementos[0])) {
        if ($i==0) {
        }
        else {
            $values_cadena = $values_cadena.', ';
        }
        $values_cadena = $values_cadena.$this->elementos[0][$i].' = "'.$this->elementos[3][$i].'"';
        $i++;
    }
    $where_cadena = $this->where();
    $this->codigos[0] = $this->codigos[0].$insert_cadena.$values_cadena.$where_cadena;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// INICIA PROCESO DE TIPO DELETE DENTRO DEL METODO CONSTRUYE ////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($this->configuraciones[7]==4) {
    $this->codigos[0] = '';
    $select_cadena = '';
    $tables_cadena = '';
    $where_cadena = '';
    $order_cadena = '';

    $tables_cadena = $tables_cadena.'DELETE FROM '.$this->configuraciones[1][0];

// VAMOS A CONSTRUIR LA CADENA DE CONDICION A PARTIR DE UN ARREGLO DE CONDICIONES			

    $i = 0;
    $where_cadena = ' WHERE';

// HACEMOS UN CICLO MAESTRO TANTAS VECES COMO ELEMENTOS TENGA EL ARREGLO: $this->configuraciones[2][1]
// QUE CORRESPONDE AL CONTENEDOR DE LOS FILTROS CONCATENADOS EN ESTA CONSULTA
        
    while ($i < count($this->configuraciones[2][1])) {

// INSPECIONAMOS SI NO ES EL PRIMER FILTRO PARA CONCATENAR UNA CONEXION 0 = AND, 1 = OR
            
        if ($i > 0) {

// INSPECIONAMOS EL TIPO DE CONEXION CON LA POSICIÓN $this->configuraciones[2][1][$i][0] 0 = AND = 1 OR
                
            if ($this->configuraciones[2][1][$i][0]==0) {
                $where_cadena = $where_cadena.' AND';
            }
            if ($this->configuraciones[2][1][$i][0]==1) {
                $where_cadena = $where_cadena.' OR';
            }
        } 

// CONCATENAMOS LA APERTURA DE PARENTESIS POR CADA FILTRO
            
        $where_cadena = $where_cadena.' (';
// HACEMOS UN SUB CICLO POR CADA ELEMENTO DE SUBFILTRO POR CADA FILTRO
        $ii = 0;
        while ($ii < count($this->configuraciones[2][1][$i][1])) {
// INSPECIONAMOS SI NO ES EL PRIMER ELEMENTO DEL SUBFILTRO PARA CONCATENAR UNA CONEXION 0 = AND, 1 = OR
            if ($ii > 0) {
// INSPECIONAMOS EL TIPO DE CONEXION CON LA POSICIÓN $this->configuraciones[2][1][$i][1][$ii][0] 0 = AND = 1 OR
                if ($this->configuraciones[2][1][$i][1][$ii][0]==0) {
                    $where_cadena = $where_cadena.' AND ';
                }
                if ($this->configuraciones[2][1][$i][1][$ii][0]==1) {
                    $where_cadena = $where_cadena.' OR ';
                }
            } 
// CONCATENAMOS EL PRIMER MIEMBRO DE LA ECUACIÓN
            $where_cadena = $where_cadena.$this->configuraciones[2][1][$i][1][$ii][1];
// INSPECIONAMOS EL TIPO DE OPERADOR CON LA POSICIÓN $this->configuraciones[2][1][$i][1][$ii][2]
// 0 = '=' (ES IGUAL), 1 = '<>' (NO ES IGUAL), 2 = 'IS NULL', 3 = 'IS NOT NULL', 4 = '>' (MAYOR QUE), 5 = '<' (MENOR QUE)
// 6 = 'BETWEEN'
            if ($this->configuraciones[2][1][$i][1][$ii][2]==0) {
                $where_cadena = $where_cadena.' = "'.$this->configuraciones[2][1][$i][1][$ii][3].'"';
            }
            if ($this->configuraciones[2][1][$i][1][$ii][2]==1) {
                $where_cadena = $where_cadena.' <> "'.$this->configuraciones[2][1][$i][1][$ii][3].'"';
            }
            if ($this->configuraciones[2][1][$i][1][$ii][2]==2) {
                $where_cadena = $where_cadena.' IS NULL';
            }
            if ($this->configuraciones[2][1][$i][1][$ii][2]==3) {
                $where_cadena = $where_cadena.' IS NOT NULL';
            }
            if ($this->configuraciones[2][1][$i][1][$ii][2]==4) {
                $where_cadena = $where_cadena.' > "'.$this->configuraciones[2][1][$i][1][$ii][3].'"';
            }
            if ($this->configuraciones[2][1][$i][1][$ii][2]==5) {
                $where_cadena = $where_cadena.' < "'.$this->configuraciones[2][1][$i][1][$ii][3].'"';
            }
            if ($this->configuraciones[2][1][$i][1][$ii][2]==6) {
                $where_cadena = $where_cadena.' BETWEEN "'.$this->configuraciones[2][1][$i][1][$ii][3][0].'" AND "'.$this->configuraciones[2][1][$i][1][$ii][3][1].'"';
            }
            if ($this->configuraciones[2][1][$i][1][$ii][2]==7) {
                $where_cadena = $where_cadena.' > NOW()';
            }
        $ii++;
        }
// CONCATENAMOS EL CIERRE DE PARENTESIS POR CADA FILTRO
        $where_cadena = $where_cadena.')';
//   $parametro02 = [1, [[0, "Password", 0, $pass, 1]], 0];
        $i++;
    }			

// VAMOS A CONSTRUIR LA CADENA DE LIMITES A PARTIR DE UNA CONFIGURACIÓN			
    
    if ($this->configuraciones[8][0]==1) {
        $order_cadena = $order_cadena.' LIMIT '.$this->configuraciones[8][1].', '.$this->configuraciones[8][2];
    }			

// VAMOS A CONCATENAR LA CADENA FINAL			
    $this->codigos[0] = $this->codigos[0].$select_cadena.$tables_cadena.$where_cadena.$order_cadena;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// INICIA PROCESO DE TIPO UPDATE CON OPERACIÓN ////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($this->configuraciones[7]==5) {
    $insert_cadena = 'UPDATE '.$this->configuraciones[1][0].' SET ';
    $elementos_visibles = 0;
    $values_cadena = '';
    $where_cadena = '';
// VAMOS A CONSTRUIR LA CADENA DE CAMPOS A INSERTAR A PARTIR DE LA SERIE DE ELEMENTOS			

    $i = 0;
    while ($i < count($this->elementos[0])) {
        if ($i==0) {
        }
        else {
            $values_cadena = $values_cadena.', ';
        }
        $operacion = '';
        if ($this->elementos[2][$i][0]==1) {
            $operacion = ' + '.$this->elementos[2][$i][1];
        }
        if ($this->elementos[2][$i][0]==2) {
            $operacion = ' - '.$this->elementos[2][$i][1];
        }
        $values_cadena = $values_cadena.$this->elementos[0][$i].' = '.$this->elementos[3][$i].$operacion;
        $i++;
    }
    $where_cadena = $this->where();
    $this->codigos[0] = $this->codigos[0].$insert_cadena.$values_cadena.$where_cadena;
}


































    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// TERMINAMOS METODO CONSTRUYE ////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// METODO EJECUTA ///////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// METODO EJECUTA ///////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// METODO EJECUTA ///////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// METODO EJECUTA ///////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// METODO EJECUTA ///////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function ejecuta() 
		
        {
//////////////////////////////////////////////////////////////////////////
///////////////// ESTABLECEMOS CONEXIÓN A LA BD Y HACEMOS CONSULTA
$this->codigos[1] = '';
$this->codigos[3] = '';
$conexion = new mysqli($this->configuraciones[5]->configuraciones[0], $this->configuraciones[5]->configuraciones[1], $this->configuraciones[5]->configuraciones[2], $this->configuraciones[5]->configuraciones[3]);


$resultado = $conexion -> query($this->codigos[0]);

//////////////////////////////////////////////////////////////////////////
///////////////// CODIGO DESPUES DE EJECUTAR CONSULTA TIPO SELECT CONSULTA TIPO 1
if ($this->configuraciones[7]==1) {
    $si_res = 0;
    $cadena_json = '';
    $titulos_excel = "";
    $cadena_excel = "";

//////////////////////////////////////////////////////////////////////////
///////////////// HACEMOS UN CICLO CON CADA REGISTRO DEL RESULTADO DE LA CONSULTA
    while($row = $resultado -> fetch_array()) {
//////////////////////////////////////////////////////////////////////////
///////////////// INSPECCIONAMOS SI ESTAMOS EN EL PRIMER REGISTRO DE LA CONSULTA
        if ($si_res == 0) {
            $cadena_json = $cadena_json.'{';
        }
        else {
            $cadena_json = $cadena_json.', {';
        }

//////////////////////////////////////////////////////////////////////////
///////////////// HACEMOS UN CICLO POR CADA ELEMENTO DE LA CONSULTA
        $i = 0;
        while ($i < $this->configuraciones[0]) {
            $dato_xx_x = '';
//////////////////////////////////////////////////////////////////////////
///////////////// INSPECCIONAMOS EL TIPO DE DATO DE CADA ELEMENTO
            if ($this->elementos[2][$i]==1) {
//////////////////////////////////////////////////////////////////////////
///////////////// CONCATENAMOS CADENA JSON Y excel REVISANDO SI ES PRIMERA VEZ O NO PARA TIPO 1
                $dato_xx_x = preg_replace('/[\x00-\x1F\x7F]/', ' ', $row[$i]);
                if ($i==0) {
                    $cadena_json = $cadena_json.'"'.$this->elementos[1][$i].'" : "'.$dato_xx_x.'"';  
                    if ($this->configuraciones[10][0]==1) {
                        $cadena_excel = $cadena_excel.$dato_xx_x;
                    }
                }
                if ($i>0) {
                    $cadena_json = $cadena_json.', "'.$this->elementos[1][$i].'" : "'.$dato_xx_x.'"';  
                    if ($this->configuraciones[10][0]==1) {
                        $cadena_excel = $cadena_excel."\t".$dato_xx_x;
                    }
                }
            }
            if ($this->elementos[2][$i]==2) {
//////////////////////////////////////////////////////////////////////////
///////////////// CONCATENAMOS CADENA JSON Y excel REVISANDO SI ES PRIMERA VEZ O NO PARA TIPO 2
                $dato_xx_x = preg_replace('/[\x00-\x1F\x7F]/', ' ', $row[$i]);
                if ($i==0) {
                    $cadena_json = $cadena_json.'"'.$this->elementos[1][$i].'" : '.$dato_xx_x;
                    if ($this->configuraciones[10][0]==1) {
                        $cadena_excel = $cadena_excel.$dato_xx_x;
                    }
                }
                else {
                    $cadena_json = $cadena_json.', "'.$this->elementos[1][$i].'" : '.$dato_xx_x;
                    if ($this->configuraciones[10][0]==1) {
                        $cadena_excel = $cadena_excel."\t".$dato_xx_x;
                    }
                }
            }  
            $i++;
        }
//////////////////////////////////////////////////////////////////////////
///////////////// TERMINAMOS DE LEER TODOS LOS DATOS DE UN REGISTRO
//////////////////////////////////////////////////////////////////////////
///////////////// INSPECCIONAMOS SI LA CONSULTA GENERA UN FORMATO excel Y CONCATENAMOS TERMINO DE RENGLON
        if ($this->configuraciones[10][0]==1) {
            $cadena_excel = $cadena_excel."\n";
        }
//////////////////////////////////////////////////////////////////////////
///////////////// CONCATENAMOS TERMINO DE OBJETO JSON Y SUMAMOS UN REGISTRO AL CONTADOR
        $cadena_json = $cadena_json.'}';  
        $si_res = $si_res + 1;
    }
//////////////////////////////////////////////////////////////////////////
///////////////// TERMINAMOS DE LEER TODOS LOS REGISTROS DE LA CONSULTA
//////////////////////////////////////////////////////////////////////////
///////////////// ACTUALIZAMOS VARIABLES DEL OBJETO CONSULTA CON LOS RESULTADOS Y EL TOTAL DE REGISTROS
    $this->codigos[3] = $cadena_json;
    $this->codigos[1] = '[{"registros" : '.$si_res.'}';
    $this->configuraciones[9] = $si_res;

//////////////////////////////////////////////////////////////////////////
///////////////// INSPECCIONAMOS SI HUBO REGISTROS CONCATENAMOS JSON Y PONEMOS 1 AL STATUS DEL OBJETO CONSULTA
    if ($si_res > 0) {
        $this->codigos[1]=$this->codigos[1].', '.$cadena_json;
        $this->configuraciones[6] = 1; 
    }
    else {
        $this->configuraciones[6] = 0; 
    }
    $this->codigos[1]=$this->codigos[1].']';

	if ($this->configuraciones[10][0]==1) {
	    $this->codigos[4] = $cadena_excel;
		if ($this->configuraciones[10][2]==0) {
//////////////////////////////////////////////////////////////////////////////
////////////// GENERAMOS ARCHIVO DESCARGADOR            
// Nombre del archivo
            $nombre_archivo_d = $this->configuraciones[10][3].$this->configuraciones[10][4].'.'.$this->configuraciones[10][5];
// Contenido del archivo descarga_archivo.php
            $contenido_php = <<<'EOD'
            <?php
                $nombre_archivo_d = "%s";
                header("Cache-Control: no-cache, must-revalidate");
                header("Content-Transfer-Encoding: binary");
                header("Content-Type: application/octet-stream");
                header("Content-Disposition: attachment; filename=" . $nombre_archivo_d);
                readfile($nombre_archivo_d);
                unlink($nombre_archivo_d);
                clearstatcache();
            ?>
            EOD;
// Escapar comillas dobles en el nombre del archivo
            $nombre_archivo_d = addslashes($nombre_archivo_d);
// Formatear el contenido del archivo con el nombre del archivo
            $contenido_php = sprintf($contenido_php, $nombre_archivo_d);
// Nombre del archivo descarga_archivo.php
            $archivo_nombre = $this->configuraciones[10][1].$this->configuraciones[10][6].$this->configuraciones[10][4].'.php';
// Escribir o sobrescribir el contenido en el archivo descarga_archivo.php
            file_put_contents($archivo_nombre, $contenido_php);
//////////////////////////////////////////////////////////////////////////////
////////////// GENERAMOS ARCHIVO A DESCARGAR            
            $i = 0;
			while ($i < $this->configuraciones[0]) {
				if ($i==0) {
					$titulos_excel = $titulos_excel.$this->elementos[0][$i];
				}
				else {
					$titulos_excel = $titulos_excel."\t".$this->elementos[0][$i];
				}
				$i++;
			}							
            $titulos_excel = $titulos_excel."\n";
			$cadena_excel = $titulos_excel.$cadena_excel;
			$this->codigos[4] = $cadena_excel; 
			$file = fopen($this->configuraciones[10][1].$nombre_archivo_d, "w");
			fwrite($file, $cadena_excel);	
        }
	}
}

//////////////////////////////////////////////////////////////////////////
///////////////// CODIGO DESPUES DE EJECUTAR CONSULTA TIPO INSERT CONSULTA TIPO 2
if ($this->configuraciones[7]==2) {
//////////////////////////////////////////////////////////////////////////
///////////////// PONEMOS 1 AL STATUS DEL OBJETO CONSULTA
    $this->configuraciones[6] = 1;
    if ($this->configuraciones[12]==1) {

        $this->codigos[1] = '[{"registros" : "0", "recupera" : "'.$conexion->insert_id.'"}]';
    }
}

//////////////////////////////////////////////////////////////////////////
///////////////// CODIGO DESPUES DE EJECUTAR CONSULTA TIPO DELETE CONSULTA TIPO 4
    if ($this->configuraciones[7]==4) {
    //////////////////////////////////////////////////////////////////////////
    ///////////////// PONEMOS 1 AL STATUS DEL OBJETO CONSULTA
        $this->configuraciones[6] = 1;
        if ($this->configuraciones[12]==1) {
    
            $this->codigos[1] = '[{"registros" : "0"}]';
        }
    }
    
            }
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// TERMINAMOS METODO EJECUTA ////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// METODO EJECUTA_RANGOS ///////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
public function ejecuta_rangos() 
		
        {

//////////////////////////////////////////////////////////////////////////
///////////////// ESTABLECEMOS VARIABLES INICIALES Y LA CANTIDAD DE CONSULTAS A EJECUTAR
$lote = $this->configuraciones[8][3] / $this->configuraciones[8][2];
if ($lote < 1) {
    $lote = 0;
} 
$lote = (int)$lote+1;
$suma_consulta = '';
$inicio_consulta = $this->configuraciones[8][1];
$inicio_consulta_2 = 0;
$total_registros = 0;
$total_registros_2 = 0;
$cadena_excel_2 = "";
$titulos_excel_2 = "";
$sw_ultima_consulta = 0;
$i = 0;
//////////////////////////////////////////////////////////////////////////
///////////////// HACEMOS UN CICLO POR CADA UNA DE LAS CONSULTAS A EJECUTAR
while ($i < $lote) {
//////////////////////////////////////////////////////////////////////////
///////////////// INSPECCIONAMOS SI ES LA ULTIMA CONSULTA PARCIAL

    if (($inicio_consulta_2+$this->configuraciones[8][2])>$this->configuraciones[8][3]) {
        $resta = ($inicio_consulta_2+$this->configuraciones[8][2])-$this->configuraciones[8][3];
        $this->configuraciones[8][2] = $this->configuraciones[8][2] - $resta;
        $sw_ultima_consulta = 1;
    }
//////////////////////////////////////////////////////////////////////////
///////////////// ACTUALIZAMOS INICIO DE CONSULTA Y EJECUTAMOS METODOS CONSTRUYE Y EJECUTA
    if ($this->configuraciones[8][2] > 0) {
        $this->configuraciones[8][1] = $inicio_consulta+$inicio_consulta_2;
        $this->construye();

        $this->ejecuta();
    
//////////////////////////////////////////////////////////////////////////
///////////////// CONCATENAMOS OBJETOS JSON RESULTADO DE LA CONSULTA
        if ($i == 0) {
            $suma_consulta = $suma_consulta.$this->codigos[3];
        }
        else {
            $suma_consulta = $suma_consulta.', '.$this->codigos[3];
        }

//////////////////////////////////////////////////////////////////////////
///////////////// INSPECCIONAMOS SI LA CONSULTA GENERA UN FORMATO excel Y CONCATENAMOS CADENA excel
        if ($this->configuraciones[10][0]==1) {
            $cadena_excel_2 = $cadena_excel_2.$this->codigos[4];
        }
    
//////////////////////////////////////////////////////////////////////////
///////////////// ACTUALIZAMOS INICIO DE CONSULTA Y TOTAL DE REGISTROS EN EL CICLO
        $inicio_consulta_2 = $inicio_consulta_2 + $this->configuraciones[8][2];
        $total_registros = $total_registros + $this->configuraciones[9];
        if ($sw_ultima_consulta==0) {

        }
        else {
            $total_registros = $this->configuraciones[8][1]+$this->configuraciones[9];
        }

    } 
    $i++;
}

//////////////////////////////////////////////////////////////////////////
///////////////// TERMINAMOS CICLO DE CONSULTAS ACTUALIZAMOS JSON Y NUMERO DE REGISTROS EN OBJETO

if ($total_registros > 0) {
    $this->codigos[1] = '[{"registros" : '.$total_registros.', "final" : '.$this->configuraciones[8][4].'}, '.$suma_consulta.']';
	$this->configuraciones[6] = 1; 
}
else {
//    $this->codigos[1] = '[{"registros" : '.$total_registros.'}]';
    $this->codigos[1] = '[{"registros" : '.$total_registros.', "final" : '.$this->configuraciones[8][4].'}]';
    $this->configuraciones[6] = 0; 
}
$this->configuraciones[9] = $total_registros;

//////////////////////////////////////////////////////////////////////////
///////////////// INSPECCIONAMOS SI LA CONSULTA GENERA UN FORMATO excel CONCATENAMOS CADENA excel GENERAMOS ARCHIVO
if ($this->configuraciones[10][0]==1) {
    if ($this->configuraciones[10][2]==1) {
        $modo_contenido = "w";
        if ($this->configuraciones[8][5]==0) {
            $i = 0;
            while ($i < $this->configuraciones[0]) {
                if ($i==0) {
                    $titulos_excel_2 = $titulos_excel_2.$this->elementos[0][$i];
                }
                else {
                    $titulos_excel_2 = $titulos_excel_2."\t".$this->elementos[0][$i];
                }
                $i++;
            }							
            $titulos_excel_2 = $titulos_excel_2."\n";
            $cadena_excel_2 = $titulos_excel_2.$cadena_excel_2;
            $modo_contenido = "w";
//////////////////////////////////////////////////////////////////////////////
//////////// GENERAMOS EL ARCHIVO DESCARGADOR 
//////////////////////////////////////////////////////////////////////////////
// Nombre del archivo
            $nombre_archivo_d = $this->configuraciones[10][3].$this->configuraciones[10][4].'.'.$this->configuraciones[10][5];
// Contenido del archivo descarga_archivo.php
            $contenido_php = <<<'EOD'
            <?php
                $nombre_archivo_d = "%s";
                header("Cache-Control: no-cache, must-revalidate");
                header("Content-Transfer-Encoding: binary");
                header("Content-Type: application/octet-stream");
                header("Content-Disposition: attachment; filename=" . $nombre_archivo_d);
                readfile($nombre_archivo_d);
                unlink($nombre_archivo_d);
                clearstatcache();
            ?>
            EOD;
// Escapar comillas dobles en el nombre del archivo
            $nombre_archivo_d = addslashes($nombre_archivo_d);
// Formatear el contenido del archivo con el nombre del archivo
            $contenido_php = sprintf($contenido_php, $nombre_archivo_d);
// Nombre del archivo descarga_archivo.php
            $archivo_nombre = $this->configuraciones[10][1].$this->configuraciones[10][6].$this->configuraciones[10][4].'.php';
// Escribir o sobrescribir el contenido en el archivo descarga_archivo.php
            file_put_contents($archivo_nombre, $contenido_php);
        }
        else {
            $modo_contenido = "a";
        }
        $this->codigos[4] = $cadena_excel_2; 
        $nombre_archivo_d = $this->configuraciones[10][3].$this->configuraciones[10][4].'.'.$this->configuraciones[10][5];
        $file = fopen($this->configuraciones[10][1].$nombre_archivo_d, $modo_contenido);
        fwrite($file, $cadena_excel_2);	
    }
}

        }

/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// OTROS METODOS ///////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////

public function obtener_registro($datos_registro)
{
    if ($this->configuraciones[6]==1) {
        $datos_json = json_decode($this->codigos[1], true);
        $segundo_registro = $datos_json[1];
        $claves_datos = array_keys($segundo_registro);
        $i = 0;
//        $cadena_valores = " ";
        while ($i < count($datos_registro)) {
            $this->codigos[2][] = $segundo_registro[$claves_datos[$datos_registro[$i]]];
            $i++;
        }
        return $this->codigos[2];
    }
    else {
        return ['NO HAY REGISTRO'];
    }

}
public function obtener_registro_status($datos_registro)
{
    if ($this->configuraciones[6]==1) {

        if (json_decode($this->codigos[1], true)[1]['confirma']==1) {
            $datos_json = json_decode($this->codigos[1], true);
            $segundo_registro = $datos_json[1];
            $claves_datos = array_keys($segundo_registro);
            $i = 0;
    //        $cadena_valores = " ";
            while ($i < count($datos_registro)) {
                $this->codigos[2][] = $segundo_registro[$claves_datos[$datos_registro[$i]]];
                $i++;
            }
            return $this->codigos[2];
    
        }
        else {
            $this->configuraciones[6] = 5;
            $datos_json = json_decode($this->codigos[1], true);
            $segundo_registro = $datos_json[1];
            $claves_datos = array_keys($segundo_registro);
            $i = 0;
    //        $cadena_valores = " ";
            while ($i < count($datos_registro)) {
                $this->codigos[2][] = $segundo_registro[$claves_datos[$datos_registro[$i]]];
                $i++;
            }
            return $this->codigos[2];
        }
    }
    else {
        return ['NO HAY REGISTRO'];
    }

}
public function construye_confirmacion($confirmacion) 
{
    if ($confirmacion==1) {
        $this->construye();
    }
}

public function ejecuta_confirmacion($confirmacion) 
{
    if ($confirmacion==1) {
        $this->ejecuta();
    }
}

public function obtener_dato($objeto, $posicion)
{
    $datos_json = json_decode($this->codigos[1], true);
    $registro = $datos_json[($objeto+1)];
    return $registro[$this->elementos[1][$posicion]];
}

public function obtener_dato_lote($objeto, $posicion, $posicion_inicial, $porcion)
{
    $valor_retorno = 0;
    $consulta_total = $posicion_inicial + $porcion;
    $datos_json = json_decode($this->codigos[1], true);
    $registro = $datos_json[($objeto+1)];
    $registros_total = $registro[$this->elementos[1][$posicion]];
    if ($consulta_total > $registros_total) {
        $valor_retorno = $porcion - ($consulta_total - $registros_total);
    }
    else {
        $valor_retorno = $porcion;
    }
    return $valor_retorno;
}

public function obtener_status($objeto, $posicion, $posicion_inicial, $porcion)
{
    $valor_retorno = 0;
    $consulta_total = $posicion_inicial + $porcion;
    $datos_json = json_decode($this->codigos[1], true);
    $registro = $datos_json[($objeto+1)];
    $registros_total = $registro[$this->elementos[1][$posicion]];
    
    if ($consulta_total > $registros_total || $consulta_total == $registros_total) {
        $valor_retorno = 1;
    }
    else {
        $valor_retorno = 0;
    }
    return $valor_retorno;
}

public function ejecuta_candado($candado)
{
    if ($candado[0]==0) {
        if ($candado[2]==0) {
            if ($candado[1]==0) {
                $this->ejecuta();
            }
            if ($candado[1]==1) {
                $this->ejecuta_rangos();
            }
        }
        else {
            $this->codigos[1] = '[{"registros" : "0", "sentido" : "0", "ejecucion" : "0"}]';
        }
    }
    if ($candado[0]==1) {
        if ($candado[2]==1) {
            if ($candado[1]==0) {
                $this->ejecuta();
            }
            if ($candado[1]==1) {
                $this->ejecuta_rangos();
            }
        }
        else {
            $this->codigos[1] = '[{"registros" : "0", "sentido" : "1", "ejecucion" : "0"}]';
        }
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////// METODO WHERE PARA CONSTRUIR UNA CONDICION/////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////

public function where()
{

// VAMOS A CONSTRUIR LA CADENA DE CONDICION A PARTIR DE UN ARREGLO DE CONDICIONES			
    
// INSPECCIONAMOS SI LA CONSULTA LLEVA FILTRO CUANDO: $this->configuraciones[2][0]==1

if ($this->configuraciones[2][0]==1) {
    $i = 0;
    $where_cadena = ' WHERE';

// HACEMOS UN CICLO MAESTRO TANTAS VECES COMO ELEMENTOS TENGA EL ARREGLO: $this->configuraciones[2][1]
// QUE CORRESPONDE AL CONTENEDOR DE LOS FILTROS CONCATENADOS EN ESTA CONSULTA
    
    while ($i < count($this->configuraciones[2][1])) {

// INSPECIONAMOS SI NO ES EL PRIMER FILTRO PARA CONCATENAR UNA CONEXION 0 = AND, 1 = OR
        
        if ($i > 0) {

// INSPECIONAMOS EL TIPO DE CONEXION CON LA POSICIÓN $this->configuraciones[2][1][$i][0] 0 = AND = 1 OR
            
            if ($this->configuraciones[2][1][$i][0]==0) {
                $where_cadena = $where_cadena.' AND';
            }
            if ($this->configuraciones[2][1][$i][0]==1) {
                $where_cadena = $where_cadena.' OR';
            }
        } 

// CONCATENAMOS LA APERTURA DE PARENTESIS POR CADA FILTRO
        
        $where_cadena = $where_cadena.' (';
// HACEMOS UN SUB CICLO POR CADA ELEMENTO DE SUBFILTRO POR CADA FILTRO
        $ii = 0;
        while ($ii < count($this->configuraciones[2][1][$i][1])) {
// INSPECIONAMOS SI NO ES EL PRIMER ELEMENTO DEL SUBFILTRO PARA CONCATENAR UNA CONEXION 0 = AND, 1 = OR
            if ($ii > 0) {
// INSPECIONAMOS EL TIPO DE CONEXION CON LA POSICIÓN $this->configuraciones[2][1][$i][1][$ii][0] 0 = AND = 1 OR
                if ($this->configuraciones[2][1][$i][1][$ii][0]==0) {
                    $where_cadena = $where_cadena.' AND ';
                }
                if ($this->configuraciones[2][1][$i][1][$ii][0]==1) {
                    $where_cadena = $where_cadena.' OR ';
                }
            } 
// CONCATENAMOS EL PRIMER MIEMBRO DE LA ECUACIÓN
            $where_cadena = $where_cadena.$this->configuraciones[2][1][$i][1][$ii][1];
// INSPECIONAMOS EL TIPO DE OPERADOR CON LA POSICIÓN $this->configuraciones[2][1][$i][1][$ii][2]
// 0 = '=' (ES IGUAL), 1 = '<>' (NO ES IGUAL), 2 = 'IS NULL', 3 = 'IS NOT NULL', 4 = '>' (MAYOR QUE)
            if ($this->configuraciones[2][1][$i][1][$ii][2]==0) {
                $where_cadena = $where_cadena.' = "'.$this->configuraciones[2][1][$i][1][$ii][3].'"';
            }
            if ($this->configuraciones[2][1][$i][1][$ii][2]==1) {
                $where_cadena = $where_cadena.' <> "'.$this->configuraciones[2][1][$i][1][$ii][3].'"';
            }
            if ($this->configuraciones[2][1][$i][1][$ii][2]==2) {
                $where_cadena = $where_cadena.' IS NULL';
            }
            if ($this->configuraciones[2][1][$i][1][$ii][2]==3) {
                $where_cadena = $where_cadena.' IS NOT NULL';
            }
            if ($this->configuraciones[2][1][$i][1][$ii][2]==4) {
                $where_cadena = $where_cadena.' > "'.$this->configuraciones[2][1][$i][1][$ii][3].'"';
            }
            if ($this->configuraciones[2][1][$i][1][$ii][2]==5) {
                $where_cadena = $where_cadena.' < "'.$this->configuraciones[2][1][$i][1][$ii][3].'"';
            }
            if ($this->configuraciones[2][1][$i][1][$ii][2]==6) {
                $where_cadena = $where_cadena.' BETWEEN "'.$this->configuraciones[2][1][$i][1][$ii][3][0].'" AND "'.$this->configuraciones[2][1][$i][1][$ii][3][1].'"';
            }
            if ($this->configuraciones[2][1][$i][1][$ii][2]==7) {
                $where_cadena = $where_cadena.' > NOW()';
            }
        $ii++;
        }
// CONCATENAMOS EL CIERRE DE PARENTESIS POR CADA FILTRO
        $where_cadena = $where_cadena.')';
//    $parametro02 = [1, [[0, "Password", 0, $pass, 1]], 0];
        $i++;
    }
    return $where_cadena;			
}			

}






    }	
