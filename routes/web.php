<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SzervizController;
use App\Http\Controllers\FeladatController;
use App\Http\Controllers\MunkalapController;
use App\Http\Controllers\BeszerzesController;

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
//Route::get('/dolgozo/dfeladatok', [FeladatController::class, 'dfeladatok']);
Route::get('/ezaz','App\Http\Controllers\FeladatController@dfeladatok');
Route::get('/dolgozo/dfeladatok', function () {
    return view('/dolgozo/dfeladatok');
});

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

