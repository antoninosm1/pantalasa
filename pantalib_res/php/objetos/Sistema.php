<?php
// DEFINICION DE LA CLASE Sistema
	class Sistema 
	
	{
		
		public $idsistema;
		public $nombresistema;
		public $idiomasistema;
		public $rutasistema;
		
		public function __construct($idsistema, $nombresistema, $idiomasistema, $rutasistema) 
		
		{
			$this->idsistema = $idsistema;
			$this->nombresistema = $nombresistema;
			$this->idiomasistema = $idiomasistema;
			$this->rutasistema = $rutasistema;
		}                              

		public function inicia() 
		
		{

		}                              
	}

?>
