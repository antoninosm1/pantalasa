import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GradillaComponent } from './gradilla.component';

describe('GradillaComponent', () => {
  let component: GradillaComponent;
  let fixture: ComponentFixture<GradillaComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [GradillaComponent]
    });
    fixture = TestBed.createComponent(GradillaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
