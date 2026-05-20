<?php
// DEFINICION DE LA CLASE Descarga
	class Descarga
	{
		public $configuraciones;
		public function __construct($configuraciones) 
		{
			$this->configuraciones = $configuraciones;
		}                              
		
        public function ejecuta() 
		
        {
            $_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
            $_SESSION['logPhp']->escribe_log();
            $_SESSION['logPhp']->escribe_log();
            $_SESSION['logPhp']->escribe_log();
            $_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' ESTOY EN OBJETO DESCARGA';
            $_SESSION['logPhp']->escribe_log();
            $_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
            $_SESSION['logPhp']->escribe_log();
            $_SESSION['logPhp']->escribe_log();
            $_SESSION['logPhp']->escribe_log();
            $_SESSION['logPhp']->configuraciones[1] = ' ';
            $_SESSION['logPhp']->escribe_log();
                    
            
            
            
            
            exec('php ../descargas/descarga_archivo.php', $output);
        }                              
	
    }
