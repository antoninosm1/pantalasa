import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { MaquetaPrincipal } from './componentes/Maqueta/maqueta.component';
import { MaquetaCabecera } from './componentes/MaquetaCabecera/maquetacabecera.component';
import { Logo } from './componentes/Logo/logo.component';
import { ButtonComponent } from './componentes/button/button.component';
import { GradillaComponent } from './componentes/gradilla/gradilla.component';
import { FormAgregaComponent } from './componentes/form-agrega/form-agrega.component';

@NgModule({
  declarations: [
    AppComponent,
    MaquetaPrincipal,
    MaquetaCabecera,
    Logo,
    ButtonComponent,
    GradillaComponent,
    FormAgregaComponent,
  ],
  imports: [
    BrowserModule,
    FormsModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
