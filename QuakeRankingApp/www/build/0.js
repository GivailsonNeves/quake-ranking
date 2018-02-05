webpackJsonp([0],{

/***/ 675:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ReportPageModule", function() { return ReportPageModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(146);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__report__ = __webpack_require__(678);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var ReportPageModule = (function () {
    function ReportPageModule() {
    }
    ReportPageModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["I" /* NgModule */])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_2__report__["a" /* ReportPage */],
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["d" /* IonicPageModule */].forChild(__WEBPACK_IMPORTED_MODULE_2__report__["a" /* ReportPage */]),
            ],
        })
    ], ReportPageModule);
    return ReportPageModule;
}());

//# sourceMappingURL=report.module.js.map

/***/ }),

/***/ 678:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ReportPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__providers_service_service__ = __webpack_require__(341);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


/**
 * Generated class for the ReportPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var ReportPage = (function () {
    function ReportPage(_service) {
        this._service = _service;
        this.relatorio = [];
        this.tiposMorte = [];
        this.filtro = "";
        this.filtroTipo = "";
    }
    ReportPage.prototype.ionViewDidLoad = function () {
        this._loadReport();
    };
    ReportPage.prototype._loadReport = function () {
        var _this = this;
        this._service.relatorio()
            .subscribe(function (res) {
            _this.relatorio = res.data;
            for (var i = 0; i < _this.relatorio[0].mortes.length; i++) {
                _this.tiposMorte.push(_this.relatorio[0].mortes[i].tipo);
            }
        }, function (err) { return console.log(err); });
    };
    ReportPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-report',template:/*ion-inline-start:"/Applications/XAMPP/xamppfiles/htdocs/quake-ranking/QuakeRankingApp/src/pages/report/report.html"*/'<!--\n  Generated template for the ReportPage page.\n\n  See http://ionicframework.com/docs/components/#navigation for more info on\n  Ionic pages and navigation.\n-->\n<ion-header>\n\n  <ion-navbar>\n    <ion-title>Relatório</ion-title>    \n  </ion-navbar>\n  <ion-toolbar>\n    <ion-item no-lines>\n      <ion-label>Filtrar Jogo</ion-label>\n      <ion-select [(ngModel)]="filtro"\n        okText="Filtrar" cancelText="Cancelar">        \n          <ion-option value="">Todos os jogos</ion-option>\n          <ion-option *ngFor="let r of relatorio" \n          value="{{r.nome}}">{{r.nome}}</ion-option>\n      </ion-select>\n    </ion-item>\n    <ion-item  no-lines>\n      <ion-label>Filtrar Tipo</ion-label>\n      <ion-select [(ngModel)]="filtroTipo"\n        okText="Filtrar" cancelText="Cancelar">        \n          <ion-option value="">Todas</ion-option>\n          <ion-option *ngFor="let t of tiposMorte" \n          value="{{t}}">{{t}}</ion-option>\n      </ion-select>\n    </ion-item>\n  </ion-toolbar>\n\n</ion-header>\n\n\n<ion-content padding>\n  <table *ngFor="let r of relatorio" [hidden]="filtro != \'\' && filtro != r.nome">\n    <thead>\n      <tr>\n        <th colspan="2">{{r.nome}}</th>        \n      </tr>\n      <tr>\n        <td>Tipo de morte</td>\n        <td>Total</td>\n      </tr>\n    </thead>\n    <tbody>\n      <tr *ngFor="let m of r.mortes" [hidden]="filtroTipo != \'\' && filtroTipo != m.tipo">\n        <td>{{m.tipo}}</td>\n        <th>{{m.total}}</th>\n      </tr>\n    </tbody>\n    <tfoot>\n      <tr>\n        <td>Total Mortes</td>\n        <th>{{r.total_mortes}}</th>\n      </tr>\n    </tfoot>\n  </table>\n</ion-content>\n'/*ion-inline-end:"/Applications/XAMPP/xamppfiles/htdocs/quake-ranking/QuakeRankingApp/src/pages/report/report.html"*/,
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__providers_service_service__["a" /* ServiceProvider */]])
    ], ReportPage);
    return ReportPage;
}());

//# sourceMappingURL=report.js.map

/***/ })

});
//# sourceMappingURL=0.js.map