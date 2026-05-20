import { Component } from '@angular/core';

@Component({
    selector: 'maqueta-cabecera',
    templateUrl: './maquetacabecera.component.html',
    styleUrls: ['./maquetacabecera.component.css']
})
export class MaquetaCabecera {
    imprime = "esta es una prueba";
    idioma_general = 0;
    logo_text = "LOGO";
    title_text = ["DORA GLOCALS ARTISSANS", "DORA GLOCALES ARTESANALES"];
    status_text!: string;
    logo_imagen_url = 'https://miro.medium.com/v2/resize:fit:1100/format:webp/1*cGDDA2mfYkjiIhGaN8gDoA.png'
    city_selection!: string;
    ciudades = ["Sunland Park", "El Paso", "Ciudad Juárez", "Villa Ahumada", "Praxedis", "Guadalupe DB", "Tornillo", "Fabens"];
    onCityClicked(ciudad: string): void {
        this.city_selection = ciudad;
        this.imprime = this.imprime + 1;
    }
    nuevaCiudad(ciudad: string): void {
        this.ciudades.push(ciudad);
    }
    onClear(): void {
        this.city_selection = "";
    }
}
