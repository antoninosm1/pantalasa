package org.sdhybc.capturas03.fragments

import android.app.AlertDialog
import android.content.Context
import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.view.inputmethod.InputMethodManager
import android.widget.AdapterView
import android.widget.ArrayAdapter
import android.widget.ScrollView
import android.widget.TextView
import android.widget.Toast
import com.google.android.material.snackbar.Snackbar
import org.sdhybc.capturas03.R
import org.sdhybc.capturas03.controller.ErroresCaptura
import org.sdhybc.capturas03.databinding.FragmentC1CedulaBinding

class C1cedula : Fragment() {

    private var _binding: FragmentC1CedulaBinding? = null
    private val binding get() = _binding!!

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
    }

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        _binding = FragmentC1CedulaBinding.inflate(inflater, container, false)

        val municipiosAdapter : ArrayAdapter<String> = ArrayAdapter<String>(requireContext(), R.layout.spinner_item, resources.getStringArray(R.array.municipios));
        municipiosAdapter.setDropDownViewResource(R.layout.spinner_item);
        binding.spinnerMunicipios.setAdapter(municipiosAdapter);

        binding.spinnerMunicipios.onItemSelectedListener = object : AdapterView.OnItemSelectedListener {
            override fun onItemSelected(adapterView: AdapterView<*>?, view: View?, position: Int, id: Long) {
                loadLocalidades(position)
            }
            override fun onNothingSelected(p0: AdapterView<*>?) { }
        }

        binding.spinnerLocalidades.onItemSelectedListener = object : AdapterView.OnItemSelectedListener {
            override fun onItemSelected(adapterView: AdapterView<*>?, view: View?, position: Int, id: Long) {
                if(position != 0 && position < binding.spinnerLocalidades.count - 1) {
                    binding.etLocalidad.setText(adapterView?.getItemAtPosition(position).toString())
                }
            }
            override fun onNothingSelected(p0: AdapterView<*>?) { }
        }

        setViewsFocusable()

        binding.buttonSiguiente.setOnClickListener { siguiente() }
        binding.buttonLimpiar.setOnClickListener { preguntarLimpiar() }
        binding.buttonCancelar.setOnClickListener { seguroCancelar() }

        return binding.root
    }

    override fun onDestroyView() {
        super.onDestroyView()
        _binding = null
    }

    private fun setViewsFocusable(){
        binding.tvCaptura.isFocusable = true; binding.tvCaptura.isFocusableInTouchMode = true
        binding.tvUbicacion.isFocusable = true; binding.tvUbicacion.isFocusableInTouchMode = true
        binding.tvRegion.isFocusable = true; binding.tvRegion.isFocusableInTouchMode = true
    }

    private fun View.hideKeyboard() {
        val imm = context.getSystemService(Context.INPUT_METHOD_SERVICE) as InputMethodManager
        imm.hideSoftInputFromWindow(windowToken, 0)
    }

    private fun loadLocalidades(n: Int){
        var s: Int
        when(n){
            1 -> { s = R.array.M1 };2 -> { s = R.array.M2 };3 -> { s = R.array.M3 };4 -> { s = R.array.M4 };5 -> { s = R.array.M5 };6 -> { s = R.array.M6 };7 -> { s = R.array.M7 };8 -> { s = R.array.M8 };9 -> { s = R.array.M9 };10 -> { s = R.array.M10 };11 -> { s = R.array.M11 };12 -> { s = R.array.M12 };13 -> { s = R.array.M13 };14 -> { s = R.array.M14 };15 -> { s = R.array.M15 };16 -> { s = R.array.M16 };17 -> { s = R.array.M17 };18 -> { s = R.array.M18 };19 -> { s = R.array.M19 };20 -> { s = R.array.M20 };21 -> { s = R.array.M21 };22 -> { s = R.array.M22 };23 -> { s = R.array.M23 };24 -> { s = R.array.M24 };25 -> { s = R.array.M25 };26 -> { s = R.array.M26 };27 -> { s = R.array.M27 };28 -> { s = R.array.M28 };29 -> { s = R.array.M29 };30 -> { s = R.array.M30 };31 -> { s = R.array.M31 };32 -> { s = R.array.M32 };33 -> { s = R.array.M33 };34 -> { s = R.array.M34 };35 -> { s = R.array.M35 };36 -> { s = R.array.M36 };37 -> { s = R.array.M37 };38 -> { s = R.array.M38 };39 -> { s = R.array.M39 };40 -> { s = R.array.M40 };41 -> { s = R.array.M41 };42 -> { s = R.array.M42 };43 -> { s = R.array.M43 };44 -> { s = R.array.M44 };45 -> { s = R.array.M45 };46 -> { s = R.array.M46 };47 -> { s = R.array.M47 };48 -> { s = R.array.M48 };49 -> { s = R.array.M49 };50 -> { s = R.array.M50 };51 -> { s = R.array.M51 };52 -> { s = R.array.M52 };53 -> { s = R.array.M53 };54 -> { s = R.array.M54 };55 -> { s = R.array.M55 };56 -> { s = R.array.M56 };57 -> { s = R.array.M57 };58 -> { s = R.array.M58 };59 -> { s = R.array.M59 };60 -> { s = R.array.M60 };61 -> { s = R.array.M61 };62 -> { s = R.array.M62 };63 -> { s = R.array.M63 };64 -> { s = R.array.M64 };65 -> { s = R.array.M65 };66 -> { s = R.array.M66 };67 -> { s = R.array.M67 }; else -> { s = R.array.M0 }
        }
        val localidadesAdapter : ArrayAdapter<String> = ArrayAdapter<String>(requireContext(), R.layout.spinner_item, resources.getStringArray(s));
        localidadesAdapter.setDropDownViewResource(R.layout.spinner_item);
        binding.spinnerLocalidades.setAdapter(localidadesAdapter);
    }

    private fun siguiente(){
        if(validarCedula()){
            viewC1C2()
        }
    }

    private fun viewC1C2(){
        val fragment = C2vivienda()
        parentFragmentManager.beginTransaction()
            .replace(R.id.fragment_holder, fragment)
            .addToBackStack(null)
            .commit()
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
        binding.etAsistente.text.clear()
        binding.spinnerMunicipios.setSelection(0)
        binding.spinnerLocalidades.setSelection(0)
        binding.tvNumeroLocalidad.text = "####"
        binding.etLocalidad.text.clear()
        binding.etVehiculoTiempo.text.clear()
        binding.etVehiculoDistancia.text.clear()
        binding.etPieTiempo.text.clear()
        binding.etPieDistancia.text.clear()

        binding.svCedula.fullScroll(ScrollView.FOCUS_UP)
    }

    private fun validarCedula():Boolean{
        if(binding.etAsistente.text.isNullOrEmpty()){
            return errorOnView("Ingresar Asistente Social", binding.tvAsistente)
        }
        if(binding.spinnerMunicipios.selectedItemId == 0L){
            return errorOnView("Ingresar Municipio", binding.tvMunicipio)
        }
        if(binding.spinnerLocalidades.selectedItemId == 0L){
            return errorOnView("Ingresar Localidad", binding.tvLocalidad)
        }
        //binding.tvNumeroLocalidad.text = "####"
        if(binding.etLocalidad.text.isNullOrEmpty()){
            return errorOnView("Ingresar Localidad", binding.tvLocalidad)
        }
        if(binding.etVehiculoTiempo.text.isNullOrEmpty()){
            return errorOnView("Ingresar Tiempo en Vehiculo", binding.tvVehiculoTiempo)
        }
        if(binding.etVehiculoDistancia.text.isNullOrEmpty()){
            return errorOnView("Ingresar Distancia en Vehiculo", binding.tvVehiculoDistancia)
        }
        if(binding.etPieTiempo.text.isNullOrEmpty()){
            return errorOnView("Ingresar Tiempo a Pie/Semoviente", binding.tvPieTiempo)
        }
        if(binding.etPieDistancia.text.isNullOrEmpty()){
            return errorOnView("Ingresar Distancia a Pie/Semoviente", binding.tvPieDistancia)
        }
        return true
    }

    private fun errorOnView(msg:String, tv: TextView):Boolean{
        val err = ErroresCaptura(requireView())
        err.errorCaptura(msg).show()
        tv.requestFocus()
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




















