<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SearchResultsController;

Route::get('/', [SearchResultsController::class, 'index'])->name('index');

Route::post('search-result', [SearchResultsController::class, 'search'])->name('search-result');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
