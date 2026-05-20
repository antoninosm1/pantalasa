/**
 * Ruta: c:\xampp\htdocs\pantalasa\mudanzas\app\build.gradle.kts
 * Descripción: Configuración compatible con KSP 1.9.22 y Kotlin 1.9.22
 */
///////////////////////////////////////////////////////////////
// PLUGINS
plugins {
    id("com.android.application")
    id("org.jetbrains.kotlin.android")
    id("com.google.devtools.ksp") version "1.9.22-1.0.17" // Mantener solo aquí
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
    }

    buildTypes {
        release {
            isMinifyEnabled = false
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
    ksp("androidx.room:room-compiler:$roomVersion") // Usar ksp en lugar de kapt

    // Dependencias base (existentes)
    implementation("androidx.core:core-ktx:1.12.0")
    implementation("androidx.appcompat:appcompat:1.6.1")
    implementation("com.google.android.material:material:1.11.0")
    implementation(libs.androidx.activity)
    implementation(libs.androidx.constraintlayout)

    implementation("androidx.lifecycle:lifecycle-viewmodel-ktx:2.6.2") // Para ViewModel
    implementation("com.squareup.okhttp3:okhttp:4.12.0") // Para conexiones HTTP/PHP

    implementation("org.jetbrains.kotlin:kotlin-reflect:1.9.22") // Versión debe coincidir con Kotlin

    testImplementation(libs.junit)
    androidTestImplementation(libs.androidx.junit)
    androidTestImplementation(libs.androidx.espresso.core)

    implementation("com.google.android.flexbox:flexbox:3.0.0")
}

