<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SzervizController;

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

//Műhelyvezető
//--------------------------------
Route::get('/munkalap', function () {
    return view('mvezeto/munkalap');
});
Route::get('/rendeles', function () {
    return view('mvezeto/rendeles');
});
Route::get('/feladatok', function () {
    return view('mvezeto/feladatok');
});
Route::get('/munkak', function () {
    return view('mvezeto/munkak');
});

//Dolgozó
//---------------------------------
Route::get('/dfeladatok', function () {
    return view('dolgozo/dfeladatok');
});

//Feladathoz tartozó linkek
//---------------------------------

//Új feladat
Route::get('/mvezeto/feladat', [SzervizController::class, 'feladat']);

//Feladatok listázása
Route::get('/mvezeto/feladatok', [SzervizController::class, 'feladatok']);
Route::get('/dolgozo/dfeladatok', [SzervizController::class, 'feladatok']);

//Feladat törlése
Route::delete('/api/feladat/{id}', [SzervizController::class, 'ftorles']);

//Feladat szerkesztése
Route::get('/mvezeto/feladatmodosit/{id}', [SzervizController::class, 'fszerkesztes']);
Route::put('/api/feladat/{id}', [SzervizController::class, 'fmodosit']);

//Feladat mutatása ID szerint
//Route::get('/api/feladat/{id}', [SzervizController::class, 'fmutat']);

//Munkához tartozó linkek
//-----------------------------------

//Új munkalap
Route::get('/mvezeto/munkalap', [SzervizController::class, 'munkalap']);

//Munkalapok listázása
Route::get('/mvezeto/munkak', [SzervizController::class, 'munkak']);

//Munkalapok törlése
Route::delete('/api/munkalap/{id}', [SzervizController::class, 'mtorles']);

//Munkalap szerkesztése
Route::get('/mvezeto/munkamodosit/{id}', [SzervizController::class, 'mszerkesztes']);
Route::put('/api/munkalap/{id}', [SzervizController::class, 'mmodosit']);

//Munkalap mutatása ID szerint
//Route::get('/api/munkalap/{id}', [SzervizController::class, 'mmutat']);

//Rendeléshez tartozó linkek
//--------------------------------

//Új rendelés
Route::get('/mvezeto/rendeles', [SzervizController::class, 'rendeles']);

//Rendelés listázása
Route::get('/mvezeto/rendelesek', [SzervizController::class, 'rendelesek']);

//Rendelés törlése
Route::delete('/api/rendeles/{id}', [SzervizController::class, 'rtorles']);

//Munkalap szerkesztése
Route::get('/mvezeto/rendelesmodosit/{id}', [SzervizController::class, 'rszerkesztes']);
Route::put('/api/rendeles/{id}', [SzervizController::class, 'rmodosit']);

//Rendelés mutatása ID szerint
//Route::get('/api/rendeles/{id}', [SzervizController::class, 'rmutat']);

