<?php

use App\Http\Controllers\SearchResultsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//API
Route::post('/find', [SearchResultsController::class, 'search']); //поиск через форму
Route::get('/find', [SearchResultsController::class, 'display_results']); //вывод результатов поиска в формате json
Route::get('/find/page/{page}', [SearchResultsController::class, 'display_results']); //поиск результатов постранично 
Route::delete('/find/{id}', [SearchResultsController::class, 'destroy']); //удаление записи из базы