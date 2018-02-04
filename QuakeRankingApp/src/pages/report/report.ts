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

  constructor(private _service: ServiceProvider) {
  }

  ionViewDidLoad() {
    this._loadReport();
  }

  private _loadReport()
  {
    this._service.relatorio()
      .subscribe(
        res => console.log(res),
        err => console.log(err)
      )
  }

}
