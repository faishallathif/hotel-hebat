<?php

use App\Http\Controllers\KamarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DetailKamarController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(["middleware" => ["jwt.verify"]], function () {
    Route::resource('pesanan', PesananController::class);
    Route::get("pesanan/cetak/{id}",[PesananController::class,"cetak_pdf"]);
    Route::resource("pesanan",PesananController::class);
});
Route::resource('kamar', KamarController::class);
Route::resource('detail-kamar', DetailKamarController::class);
Route::resource('fasilitas', FasilitasController::class);
Route::resource('user', UserController::class);
Route::post('login', [UserController::class, "login"]);
Route::get('cek_login', [UserController::class, "getAuthenticatedUser"]);
