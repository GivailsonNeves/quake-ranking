import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Observable } from 'rxjs/Rx';
import 'rxjs/add/operator/map'

@Injectable()
export class ServiceProvider {

    private base_url: string = "http://localhost/quake-ranking/server";

    constructor(public http: Http) {       
    }

    public ranking(): Observable<any> {
        return this.http.get(`${this.base_url}/service.php?type=ranking`)
            .map(res => res.json());
    }

    public relatorio(): Observable<any> {
        return this.http.get(`${this.base_url}/service.php?type=relatorio`)
            .map(res => res.json());
    }

}