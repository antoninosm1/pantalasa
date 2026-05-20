<?php
// DEFINICION DE LA CLASE Log
	class Log
	{
		public $configuraciones;
		public function __construct($configuraciones) {
			$this->configuraciones = $configuraciones;
		}                              
		public function escribe_log() {
            if ($this->configuraciones[3]->configuraciones[4]==1) {
                $gestor = fopen($this->configuraciones[2].$this->configuraciones[0], 'a');
                if ($gestor === false) {
                    error_log("Error al abrir o crear el archivo ".$this->configuraciones[2].$this->configuraciones[0]." para escritura.");
                } else {
                    ini_set('error_log', $this->configuraciones[2].$this->configuraciones[0]);
                    $resultado = fwrite($gestor, $this->configuraciones[1] . PHP_EOL);
                    if ($resultado === false) {
                        error_log("Error al escribir en el archivo ".$this->configuraciones[2].$this->configuraciones[0].".");
                    } 
                    fclose($gestor);
                }
    
            }
        }                              
	}
