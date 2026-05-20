package com.pantalasa.mudanzas

import android.os.Bundle
import android.text.Editable
import android.text.TextWatcher
import android.util.Log
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.AppCompatEditText
import com.google.android.material.button.MaterialButton
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import androidx.lifecycle.lifecycleScope
import androidx.activity.viewModels
import org.json.JSONArray
import kotlinx.coroutines.withContext

import com.pantalasa.mudanzas.bd.Bd
import com.pantalasa.mudanzas.bd.GeneralTabla
import com.pantalasa.mudanzas.bd.SesionesTabla

import com.pantalasa.mudanzas.clases.Formulario
import com.pantalasa.mudanzas.clases.Metodos
import com.pantalasa.mudanzas.clases.Evaluaciones
import com.pantalasa.mudanzas.clases.Print
import com.pantalasa.mudanzas.clases.Modal
import com.pantalasa.mudanzas.clases.Session
import com.pantalasa.mudanzas.clases.Actividad
import com.pantalasa.mudanzas.clases.Back

import com.pantalasa.mudanzas.viewmodels.RedViewModel

class OnlineLoginActivity : AppCompatActivity() {
    private val redViewModel: RedViewModel by viewModels()
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_online_login)

        ///////////////////////////////////////////////////////////////
        // BLOQUE 1: INICIALIZACIÓN DE PRINT

        val impresora = Print.getInstance()

        impresora.setContext(this) // <- LINEA CRÍTICA NUEVA: Proporciona el contexto
        impresora.excepciones = mutableListOf(1)
        impresora.ruta[0] = "OnlineLoginActivity.kt"
        impresora.print(mutableListOf(mutableListOf(3, "1) INICIA OnlineLoginActivity.kt", false)))
        impresora.print(mutableListOf(mutableListOf(5, "1) INICIALIZA impresora", true)))

        /////////////////////////////////////////////////////////////////////////
        // AREA SESSION
        /////////////////////////////////////////////////////////////////////////

        var sesionActiva = Session.getInstance()

        ///////////////////////////////////////////////////////////////
        // AREA BD Y TABLAS
        ///////////////////////////////////////////////////////////////

        val dbMudanzas = Bd.getInstance(applicationContext).obtener()
        val tablaGeneral = GeneralTabla.getInstance(dbMudanzas.generalDao())
        val tablaSesiones = SesionesTabla.getInstance(dbMudanzas.sesionesDao())

        /////////////////////////////////////////////////////////////////////////
        // AREA INICIAR SESSION PHP
        /////////////////////////////////////////////////////////////////////////

        val Php = Back(
            contexto = this@OnlineLoginActivity,
            script = sesionActiva.ruta + "android_session.php",
            parametros = mutableListOf(),
            nombres = mutableListOf(),
            respuesta = 0
        )

        CoroutineScope(Dispatchers.IO).launch {
            Php.sessionPrincipalPhp()
        }

/////////////////////////////////////////////////////////////////////////
// AREA DATOS
/////////////////////////////////////////////////////////////////////////

        // CLASE........: Formulario
        // INSTANCIA....: Formulario_online_login
        // FUNCIONALIDAD: Datos iniciales

        var tipoTratamiento = 0
        var validado = false
        var idPantalla = "main_login_online"
        var cadenaErrores = ""
        val Formulario_online_login = Formulario(
            tipoTratamiento,
            validado,
            idPantalla,
            cadenaErrores,
            this
        )
        Formulario_online_login.agregarElemento(
            "area_usuario",
            "",
            "",
            String::class.java,
            true,
            true,
            true,
            false,
            "",
            mutableListOf(1),
            mutableListOf("EL USUARIO NO PUEDE ESTAR VACIO."),
            mutableListOf(false)
        )
        Formulario_online_login.agregarElemento(
            "area_contrasena",
            "",
            "",
            String::class.java,
            true,
            true,
            true,
            false,
            "",
            mutableListOf(1, 2),
            mutableListOf(
                "LA CONTRASEÑA NO PUEDE ESTAR VACIA.",
                "LA CONTRASEÑA NO PUEDE CONTENER ESPACIOS."
            ),
            mutableListOf(false, false)
        )

