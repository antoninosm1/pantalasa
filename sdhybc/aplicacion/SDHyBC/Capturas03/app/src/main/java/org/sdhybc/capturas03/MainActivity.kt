package org.sdhybc.capturas03

import android.app.Activity
import android.content.Context
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.view.inputmethod.InputMethodManager
import androidx.fragment.app.Fragment
import org.sdhybc.capturas03.databinding.ActivityMainBinding
import org.sdhybc.capturas03.fragments.C0inicio
import org.sdhybc.capturas03.fragments.C1cedula
import org.sdhybc.capturas03.fragments.C2vivienda
import org.sdhybc.capturas03.fragments.C3general
import org.sdhybc.capturas03.fragments.C5integrante

class MainActivity : AppCompatActivity() {

    private lateinit var binding: ActivityMainBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)

        supportFragmentManager.beginTransaction().apply {
            replace(binding.fragmentHolder.id, C0inicio())
//            replace(binding.fragmentHolder.id, C1cedula())
//            replace(binding.fragmentHolder.id, C2vivienda())
//            replace(binding.fragmentHolder.id, C3general())
//            replace(binding.fragmentHolder.id, C5integrante())
            addToBackStack(null)
            commit()
        }
    }

    fun Fragment.hideKeyboard() {
        view?.let { activity?.hideKeyboard(it) }
    }

    fun Activity.hideKeyboard() {
        hideKeyboard(currentFocus ?: View(this))
    }

    fun Context.hideKeyboard(view: View) {
        val inputMethodManager = getSystemService(Activity.INPUT_METHOD_SERVICE) as InputMethodManager
        inputMethodManager.hideSoftInputFromWindow(view.windowToken, 0)
    }
}