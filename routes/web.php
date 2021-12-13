<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IssController::class, 'index']);
Route::get('/locator', [IssController::class, 'locator']);
Route::post('/search', [IssController::class, 'search'])->name('search');
Route::get('/result', [IssController::class, 'result'])->name('result');
Route::post('/map', [IssController::class, 'map'])->name('map');
Route::get('/more', [IssController::class, 'more'])->name('more');
Route::get('/apod', [IssController::class, 'apod'])->name('apod');
Route::get('/mars', [IssController::class, 'mars'])->name('mars');
