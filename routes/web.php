<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/classlist', [ClassController::class, 'classlist']);// for displaying the list of classes


Route::post('/add-class', [ClassController::class, 'store'])->name('add-class');// for adding new class

Route::delete('/classes/{id}', [ClassController::class, 'destroy'])->name('classes.destroy'); // for deleting class
