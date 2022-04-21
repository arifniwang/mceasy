<?php

use App\Http\Controllers\API\Soal1CutiController;
use App\Http\Controllers\API\Soal1KaryawanController;
use App\Http\Controllers\API\Soal2Controller;
use App\Http\Controllers\API\Soal3Controller;
use App\Http\Controllers\API\Soal4Controller;
use App\Http\Controllers\API\Soal5Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    "prefix" => "/soal1",
    "middleware" => [],
    "namespace" => "soal1",
], function () {
    // CRUD + DETAIL KARYAWAN{DATA CUTI}
    Route::group([
        "prefix" => "/karyawan",
        "middleware" => [],
        "namespace" => "soal1-karyawan",
    ], function () {
        Route::get("/", [Soal1KaryawanController::class, "index"]);
        Route::post("/create", [Soal1KaryawanController::class, "create"]);
        Route::patch("/update", [Soal1KaryawanController::class, "update"]);
        Route::delete("/delete/{nomor_induk}", [Soal1KaryawanController::class, "delete"]);
        Route::get("/detail/{nomor_induk}", [Soal1KaryawanController::class, "detail"]);
        Route::get("/list-nomor-induk", [Soal1KaryawanController::class, "listNomorInduk"]);
    });

    // CRUD CUTI
    Route::group([
        "prefix" => "/cuti",
        "middleware" => [],
        "namespace" => "soal1-cuti",
    ], function () {
        // CRUD + DETAIL KARYAWAN{DATA CUTI}
        Route::get("/", [Soal1CutiController::class, "index"]);
        Route::post("/create", [Soal1CutiController::class, "create"]);
        Route::patch("/update", [Soal1CutiController::class, "update"]);
        Route::delete("/delete/{nomor_induk}/{tanggal_cuti}", [Soal1CutiController::class, "delete"]);
    });
});
Route::get("/soal2", [Soal2Controller::class, "index"]);
Route::get("/soal3", [Soal3Controller::class, "index"]);
Route::get("/soal4", [Soal4Controller::class, "index"]);
Route::get("/soal5", [Soal5Controller::class, "index"]);

Route::any('{any}', function () {
    return response()->json([
        'status' => false,
        'messasge' => 'Error 404'
    ], 404);
})->where('any', '.*');
