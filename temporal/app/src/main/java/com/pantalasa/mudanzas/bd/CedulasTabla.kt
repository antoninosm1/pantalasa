package com.pantalasa.mudanzas.bd

import android.util.Log
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.withContext
import org.json.JSONArray
import org.json.JSONObject
import java.text.SimpleDateFormat
import java.util.Locale
import com.pantalasa.mudanzas.clases.Print

/**
 * Clase Singleton para manejar operaciones en la tabla "cedulas".
 * Proporciona métodos para interactuar con la tabla "cedulas" a través de CedulaDao.
 * Implementa el patrón Singleton para asegurar una única instancia en toda la aplicación.
 */

class CedulasTabla private constructor(private val cedulaDao: CedulaDao) {

    // Variables de instancia

    private val impresora = Print.getInstance() // Instancia única
    var total: Int = 0 // Almacena la cantidad de registros en la tabla
    var retorno: Int = 0
    var retornoLista: MutableList<Any> = mutableListOf() // Almacena una lista de posibles respuestas
    var resultadoCombo: List<ComboItem> = emptyList()
        private set
    // Variables para manejar la fuente de datos
    var tipoFuente: Int = 0 // 0 = no hay fuente, 1 = objeto JSON, 2 = arreglo de objetos JSON, 3 = arreglo de arreglos de objetos JSON
    var resumenFuente: Boolean = false // Indica si la fuente incluye un objeto de resumen
    var statusFuente: Boolean = false // Indica si la fuente se aplicó como actualización

    // Lista de campos de la entidad Cedula
    var campos: MutableList<CamposEstructura> = mutableListOf()

    /**
     * Subclase para definir la estructura de los campos de la entidad Cedula.
     */
    class CamposEstructura {
        var nombreCampo: String = "" // Nombre del campo en la entidad
        var tipoCampo: Int = 0 // 0 = no hay tipo, 1 = String, 2 = Int, 3 = Long, 4 = Date
        var fuenteConcatenacion: Int = 1 // 0 = no hay concatenación, 1 = concatenación de strings, 2 = suma de ints
        var fuenteValores: MutableList<MutableList<Any>> = mutableListOf() // Lista de valores fuente
    }

    ///////////////////////////////////////////////////////////////
// BLOQUE init - INICIALIZACIÓN DE CEDULASTABLA
// Descripción:
// - Configura la instancia de Print para logs
// - Inicializa la estructura de campos de la tabla
// - Registra el evento de creación en LogCat
    init {
        ///////////////////////////////////////////////////////////////
        // CONFIGURACIÓN DE IMPRESORA (LOGS)
        impresora.ruta[3] = "CedulasTabla.kt"
        impresora.ruta[4] = "init"
        impresora.ruta[5] = ""

        impresora.print(mutableListOf(
            mutableListOf(2, "INICIANDO INICIALIZACIÓN DE CEDULASTABLA", true),
            mutableListOf(3, "Configurando sistema de logs", false),
            mutableListOf(5, "Instancia ID: ${this.hashCode()}", false)
        ))

        ///////////////////////////////////////////////////////////////
        // INICIALIZACIÓN DE ESTRUCTURA DE CAMPOS
        try {
            inicializarCampos()
            impresora.print(mutableListOf(
                mutableListOf(3, "Estructura de campos inicializada", false),
                mutableListOf(5, "Total de campos: ${campos.size}", false)
            ))
        } catch (e: Exception) {
            impresora.print(mutableListOf(
                mutableListOf(8, "ERROR EN INICIALIZACIÓN: ${e.message}", true)
            ))
            throw e
        }

        ///////////////////////////////////////////////////////////////
        // REGISTRO FINAL DE INICIALIZACIÓN
        impresora.print(mutableListOf(
            mutableListOf(2, "INICIALIZACIÓN DE CEDULASTABLA COMPLETADA", true),
            mutableListOf(3, "Instancia lista para uso", false)
        ))
    }

    companion object {
        @Volatile
        private var INSTANCE: CedulasTabla? = null

        /**
         * Método para obtener la instancia única de CedulasTabla.
         *
         * @param cedulaDao DAO de la tabla cedulas
         * @return Instancia única de CedulasTabla
         */
        fun getInstance(cedulaDao: CedulaDao): CedulasTabla {
            return INSTANCE ?: synchronized(this) {
                val instance = CedulasTabla(cedulaDao).also { INSTANCE = it }
                Log.d("CedulasTabla", "🚀 Instancia de CedulasTabla creada: ${instance.hashCode()}")
                instance
            }
        }
    }

