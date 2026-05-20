/**
 * Ruta: sdhybca/build.gradle.kts
 * Descripción: Configuración global del proyecto.
 * Responsabilidades:
 * - Dependencias comunes a todos los módulos (classpath).
 * - Repositorios globales (Google, Maven Central).
 * - Plugins compartidos (Kotlin, Hilt, etc.).
 *
 * Nota: No confundir con el build.gradle.kts del módulo app.
 */
plugins {
    alias(libs.plugins.android.application) apply false  // Para módulo app
    alias(libs.plugins.kotlin.android) apply false      // Soporte Kotlin
}