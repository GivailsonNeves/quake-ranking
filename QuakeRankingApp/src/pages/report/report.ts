import { Component } from '@angular/core';
import { IonicPage } from 'ionic-angular';
import { ServiceProvider } from '../../providers/service/service';

/**
 * Generated class for the ReportPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-report',
  templateUrl: 'report.html',
})
export class ReportPage {

  private relatorio:any[] = [];
  private tiposMorte:String[] = [];
  private filtro: String = "";  
  private filtroTipo: String = "";  

  constructor(private _service: ServiceProvider) {}

  ionViewDidLoad() {
    this._loadReport();
  }

  private _loadReport()
  {
    this._service.relatorio()
      .subscribe(
        res => {
          this.relatorio = res.data;
          for (let i = 0; i < this.relatorio[0].mortes.length; i++)
          {
            this.tiposMorte.push(this.relatorio[0].mortes[i].tipo);
          }
        },
        err => console.log(err)
      )
  }

}
