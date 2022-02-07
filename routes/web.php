<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SzervizController;

//Linkekkel való megoldás

Route::get('/', function () {
    return view('belepes');
});
//Kijelentkezés miatt kell ez a route
Route::get('/belepes', function () {
    return view('belepes');
});

//Műhelyvezető

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

Route::get('/dfeladatok', function () {
    return view('dolgozo/dfeladatok');
});

//Belépés
Route::post('/belepes', [SzervizController::class, 'belepes']);


