import { Component } from '@angular/core';
import { ServiceProvider } from 'provider/service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  
  private tiposMorte : String[] = [];
  private relatorio : any[] = [];
  private kills : any[] = [];
  private _kills : any[] = [];
  private searchText: String = "";
  private filtro: String = "";
  private filtroTipo: String = "";
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
        this.relatorio = res.data;
        for (let i = 0; i < this.relatorio[0].mortes.length; i++) {
          this.tiposMorte.push(this.relatorio[0].mortes[i].tipo);
        }
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
