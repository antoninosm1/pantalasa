package org.sdhybc.capturas03.fragments

import android.annotation.SuppressLint
import android.app.AlertDialog
import android.content.Context
import android.os.Build
import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.view.inputmethod.InputMethodManager
import android.widget.ArrayAdapter
import android.widget.ScrollView
import android.widget.TextView
import androidx.annotation.RequiresApi
import com.google.android.material.snackbar.Snackbar
import org.sdhybc.capturas03.R
import org.sdhybc.capturas03.controller.ErroresCaptura
import org.sdhybc.capturas03.databinding.FragmentC5IntegranteBinding
import java.time.LocalDate
import java.time.Period
import java.time.format.DateTimeFormatter
import java.util.Date


class C5integrante : Fragment() {

    private var _binding:FragmentC5IntegranteBinding? = null
    private val binding get() = _binding!!

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
    }

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        _binding = FragmentC5IntegranteBinding.inflate(inflater, container, false)

        setSpinners()
        binding.buttonFechaDeNacimiento.setOnClickListener { showDatePickerDialog() }
        binding.rbMujer.setOnClickListener { binding.rbMujer.hideKeyboard() }
        binding.rbHombre.setOnClickListener { binding.rbHombre.hideKeyboard() }

        binding.buttonLimpiar.setOnClickListener { preguntarLimpiar() }
        binding.buttonAgregar.setOnClickListener { agregarIntegrante() }

        return binding.root
    }

    private fun setSpinners(){
        var adapter  = ArrayAdapter<String>(requireContext(), R.layout.spinner_item, resources.getStringArray(R.array.estados))
        adapter.setDropDownViewResource(R.layout.spinner_item)
        binding.spinnerEstados.setAdapter(adapter); binding.spinnerEstados.isFocusable = true; binding.spinnerEstados.isFocusableInTouchMode = true
        adapter  = ArrayAdapter<String>(requireContext(), R.layout.spinner_item, resources.getStringArray(R.array.lenguasMaternas))
        adapter.setDropDownViewResource(R.layout.spinner_item)
        binding.spinnerLenguaMaterna.setAdapter(adapter); binding.spinnerLenguaMaterna.isFocusable = true; binding.spinnerLenguaMaterna.isFocusableInTouchMode = true

        adapter  = ArrayAdapter<String>(requireContext(), R.layout.spinner_item, resources.getStringArray(R.array.estadosCiviles))
        adapter.setDropDownViewResource(R.layout.spinner_item)
        binding.spinnerEstadoCivil.setAdapter(adapter); binding.spinnerEstadoCivil.isFocusable = true; binding.spinnerEstadoCivil.isFocusableInTouchMode = true
        adapter  = ArrayAdapter<String>(requireContext(), R.layout.spinner_item, resources.getStringArray(R.array.parentescos))
        adapter.setDropDownViewResource(R.layout.spinner_item)
        binding.spinnerParentesco.setAdapter(adapter); binding.spinnerParentesco.isFocusable = true; binding.spinnerParentesco.isFocusableInTouchMode = true
        adapter  = ArrayAdapter<String>(requireContext(), R.layout.spinner_item, resources.getStringArray(R.array.escolaridades))
        adapter.setDropDownViewResource(R.layout.spinner_item)
        binding.spinnerEscolaridad.setAdapter(adapter); binding.spinnerEscolaridad.isFocusable = true; binding.spinnerEscolaridad.isFocusableInTouchMode = true
        adapter  = ArrayAdapter<String>(requireContext(), R.layout.spinner_item, resources.getStringArray(R.array.ocupaciones))
        adapter.setDropDownViewResource(R.layout.spinner_item)
        binding.spinnerOcupacion.setAdapter(adapter); binding.spinnerOcupacion.isFocusable = true; binding.spinnerOcupacion.isFocusableInTouchMode = true
        adapter  = ArrayAdapter<String>(requireContext(), R.layout.spinner_item, resources.getStringArray(R.array.ingresos))
        adapter.setDropDownViewResource(R.layout.spinner_item)
        binding.spinnerIngresos.setAdapter(adapter); binding.spinnerIngresos.isFocusable = true; binding.spinnerIngresos.isFocusableInTouchMode = true

        adapter  = ArrayAdapter<String>(requireContext(), R.layout.spinner_item, resources.getStringArray(R.array.frecuencias))
        adapter.setDropDownViewResource(R.layout.spinner_item)
        binding.spinnerBaCaRo.setAdapter(adapter); binding.spinnerBaCaRo.isFocusable = true; binding.spinnerBaCaRo.isFocusableInTouchMode = true
        binding.spinnerLaDi.setAdapter(adapter); binding.spinnerLaDi.isFocusable = true; binding.spinnerLaDi.isFocusableInTouchMode = true
        binding.spinnerLiVi.setAdapter(adapter); binding.spinnerLiVi.isFocusable = true; binding.spinnerLiVi.isFocusableInTouchMode = true
        binding.spinnerBeAl.setAdapter(adapter); binding.spinnerBeAl.isFocusable = true; binding.spinnerBeAl.isFocusableInTouchMode = true
        binding.spinnerTaba.setAdapter(adapter); binding.spinnerTaba.isFocusable = true; binding.spinnerTaba.isFocusableInTouchMode = true
        binding.spinnerMedi.setAdapter(adapter); binding.spinnerMedi.isFocusable = true; binding.spinnerMedi.isFocusableInTouchMode = true
        binding.spinnerDrog.setAdapter(adapter); binding.spinnerDrog.isFocusable = true; binding.spinnerDrog.isFocusableInTouchMode = true

        binding.rgGenero.isFocusable = true; binding.rgGenero.isFocusableInTouchMode = true
        binding.rgEmbarazo.isFocusable = true; binding.rgEmbarazo.isFocusableInTouchMode = true
    }

    private fun View.hideKeyboard() {
        val imm = context.getSystemService(Context.INPUT_METHOD_SERVICE) as InputMethodManager
        imm.hideSoftInputFromWindow(windowToken, 0)
    }

    @SuppressLint("NewApi")
    private fun showDatePickerDialog(){
        binding.buttonFechaDeNacimiento.hideKeyboard()
        val datePicker = DatePickerFragment { day, month, year -> onDateSelected(day, month, year) }
        datePicker.show(requireActivity().supportFragmentManager, "datePicker")
    }

    @RequiresApi(Build.VERSION_CODES.O)
    private fun onDateSelected(day:Int, month:Int, year:Int){
        val strdate : String = year.toString() + "-" + (if(month < 9) ("0" + (month + 1).toString()) else (month + 1).toString()) + "-" + (if(day < 10) ("0" + day.toString()) else (day.toString()))
        obtenerEdad(strdate)
        binding.buttonFechaDeNacimiento.setText(strdate)
    }

    @RequiresApi(Build.VERSION_CODES.O)
    private fun obtenerEdad(fromDate:String){
        val dateFormatter: DateTimeFormatter =  DateTimeFormatter.ofPattern("yyyy-MM-dd")

        val from = LocalDate.parse(fromDate, dateFormatter)
        val to = LocalDate.parse(LocalDate.now().format(dateFormatter), dateFormatter)

        val period = Period.between(from, to)
        binding.etEdad.setText(period.years.toString())
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
        binding.etPrimerApellido.text.clear()
        binding.etSegundoApellido.text.clear()
        binding.etNombres.text.clear()
        binding.buttonFechaDeNacimiento.text = "ELEGIR FECHA"
        binding.etEdad.text.clear()
        binding.rbMujer.isChecked = false
        binding.rbHombre.isChecked = false

        binding.spinnerEstados.setSelection(0)
        binding.spinnerLenguaMaterna.setSelection(0)
        binding.spinnerEstadoCivil.setSelection(0)
        binding.spinnerParentesco.setSelection(0)
        binding.spinnerEscolaridad.setSelection(0)
        binding.spinnerOcupacion.setSelection(0)
        binding.spinnerIngresos.setSelection(0)

        binding.chPaPap.isChecked = false
        binding.chPaHip.isChecked = false
        binding.chPaDia.isChecked = false
        binding.chPaTub.isChecked = false
        binding.chPaAlc.isChecked = false
        binding.chPaTab.isChecked = false
        binding.chPaCan.isChecked = false

        binding.chPlDIU.isChecked = false
        binding.chPlOra.isChecked = false
        binding.chPlPre.isChecked = false
        binding.chPlInM.isChecked = false
        binding.chPlInB.isChecked = false
        binding.chPlSal.isChecked = false
        binding.chPlImp.isChecked = false

        binding.rbEmbaNo.isChecked = false
        binding.rbEmbaSi.isChecked = false
        binding.rbEmbaEn.isChecked = false

        binding.spinnerBaCaRo.setSelection(0)
        binding.spinnerLaDi.setSelection(0)
        binding.spinnerLiVi.setSelection(0)

        binding.spinnerBeAl.setSelection(0)
        binding.spinnerTaba.setSelection(0)
        binding.spinnerMedi.setSelection(0)
        binding.spinnerDrog.setSelection(0)

        binding.svIntegrante.fullScroll(ScrollView.FOCUS_UP)
    }

    private fun agregarIntegrante(){
        if(validarIntegrante()) {
            Snackbar.make(requireView(), "Almacenando integrante", Snackbar.LENGTH_LONG).show()
            viewC5C4()
        }
    }

    private fun viewC5C4(){
        val fragment = C4familia()
        parentFragmentManager.beginTransaction()
            .replace(R.id.fragment_holder, fragment)
            .addToBackStack(null)
            .commit()
    }

    private fun validarIntegrante():Boolean{
        if(binding.etPrimerApellido.text.isNullOrEmpty()){
            return errorOnView("Ingresar Primer Apellido", binding.tvApellido1)
        }
        if(binding.etSegundoApellido.text.isNullOrEmpty()){
            return errorOnView("Ingresar Segundo Apellido", binding.tvApellido2)
        }
        if(binding.etNombres.text.isNullOrEmpty()){
            return errorOnView("Ingresar Nombre", binding.tvNombre)
        }
        if(binding.buttonFechaDeNacimiento.text == "ELEGIR FECHA"){
            return errorOnView("Ingresar Fecha de Nacimiento", binding.tvFechaNacimiento)
        }
        if(binding.etEdad.text.isNullOrEmpty()){
            return errorOnView("Ingresar Edad", binding.tvEdad)
        }
        if(!binding.rbMujer.isChecked && !binding.rbHombre.isChecked){
            return errorOnView("Ingresar Genero", binding.tvGenero)
        }
        if(binding.spinnerEstados.selectedItemId == 0L){
            return errorOnView("Ingresar Estado de Origen", binding.tvEstado)
        }
        if(binding.spinnerLenguaMaterna.selectedItemId == 0L){
            return errorOnView("Ingresar Lengua Materna", binding.tvLengua)
        }
        if(binding.spinnerEstadoCivil.selectedItemId == 0L){
            return errorOnView("Ingresar Estado Civil", binding.tvEstadoCivil)
        }
        if(binding.spinnerParentesco.selectedItemId == 0L){
            return errorOnView("Ingresar Parentesco", binding.tvParentesco)
        }
        if(binding.spinnerEscolaridad.selectedItemId == 0L){
            return errorOnView("Ingresar Escolaridad", binding.tvEscolaridad)
        }
        if(binding.spinnerOcupacion.selectedItemId == 0L){
            return errorOnView("Ingresar Ocupación", binding.tvOcupacion)
        }
        if(binding.spinnerIngresos.selectedItemId == 0L){
            return errorOnView("Ingresar Opción de Ingresos", binding.tvIngresos)
        }

        if(!binding.rbEmbaNo.isChecked && !binding.rbEmbaSi.isChecked && !binding.rbEmbaEn.isChecked){
            return errorOnView("Ingresar Opcion de Embarazo", binding.tvEmbarazo)
        }
        if(binding.spinnerBaCaRo.selectedItemId == 0L){
            return errorOnView("Ingresar Frecuencia de Baño y Cambio de Ropa", binding.tvBacaro)
        }
        if(binding.spinnerLaDi.selectedItemId == 0L){
            return errorOnView("Ingresar Frecuencia de Lavado de Dientes", binding.tvLadi)
        }
        if(binding.spinnerLiVi.selectedItemId == 0L){
            return errorOnView("Ingresar Frecuencia de Limpieza de Vivienda", binding.tvLivi)
        }

        if(binding.spinnerBeAl.selectedItemId == 0L){
            return errorOnView("Ingresar Frecuencia de Bebidas Alcohólicas", binding.tvBeal)
        }
        if(binding.spinnerTaba.selectedItemId == 0L){
            return errorOnView("Ingresar Frecuencia de Tabaco", binding.tvTaba)
        }
        if(binding.spinnerMedi.selectedItemId == 0L){
            return errorOnView("Ingresar Frecuencia de Medicamentos", binding.tvMedi)
        }
        if(binding.spinnerDrog.selectedItemId == 0L){
            return errorOnView("Ingresar Frecuencia de Drogas", binding.tvDrog)
        }
        return true
    }

    private fun errorOnView(msg:String, tv:TextView):Boolean{
        val err = ErroresCaptura(requireView())
        err.errorCaptura(msg).show()
        tv.requestFocus()
        return false
    }
}