/////////////////////////////////////////////////////////////////////////
// AREA BOTON SALIR
/////////////////////////////////////////////////////////////////////////

        // Configurar botón "SALIR"
        val botonSalir = findViewById<MaterialButton>(R.id.boton_salir)
        botonSalir.setOnClickListener {
            lifecycleScope.launch {
                try {
                    // Todas las operaciones de BD deben ir en Dispatchers.IO
                    val tablaSesiones = withContext(Dispatchers.IO) {
                        SesionesTabla.getInstance(dbMudanzas.sesionesDao())
                    }

                    withContext(Dispatchers.IO) {
                        tablaSesiones.cerrarSesion(sesionActiva.sesionBd)
                    }

                    // Las operaciones de UI deben volver al hilo principal
                    withContext(Dispatchers.Main) {
                        finishAffinity()
                        System.exit(0)
                    }
                } catch (e: Exception) {
                    Log.e("OnlineLoginActivity", "Error al cerrar sesión", e)
                    // Opcional: Mostrar mensaje de error al usuario
                }
            }
        }

/////////////////////////////////////////////////////////////////////////
// AREA EDIT TEXT USUARIO
/////////////////////////////////////////////////////////////////////////

        // Configurar observadores para cambios en los EditText
        val Usuario_edit_text =
            findViewById<AppCompatEditText>(R.id.area_usuario)
        Usuario_edit_text.addTextChangedListener(object : TextWatcher {
            override fun beforeTextChanged(s: CharSequence?, start: Int, count: Int, after: Int) {}
            override fun onTextChanged(s: CharSequence?, start: Int, before: Int, count: Int) {}
            override fun afterTextChanged(s: Editable?) {
                Formulario_online_login.actualiza_valor(
                    0,
                    Usuario_edit_text.text.toString()
                ) // Ejecuta cuando el texto de "area_usuario" cambia
            }
        })

/////////////////////////////////////////////////////////////////////////
// AREA EDIT TEXT CONTRASEÑA
/////////////////////////////////////////////////////////////////////////

        val Contrasena_edit_text =
            findViewById<AppCompatEditText>(R.id.area_contrasena)
        Contrasena_edit_text.addTextChangedListener(object : TextWatcher {
            override fun beforeTextChanged(s: CharSequence?, start: Int, count: Int, after: Int) {}
            override fun onTextChanged(s: CharSequence?, start: Int, before: Int, count: Int) {}
            override fun afterTextChanged(s: Editable?) {
                Formulario_online_login.actualiza_valor(
                    1,
                    Contrasena_edit_text.text.toString()
                ) // Ejecuta cuando el texto de "area_usuario" cambia
            }
        })

/////////////////////////////////////////////////////////////////////////
// AREA MODAL CAPTURA INVALIDA
/////////////////////////////////////////////////////////////////////////

        // Crear instancia de VentanaModal
        var Modal_invalidos = Modal(
            context = this,
            titulo = "CAPTURA INVALIDA",
            mensaje = "",
            botones = listOf(
                "OK" to {
                    impresora.print(mutableListOf(mutableListOf(5, "ACEPTAR MODAL", true)))
                }
            )
        )

/////////////////////////////////////////////////////////////////////////
// AREA MODAL CAPTURA VALIDA
/////////////////////////////////////////////////////////////////////////

        var Modal_validos = Modal(
            context = this,
            titulo = "CAPTURA VALIDA",
            mensaje = "LOS DATOS SON CORRECTOS VOY A CONTINUAR",
            botones = listOf(
                "OK" to {
                    impresora.print(mutableListOf(mutableListOf(5, "CANCELAR MODAL", true)))
                }
            )
        )

/////////////////////////////////////////////////////////////////////////
// AREA MODAL DATOS INCORRECTOS
/////////////////////////////////////////////////////////////////////////

        var Modal_incorrectos = Modal(
            context = this,
            titulo = "DATOS INCORRECTOS",
            mensaje = "LOS DATOS SON INCORRECTOS",
            botones = listOf(
                "OK" to {
                    impresora.print(mutableListOf(mutableListOf(5, "CANCELAR MODAL", true)))
                }
            )
        )

/////////////////////////////////////////////////////////////////////////
// AREA MODAL CONEXION PERDIDA
/////////////////////////////////////////////////////////////////////////

        var Modal_conexion_perdida = Modal(
            context = this,
            titulo = "NO HAY CONEXIÓN",
            mensaje = "SE PERDIÓ LA CONEXIÓN",
            botones = listOf(
                "OK" to {
                    impresora.print(mutableListOf(mutableListOf(5, "CANCELAR MODAL", true)))
                }
            )
        )

/////////////////////////////////////////////////////////////////////////
// AREA MODAL ERROR RESPUESTA
/////////////////////////////////////////////////////////////////////////

        var Modal_error_respuesta = Modal(
            context = this,
            titulo = "ERROR",
            mensaje = "HUBO UN ERROR EN LA RESPUESTA DEL SERVIDOR",
            botones = listOf(
                "OK" to {
                    impresora.print(mutableListOf(mutableListOf(5, "CANCELAR MODAL", true)))
                }
            )
        )

