package org.sdhybc.capturas03.fragments

import android.app.AlertDialog
import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import com.google.android.material.snackbar.Snackbar
import org.sdhybc.capturas03.R
import org.sdhybc.capturas03.controller.ErroresCaptura
import org.sdhybc.capturas03.databinding.FragmentC3GeneralBinding

class C3general : Fragment() {

    private var _binding: FragmentC3GeneralBinding? = null
    private val binding get() = _binding!!

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
    }

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        _binding = FragmentC3GeneralBinding.inflate(inflater, container, false)

        binding.buttonSiguiente.setOnClickListener { siguiente() }
        binding.buttonLimpiar.setOnClickListener { preguntarLimpiar() }
        binding.buttonCancelar.setOnClickListener { seguroCancelar() }

        return binding.root
    }

    private fun viewC3C4(){
        val fragment = C4familia()
        parentFragmentManager.beginTransaction()
            .replace(R.id.fragment_holder, fragment)
            .addToBackStack(null)
            .commit()
    }
    private fun siguiente(){
        if(validarGeneral()){
            viewC3C4()
        }
    }

    private fun validarGeneral():Boolean{
        if(!binding.chPuTar.isChecked && !binding.chPuTep.isChecked &&
            !binding.chPuWua.isChecked && !binding.chPuPim.isChecked &&
            !binding.chPuMen.isChecked && !binding.chPuOtr.isChecked &&
            !binding.chPuNoo.isChecked){
            return errorOnView("Ingresar Pueblo Indigena", binding.tvPueblo)
        }
        if(!binding.chDeINS.isChecked && !binding.chDeIMS.isChecked &&
            !binding.chDeISS.isChecked && !binding.chDePEM.isChecked &&
            !binding.chDeSED.isChecked && !binding.chDeOtr.isChecked &&
            !binding.chDeNoo.isChecked){
            return errorOnView("Ingresar Derechohabiencia", binding.tvDerechohabiencia)
        }
        if(binding.etPerros.text.isNullOrEmpty()){
            return errorOnView("Ingresar Cantidad de Perros", binding.tvPerros)
        }
        if(binding.etGatos.text.isNullOrEmpty()){
            return errorOnView("Ingresar Cantidad de Gatos", binding.tvGatos)
        }
        if(binding.etOtros.text.isNullOrEmpty()){
            return errorOnView("Ingresar Cantidad de Otros", binding.tvOtros)
        }
        if(!binding.chSiINS.isChecked && !binding.chSiIMS.isChecked &&
            !binding.chSiISS.isChecked && !binding.chSiPEM.isChecked &&
            !binding.chSiSED.isChecked && !binding.chSiOtr.isChecked &&
            !binding.chSiMed.isChecked && !binding.chSiCli.isChecked &&
            !binding.chSiPar.isChecked && !binding.chSiCur.isChecked &&
            !binding.chSiYer.isChecked && !binding.chSiHue.isChecked &&
            !binding.chSiBot.isChecked && !binding.chSiNoo.isChecked){
            return errorOnView("Ingresar Sistema de Salud", binding.tvSistema)
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
        binding.chPuTar.isChecked = false
        binding.chPuTep.isChecked = false
        binding.chPuWua.isChecked = false
        binding.chPuPim.isChecked = false
        binding.chPuMen.isChecked = false
        binding.chPuOtr.isChecked = false
        binding.chPuNoo.isChecked = false

        binding.chDeINS.isChecked = false
        binding.chDeIMS.isChecked = false
        binding.chDeISS.isChecked = false
        binding.chDePEM.isChecked = false
        binding.chDeSED.isChecked = false
        binding.chDeOtr.isChecked = false
        binding.chDeNoo.isChecked = false

        binding.etPerros.text.clear()
        binding.etGatos.text.clear()
        binding.etOtros.text.clear()

        binding.chSiINS.isChecked = false
        binding.chSiIMS.isChecked = false
        binding.chSiISS.isChecked = false
        binding.chSiPEM.isChecked = false
        binding.chSiSED.isChecked = false
        binding.chSiOtr.isChecked = false
        binding.chSiMed.isChecked = false
        binding.chSiCli.isChecked = false
        binding.chSiPar.isChecked = false
        binding.chSiCur.isChecked = false
        binding.chSiYer.isChecked = false
        binding.chSiHue.isChecked = false
        binding.chSiBot.isChecked = false
        binding.chSiNoo.isChecked = false

        binding.etComentario.text.clear()
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