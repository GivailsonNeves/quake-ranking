import { Component } from '@angular/core';
import { ServiceProvider } from 'provider/service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  
  private report : any[] = [];
  private kills : any[] = [];
  private _kills : any[] = [];
  private searchText: String = "";
  private currentTab: number = 1;

  constructor(private _service: ServiceProvider){}

  ngOnInit() {
    this._service.ranking()
      .subscribe(
        res => {
          this._kills = this.kills = res.data
        },
        err => console.log(err)
      );

    this._service.relatorio()
      .subscribe(
      res => {
        this.report = res.data
      },
      err => console.log(err)
      );
  }

  buscar()
  {    
    let val = this.searchText.toLowerCase();
    if(val == '')
    {
      this.kills = this._kills;
    }else{
      this.kills = this._kills
        .filter( r => r.nome.toLowerCase().indexOf(val) != -1 );
    }
  }
  
}
