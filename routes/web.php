<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StudentController;

Route::resource('students', StudentController::class);


Route::get('/', [ItemController::class, 'index']);




Route::resource('items', ItemController::class);
