import { Component } from '@angular/core';
import { IonicPage } from 'ionic-angular';
import { ServiceProvider } from '../../providers/service/service';


@IonicPage()
@Component({
  selector: 'page-ranking',
  templateUrl: 'ranking.html',
})
export class RankingPage {

  private searchInput: string = "";
  private ranking: any[] = [];
  private onLoad: boolean = true;

  constructor(private _service: ServiceProvider) {}

  ionViewDidLoad() {
    this._loadRanking();
  }

  public logOut()
  {

  }
  
  private _loadRanking()
  {
    this._service.ranking()      
      .subscribe(
        res => console.log(res),
        err => console.error(err)
      )
    for(let i = -10; i < 50; i++){
      this.ranking.push({ "name" : "fulano", "kills" : i});
    }
  }

  public doRefresh(refresher){
    setTimeout(() => {
      console.log('Async operation has ended');
      refresher.complete();
    }, 2000);
  }

}
