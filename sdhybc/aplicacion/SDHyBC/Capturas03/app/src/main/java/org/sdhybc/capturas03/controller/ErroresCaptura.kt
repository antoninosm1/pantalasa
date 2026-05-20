package org.sdhybc.capturas03.controller

import android.view.View
import androidx.core.content.ContentProviderCompat.requireContext
import com.google.android.material.snackbar.Snackbar

class ErroresCaptura(val view: View) {
    fun errorCaptura(msg:String):Snackbar{
        return Snackbar.make(view, msg, Snackbar.LENGTH_SHORT)
    }
}