/////////////////////////////////////////////////////////////////////////
// AREA ACTIVIDADES
/////////////////////////////////////////////////////////////////////////

        val actividad_online_login = Actividad(OnlineLoginActivity::class.java as Class<*>)
//        val actividad_cedulas_gradilla = Actividad(OnlineCedulasGradillaActivity::class.java as Class<*>)

        val actividad_repositorios = Actividad(RepositoriosActivity::class.java as Class<*>)
//        var actividad_offline_home = Actividad(OfflineHomeActivity::class.java as Class<*>)

//        val actividad_repositorios = Actividad(ConstruccionActivity::class.java as Class<*>)
        var actividad_offline_home = Actividad(ConstruccionActivity::class.java as Class<*>)

/////////////////////////////////////////////////////////////////////////
// AREA METODOS
/////////////////////////////////////////////////////////////////////////

        // Crear instancia de la clase Metodos
        val Metodos_online_login = Metodos()
        // Agregar métodos y configuraciones a la lista
        Metodos_online_login.agregarListaMetodos(
            instancias = mutableListOf(
                Pair("Impresora", impresora)
            ),
            metodos = mutableListOf(
                "print"
            ),
            parametros = mutableListOf(
                mutableListOf("CAPTURA CORRECTA")
            ),
            ambitos = mutableListOf(0) // Ámbito suspendido para todos los métodos
        )
        Metodos_online_login.agregarListaMetodos(
            instancias = mutableListOf(
                Pair("Modal_invalidos", Modal_invalidos)
            ),
            metodos = mutableListOf(
                "mostrar"
            ),
            parametros = mutableListOf(
                mutableListOf()
            ),
            ambitos = mutableListOf(0) // Ámbito suspendido para todos los métodos
        )
        Metodos_online_login.agregarListaMetodos(
            instancias = mutableListOf(
                Pair("actividad_online_login", actividad_online_login),
                Pair("actividad_repositorios", actividad_repositorios)
            ),
            metodos = mutableListOf(
                "cerrar",
                "lanzar"
            ),
            parametros = mutableListOf(
                mutableListOf(),
                mutableListOf()
            ),
            ambitos = mutableListOf(0, 0) // Ámbito suspendido para todos los métodos
        )
        Metodos_online_login.agregarListaMetodos(
            instancias = mutableListOf(
                Pair("Modal_conexion_perdida", Modal_conexion_perdida),
                Pair("actividad_online_login", actividad_online_login),
                Pair("actividad_offline_home", actividad_offline_home)
            ),
            metodos = mutableListOf(
                "mostrar",
                "cerrar",
                "lanzar"
            ),
            parametros = mutableListOf(
                mutableListOf(),
                mutableListOf(this@OnlineLoginActivity),
                mutableListOf(this@OnlineLoginActivity)
            ),
            ambitos = mutableListOf(0, 0, 0) // Ámbito suspendido para todos los métodos
        )
        Metodos_online_login.agregarListaMetodos(
            instancias = mutableListOf(
                Pair("actividad_online_login", actividad_online_login),
                Pair("actividad_repositorios", actividad_repositorios),
            ),
            metodos = mutableListOf(
                "cerrar",
                "lanzar"
            ),
            parametros = mutableListOf(
                mutableListOf(this@OnlineLoginActivity),
                mutableListOf(this@OnlineLoginActivity)
            ),
            ambitos = mutableListOf(0, 0) // Ámbito suspendido para todos los métodos
        )


///////////////////////////////////////////////////////////////
// AREA EVALUACION FORMULARIO
///////////////////////////////////////////////////////////////

        // CLASE........: Evaluaciones
        // INSTANCIA....: evaluacionFormulario
        // FUNCIONALIDAD: Clase para evaluar Formulario_online_login.validado
        // .............: antes de ejecutar Metodos
        val evaluacionFormulario = Evaluaciones()
        // CONFIGURAR POSICIONES QUE SE EJECUTAN SEGUN LA VALIDACION
        evaluacionFormulario.posiciones = mutableListOf(
            mutableListOf<Int>(0),
            mutableListOf<Int>(1),
            mutableListOf<Int>(),
            mutableListOf<Int>()
        )
        evaluacionFormulario.errorTextoInicial = "ERROR"
        evaluacionFormulario.errorTextoFinal = ""
        evaluacionFormulario.agregarError(
            valor = "",
            tipo = java.lang.Boolean::class.java,
            status = false,
            textoPrevio = "",
            textoPosterior = "",
            textoError = "",
            posicionValidaciones = listOf<Any>(),
            valoresComparacion = mutableListOf(
                listOf(12, "", 0, " USUARIO VACIO", listOf<Int>())
            ),
        )
        evaluacionFormulario.agregarError(
            valor = "",
            tipo = java.lang.Boolean::class.java,
            status = false,
            textoPrevio = "",
            textoPosterior = "",
            textoError = "",
            posicionValidaciones = listOf<Any>(),
            valoresComparacion = mutableListOf(
                listOf(12, "", 0, " CONTRASEÑA VACIA", listOf<Int>()),
                listOf(11, "", 0, " CONTRASEÑA CON ESPACIOS", listOf<Int>())
            ),
        )

