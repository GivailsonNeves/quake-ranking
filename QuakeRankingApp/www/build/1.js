webpackJsonp([1],{

/***/ 278:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "RankingPageModule", function() { return RankingPageModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ionic_angular__ = __webpack_require__(98);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__ranking__ = __webpack_require__(281);
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var RankingPageModule = (function () {
    function RankingPageModule() {
    }
    RankingPageModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["I" /* NgModule */])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_2__ranking__["a" /* RankingPage */],
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_1_ionic_angular__["d" /* IonicPageModule */].forChild(__WEBPACK_IMPORTED_MODULE_2__ranking__["a" /* RankingPage */]),
            ],
        })
    ], RankingPageModule);
    return RankingPageModule;
}());

//# sourceMappingURL=ranking.module.js.map

/***/ }),

/***/ 281:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return RankingPage; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__(0);
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
 * Generated class for the RankingPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
var RankingPage = (function () {
    function RankingPage() {
        this.searchInput = "";
        this.ranking = [];
    }
    RankingPage.prototype.ionViewDidLoad = function () {
        this._loadRanking();
    };
    RankingPage.prototype.logOut = function () {
    };
    RankingPage.prototype._loadRanking = function () {
        for (var i = -10; i < 50; i++) {
            this.ranking.push({ "name": "fulano", "kills": i });
        }
    };
    RankingPage.prototype.doRefresh = function (refresher) {
        setTimeout(function () {
            console.log('Async operation has ended');
            refresher.complete();
        }, 2000);
    };
    RankingPage = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'page-ranking',template:/*ion-inline-start:"E:\GIT\Pessoais\quake-ranking\QuakeRankingApp\src\pages\ranking\ranking.html"*/'<!--\n  Generated template for the RankingPage page.\n\n  See http://ionicframework.com/docs/components/#navigation for more info on\n  Ionic pages and navigation.\n-->\n<ion-header>\n\n  <ion-navbar>\n    <ion-title>Ranking</ion-title>    \n  <ion-buttons end>\n    <button (click)="logOut()" color="light" ion-button>\n      <ion-icon name="log-out"></ion-icon>\n    </button>    \n  </ion-buttons>\n  </ion-navbar>\n  <ion-toolbar>\n    <ion-searchbar [(ngModel)]="searchInput" \n      [animated]="true"\n      cancelButtonText = "cancelar"\n      showCancelButton="false" \n      placeholder="pesquisar...">\n    </ion-searchbar>\n    \n      <ion-list-header no-lines>\n        <p class="info-line">\n          <span class="nome">\n            Nome\n          </span>\n          <span class="kills">\n            Kills\n          </span>\n        </p>\n      </ion-list-header>\n    \n  </ion-toolbar>\n</ion-header>\n\n<ion-content padding>\n  <ion-refresher (ionRefresh)="doRefresh($event)">\n    <ion-refresher-content pullingIcon="arrow-dropdown" \n      pullingText="Pull to refresh" \n      refreshingSpinner="circles" \n      refreshingText="Recarregando...">\n    </ion-refresher-content>\n  </ion-refresher>\n  <br>\n  <ion-list no-lines>\n    <ion-item *ngFor="let r of ranking">\n      <p class="info-line">\n        <span class="nome">{{r.name}}</span>\n        <span [ngClass]="{\'negative\' : r.kills < 0}" class="kills">{{r.kills}}</span>\n      </p>\n    </ion-item>\n  </ion-list>\n</ion-content>\n'/*ion-inline-end:"E:\GIT\Pessoais\quake-ranking\QuakeRankingApp\src\pages\ranking\ranking.html"*/,
        }),
        __metadata("design:paramtypes", [])
    ], RankingPage);
    return RankingPage;
}());

//# sourceMappingURL=ranking.js.map

/***/ })

});
//# sourceMappingURL=1.js.map