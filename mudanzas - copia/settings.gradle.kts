/**
 * Ruta: c:\xampp\htdocs\pantalasa\mudanzas\settings.gradle.kts
 * Descripción: Configuración de repositorios y gestión de dependencias.
 * Funciones:
 * - Definir repositorios para plugins y dependencias.
 * - Incluir el módulo app.
 */
pluginManagement {
    repositories {
        google {
            content {
                includeGroupByRegex("com\\.android.*")
                includeGroupByRegex("com\\.google.*")
                includeGroupByRegex("androidx.*")
            }
        }
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

rootProject.name = "mudanzas"
include(":app")