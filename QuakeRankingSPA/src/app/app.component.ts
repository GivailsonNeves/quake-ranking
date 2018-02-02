import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  
  private kills : any[] = [];

  constructor(){
    for(let i : number = -5; i < 80; i++){
      this.kills.push({ 'user': 'fulano', 'kills' : i});
    }
  }
}
