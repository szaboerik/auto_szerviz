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

//Feladathoz tartozó linkek
//---------------------------------

//Új feladat
Route::get('/mvezeto/feladat', [FeladatController::class, 'ujf']);
Route::post('/api/feladat', [FeladatController::class, 'feladat']);

//Feladatok listázása
Route::get('/mvezeto/feladatok', [FeladatController::class, 'feladatok']);


//Feladat törlése
Route::delete('/api/feladat/{id}', [FeladatController::class, 'ftorles']);

//Feladat szerkesztése
Route::get('/mvezeto/feladatmodosit/{id}', [FeladatController::class, 'fszerkesztes']);
Route::put('/api/feladat/{id}', [FeladatController::class, 'fmodosit']);

//Feladat mutatása ID szerint
//Route::get('/api/feladat/{id}', [FeladatController::class, 'fmutat']);

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

//Alkatrész mutatása ID szerint
//Route::get('/api/alkatresz/{id}', [AlkatreszController::class, 'alkatreszmutat']);

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

//Beszállító mutatása ID szerint
//Route::get('/api/beszallito/{id}', [BeszallitoController::class, 'beszallitomutat']);

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

//Dolgozó mutatása ID szerint
//Route::get('/api/dolgozo/{id}', [DolgozoController::class, 'dolgozomutat']);

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

//Autó mutatása ID szerint
//Route::get('/api/auto/{id}', [AutoController::class, 'automutat']);

//Munkához tartozó linkek
//-----------------------------------

//Új munkalap
Route::get('/mvezeto/munkalap', [MunkalapController::class, 'ujm']);
Route::post('/api/munkalap', [MunkalapController::class, 'munkalap']);

//Munkalapok listázása
Route::get('/mvezeto/munkak', [MunkalapController::class, 'munkak']);

//Munkalapok törlése
Route::delete('/api/munkalap/{id}', [MunkalapController::class, 'mtorles']);

//Munkalap szerkesztése
Route::get('/mvezeto/munkamodosit/{id}', [MunkalapController::class, 'mszerkesztes']);
Route::put('/api/munkalap/{id}', [MunkalapController::class, 'mmodosit']);

//Munkalap mutatása ID szerint
//Route::get('/api/munkalap/{id}', [MunkalapController::class, 'mmutat']);

//Rendeléshez tartozó linkek
//--------------------------------

//Új rendelés
Route::get('/mvezeto/rendeles', [BeszerzesController::class, 'ujr']);
Route::post('/api/rendeles', [BeszerzesController::class, 'rendeles']);

//Rendelés listázása
Route::get('/mvezeto/rendelesek', [BeszerzesController::class, 'rendelesek']);

//Rendelés törlése
Route::delete('/api/rendeles/{id}', [BeszerzesController::class, 'rtorles']);

//Munkalap szerkesztése
Route::get('/mvezeto/rendelesmodosit/{id}', [BeszerzesController::class, 'rszerkesztes']);
Route::put('/api/rendeles/{id}', [BeszerzesController::class, 'rmodosit']);

//Rendelés mutatása ID szerint
//Route::get('/api/rendeles/{id}', [BeszerzesController::class, 'rmutat']);

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

//Márka mutatása ID szerint
//Route::get('/api/marka/{id}', [MarkaController::class, 'markamutat']);

//Jelleghez tartozó linkek
//--------------------------------

//Új Jelleg
Route::get('/mvezeto/jelleg', [JellegController::class, 'ujj']);
Route::post('/api/jelleg', [JellegController::class, 'jelleg']);

//Jellegek listázása
Route::get('/mvezeto/jellegek', [JellegController::class, 'jellegek']);

//Jellegek törlése
Route::delete('/api/jelleg/{id}', [JellegController::class, 'jtorles']);

//Jelleg szerkesztése
Route::get('/mvezeto/jellegmodosit/{id}', [JellegController::class, 'jszerkesztes']);
Route::put('/api/jelleg/{id}', [JellegController::class, 'jmodosit']);
