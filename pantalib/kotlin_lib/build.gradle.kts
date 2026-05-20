// RUTA: C:\xampp\htdocs\pantalasa\pantalib\kotlin_lib\build.gradle.kts  
plugins {  
    id("org.jetbrains.kotlin.jvm") version "1.9.0"  
}  

repositories {  
    mavenCentral()  
    google()  // ¡AÑADE ESTA LÍNEA!
}  

dependencies {  
    // DEPENDENCIAS ESENCIALES  
    implementation("org.jetbrains.kotlin:kotlin-stdlib")  
    implementation("org.jetbrains.kotlin:kotlin-reflect:1.9.0")  
    
    // DEPENDENCIAS ANDROID (OPCIONAL)  
    compileOnly("androidx.annotation:annotation:1.8.0")  
}  

java {  
    toolchain.languageVersion.set(JavaLanguageVersion.of(17))  
}  

tasks.jar {  
    manifest.attributes["Implementation-Version"] = "1.0.0"  
    archiveFileName.set("pantalib.jar")  
}  

