import { Http } from '@angular/http';
import { Injectable } from '@angular/core';
import { Config } from 'ionic-angular/config/config';
import { Observable } from 'rxjs/Rx';
import 'rxjs';


@Injectable()
export class ServiceProvider {

  private base_url: string = "";

  constructor(public http: Http, 
      _config: Config ) {
      this.base_url = _config.get('BASE_API');
    }

  public ranking() : Observable<any>{
    return this.http.get(`${this.base_url}/service.php?type=ranking`)
      .map(res => res.json());
  }

  public relatorio() : Observable<any> {
    return this.http.get(`${this.base_url}/service.php?type=relatorio`)
      .map(res => res.json());
  }

}
