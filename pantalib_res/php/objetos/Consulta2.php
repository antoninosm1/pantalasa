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

		public function construye() 
		
		{

			$select_cadena = "";
			$where_cadena = "";
			$order_cadena = "";

// VAMOS A CONSTRUIR LA CADENA DE SELECT A PARTIR DE UNA SERIE DE ELEMENTOS			
				
			$i = 0;
			while ($i < $this->configuraciones[0]) {
				if ($i==0) {
					$select_cadena = 'SELECT '.$this->elementos[$i];
				}
				else {
					$select_cadena = $select_cadena.', '.$this->elementos[$i];
				}
				$i++;
			}			

// VAMOS A CONSTRUIR LA CADENA DE CONDICION A PARTIR DE UN ARREGLO DE CONDICIONES			
			
			if ($this->configuraciones[2][0]==1) {
				$i = 0;
				$where_cadena = " WHERE ";
				while ($i < count($this->configuraciones[2][1])) {
					if ($i==0) {
						$where_cadena = $this->configuraciones[2][1][$i][1].' '.$this->configuraciones[2][1][$i][2].' '.$this->configuraciones[2][1][$i][3];
					}
					else {
						if ($this->configuraciones[2][1][$i][0]==0) {
							$where_cadena = $where_cadena.$this->configuraciones[2][1][$i][1].' '.$this->configuraciones[2][1][$i][2].' '.$this->configuraciones[2][1][$i][3];
						}
						else {
							if ($this->configuraciones[2][1][$i][0]==1) {
								$where_cadena = $where_cadena.' AND '.$this->configuraciones[2][1][$i][1].' '.$this->configuraciones[2][1][$i][2].' '.$this->configuraciones[2][1][$i][3];
							}
						}
					}
					$i++;
				}			
			}			

// VAMOS A CONSTRUIR LA CADENA DE ORDEN A PARTIR DE UN ARREGLO DE CAMPOS			
			
			if ($this->configuraciones[3][0]==1) {
				$i = 0;
				$order_cadena = " ORDER BY ";
				while ($i < count($this->configuraciones[3][2])) {
					if ($i==0) {
						$order_cadena = $this->configuraciones[3][2][$i];
					}
					else {
						$order_cadena = $order_cadena.', '.$this->configuraciones[3][2][$i];
					}
					$i++;
				}			
			}			
// VAMOS A CONCATENAR LA CADENA FINAL			
			$this->codigos[0] = $this->codigos[0].$select_cadena.$where_cadena.$order_cadena;
			$this->configuraciones[4]->escribe_log($this->codigos[0]);
		}
	}
?>
