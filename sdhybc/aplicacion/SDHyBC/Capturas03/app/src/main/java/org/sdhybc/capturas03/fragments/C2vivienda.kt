package org.sdhybc.capturas03.fragments

import android.app.AlertDialog
import android.content.Context
import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.view.inputmethod.InputMethodManager
import android.widget.TextView
import com.google.android.material.snackbar.Snackbar
import org.sdhybc.capturas03.R
import org.sdhybc.capturas03.controller.ErroresCaptura
import org.sdhybc.capturas03.databinding.FragmentC2ViviendaBinding

class C2vivienda : Fragment() {

    private var _binding: FragmentC2ViviendaBinding? = null
    private val binding get() = _binding!!

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
    }

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        _binding = FragmentC2ViviendaBinding.inflate(inflater, container, false)

        binding.tvDistribucion.isFocusable = true; binding.tvDistribucion.isFocusableInTouchMode = true

        binding.chDiRec.setOnClickListener { binding.chDiRec.hideKeyboard() }
        binding.chDiEst.setOnClickListener { binding.chDiEst.hideKeyboard() }
        binding.chDiCom.setOnClickListener { binding.chDiCom.hideKeyboard() }
        binding.chDiCoc.setOnClickListener { binding.chDiCoc.hideKeyboard() }
        binding.chDiMul.setOnClickListener { binding.chDiMul.hideKeyboard() }

        binding.buttonSiguiente.setOnClickListener { siguiente() }
        binding.buttonLimpiar.setOnClickListener { preguntarLimpiar() }
        binding.buttonCancelar.setOnClickListener { seguroCancelar() }

        return binding.root
    }

    private fun siguiente(){
        if(validarVivienda()){
            viewC2C3()
        }
    }

    private fun viewC2C3(){
        val fragment = C3general()
        parentFragmentManager.beginTransaction()
            .replace(R.id.fragment_holder, fragment)
            .addToBackStack(null)
            .commit()
    }

    private fun View.hideKeyboard() {
        val imm = context.getSystemService(Context.INPUT_METHOD_SERVICE) as InputMethodManager
        imm.hideSoftInputFromWindow(windowToken, 0)
    }

    private fun validarVivienda():Boolean{
        if(!binding.chTeCon.isChecked && !binding.chTeLag.isChecked && !binding.chTeMad.isChecked && !binding.chTeLac.isChecked && !binding.chTeOtr.isChecked){
            return errorOnView("Ingresar Material del Techo", binding.tvTecho)
        }
        if(!binding.chPaAdo.isChecked && !binding.chPaBlo.isChecked && !binding.chPaCar.isChecked && !binding.chPaMad.isChecked && !binding.chPaPie.isChecked && !binding.chPaTab.isChecked){
            return errorOnView("Ingresar Material de las Paredes", binding.tvParedes)
        }
        if(!binding.chPiCem.isChecked && !binding.chPiMad.isChecked && !binding.chPiPie.isChecked && !binding.chPiTie.isChecked){
            return errorOnView("Ingresar Material del Piso", binding.tvPiso)
        }
        if(!binding.chAuLlu.isChecked && !binding.chAuNor.isChecked && !binding.chAuPot.isChecked && !binding.chAuRio.isChecked){
            return errorOnView("Ingresar Agua de Uso", binding.tvAguaUso)
        }
        if(!binding.chAcClo.isChecked && !binding.chAcFil.isChecked && !binding.chAcHer.isChecked && !binding.chAcPot.isChecked && !binding.chAcPur.isChecked){
            return errorOnView("Ingresar Agua de Consumo", binding.tvAguaConsumo)
        }
        if(!binding.chExFos.isChecked && !binding.chExLet.isChecked && !binding.chExRas.isChecked){
            return errorOnView("Ingresar Campo de Excreta", binding.tvExcreta)
        }
        if(!binding.chCoCar.isChecked && !binding.chCoGas.isChecked && !binding.chCoLen.isChecked && !binding.chCoOtr.isChecked){
            return errorOnView("Ingresar Campo de Combustible", binding.tvCombustible)
        }
        if(!binding.chBaCie.isChecked && !binding.chBaEnt.isChecked && !binding.chBaInc.isChecked && !binding.chBaRed.isChecked){
            return errorOnView("Ingresar Campo de Basura", binding.tvBasura)
        }
        if(!binding.chAlPla.isChecked && !binding.chAlQui.isChecked && !binding.chAlRed.isChecked && !binding.chAlVel.isChecked){
            return errorOnView("Ingresar Tipo de Alumbrado", binding.tvAlumbrado)
        }
        if(binding.etNumeroHabitaciones.text.isNullOrEmpty() || binding.etNumeroHabitaciones.text.toString() == "0"){
            return errorOnView("Ingresar Cantidad de Habitaciones", binding.tvDistribucion)
        }
        if(!binding.chDiCoc.isChecked && !binding.chDiCom.isChecked && !binding.chDiEst.isChecked && !binding.chDiMul.isChecked && !binding.chDiRec.isChecked){
            return errorOnView("Marcar Habitaciones Existentes", binding.tvDistribucion)
        }
        return true
    }

    private fun errorOnView(msg:String, tv: TextView):Boolean{
        val err = ErroresCaptura(requireView())
        err.errorCaptura(msg).show()
        tv.requestFocus()
        return false
    }

    private fun preguntarLimpiar(){
        val builder = AlertDialog.Builder(requireContext())
        builder.setTitle("LIMPIAR CONTENIDO")
        builder.setMessage("¿desea continuar?")
        builder.setPositiveButton("Sí"){_, _ ->
            limpiarContenido()
        }
        builder.setNegativeButton("No"){dialog, _ ->
            dialog.dismiss()
        }
        builder.setCancelable(false)
        builder.create().show()
    }

    private fun limpiarContenido(){
        binding.chTeCon.isChecked = false
        binding.chTeLag.isChecked = false
        binding.chTeMad.isChecked = false
        binding.chTeLac.isChecked = false
        binding.chTeOtr.isChecked = false

        binding.chPaTab.isChecked = false
        binding.chPaAdo.isChecked = false
        binding.chPaBlo.isChecked = false
        binding.chPaMad.isChecked = false
        binding.chPaPie.isChecked = false
        binding.chPaCar.isChecked = false

        binding.chPiCem.isChecked = false
        binding.chPiMad.isChecked = false
        binding.chPiTie.isChecked = false
        binding.chPiPie.isChecked = false

        binding.chAuPot.isChecked = false
        binding.chAuNor.isChecked = false
        binding.chAuRio.isChecked = false
        binding.chAuLlu.isChecked = false

        binding.chAcPot.isChecked = false
        binding.chAcPur.isChecked = false
        binding.chAcHer.isChecked = false
        binding.chAcClo.isChecked = false
        binding.chAcFil.isChecked = false

        binding.chExFos.isChecked = false
        binding.chExLet.isChecked = false
        binding.chExRas.isChecked = false

        binding.chBaRed.isChecked = false
        binding.chBaEnt.isChecked = false
        binding.chBaCie.isChecked = false
        binding.chBaInc.isChecked = false

        binding.etNumeroHabitaciones.text.clear()
        binding.chDiRec.isChecked = false
        binding.chDiEst.isChecked = false
        binding.chDiCom.isChecked = false
        binding.chDiMul.isChecked = false
        binding.chDiCoc.isChecked = false
    }

    private fun cancelarCaptura(){
        val fragment = C0inicio()
        parentFragmentManager.beginTransaction()
            .replace(R.id.fragment_holder, fragment)
            .addToBackStack(null)
            .commit()
    }

    private fun seguroCancelar(){
        val builder = AlertDialog.Builder(requireContext())
        builder.setTitle("CANCELAR CAPTURA")
        builder.setMessage("La información capturada no se guardará ¿desea continuar?")
        builder.setPositiveButton("Sí"){_, _ ->
            cancelarCaptura()
        }
        builder.setNegativeButton("No"){dialog, _ ->
            dialog.dismiss()
        }
        builder.setCancelable(false)
        builder.create().show()
    }
}