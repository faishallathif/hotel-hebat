<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::any('/{path}', function () {
//     return view('index', [
//         "title" => "hello UKOM"
//     ]);
// });
Route::domain('admin.localhost')->group(function () {
   
    Route::middleware('guest')->group(function () {
        Route::get('/login', function () {
            return view('admin/login');    
        })->name('login');
    });
    Route::post('/login',[LoginController::class,"index"]);
    Route::middleware('auth')->group(function () {
        Route::get('/', function () {
            return view('admin/index');
        });
    });
});

Route::domain('localhost')->group(function () {
    Route::get('/', function () {
        return view('index', [
            "title" => "hello UKOM"
        ]);
    });
    Route::get('/{path}', function () {
        return view('index', [
            "title" => "hello UKOM"
        ]);
    });
    // Route::get('/pesanan/cetak/{id}',[PesananController::class,"cetak_pdf"]);
    // Route::get('/pesanan/cetak_pdf/{pesanan}',[PesananController::class,"show"]);
});
