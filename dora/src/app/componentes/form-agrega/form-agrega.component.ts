import { Component, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-form-agrega',
  templateUrl: './form-agrega.component.html',
  styleUrls: ['./form-agrega.component.css']
})
export class FormAgregaComponent {
  @Input() className = 'btn-primary';
  @Input() label!: string;
  @Output() NuevaCiudadEvento = new EventEmitter<string>();
  nuevaCiudad(item: string):void {
    console.log('Item: ', item);
    this.NuevaCiudadEvento.emit(item);
  }  
}
