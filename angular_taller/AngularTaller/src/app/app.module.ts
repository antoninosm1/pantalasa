import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { Maqueta } from './componentes/maqueta/maqueta.component';

@NgModule({
  declarations: [
    AppComponent,
    Maqueta
  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
