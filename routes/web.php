<?php

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

Route::get('api/dfeladatok', [FeladatController::class, 'dfeladatok']);


//Alkatrészhez tartozó linkek
//---------------------------------

//Új alkatrész
Route::get('/mvezeto/alkatresz', [AlkatreszController::class, 'ujalkatresz']);
Route::post('/api/alkatresz', [AlkatreszController::class, 'alkatresz']);

//Alkatrészek listázása
Route::get('/mvezeto/alkatreszek', [AlkatreszController::class, 'alkatreszek']);


//Alkatrész törlése
Route::delete('/api/alkatresz/{id}', [AlkatreszController::class, 'alkatresztorles']);

//Alkatrész szerkesztése
Route::get('/mvezeto/alkatreszmodosit/{id}', [AlkatreszController::class, 'alkatreszszerkesztes']);
Route::put('/api/alkatresz/{id}', [AlkatreszController::class, 'alkatreszmodosit']);


//Autóhoz tartozó linkek
//-----------------------------------

//Új Autó
Route::get('/mvezeto/auto', [AutoController::class, 'ujauto']);
Route::post('/api/auto', [AutoController::class, 'auto']);

//Autók listázása
Route::get('/mvezeto/autok', [AutoController::class, 'autok']);

//Autók törlése
Route::delete('/api/auto/{id}', [AutoController::class, 'autotorles']);

//Autó szerkesztése
Route::get('/mvezeto/automodosit/{id}', [AutoController::class, 'autoszerkesztes']);
Route::put('/api/auto/{id}', [AutoController::class, 'automodosit']);


//Beszállítóhoz tartozó linkek
//---------------------------------

//Új Beszállító
Route::get('/mvezeto/beszallito', [BeszallitoController::class, 'ujbeszallito']);
Route::post('/api/beszallito', [BeszallitoController::class, 'beszallito']);

//Beszállítók listázása
Route::get('/mvezeto/beszallitok', [BeszallitoController::class, 'beszallitok']);


//Beszállítók törlése
Route::delete('/api/beszallito/{id}', [BeszallitoController::class, 'beszallitotorles']);

//Beszállítók szerkesztése
Route::get('/mvezeto/beszallitomodosit/{id}', [BeszallitoController::class, 'beszallitoszerkesztes']);
Route::put('/api/beszallito/{id}', [BeszallitoController::class, 'beszallitomodosit']);


//Beszerzéshez tartozó linkek
//--------------------------------

//Új Beszerzés
Route::get('/mvezeto/beszerzes', [BeszerzesController::class, 'ujbeszerzes']);
Route::post('/api/beszerzes', [BeszerzesController::class, 'beszerzes']);

//Beszerzés listázása
Route::get('/mvezeto/beszerzesek', [BeszerzesController::class, 'beszerzesek']);

//Beszerzés törlése
Route::delete('/api/beszerzes/{id}', [BeszerzesController::class, 'beszerzestorles']);

//Beszerzés szerkesztése
Route::get('/mvezeto/beszerzesmodosit/{id}', [BeszerzesController::class, 'beszerzesszerkesztes']);
Route::put('/api/beszerzes/{id}', [BeszerzesController::class, 'beszerzesmodosit']);


//Dolgozóhoz tartozó linkek
//---------------------------------

//Új dolgozó
Route::get('/mvezeto/dolgozo', [DolgozoController::class, 'ujdolgozo']);
Route::post('/api/dolgozo', [DolgozoController::class, 'dolgozo']);

//Dolgozók listázása
Route::get('/mvezeto/dolgozok', [DolgozoController::class, 'dolgozok']);


//Dolgozók törlése
Route::delete('/api/dolgozo/{id}', [DolgozoController::class, 'dolgozotorles']);

//Dolgozók szerkesztése
Route::get('/mvezeto/dolgozomodosit/{id}', [DolgozoController::class, 'dolgozoszerkesztes']);
Route::put('/api/dolgozo/{id}', [DolgozoController::class, 'dolgozomodosit']);


//Feladathoz tartozó linkek
//---------------------------------

//Új feladat
Route::get('/mvezeto/feladat', [FeladatController::class, 'ujfeladat']);
Route::post('/api/feladat', [FeladatController::class, 'feladat']);

//Feladatok listázása
Route::get('/mvezeto/feladatok', [FeladatController::class, 'feladatok']);


//Feladat törlése
Route::delete('/api/feladat/{id}', [FeladatController::class, 'feladattorles']);

//Feladat szerkesztése
Route::get('/mvezeto/feladatmodosit/{id}', [FeladatController::class, 'feladatszerkesztes']);
Route::put('/api/feladat/{id}', [FeladatController::class, 'feladatmodosit']);


//Jelleghez tartozó linkek
//--------------------------------

//Új Jelleg
Route::get('/mvezeto/jelleg', [JellegController::class, 'ujjelleg']);
Route::post('/api/jelleg', [JellegController::class, 'jelleg']);

//Jellegek listázása
Route::get('/mvezeto/jellegek', [JellegController::class, 'jellegek']);

//Jelleg törlése
Route::delete('/api/jelleg/{id}', [JellegController::class, 'jellegtorles']);

//Jelleg szerkesztése
Route::get('/mvezeto/jellegmodosit/{id}', [JellegController::class, 'jellegszerkesztes']);
Route::put('/api/jelleg/{id}', [JellegController::class, 'jellegmodosit']);


//Márkához tartozó linkek
//--------------------------------

//Új Márka
Route::get('/mvezeto/marka', [MarkaController::class, 'ujmarka']);
Route::post('/api/marka', [MarkaController::class, 'marka']);

//Márkák listázása
Route::get('/mvezeto/markak', [MarkaController::class, 'markak']);

//Márka törlése
Route::delete('/api/marka/{id}', [MarkaController::class, 'markatorles']);

//Márka szerkesztése
Route::get('/mvezeto/markamodosit/{id}', [MarkaController::class, 'markaszerkesztes']);
Route::put('/api/marka/{id}', [MarkaController::class, 'markamodosit']);


//Munkához tartozó linkek
//-----------------------------------

//Új munkalap
Route::get('/mvezeto/munkalap', [MunkalapController::class, 'ujmunkalap']);
Route::post('/api/munkalap', [MunkalapController::class, 'munkalap']);

//Munkalapok listázása
Route::get('/mvezeto/munkak', [MunkalapController::class, 'munkak']);

//Munkalapok törlése
Route::delete('/api/munkalap/{id}', [MunkalapController::class, 'munkalaptorles']);

//Munkalap szerkesztése
Route::get('/mvezeto/munkamodosit/{id}', [MunkalapController::class, 'munkalapszerkesztes']);
Route::put('/api/munkalap/{id}', [MunkalapController::class, 'munkalapmodosit']);

//Munkalap befejezése
//Route::get('mvezeto/munkabefejezes/{id}', [MunkalapController::class, 'munkabefejezes']);

