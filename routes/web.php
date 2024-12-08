<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/classlist', [ClassController::class, 'classlist']);// for displaying the list of classes


Route::post('/add-class', [ClassController::class, 'store'])->name('add-class');// for adding new class

Route::delete('/classes/{id}', [ClassController::class, 'destroy'])->name('classes.destroy'); // for deleting class


//ids route the templet project
Route::get('/ids/dashboard',[AdminController::class,'dashboard']);
