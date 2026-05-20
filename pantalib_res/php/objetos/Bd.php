<?php
// DEFINICION DE LA CLASE Bd
	class Bd 
	
	{
		
		public $BD;
		public $usuarioBD;
		public $claveusuarioBD;
		
		public function __construct($BD, $usuarioBD, $claveusuarioBD) 
		
		{
			$this->BD = $BD;
			$this->usuarioBD = $usuarioBD;
			$this->claveusuarioBD = $claveusuarioBD;
		}                              

	}

?>
