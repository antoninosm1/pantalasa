/**
 * Ruta: sdhybca/settings.gradle.kts
 * Descripción: Configuración global con repositorios prioritizados.
 * Mantenido de CÓDIGOS BASE:
 * - Estructura de módulos existente
 * - Repositorios originales
 */
pluginManagement {
    repositories {
        google()
        mavenCentral()
        gradlePluginPortal()
    }
}

dependencyResolutionManagement {
    repositoriesMode.set(RepositoriesMode.FAIL_ON_PROJECT_REPOS)
    repositories {
        google()
        mavenCentral()
    }
}

rootProject.name = "sdhybca"
include(":app")