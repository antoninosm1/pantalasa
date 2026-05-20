package com.pantalasa.mudanzas.bd

import androidx.room.Dao
import androidx.room.Insert
import androidx.room.Query
import kotlinx.coroutines.flow.Flow

// Definición de la clase ComboItem (añadida para resolver el error)
data class ComboItem(
    val value: String,
    val text: String
)

@Dao
interface CedulaDao {
    @Insert
    suspend fun insertar(cedula: Cedula)

    @Query("SELECT * FROM cedulas")
    fun obtenerCedulas(): Flow<List<Cedula>>

    @Query("SELECT COUNT(*) FROM cedulas")
    suspend fun obtenerConteo(): Int

    @Query("DELETE FROM cedulas WHERE id = :id")
    suspend fun eliminar(id: Long)

    @Query("DELETE FROM cedulas")
    suspend fun vaciar()

    @Query("DELETE FROM sqlite_sequence WHERE name = 'cedulas'")
    suspend fun reiniciarContadorId()

    @Query("DELETE FROM cedulas WHERE ambito = :ambito")
    suspend fun eliminarPorAmbito(ambito: Int)

    @Query("INSERT INTO cedulas (ambito, idWeb, usuarioId, municipioNum, municipioNom, localidadNum, localidadNom, unidad, asistSoc, tipoLoc, sedeVm, sedeVk, sedePm, sedePk, subsVm, subsVk, subsPm, subsPk, fecRegCed, techoConc, techoGalv, techoMade, techoCart, techoOtro, pareTabiq, pareAdobe, pareBlock, pareMader, parePiedr, pareCarto, pisoCemen, pisoMader, pisoTierr, pisoPiedr, agUsoPota, agUsoNori, agUsoRio, agUsoLluv, agConPota, agConPuri, agConHerv, agConClor, agConFilt, excFoSep, excLetri, excRasSu, combGas, combCar, combLen, combOtr, basRedM, basEnte, basCieAb, basInci, alumRedE, alumVela, alumQuin, alumPlaS, numHab, recam, estan, comed, multi, cocin, fecRegViv, pueIndTara, pueIndTepe, pueIndWuar, pueIndPima, pueIndMeno, pueIndOtro, derechINSABI, derechIMSS, derechISSSTE, derechPEMEX, derechSEDENA, derechOtro, numPerros, numGatos, numOtros, sisSalINSABI, sisSalIMSS, sisSalISSSTE, sisSalPEMEX, sisSalSEDENA, sisSalOtro, sisSalMedPar, sisSalCliPar, sisSalParter, sisSalCurand, sisSalYerber, sisSalHueser, sisSalBotica, comentario, fecRegGen, numInteg, origCapt) VALUES (:ambito, :idWeb, :usuarioId, :municipioNum, :municipioNom, :localidadNum, :localidadNom, :unidad, :asistSoc, :tipoLoc, :sedeVm, :sedeVk, :sedePm, :sedePk, :subsVm, :subsVk, :subsPm, :subsPk, :fecRegCed, :techoConc, :techoGalv, :techoMade, :techoCart, :techoOtro, :pareTabiq, :pareAdobe, :pareBlock, :pareMader, :parePiedr, :pareCarto, :pisoCemen, :pisoMader, :pisoTierr, :pisoPiedr, :agUsoPota, :agUsoNori, :agUsoRio, :agUsoLluv, :agConPota, :agConPuri, :agConHerv, :agConClor, :agConFilt, :excFoSep, :excLetri, :excRasSu, :combGas, :combCar, :combLen, :combOtr, :basRedM, :basEnte, :basCieAb, :basInci, :alumRedE, :alumVela, :alumQuin, :alumPlaS, :numHab, :recam, :estan, :comed, :multi, :cocin, :fecRegViv, :pueIndTara, :pueIndTepe, :pueIndWuar, :pueIndPima, :pueIndMeno, :pueIndOtro, :derechINSABI, :derechIMSS, :derechISSSTE, :derechPEMEX, :derechSEDENA, :derechOtro, :numPerros, :numGatos, :numOtros, :sisSalINSABI, :sisSalIMSS, :sisSalISSSTE, :sisSalPEMEX, :sisSalSEDENA, :sisSalOtro, :sisSalMedPar, :sisSalCliPar, :sisSalParter, :sisSalCurand, :sisSalYerber, :sisSalHueser, :sisSalBotica, :comentario, :fecRegGen, :numInteg, :origCapt)")
    suspend fun insertarRegistro(
        ambito: Int,
        idWeb: Int,
        usuarioId: Int,
        municipioNum: String,
        municipioNom: String,
        localidadNum: String,
        localidadNom: String,
        unidad: String,
        asistSoc: String,
        tipoLoc: String,
        sedeVm: Int,
        sedeVk: Int,
        sedePm: Int,
        sedePk: Int,
        subsVm: Int,
        subsVk: Int,
        subsPm: Int,
        subsPk: Int,
        fecRegCed: Long,
        techoConc: Int,
        techoGalv: Int,
        techoMade: Int,
        techoCart: Int,
        techoOtro: Int,
        pareTabiq: Int,
        pareAdobe: Int,
        pareBlock: Int,
        pareMader: Int,
        parePiedr: Int,
        pareCarto: Int,
        pisoCemen: Int,
        pisoMader: Int,
        pisoTierr: Int,
        pisoPiedr: Int,
        agUsoPota: Int,
        agUsoNori: Int,
        agUsoRio: Int,
        agUsoLluv: Int,
        agConPota: Int,
        agConPuri: Int,
        agConHerv: Int,
        agConClor: Int,
        agConFilt: Int,
        excFoSep: Int,
        excLetri: Int,
        excRasSu: Int,
        combGas: Int,
        combCar: Int,
        combLen: Int,
        combOtr: Int,
        basRedM: Int,
        basEnte: Int,
        basCieAb: Int,
        basInci: Int,
        alumRedE: Int,
        alumVela: Int,
        alumQuin: Int,
        alumPlaS: Int,
        numHab: Int,
        recam: Int,
        estan: Int,
        comed: Int,
        multi: Int,
        cocin: Int,
        fecRegViv: Long,
        pueIndTara: Int,
        pueIndTepe: Int,
        pueIndWuar: Int,
        pueIndPima: Int,
        pueIndMeno: Int,
        pueIndOtro: Int,
        derechINSABI: Int,
        derechIMSS: Int,
        derechISSSTE: Int,
        derechPEMEX: Int,
        derechSEDENA: Int,
        derechOtro: Int,
        numPerros: Int,
        numGatos: Int,
        numOtros: Int,
        sisSalINSABI: Int,
        sisSalIMSS: Int,
        sisSalISSSTE: Int,
        sisSalPEMEX: Int,
        sisSalSEDENA: Int,
        sisSalOtro: Int,
        sisSalMedPar: Int,
        sisSalCliPar: Int,
        sisSalParter: Int,
        sisSalCurand: Int,
        sisSalYerber: Int,
        sisSalHueser: Int,
        sisSalBotica: Int,
        comentario: String,
        fecRegGen: Long,
        numInteg: Int,
        origCapt: String
    )

    @Query("SELECT * FROM cedulas LIMIT 1")
    suspend fun obtenerPrimerRegistro(): Cedula?

    @Query("SELECT * FROM cedulas LIMIT 1 OFFSET :offset")
    suspend fun obtenerRegistroEnIntervalo(offset: Int): Cedula?

    @Query("SELECT * FROM cedulas ORDER BY id DESC LIMIT 1")
    suspend fun obtenerUltimoRegistro(): Cedula?

    // Consulta especial para ComboList
    @Query("""
        SELECT  
        '##!##' || municipioNum || '##!##' || municipioNom || '##!##' ||  
        localidadNum || '##!##' || localidadNom || '##!##' AS value,  
        municipioNom || ' - ' || localidadNom AS text  
        FROM cedulas  
        GROUP BY municipioNom, localidadNom  
        ORDER BY municipioNom
    """)
    suspend fun consultarLocalidades(): List<ComboItem>
}

