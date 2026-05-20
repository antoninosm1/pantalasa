<?php
	require_once("../pantalib/php/objetos/Sistema.php");
	header('Content-Type: text/html; charset=UTF-8');
	session_start();
	
	// INICIA PROCESO PARA ESTABLECER IDIOMA DE SISTEMA
	
	if (isset($_SESSION['Sistema'])) {
	}
	else {
		$_SESSION['Sistema'] = new Sistema(1, "laboratorio", 0);
	}
?>
<HTML>
	<HEAD>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>
	</HEAD>
	<BODY class="pantalasa_maqueta" id="maqueta_formulario_filelist">
		ESTRUCTURA ARBOL
	</BODY>
</HTML>

<script>
class Nodo {
  constructor(dato) {
    this.Dato = dato;
    this.Siguiente = [];
  }
}

class Mundo {
  constructor() {
    this.raiz = new Nodo("Mundo");
  }

  agregarNodo(padre, dato) {
    const nodoPadre = this.buscarNodo(this.raiz, padre);
    if (nodoPadre) {
      const nuevoNodo = new Nodo(dato);
      nodoPadre.Siguiente.push(nuevoNodo);
    }
  }

  buscarNodo(nodo, dato) {
    if (nodo.Dato === dato) {
      return nodo;
    } else {
      for (const hijo of nodo.Siguiente) {
        const resultado = this.buscarNodo(hijo, dato);
        if (resultado) {
          return resultado;
        }
      }
    }
    return null;
  }

  imprime_estructura() {
    this.imprimirRecursivo(this.raiz);
  }

  imprimirRecursivo(nodo) {
    alert(nodo.Dato);
    for (const hijo of nodo.Siguiente) {
      this.imprimirRecursivo(hijo);
    }
  }
}

// Crear la estructura de datos
const mundo = new Mundo();

// Agregar nodos al primer nivel
mundo.agregarNodo("Mundo", "Africa");
mundo.agregarNodo("Mundo", "America");
mundo.agregarNodo("Mundo", "Europa");
mundo.agregarNodo("Mundo", "Asia");
mundo.agregarNodo("Mundo", "Oceania");

// Agregar nodos al segundo nivel
mundo.agregarNodo("Africa", "NortAfrica");
mundo.agregarNodo("Africa", "AfricaCentral");
mundo.agregarNodo("Africa", "AfricaSur");

mundo.agregarNodo("America", "NortAmerica");
mundo.agregarNodo("America", "AmericaCentral");
mundo.agregarNodo("America", "SudAmerica");

mundo.agregarNodo("Europa", "Iberia");
mundo.agregarNodo("Europa", "ReinoUnido");
mundo.agregarNodo("Europa", "EuropaCentral");
mundo.agregarNodo("Europa", "NortEuropa");
mundo.agregarNodo("Europa", "Mediterraneo");
mundo.agregarNodo("Europa", "Balcanes");

mundo.agregarNodo("Asia", "Eurasia");
mundo.agregarNodo("Asia", "Pacifico");
mundo.agregarNodo("Asia", "Meseta");
mundo.agregarNodo("Asia", "Indochina");

// Agregar nodos al tercer nivel
mundo.agregarNodo("NortAfrica", "Argelia");
mundo.agregarNodo("NortAfrica", "Egipto");
mundo.agregarNodo("NortAfrica", "Libia");

mundo.agregarNodo("Egipto", "AltoNilo");
mundo.agregarNodo("Egipto", "BajoNilo");

mundo.agregarNodo("NortAmerica", "Canada");
mundo.agregarNodo("NortAmerica", "USA");
mundo.agregarNodo("NortAmerica", "Mexico");

mundo.agregarNodo("Mexico", "NorteMexico");
mundo.agregarNodo("Mexico", "MexicoCentral");
mundo.agregarNodo("Mexico", "MexicoSur");

mundo.agregarNodo("EuropaCentral", "Francia");
mundo.agregarNodo("EuropaCentral", "Alemania");
mundo.agregarNodo("EuropaCentral", "Belgica");
mundo.agregarNodo("EuropaCentral", "Holanda");

mundo.agregarNodo("Asia", "Indonesia");

// Agregar nodos al cuarto nivel
mundo.agregarNodo("Indonesia", "VietNam");
mundo.agregarNodo("Indonesia", "Laos");
mundo.agregarNodo("Indonesia", "Camboya");

// Imprimir la estructura
mundo.imprime_estructura();

console.log(mundo);

alert("estoy vivo");

</script>
 