/**
 * Ruta: c:\xampp\htdocs\pantalasa\mudanzas\app\build.gradle.kts
 * Descripción: Configuración del módulo app con KSP, Room, Reflection y Coroutines.
 * Funciones:
 * - Aplicar plugins de Android, Kotlin y KSP.
 * - Configurar Android con compileSdk 35.
 * - Definir dependencias para Room, ViewModel, OKHttp, conectividad, reflection y coroutines.
 */
///////////////////////////////////////////////////////////////
// PLUGINS
plugins {
    id("com.android.application")
    id("org.jetbrains.kotlin.android")
    id("com.google.devtools.ksp") version "1.9.22-1.0.17" // Aplicar KSP con versión específica
}
///////////////////////////////////////////////////////////////
// CONFIGURACIÓN ANDROID
android {
    namespace = "com.pantalasa.mudanzas"
    compileSdk = 35

    defaultConfig {
        applicationId = "com.pantalasa.mudanzas"
        minSdk = 24
        targetSdk = 35
        versionCode = 1
        versionName = "1.0"
        testInstrumentationRunner = "androidx.test.runner.AndroidJUnitRunner"

        javaCompileOptions {
            annotationProcessorOptions {
                arguments += mapOf(
                    "room.schemaLocation" to "$projectDir/schemas",
                    "room.incremental" to "true"
                )
            }
        }

    }

    buildTypes {
        release {
            isMinifyEnabled = true  // Ofusca y optimiza el código
            isShrinkResources = true // Elimina recursos no usados
            proguardFiles(
                getDefaultProguardFile("proguard-android-optimize.txt"),
                "proguard-rules.pro"
            )
        }
    }
    compileOptions {
        sourceCompatibility = JavaVersion.VERSION_17
        targetCompatibility = JavaVersion.VERSION_17
    }
    kotlinOptions {
        jvmTarget = "17"
    }
}

///////////////////////////////////////////////////////////////
// DEPENDENCIAS
dependencies {
    val roomVersion = "2.6.1"
    implementation("androidx.room:room-runtime:$roomVersion")
    implementation("androidx.room:room-ktx:$roomVersion")
    ksp("androidx.room:room-compiler:$roomVersion") // Usar ksp para Room

    // Dependencias base
    implementation(libs.androidx.core.ktx)
    implementation(libs.androidx.appcompat)
    implementation(libs.material)
    implementation(libs.androidx.activity)
    implementation(libs.androidx.constraintlayout)

    // Para ViewModel
    implementation("androidx.lifecycle:lifecycle-viewmodel-ktx:2.6.2")
    // Para conexiones HTTP/PHP
    implementation("com.squareup.okhttp3:okhttp:4.12.0")
    // Para inspección de conectividad de red
    implementation("androidx.lifecycle:lifecycle-livedata-ktx:2.6.2")
    implementation("androidx.lifecycle:lifecycle-runtime-ktx:2.6.2")

    // Para reflection de Kotlin (necesario para Metodos.kt)
    implementation("org.jetbrains.kotlin:kotlin-reflect:1.9.22")
    // Para coroutines (necesario para Metodos.kt)
    implementation("org.jetbrains.kotlinx:kotlinx-coroutines-android:1.7.3")

    testImplementation(libs.junit)
    androidTestImplementation(libs.androidx.junit)
    androidTestImplementation(libs.androidx.espresso.core)

    implementation("com.google.android.flexbox:flexbox:3.0.0")
    // Import the BoM for the Firebase platform
    implementation(platform("com.google.firebase:firebase-bom:33.0.0"))
    // Add the dependencies for the Crashlytics and Analytics libraries
    implementation("com.google.firebase:firebase-crashlytics-ktx")
    implementation("com.google.firebase:firebase-analytics-ktx")
}

