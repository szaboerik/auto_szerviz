<?php

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SzervizController;
use App\Http\Controllers\FeladatController;
use App\Http\Controllers\MunkalapController;
use App\Http\Controllers\BeszerzesController;
use App\Http\Controllers\JellegController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\MarkaController;
use App\Http\Controllers\AlkatreszController;
use App\Http\Controllers\BeszallitoController;
use App\Http\Controllers\DolgozoController;

use function PHPUnit\Framework\throwException;

//Kilépés gomb
Route::get('/kilepes', function () {
    return view('kilepes');
 });

//Alap funkciók
//------------------------------
Route::get('/', function () {
    return view('belepes');
});
//Kijelentkezés miatt kell ez a route
Route::get('/belepes', function () {
    return view('belepes');
});
//Belépés
Route::post('/belepes', [SzervizController::class, 'belepes']);


//Dolgozó
//--------------------------

Route::get('/dolgozo', function () {
   return view('dfeladatok');
});

Route::get('api/dfeladatok', [FeladatController::class, 'dFeladatok']);
Route::get('api/dfeladatok/{id}', [FeladatController::class, 'dfeladat']);

//Alkatrészhez tartozó linkek
//---------------------------------

//Új alkatrész
Route::get('/mvezeto/alkatresz', [AlkatreszController::class, 'ujAlkatresz']);
Route::post('/api/alkatresz', [AlkatreszController::class, 'alkatresz']);

//Alkatrészek listázása
Route::get('/mvezeto/alkatreszek', [AlkatreszController::class, 'alkatreszek']);


//Alkatrész törlése
Route::delete('/api/alkatresz/{id}', [AlkatreszController::class, 'alkatreszTorles']);

//Alkatrész szerkesztése
Route::get('/mvezeto/alkatreszmodosit/{id}', [AlkatreszController::class, 'alkatreszSzerkesztes']);
Route::put('/api/alkatresz/{id}', [AlkatreszController::class, 'alkatreszModosit']);


//Autóhoz tartozó linkek
//-----------------------------------

//Új Autó
Route::get('/mvezeto/auto', [AutoController::class, 'ujAuto']);
Route::post('/api/auto', [AutoController::class, 'auto']);

//Autók listázása
Route::get('/mvezeto/autok', [AutoController::class, 'autok']);

//Autók törlése
Route::delete('/api/auto/{id}', [AutoController::class, 'autoTorles']);

//Autó szerkesztése
Route::get('/mvezeto/automodosit/{id}', [AutoController::class, 'autoSzerkesztes']);
Route::put('/api/auto/{id}', [AutoController::class, 'autoModosit']);


//Beszállítóhoz tartozó linkek
//---------------------------------

//Új Beszállító
Route::get('/mvezeto/beszallito', [BeszallitoController::class, 'ujBeszallito']);
Route::post('/api/beszallito', [BeszallitoController::class, 'beszallito']);

//Beszállítók listázása
Route::get('/mvezeto/beszallitok', [BeszallitoController::class, 'beszallitok']);


//Beszállítók törlése
Route::delete('/api/beszallito/{id}', [BeszallitoController::class, 'beszalliTotorles']);

//Beszállítók szerkesztése
Route::get('/mvezeto/beszallitomodosit/{id}', [BeszallitoController::class, 'beszallitoSzerkesztes']);
Route::put('/api/beszallito/{id}', [BeszallitoController::class, 'beszallitoModosit']);


//Beszerzéshez tartozó linkek
//--------------------------------

//Új Beszerzés
Route::get('/mvezeto/beszerzes', [BeszerzesController::class, 'ujBeszerzes']);
Route::post('/api/beszerzes', [BeszerzesController::class, 'beszerzes']);

//Beszerzés listázása
Route::get('/mvezeto/beszerzesek', [BeszerzesController::class, 'beszerzesek']);

//Beszerzés törlése
Route::delete('/api/beszerzes/{id}', [BeszerzesController::class, 'beszerzesTorles']);

//Beszerzés szerkesztése
Route::get('/mvezeto/beszerzesmodosit/{id}', [BeszerzesController::class, 'beszerzesSzerkesztes']);
Route::put('/api/beszerzes/{id}', [BeszerzesController::class, 'beszerzesModosit']);


//Dolgozóhoz tartozó linkek
//---------------------------------

//Új dolgozó
Route::get('/mvezeto/dolgozo', [DolgozoController::class, 'ujDolgozo']);
Route::post('/api/dolgozo', [DolgozoController::class, 'dolgozo']);

