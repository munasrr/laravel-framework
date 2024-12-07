<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/classlist', [ClassController::class, 'classlist']);

Route::post('/add-class', [ClassController::class, 'store']);//

Route::post('/add-class', [ClassController::class, 'store'])->name('add-class');