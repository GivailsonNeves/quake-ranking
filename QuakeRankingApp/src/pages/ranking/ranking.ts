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
  private _ranking: any[] = [];
  private ranking: any[] = [];
  private onLoad: boolean = true;

  constructor(private _service: ServiceProvider) {}

  ionViewDidLoad() {
    this._loadRanking();
  }

  public logOut()
  {

  }
  
  private _loadRanking(refresher = null)
  {
    this.searchInput = "";
    this._service.ranking()      
      .subscribe(
        res => {
          this._ranking = this.ranking = res.data;
          this.onLoad = false;
          if(refresher){
            refresher.complete();
          }
          this.onLoad = false;
        },
        err => {
          if (refresher) {
            refresher.complete();
          }
          this.onLoad = false;
          console.error(err);
        }
      )
    
  }

  public filtrarJogador(ev: any){
    let val = ev.target.value;

    if(!val){
      this.ranking = this._ranking;
    }else{      
      this.ranking = this._ranking
        .filter(r => r.nome.toLowerCase().indexOf(val.toLowerCase()) != -1 );
    }
  }

  public doRefresh(refresher){
    this._loadRanking(refresher);
  }

}
