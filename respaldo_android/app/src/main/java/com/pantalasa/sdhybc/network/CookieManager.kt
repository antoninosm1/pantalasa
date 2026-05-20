package com.pantalasa.sdhybc.network

// Importamos las clases necesarias de OkHttp
import okhttp3.Cookie
import okhttp3.CookieJar
import okhttp3.HttpUrl
import okhttp3.OkHttpClient

/**
 * Clase personalizada para gestionar cookies en las solicitudes HTTP.
 * Utiliza una estructura en memoria para almacenar cookies asociadas a cada host.
 */
class MyCookieJar : CookieJar {

    // Mapa para almacenar las cookies asociadas a cada host
    private val cookieStore: MutableMap<String, List<Cookie>> = mutableMapOf()

    /**
     * Método que guarda las cookies recibidas en la respuesta del servidor.
     * @param url Dirección del servidor que envió las cookies.
     * @param cookies Lista de cookies enviadas en la respuesta HTTP.
     */
    override fun saveFromResponse(url: HttpUrl, cookies: List<Cookie>) {
        // Almacenamos las cookies usando el host del URL como clave
        cookieStore[url.host] = cookies
    }

    /**
     * Método que carga las cookies necesarias para una solicitud HTTP.
     * @param url Dirección del servidor al que se realiza la solicitud.
     * @return Lista de cookies que se deben enviar en la solicitud.
     */
    override fun loadForRequest(url: HttpUrl): List<Cookie> {
        // Retorna las cookies almacenadas para el host o una lista vacía si no hay cookies
        return cookieStore[url.host] ?: emptyList()
    }
}

/**
 * Configuración del cliente HTTP utilizando OkHttp con soporte para cookies.
 * Este cliente reutiliza automáticamente las cookies en las solicitudes HTTP.
 */
val client: OkHttpClient = OkHttpClient.Builder()
    // Establecemos el CookieJar personalizado para manejar cookies
    .cookieJar(MyCookieJar())
    .build()
