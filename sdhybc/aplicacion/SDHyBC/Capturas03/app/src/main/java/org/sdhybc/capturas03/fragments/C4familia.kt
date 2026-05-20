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
import org.sdhybc.capturas03.databinding.FragmentC4FamiliaBinding

class C4familia : Fragment() {

    private var _binding: FragmentC4FamiliaBinding?=null
    private val binding get() = _binding!!

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
    }

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        _binding = FragmentC4FamiliaBinding.inflate(inflater, container, false)

        binding.fabIntegrantes.setOnClickListener { capturarIntegrante() }
        binding.buttonGuardar.setOnClickListener { guardarCaptura() }
        binding.buttonCancelar.setOnClickListener { seguroCancelar() }

        return binding.root
    }

    private fun capturarIntegrante(){
        val fragment = C5integrante()
        parentFragmentManager.beginTransaction()
            .replace(R.id.fragment_holder, fragment)
            .commit()
    }

    private fun guardarCaptura(){
        if(validarFamilia()){
            val fragment = C1cedula()
            parentFragmentManager.beginTransaction()
                .replace(R.id.fragment_holder, fragment)
                .commit()
        }
    }

    private fun validarFamilia():Boolean{
//
//                                    adecuar esto...................
//
        var numeroIntegrantes= (Math.random() % 2).toInt()
        if(numeroIntegrantes==0){
            return errorOnView("Agregar habitantes de la vivienda")
        }else {
            return true
        }
    }

    private fun errorOnView(msg:String):Boolean{
        val err = ErroresCaptura(requireView())
        err.errorCaptura(msg).show()
        return false
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