/////////////////////////////////////////////////////////////////////////
// AREA SCRIPT ENVIA DATOS
/////////////////////////////////////////////////////////////////////////

        val scriptEnvia = Back(
            contexto = this@OnlineLoginActivity,
            script = sesionActiva.ruta + "php/consulta_login.php",
            parametros = mutableListOf(),
            nombres = mutableListOf(),
            respuesta = 1
        )

/////////////////////////////////////////////////////////////////////////
// AREA BOTON INGRESAR
/////////////////////////////////////////////////////////////////////////

        // Configurar botón "INGRESAR"
        val botonIngresar = findViewById<MaterialButton>(R.id.boton_ingresar)
        botonIngresar.setOnClickListener {

            Formulario_online_login.validar_datos()

            evaluacionFormulario.recibe_valor(0, Usuario_edit_text.text.toString())
            evaluacionFormulario.recibe_valor(1, Contrasena_edit_text.text.toString())
            evaluacionFormulario.ejecutar()

            Modal_invalidos.mensaje = evaluacionFormulario.errorTexto
            Metodos_online_login.ejecutar_lista(evaluacionFormulario.validacionPosiciones)

            if (evaluacionFormulario.status == true) {

                scriptEnvia.parametros.add(Usuario_edit_text.text.toString())
                scriptEnvia.parametros.add(Contrasena_edit_text.text.toString())
                scriptEnvia.nombres.add("user_login")
                scriptEnvia.nombres.add("pass_login")

// Dentro del onClickListener del botón ingresar:
                CoroutineScope(Dispatchers.IO).launch {
                    scriptEnvia.ejecutar()
                    Log.d("Login", "Respuesta objeto JSON: ${scriptEnvia.codigos[0]}")
                    Log.d("Login", "Respuesta cadena JSON: ${scriptEnvia.codigos[1]}")

                    if (!scriptEnvia.statusConexion) {
                        lifecycleScope.launch {
                            Metodos_online_login.ejecutar_posicion(3)
                        }
                        return@launch
                    }

                    if (!scriptEnvia.statusScript || !scriptEnvia.statusRespuesta) {
                        lifecycleScope.launch {
                            Modal_error_respuesta.mostrar()
                        }
                        return@launch
                    }

                    try {
                        // Ahora codigos[0] contiene el JSON parseado correctamente
                        val jsonArray = scriptEnvia.codigos[0] as JSONArray
                        val jsonUsuarioRegistros = jsonArray.getJSONObject(0)
                        val registros = jsonUsuarioRegistros.getInt("registros")

                        if (registros == 1) {
                            val jsonUsuarioDatos = jsonArray.getJSONObject(1)
                            val id = jsonUsuarioDatos.getInt("id")
                            val nombre = jsonUsuarioDatos.getString("nombre")
                            val paterno = jsonUsuarioDatos.getString("paterno")
                            val materno = jsonUsuarioDatos.getString("materno")
                            val nombreCompleto = "$nombre $paterno $materno"
                            val privilegios = jsonUsuarioDatos.getInt("privilegios")

                            lifecycleScope.launch {
                                sesionActiva.idUsuario = id
                                sesionActiva.nombreUsuario = nombreCompleto
                                sesionActiva.nivelUsuario = privilegios
                                Metodos_online_login.ejecutar_posicion(4)
                            }
                        } else {
                            lifecycleScope.launch {
                                Modal_incorrectos.mostrar()
                            }
                        }
                    } catch (e: Exception) {
                        Log.e("Login", "Error al procesar respuesta JSON: ${e.message}")
                        lifecycleScope.launch {
                            Modal_error_respuesta.mostrar()
                        }
                    }
                }
            }

        }
////////////////////////////////////////////////////////////////////////
// FIN DE AREAS
/////////////////////////////////////////////////////////////////////////
    }
}
