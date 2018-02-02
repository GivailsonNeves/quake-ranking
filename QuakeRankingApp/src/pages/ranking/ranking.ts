import { Component } from '@angular/core';
import { IonicPage } from 'ionic-angular';

/**
 * Generated class for the RankingPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-ranking',
  templateUrl: 'ranking.html',
})
export class RankingPage {

  private searchInput: string = "";
  private ranking: any[] = [];

  constructor() {
  }

  ionViewDidLoad() {
    this._loadRanking();
  }

  public logOut()
  {

  }
  
  private _loadRanking()
  {
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