    /**
     * Método para inicializar la lista de campos con valores predeterminados.
     */
    private fun inicializarCampos() {
        campos.add(CamposEstructura().apply {
            nombreCampo = "id"
            tipoCampo = 3 // Long
            fuenteValores.add(mutableListOf(1, 0)) // Autoincremental
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "ambito"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(2, 1)) // Valor directo
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "idWeb"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_01")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "usuarioId"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_02")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "municipioNum"
            tipoCampo = 1 // String
            fuenteValores.add(mutableListOf(3, "dato_03")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "municipioNom"
            tipoCampo = 1 // String
            fuenteValores.add(mutableListOf(3, "dato_04")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "localidadNum"
            tipoCampo = 1 // String
            fuenteValores.add(mutableListOf(3, "dato_05")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "localidadNom"
            tipoCampo = 1 // String
            fuenteValores.add(mutableListOf(3, "dato_06")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "unidad"
            tipoCampo = 1 // String
            fuenteValores.add(mutableListOf(3, "dato_07")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "asistSoc"
            tipoCampo = 1 // String
            fuenteValores.add(mutableListOf(3, "dato_08")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "tipoLoc"
            tipoCampo = 1 // String
            fuenteValores.add(mutableListOf(3, "dato_09")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sedeVm"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_10")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sedeVk"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_11")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sedePm"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_12")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sedePk"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_13")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "subsVm"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_14")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "subsVk"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_15")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "subsPm"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_16")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "subsPk"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_17")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "fecRegCed"
            tipoCampo = 4 // Date
            fuenteValores.add(mutableListOf(3, "dato_18")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "techoConc"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_19")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "techoGalv"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_20")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "techoMade"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_21")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "techoCart"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_22")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "techoOtro"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_23")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "pareTabiq"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_24")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "pareAdobe"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_25")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "pareBlock"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_26")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "pareMader"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_27")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "parePiedr"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_28")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "pareCarto"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_29")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "pisoCemen"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_30")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "pisoMader"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_31")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "pisoTierr"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_32")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "pisoPiedr"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_33")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "agUsoPota"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_34")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "agUsoNori"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_35")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "agUsoRio"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_36")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "agUsoLluv"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_37")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "agConPota"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_38")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "agConPuri"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_39")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "agConHerv"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_40")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "agConClor"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_41")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "agConFilt"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_42")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "excFoSep"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_43")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "excLetri"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_44")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "excRasSu"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_45")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "combGas"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_46")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "combCar"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_47")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "combLen"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_48")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "combOtr"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_49")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "basRedM"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_50")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "basEnte"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_51")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "basCieAb"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_52")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "basInci"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_53")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "alumRedE"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_54")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "alumVela"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_55")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "alumQuin"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_56")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "alumPlaS"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_57")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "numHab"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_58")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "recam"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_59")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "estan"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_60")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "comed"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_61")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "multi"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_62")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "cocin"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_63")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "fecRegViv"
            tipoCampo = 4 // Date
            fuenteValores.add(mutableListOf(3, "dato_64")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "pueIndTara"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_65")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "pueIndTepe"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_66")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "pueIndWuar"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_67")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "pueIndPima"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_68")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "pueIndMeno"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_69")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "pueIndOtro"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_70")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "derechINSABI"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_71")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "derechIMSS"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_72")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "derechISSSTE"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_73")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "derechPEMEX"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_74")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "derechSEDENA"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_75")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "derechOtro"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_76")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "numPerros"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_77")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "numGatos"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_78")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "numOtros"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_79")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sisSalINSABI"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_80")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sisSalIMSS"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_81")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sisSalISSSTE"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_82")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sisSalPEMEX"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_83")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sisSalSEDENA"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_84")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sisSalOtro"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_85")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sisSalMedPar"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_86")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sisSalCliPar"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_87")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sisSalParter"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_88")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sisSalCurand"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_89")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sisSalYerber"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_90")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sisSalHueser"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_91")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "sisSalBotica"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_92")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "comentario"
            tipoCampo = 1 // String
            fuenteValores.add(mutableListOf(3, "dato_93")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "fecRegGen"
            tipoCampo = 4 // Date
            fuenteValores.add(mutableListOf(3, "dato_94")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "numInteg"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_95")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "origCapt"
            tipoCampo = 1 // String
            fuenteValores.add(mutableListOf(3, "dato_96")) // Valor JSON
        })
    }

    /**
     * Método para mostrar la estructura de los campos en el log.
     */
    fun mostrarEstructura() {
        Log.d("CedulasTabla", "📌 Mostrando estructura de campos:")
        for (campo in campos) {
            Log.d("CedulasTabla", "   - Nombre: ${campo.nombreCampo}, Tipo: ${campo.tipoCampo}, Concatenación: ${campo.fuenteConcatenacion}, Valores: ${campo.fuenteValores}")
        }
    }

    /**
     * Método para contar registros en la tabla "cedulas".
     * Actualiza la variable `total` con la cantidad de registros.
     */
    suspend fun contar() {
        try {
            Log.d("CedulasTabla", "📌 Iniciando consulta SELECT COUNT(*) FROM cedulas")

            // Ejecutar la consulta y obtener el conteo
            total = cedulaDao.obtenerConteo()

            // Mostrar el resultado en el log
            Log.d("CedulasTabla", "✅ Conteo de registros en la tabla 'cedulas': $total")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("CedulasTabla", "❌ Error al ejecutar la consulta SELECT COUNT(*)", e)
        }
    }

    /**
     * Método para obtener todos los registros de la tabla "cedulas".
     */
    suspend fun obtenerTodos() {
        try {
            Log.d("CedulasTabla", "📌 Iniciando consulta SELECT * FROM cedulas")

            // Ejecutar la consulta y obtener los registros
            val registros = cedulaDao.obtenerCedulas()

            // Mostrar el resultado en el log
            Log.d("CedulasTabla", "✅ Registros obtenidos: ${registros}")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("CedulasTabla", "❌ Error al ejecutar la consulta SELECT *", e)
        }
    }

    /**
     * Método para insertar un registro en la tabla "cedulas".
     *
     * @param registro Registro a insertar.
     */
    suspend fun insertarRegistro(registro: Cedula) {
        try {
            Log.d("CedulasTabla", "📌 Insertando registro en la tabla 'cedulas'")

            // Insertar el registro
            cedulaDao.insertar(registro)

            // Mostrar confirmación en el log
            Log.d("CedulasTabla", "✅ Registro insertado correctamente")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("CedulasTabla", "❌ Error al insertar registro", e)
        }
    }

    /**
     * Método para eliminar un registro de la tabla "cedulas" por su ID.
     *
     * @param id ID del registro a eliminar.
     */
    suspend fun eliminarRegistro(id: Int) {
        try {
            Log.d("CedulasTabla", "📌 Eliminando registro con ID: $id")

            // Eliminar el registro
            cedulaDao.eliminar(id.toLong())

            // Mostrar confirmación en el log
            Log.d("CedulasTabla", "✅ Registro eliminado correctamente")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("CedulasTabla", "❌ Error al eliminar registro", e)
        }
    }

    /**
     * Método para vaciar la tabla "cedulas" y reiniciar el contador de ID autoincremental.
     */
    suspend fun vaciarTabla() {
        try {
            Log.d("CedulasTabla", "📌 Vaciando tabla 'cedulas'")

            // Vaciar tabla
            cedulaDao.vaciar()

            // Reiniciar el contador de ID autoincremental
            cedulaDao.reiniciarContadorId()
            this.statusFuente = false
            // Mostrar confirmación en el log
            Log.d("CedulasTabla", "✅ Tabla vaciada y contador de ID reiniciado correctamente")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("CedulasTabla", "❌ Error al vaciar tabla", e)
        }
    }

    /**
     * Método para eliminar registros de la tabla "cedulas" donde el campo "ambito" sea igual a 1.
     */
    suspend fun borrarWeb() {
        try {
            Log.d("CedulasTabla", "📌 Eliminando registros con ambito = 1")

            // Ejecutar la consulta para eliminar registros
            cedulaDao.eliminarPorAmbito(1)

            // Mostrar confirmación en el log
            Log.d("CedulasTabla", "✅ Registros eliminados correctamente")
            this.statusFuente = false
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("CedulasTabla", "❌ Error al eliminar registros", e)
        }
    }

    /**
     * Método para volcar registros desde una fuente JSON.
     *
     * @param jsonSource Fuente de datos en formato JSON (puede ser JSONObject, JSONArray o String).
     */
    suspend fun volcarRegistros(jsonSource: Any) {
        try {
            Log.d("CedulasTabla", "📌 Iniciando proceso de volcado de registros")

            // Validar tipo de fuente
            val tipoFuenteDetectado = when (jsonSource) {
                is JSONObject -> 1
                is JSONArray -> if (jsonSource.length() > 0 && jsonSource[0] is JSONArray) 3 else 2
                else -> -1
            }

            if (tipoFuenteDetectado != tipoFuente) {
                Log.e("CedulasTabla", "❌ Tipo de fuente no coincide. Esperado: $tipoFuente, Detectado: $tipoFuenteDetectado")
                return
            }

            // Validar la estructura de campos antes de continuar
            if (!validarEstructuraCampos()) {
                Log.e("CedulasTabla", "❌ Estructura de campos no válida. No se pueden volcar registros.")
                return
            }

            // Procesar según el tipo de fuente
            when (tipoFuente) {
                1 -> {
                    if (resumenFuente) {
                        Log.w("CedulasTabla", "⚠️ resumenFuente=true no tiene efecto con tipoFuente=1")
                    }
                    procesarObjetoJSON(jsonSource as JSONObject)
                }
                2 -> procesarArregloJSON(jsonSource as JSONArray)
                3 -> procesarArregloDeArreglosJSON(jsonSource as JSONArray)
            }
            this.statusFuente = true
            Log.d("CedulasTabla", "✅ Proceso de volcado de registros completado")
        } catch (e: Exception) {
            Log.e("CedulasTabla", "❌ Error inesperado durante el volcado de registros", e)
            throw e
        }
    }
    private suspend fun validarEstructuraCampos(): Boolean {
        try {
            Log.d("CedulasTabla", "📌 Validando estructura de campos")

            // Obtener los nombres de los campos de la entidad Cedula en el orden declarado
            val nombresCamposEntidad = listOf(
                "id", "ambito", "idWeb", "usuarioId", "municipioNum", "municipioNom",
                "localidadNum", "localidadNom", "unidad", "asistSoc", "tipoLoc",
                "sedeVm", "sedeVk", "sedePm", "sedePk", "subsVm", "subsVk", "subsPm",
                "subsPk", "fecRegCed", "techoConc", "techoGalv", "techoMade", "techoCart",
                "techoOtro", "pareTabiq", "pareAdobe", "pareBlock", "pareMader", "parePiedr",
                "pareCarto", "pisoCemen", "pisoMader", "pisoTierr", "pisoPiedr", "agUsoPota",
                "agUsoNori", "agUsoRio", "agUsoLluv", "agConPota", "agConPuri", "agConHerv",
                "agConClor", "agConFilt", "excFoSep", "excLetri", "excRasSu", "combGas",
                "combCar", "combLen", "combOtr", "basRedM", "basEnte", "basCieAb", "basInci",
                "alumRedE", "alumVela", "alumQuin", "alumPlaS", "numHab", "recam", "estan",
                "comed", "multi", "cocin", "fecRegViv", "pueIndTara", "pueIndTepe", "pueIndWuar",
                "pueIndPima", "pueIndMeno", "pueIndOtro", "derechINSABI", "derechIMSS",
                "derechISSSTE", "derechPEMEX", "derechSEDENA", "derechOtro", "numPerros",
                "numGatos", "numOtros", "sisSalINSABI", "sisSalIMSS", "sisSalISSSTE",
                "sisSalPEMEX", "sisSalSEDENA", "sisSalOtro", "sisSalMedPar", "sisSalCliPar",
                "sisSalParter", "sisSalCurand", "sisSalYerber", "sisSalHueser", "sisSalBotica",
                "comentario", "fecRegGen", "numInteg", "origCapt"
            )

            // 1. Contar los elementos de la subclase CamposEstructura
            val cantidadCamposEstructura = campos.size
            val cantidadCamposEntidad = nombresCamposEntidad.size

            // 2. Comparar los resultados
            if (cantidadCamposEstructura != cantidadCamposEntidad) {
                Log.e("CedulasTabla", "❌ Número de campos no coincide: CamposEstructura ($cantidadCamposEstructura) != Cedula ($cantidadCamposEntidad)")
                return false
            }

            // 3. Hacer un ciclo sobre los elementos de CamposEstructura
            for (i in campos.indices) {
                val campoEstructura = campos[i]
                val nombreCampoEstructura = campoEstructura.nombreCampo
                val nombreCampoEntidad = nombresCamposEntidad[i]

                // 4. Verificar si el nombre del campo coincide
                if (nombreCampoEstructura != nombreCampoEntidad) {
                    Log.e("CedulasTabla", "❌ Nombre de campo no coincide en la posición $i: $nombreCampoEstructura != $nombreCampoEntidad")
                    return false
                }
            }

            Log.d("CedulasTabla", "✅ Estructura de campos válida")
            return true
        } catch (e: Exception) {
            Log.e("CedulasTabla", "❌ Error al validar la estructura de campos", e)
            return false
        }
    }

    /**
     * Método para procesar un objeto JSON.
     *
     * @param json Objeto JSON a procesar.
     */
    private suspend fun procesarObjetoJSON(json: JSONObject) {
        Log.d("CedulasTabla", "📌 Procesando objeto JSON")
        insertarRegistroDesdeJSON(json)
    }

    /**
     * Método para procesar un arreglo de objetos JSON.
     *
     * @param jsonArray Arreglo de objetos JSON a procesar.
     */
    private suspend fun procesarArregloJSON(jsonArray: JSONArray) {
        Log.d("CedulasTabla", "📌 Procesando arreglo de objetos JSON")

        try {
            // Verificar si hay un objeto de resumen
            resumenFuente = jsonArray.length() > 0 && jsonArray.optJSONObject(0)?.has("registros") == true

            Log.d("CedulasTabla", "✅ ResumenFuente: $resumenFuente")

            // Determinar el índice de inicio
            val startIndex = if (resumenFuente) {
                Log.d("CedulasTabla", "📌 Ignorando objeto de resumen en posición 0")
                1
            } else {
                0
            }

            // Contador de registros insertados
            var registrosInsertados = 0

            // Recorrer los objetos JSON
            for (i in startIndex until jsonArray.length()) {
                val json = jsonArray.optJSONObject(i) ?: continue

                // Insertar solo si no es un objeto de resumen
                if (!(resumenFuente && i == startIndex && json.has("registros"))) {
                    insertarRegistroDesdeJSON(json)
                    registrosInsertados++

                    // Log cada 1000 registros para seguimiento
                    if (registrosInsertados % 1000 == 0) {
                        Log.d("CedulasTabla", "📌 Registros insertados: $registrosInsertados")
                    }
                } else {
                    Log.d("CedulasTabla", "📌 Objeto de resumen ignorado en posición $i")
                }
            }

            Log.d("CedulasTabla", "✅ Total de registros insertados: $registrosInsertados")
        } catch (e: Exception) {
            Log.e("CedulasTabla", "❌ Error al procesar arreglo JSON", e)
            throw e
        }
    }
    /**
     * Método para procesar un arreglo de arreglos de objetos JSON (tipoFuente = 3).
     * Para este tipo de fuente con resumen, cada arreglo interno comienza con un objeto de resumen.
     *
     * @param jsonArray Arreglo principal que contiene arreglos de objetos JSON
     */
    private suspend fun procesarArregloDeArreglosJSON(jsonArray: JSONArray) {
        Log.d("CedulasTabla", "📌 [ProcesarArregloDeArreglos] Iniciando procesamiento de JSON tipo 3")

        try {
            // 1. Validación inicial de estructura
            if (jsonArray.length() == 0) {
                Log.d("CedulasTabla", "⚠️ [ProcesarArregloDeArreglos] JSONArray principal vacío")
                return
            }

            // 2. Detección automática de resumen si no fue establecido
            if (resumenFuente) {
                Log.d("CedulasTabla", "✅ [ProcesarArregloDeArreglos] Modo con resumen activado")
            }

            // 3. Contadores para estadísticas
            var totalArreglosProcesados = 0
            var totalRegistrosInsertados = 0
            var totalResumenesIgnorados = 0

            // 4. Procesar cada arreglo interno
            for (i in 0 until jsonArray.length()) {
                val innerArray = jsonArray.optJSONArray(i) ?: continue
                totalArreglosProcesados++

                Log.d("CedulasTabla", "📦 [ProcesarArregloDeArreglos] Procesando arreglo interno #$i con ${innerArray.length()} elementos")

                // 5. Validar que el arreglo interno tenga elementos
                if (innerArray.length() == 0) {
                    Log.d("CedulasTabla", "⚠️ [ProcesarArregloDeArreglos] Arreglo interno #$i vacío")
                    continue
                }

                // 6. Determinar el índice de inicio (ignorar primer elemento si hay resumen)
                val startIndex = if (resumenFuente) {
                    // Verificar si el primer elemento es un objeto de resumen
                    val posibleResumen = innerArray.optJSONObject(0)
                    if (posibleResumen?.has("registros") == true) {
                        totalResumenesIgnorados++
                        Log.d("CedulasTabla", "📌 [ProcesarArregloDeArreglos] Ignorando objeto de resumen en arreglo #$i")
                        1
                    } else {
                        Log.d("CedulasTabla", "⚠️ [ProcesarArregloDeArreglos] Primer elemento no es resumen en arreglo #$i")
                        0
                    }
                } else {
                    0
                }

                // 7. Procesar cada objeto en el arreglo interno
                for (j in startIndex until innerArray.length()) {
                    try {
                        val json = innerArray.optJSONObject(j) ?: continue

                        // 8. Insertar registro en la base de datos
                        insertarRegistroDesdeJSON(json)
                        totalRegistrosInsertados++

                        // 9. Log de progreso cada 1000 registros
                        if (totalRegistrosInsertados % 1000 == 0) {
                            Log.d("CedulasTabla", "📊 [ProcesarArregloDeArreglos] Progreso: $totalRegistrosInsertados registros insertados")
                        }
                    } catch (e: Exception) {
                        Log.e("CedulasTabla", "❌ [ProcesarArregloDeArreglos] Error en arreglo #$i, posición $j: ${e.message}")
                    }
                }
            }

            // 10. Reporte final del procesamiento
            Log.d("CedulasTabla", "✅ [ProcesarArregloDeArreglos] Procesamiento completado: " +
                    "\n- Arreglos procesados: $totalArreglosProcesados" +
                    "\n- Resúmenes ignorados: $totalResumenesIgnorados" +
                    "\n- Registros insertados: $totalRegistrosInsertados")

        } catch (e: Exception) {
            Log.e("CedulasTabla", "❌ [ProcesarArregloDeArreglos] Error inesperado en procesamiento", e)
            throw e
        }
    }
    /**
     * Método para insertar un registro en la tabla 'cedulas' desde un objeto JSON,
     * utilizando dinámicamente la estructura de campos definida.
     *
     * @param json Objeto JSON con los datos del registro.
     */
    private suspend fun insertarRegistroDesdeJSON(json: JSONObject) {
        //Log.d("CedulasTabla", "📌 [InsertarRegistro] Iniciando inserción desde JSON")

        try {
            // 1. Mapa para almacenar los valores convertidos
            val valores = mutableMapOf<String, Any?>()

            // 2. Procesar cada campo definido en la estructura
            for (campo in campos) {
                try {
                    //Log.v("CedulasTabla", "🔄 Procesando campo: ${campo.nombreCampo}")

                    // 3. Determinar el valor según la fuente definida
                    val (tipoFuenteValor, valorFuente) = campo.fuenteValores[0]

                    when (tipoFuenteValor as Int) {
                        // 3.1. Caso Autoincremental (ignorar)
                        1 -> {
                            //Log.d("CedulasTabla", "⚡ Ignorando campo autoincremental: ${campo.nombreCampo}")
                            continue
                        }

                        // 3.2. Caso Valor Directo
                        2 -> {
                            valores[campo.nombreCampo] = when (campo.tipoCampo) {
                                2 -> valorFuente as? Int ?: 0
                                3 -> valorFuente as? Long ?: 0L
                                else -> valorFuente
                            }
                            //Log.d("CedulasTabla", "🔹 Valor directo para ${campo.nombreCampo}: ${valores[campo.nombreCampo]}")
                        }

                        // 3.3. Caso Valor desde JSON
                        3 -> {
                            val nombreCampoJson = valorFuente.toString()
                            val valor = when (campo.tipoCampo) {
                                1 -> json.optString(nombreCampoJson, "") // String
                                2 -> json.optInt(nombreCampoJson, 0)     // Int
                                3 -> json.optLong(nombreCampoJson, 0L)   // Long
                                4 -> {  // Fecha (tratada como Long timestamp)
                                    val fechaStr = json.optString(nombreCampoJson, "")
                                    if (fechaStr.isNotEmpty()) {
                                        try {
                                            SimpleDateFormat("yyyy-MM-dd HH:mm:ss", Locale.getDefault())
                                                .parse(fechaStr)?.time ?: 0L
                                        } catch (e: Exception) {
                                            Log.e("CedulasTabla", "❌ Error al parsear fecha '$fechaStr' para ${campo.nombreCampo}")
                                            0L
                                        }
                                    } else {
                                        0L
                                    }
                                }
                                else -> null
                            }

                            if (valor != null) {
                                valores[campo.nombreCampo] = valor
                                //Log.d("CedulasTabla", "📥 Valor desde JSON para ${campo.nombreCampo}: $valor")
                            } else {
                                throw IllegalArgumentException("Tipo de campo no soportado: ${campo.tipoCampo}")
                            }
                        }

                        else -> throw IllegalArgumentException("Tipo de fuente no soportado: $tipoFuenteValor")
                    }
                } catch (e: Exception) {
                    Log.e("CedulasTabla", "❌ Error procesando campo ${campo.nombreCampo}: ${e.message}")
                    throw e
                }
            }

            // 4. Validar que tenemos todos los campos necesarios (excepto autoincrementales)
            val camposRequeridos = campos.filter { it.fuenteValores[0][0] != 1 }.size
            if (valores.size != camposRequeridos) {
                throw IllegalStateException("Faltan campos. Esperados: $camposRequeridos, Obtenidos: ${valores.size}")
            }

            // 5. Insertar en la base de datos usando el DAO
            withContext(Dispatchers.IO) {
                try {
                    // 5.1. Construir objeto Cedula desde los valores
                    val cedula = Cedula(
                        id = 0L, // Autoincremental
                        ambito = valores["ambito"] as Int,
                        idWeb = valores["idWeb"] as Int,
                        usuarioId = valores["usuarioId"] as Int,
                        municipioNum = valores["municipioNum"] as String,
                        municipioNom = valores["municipioNom"] as String,
                        localidadNum = valores["localidadNum"] as String,
                        localidadNom = valores["localidadNom"] as String,
                        unidad = valores["unidad"] as String,
                        asistSoc = valores["asistSoc"] as String,
                        tipoLoc = valores["tipoLoc"] as String,
                        sedeVm = valores["sedeVm"] as Int,
                        sedeVk = valores["sedeVk"] as Int,
                        sedePm = valores["sedePm"] as Int,
                        sedePk = valores["sedePk"] as Int,
                        subsVm = valores["subsVm"] as Int,
                        subsVk = valores["subsVk"] as Int,
                        subsPm = valores["subsPm"] as Int,
                        subsPk = valores["subsPk"] as Int,
                        fecRegCed = valores["fecRegCed"] as Long,
                        techoConc = valores["techoConc"] as Int,
                        techoGalv = valores["techoGalv"] as Int,
                        techoMade = valores["techoMade"] as Int,
                        techoCart = valores["techoCart"] as Int,
                        techoOtro = valores["techoOtro"] as Int,
                        pareTabiq = valores["pareTabiq"] as Int,
                        pareAdobe = valores["pareAdobe"] as Int,
                        pareBlock = valores["pareBlock"] as Int,
                        pareMader = valores["pareMader"] as Int,
                        parePiedr = valores["parePiedr"] as Int,
                        pareCarto = valores["pareCarto"] as Int,
                        pisoCemen = valores["pisoCemen"] as Int,
                        pisoMader = valores["pisoMader"] as Int,
                        pisoTierr = valores["pisoTierr"] as Int,
                        pisoPiedr = valores["pisoPiedr"] as Int,
                        agUsoPota = valores["agUsoPota"] as Int,
                        agUsoNori = valores["agUsoNori"] as Int,
                        agUsoRio = valores["agUsoRio"] as Int,
                        agUsoLluv = valores["agUsoLluv"] as Int,
                        agConPota = valores["agConPota"] as Int,
                        agConPuri = valores["agConPuri"] as Int,
                        agConHerv = valores["agConHerv"] as Int,
                        agConClor = valores["agConClor"] as Int,
                        agConFilt = valores["agConFilt"] as Int,
                        excFoSep = valores["excFoSep"] as Int,
                        excLetri = valores["excLetri"] as Int,
                        excRasSu = valores["excRasSu"] as Int,
                        combGas = valores["combGas"] as Int,
                        combCar = valores["combCar"] as Int,
                        combLen = valores["combLen"] as Int,
                        combOtr = valores["combOtr"] as Int,
                        basRedM = valores["basRedM"] as Int,
                        basEnte = valores["basEnte"] as Int,
                        basCieAb = valores["basCieAb"] as Int,
                        basInci = valores["basInci"] as Int,
                        alumRedE = valores["alumRedE"] as Int,
                        alumVela = valores["alumVela"] as Int,
                        alumQuin = valores["alumQuin"] as Int,
                        alumPlaS = valores["alumPlaS"] as Int,
                        numHab = valores["numHab"] as Int,
                        recam = valores["recam"] as Int,
                        estan = valores["estan"] as Int,
                        comed = valores["comed"] as Int,
                        multi = valores["multi"] as Int,
                        cocin = valores["cocin"] as Int,
                        fecRegViv = valores["fecRegViv"] as Long,
                        pueIndTara = valores["pueIndTara"] as Int,
                        pueIndTepe = valores["pueIndTepe"] as Int,
                        pueIndWuar = valores["pueIndWuar"] as Int,
                        pueIndPima = valores["pueIndPima"] as Int,
                        pueIndMeno = valores["pueIndMeno"] as Int,
                        pueIndOtro = valores["pueIndOtro"] as Int,
                        derechINSABI = valores["derechINSABI"] as Int,
                        derechIMSS = valores["derechIMSS"] as Int,
                        derechISSSTE = valores["derechISSSTE"] as Int,
                        derechPEMEX = valores["derechPEMEX"] as Int,
                        derechSEDENA = valores["derechSEDENA"] as Int,
                        derechOtro = valores["derechOtro"] as Int,
                        numPerros = valores["numPerros"] as Int,
                        numGatos = valores["numGatos"] as Int,
                        numOtros = valores["numOtros"] as Int,
                        sisSalINSABI = valores["sisSalINSABI"] as Int,
                        sisSalIMSS = valores["sisSalIMSS"] as Int,
                        sisSalISSSTE = valores["sisSalISSSTE"] as Int,
                        sisSalPEMEX = valores["sisSalPEMEX"] as Int,
                        sisSalSEDENA = valores["sisSalSEDENA"] as Int,
                        sisSalOtro = valores["sisSalOtro"] as Int,
                        sisSalMedPar = valores["sisSalMedPar"] as Int,
                        sisSalCliPar = valores["sisSalCliPar"] as Int,
                        sisSalParter = valores["sisSalParter"] as Int,
                        sisSalCurand = valores["sisSalCurand"] as Int,
                        sisSalYerber = valores["sisSalYerber"] as Int,
                        sisSalHueser = valores["sisSalHueser"] as Int,
                        sisSalBotica = valores["sisSalBotica"] as Int,
                        comentario = valores["comentario"] as String,
                        fecRegGen = valores["fecRegGen"] as Long,
                        numInteg = valores["numInteg"] as Int,
                        origCapt = valores["origCapt"] as String
                    )

                    // 5.2. Insertar usando DAO
                    cedulaDao.insertar(cedula)
                    //Log.d("CedulasTabla", "✅ Registro insertado correctamente")
                } catch (e: Exception) {
                    Log.e("CedulasTabla", "❌ Error al construir/insertar registro", e)
                    throw e
                }
            }
        } catch (e: Exception) {
            Log.e("CedulasTabla", "❌ Error inesperado en insertarRegistroDesdeJSON", e)
            throw e
        }
    }
    /**
     * Método para mostrar registros en intervalos.
     *
     * @param intervalo Intervalo en el que se mostrarán los registros.
     */
    suspend fun muestra(intervalo: Int) {
        try {
            Log.d("CedulasTabla", "📌 Iniciando proceso de muestra de registros")

            // Obtener el conteo de registros
            total = cedulaDao.obtenerConteo()
            Log.d("CedulasTabla", "✅ Total de registros en la tabla 'cedulas': $total")

            // Mostrar el primer registro
            val primerRegistro = cedulaDao.obtenerPrimerRegistro()
            if (primerRegistro != null) {
                Log.d("CedulasTabla", "📌 Primer registro: $primerRegistro")
            } else {
                Log.d("CedulasTabla", "📌 No hay registros en la tabla.")
                return
            }

            // Mostrar registros en intervalos
            for (i in intervalo until total step intervalo) {
                val registro = cedulaDao.obtenerRegistroEnIntervalo(i)
                if (registro != null) {
                    Log.d("CedulasTabla", "📌 Registro en intervalo $i: $registro")
                }
            }

            // Mostrar el último registro
            val ultimoRegistro = cedulaDao.obtenerUltimoRegistro()
            if (ultimoRegistro != null) {
                Log.d("CedulasTabla", "📌 Último registro: $ultimoRegistro")
            }

            Log.d("CedulasTabla", "✅ Proceso de muestra de registros completado")
        } catch (e: Exception) {
            Log.e("CedulasTabla", "❌ Error inesperado durante la muestra de registros", e)
        }
    }

