<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/classlist', [ClassController::class, 'classlist']);