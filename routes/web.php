<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrosswordController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/crossword', [CrosswordController::class, 'index']);
