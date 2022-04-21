<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('soal1');
});


Route::get('/soal1', [MainController::class, 'soal1']);
Route::get('/soal2', [MainController::class, 'soal2']);
Route::get('/soal3', [MainController::class, 'soal3']);
Route::get('/soal4', [MainController::class, 'soal4']);
Route::get('/soal5', [MainController::class, 'soal5']);
