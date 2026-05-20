<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
// DEFINICION DE LA CLASE Phpmail
	class Phpmail
	
	{
		
		public $configuraciones;
		
		public function __construct($configuraciones) 
		
		{
			$this->configuraciones = $configuraciones;

        }                              

        public function ejecuta() 
		
        {
          
            try {
                // Configuración del servidor SMTP de Gmail
                $this->configuraciones[1][0]->isSMTP();                                      // Configura PHPMailer para usar SMTP
                $this->configuraciones[1][0]->Host = $this->configuraciones[1][1];                 // Especifica el servidor SMTP de Gmail
                $this->configuraciones[1][0]->SMTPAuth = true;                             // Habilita autenticación SMTP
                $this->configuraciones[1][0]->Username = $this->configuraciones[1][2];       // Usuario SMTP (correo del remitente)
                $this->configuraciones[1][0]->Password = $this->configuraciones[1][3];   // Contraseña de la cuenta Gmail o contraseña de aplicación
                $this->configuraciones[1][0]->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Habilita encriptación TLS
                $this->configuraciones[1][0]->Port = 587;                              // Puerto SMTP de Gmail
            
                // Configuración del remitente y destinatario
                $this->configuraciones[1][0]->setFrom($this->configuraciones[1][2], $this->configuraciones[1][4]); // Correo y nombre del remitente
                $this->configuraciones[1][0]->addAddress($this->configuraciones[1][5]);               // Correo del destinatario
            
                // Configuración del contenido del correo
                $this->configuraciones[1][0]->isHTML(true);                                  // Define el formato del correo como HTML
                $this->configuraciones[1][0]->Subject = $this->configuraciones[1][6];          // Asunto del correo
            
                // Cuerpo del correo con un enlace que incluye el correo como parámetro
                $this->configuraciones[1][0]->Body = $this->configuraciones[1][7];
            
                // Envía el correo
                $this->configuraciones[1][0]->send();
                $this->configuraciones[0][0] = 1;
            } catch (Exception $e) {
                $this->configuraciones[0][0] = 0;
            }
        }

    }
