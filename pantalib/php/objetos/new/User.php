<?php
// DEFINICION DE LA CLASE User
	class User
	
	{
		
		public $configuraciones;
		public $elementos;
		
		public function __construct($configuraciones, $elementos) 
		
		{
			$this->configuraciones = $configuraciones;
			$this->elementos = $elementos;

        }                              
	
		public function actualiza($parametros)
					
		{
			$i = 0;
			while ($i < count($this->elementos[0])) {
				$this->elementos[0][$i] = $parametros[$i];
				$i++;
			}			

        }                              
		public function confirma_actualiza($confirmacion, $parametros)
					
		{
			$_SESSION['logPhp']->configuraciones[1] = ' ';
			$_SESSION['logPhp']->escribe_log();
			$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
			$_SESSION['logPhp']->escribe_log();
			$_SESSION['logPhp']->escribe_log();
			$_SESSION['logPhp']->configuraciones[1] = 'User.php PARAMETRO STATUS......: '.$confirmacion;
			$_SESSION['logPhp']->escribe_log();
			$_SESSION['logPhp']->configuraciones[1] = 'User.php PARAMETRO PARAMETROS..: '.implode(", ", $parametros);
			$_SESSION['logPhp']->escribe_log();
			$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
			$_SESSION['logPhp']->escribe_log();
			$_SESSION['logPhp']->escribe_log();
			$_SESSION['logPhp']->configuraciones[1] = ' ';
			$_SESSION['logPhp']->escribe_log();

			if ($confirmacion==1) {
				$this->actualiza($parametros);
			}
			else {
				$this->elementos[0][0] = 0;
			}
		}
	}
