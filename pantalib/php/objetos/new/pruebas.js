


$this->configuraciones = ['localhost', 'uyjjg45e2gxu3', 'Delicias@Chihuahua1Mexico', 'db6grkj7w2ygmv'];


$conexion = new mysqli('localhost', 'uyjjg45e2gxu3', 'Delicias@Chihuahua1Mexico', 'Delicias@Chihuahua1Mexico');
$resultado = $conexion -> query('INSERT INTO cedula (MunicipioNum, MunicipioNom) VALUES ("001", "prueba")');
