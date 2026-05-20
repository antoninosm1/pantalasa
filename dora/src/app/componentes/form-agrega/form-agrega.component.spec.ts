import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormAgregaComponent } from './form-agrega.component';

describe('FormAgregaComponent', () => {
  let component: FormAgregaComponent;
  let fixture: ComponentFixture<FormAgregaComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [FormAgregaComponent]
    });
    fixture = TestBed.createComponent(FormAgregaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