// En la clase CedulasTabla, modificar el método:

    /**
     * Consulta localidades para el ComboList
     * @return List<ComboItem> Lista para poblar el ComboList
     * @throws Exception Si hay error en la consulta Room
     */
    suspend fun consultarLocalidadesCedulasCombo(): List<ComboItem> {
        return try {
            Log.d("CedulasTabla", "🔍 Consultando localidades para ComboList")
            val items = cedulaDao.consultarLocalidades()

            Log.d("CedulasTabla", "✅ ${items.size} localidades obtenidas")
            resultadoCombo = items
            items
        } catch (e: Exception) {
            Log.e("CedulasTabla", "❌ Error en consulta: ${e.message}")
            emptyList()
        }
    }


    /**
     * Inspecciona resultadoCombo para diagnóstico.
     * Cumple con:
     * - Logs de seguimiento
     * - Manejo de errores
     * - Estructura clara
     */
    fun inspeccionarResultadoCombo() {
        try {
            Log.d("CedulasTabla", "##%%## INSPECCIÓN resultadoCombo INICIADA")

            when (resultadoCombo.size) {
                0 -> Log.w("CedulasTabla", "⚠️ resultadoCombo VACÍO")
                1 -> Log.d("CedulasTabla", "📊 Único item: value='${resultadoCombo[0].value}' text='${resultadoCombo[0].text}'")
                else -> {
                    Log.d("CedulasTabla", "📊 Total items: ${resultadoCombo.size}")
                    Log.d("CedulasTabla", "   - Primer item: value='${resultadoCombo[0].value}'")
                    Log.d("CedulasTabla", "   - Último item: value='${resultadoCombo.last().value}'")
                }
            }
        } catch (e: Exception) {
            Log.e("CedulasTabla", "💥 Error en inspeccionarResultadoCombo()", e)
        } finally {
            Log.d("CedulasTabla", "##%%## INSPECCIÓN FINALIZADA")
        }
    }
}