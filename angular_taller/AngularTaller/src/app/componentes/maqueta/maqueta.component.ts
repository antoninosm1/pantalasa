import { Component } from '@angular/core';

@Component({
    selector: 'maqueta_principal',
    template: `
        <div>area 1</div>
        <div>area 2</div>
        <div>area 3</div>
        <div>area 4</div>
    
    
    `
})
export class Maqueta{
    constructor() {
        console.log('componente Maqueta cargado');
    }
}