//Dolgozók listázása
Route::get('/mvezeto/dolgozok', [DolgozoController::class, 'dolgozok']);


//Dolgozók törlése
Route::delete('/api/dolgozo/{id}', [DolgozoController::class, 'dolgozoTorles']);

//Dolgozók szerkesztése
Route::get('/mvezeto/dolgozomodosit/{id}', [DolgozoController::class, 'dolgozoSzerkesztes']);
Route::put('/api/dolgozo/{id}', [DolgozoController::class, 'dolgozoModosit']);


//Feladathoz tartozó linkek
//---------------------------------

//Új feladat
Route::get('/mvezeto/feladat', [FeladatController::class, 'ujFeladat']);
Route::post('/api/feladat', [FeladatController::class, 'feladat']);

//Feladatok listázása
Route::get('/mvezeto/feladatok', [FeladatController::class, 'feladatok']);


//Feladat törlése
Route::delete('/api/feladat/{id}', [FeladatController::class, 'feladatTorles']);

//Feladat szerkesztése
Route::get('/mvezeto/feladatmodosit/{id}', [FeladatController::class, 'feladatSzerkesztes']);
Route::put('/api/feladat/{id}', [FeladatController::class, 'feladatModosit']);


//Jelleghez tartozó linkek
//--------------------------------

//Új Jelleg
Route::get('/mvezeto/jelleg', [JellegController::class, 'ujJelleg']);
Route::post('/api/jelleg', [JellegController::class, 'jelleg']);

//Jellegek listázása
Route::get('/mvezeto/jellegek', [JellegController::class, 'jellegek']);

//Jelleg törlése
Route::delete('/api/jelleg/{id}', [JellegController::class, 'jellegTorles']);

//Jelleg szerkesztése
Route::get('/mvezeto/jellegmodosit/{id}', [JellegController::class, 'jellegSzerkesztes']);
Route::put('/api/jelleg/{id}', [JellegController::class, 'jellegModosit']);


//Márkához tartozó linkek
//--------------------------------

//Új Márka
Route::get('/mvezeto/marka', [MarkaController::class, 'ujMarka']);
Route::post('/api/marka', [MarkaController::class, 'marka']);

//Márkák listázása
Route::get('/mvezeto/markak', [MarkaController::class, 'markak']);

//Márka törlése
Route::delete('/api/marka/{id}', [MarkaController::class, 'markaTorles']);

//Márka szerkesztése
Route::get('/mvezeto/markamodosit/{id}', [MarkaController::class, 'markaSzerkesztes']);
Route::put('/api/marka/{id}', [MarkaController::class, 'markaModosit']);


//Munkához tartozó linkek
//-----------------------------------

//Új munkalap
Route::get('/mvezeto/munkalap', [MunkalapController::class, 'ujMunkalap']);
Route::post('/api/munkalap', [MunkalapController::class, 'munkalap']);

//Munkalapok listázása
Route::get('/mvezeto/munkak', [MunkalapController::class, 'munkak']);

//Munkalapok törlése
Route::delete('/api/munkalap/{id}', [MunkalapController::class, 'munkalapTorles']);

//Munkalap szerkesztése
Route::get('/mvezeto/munkamodosit/{id}', [MunkalapController::class, 'munkalapSzerkesztes']);
Route::put('/api/munkalap/{id}', [MunkalapController::class, 'munkalapModosit']);

//Munkalap befejezése
//Route::get('mvezeto/munkabefejezes/{id}', [MunkalapController::class, 'munkabefejezes']);

//Oldalmenü @include Route az összes blade-re. 
Route::get('/mvezeto', function() {return View::make('layouts.oldalmenu');});

/*//Új Jelleg
Route::get('/mvezeto/jelleg', [JellegController::class, 'ujjelleg']);
Route::post('/api/jelleg', [JellegController::class, 'jelleg']);*/ 
////Hibaüzenetek
/*Route::get('/test', function(){
try{
    $e = new Exception('Az óradíj nem lehet 5000-nél kisebb és 20000-nél nagyobb!');
    throw new Exception('insert into `jellegs` (`jelleg`, `elnevezes`, `oradij`, `updated_at`, `created_at`) values (?, aaa, 1, 2022-04-03 17:58:53, 2022-04-03 17:58:53)');
}
catch(Exception $e){
    $validator = Validator::make([],[]);
    $validator->errors()->add('oradij',$e->getMessage());
    return redirect('/test2')->withErrors($validator);
}
});
Route::get('/test2', function(){
    echo session('errrors');
});//*/