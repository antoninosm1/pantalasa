package org.sdhybc.capturas03.fragments

import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.Menu
import android.view.MenuInflater
import android.view.MenuItem
import android.view.View
import android.view.ViewGroup
import android.widget.Toast
import com.google.android.material.snackbar.Snackbar
import org.sdhybc.capturas03.R
import org.sdhybc.capturas03.databinding.FragmentC0InicioBinding

class C0inicio : Fragment() {

    private var _binding:FragmentC0InicioBinding? = null
    private val binding get() = _binding!!

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
    }

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        _binding = FragmentC0InicioBinding.inflate(inflater, container, false)

        setHasOptionsMenu(true)
        binding.fabCedulas.setOnClickListener { addRecord() }

        return binding.root
    }

    override fun onCreateOptionsMenu(menu: Menu, inflater: MenuInflater) {
        inflater.inflate(R.menu.registros_main_menu, menu)
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        when(item.itemId){
            R.id.menu_records_upload -> {
                Snackbar.make(requireActivity().findViewById(R.id.fabCedulas), "UPLOADING", Snackbar.LENGTH_LONG)
                    .setAction("CANCEL"){
                        cancelUpload()
                    }
                    .setAnchorView(R.id.fabCedulas)
                    .show()
            }
        }
        return true
    }

    private fun cancelUpload(){
        Toast.makeText(requireContext(), "Cancelling...", Toast.LENGTH_SHORT).show()
    }

    private fun addRecord(){
        val fragment = C1cedula()
        parentFragmentManager.beginTransaction()
            .replace(R.id.fragment_holder, fragment)
            .addToBackStack(null)
            .commit()
    }
}