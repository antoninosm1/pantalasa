<?php
// DEFINICION DE LA CLASE Reordena
	class Reordena
	
	{
		
		public $configuraciones;
		
		public function __construct($configuraciones) 
		
		{
			$this->configuraciones = $configuraciones;

        }                              

        public function ejecuta() 
		
        {
//////////////////////////////////////////////////////////////////////////
///////////////// ESTABLECEMOS CONEXIÓN A LA BD Y HACEMOS CONSULTA
          
            $conexion = new mysqli($this->configuraciones[2]->configuraciones[0], $this->configuraciones[2]->configuraciones[1], $this->configuraciones[2]->configuraciones[2], $this->configuraciones[2]->configuraciones[3]);

            // CREAMOS CONSULTA DE DEPENDIENTES DE LA TABLA MAESTRA 
            $consulta = 'SELECT '.$this->configuraciones[1][6].' FROM '.$this->configuraciones[1][4].' WHERE '.$this->configuraciones[1][5].' = '.$this->configuraciones[1][3].' ORDER BY '.$this->configuraciones[1][7]; 
            $resultado = $conexion -> query($consulta);
            $contador = 0;
            while($row = $resultado -> fetch_array()) {
                $contador ++;
                // CREAMOS CONSULTA PARA ACTUALIZAR NUMERO DE DEPENDIENTE 
                $consulta = 'UPDATE '.$this->configuraciones[1][4].' SET '.$this->configuraciones[1][8].' = '.$contador.' WHERE '.$this->configuraciones[1][6].' = '.$row[0]; 
                $conexion -> query($consulta);
            }                
            $consulta = 'UPDATE '.$this->configuraciones[1][0].' SET '.$this->configuraciones[1][2].' = '.$contador.' WHERE '.$this->configuraciones[1][1].' = '.$this->configuraciones[1][3]; 
            $conexion -> query($consulta);

        }

    }
