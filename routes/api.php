<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\User\BrandController as UserBrandController;
use App\Http\Controllers\User\KategoriController as UserKategoriController;
use App\Http\Controllers\User\FotoProdukController as UserFotoProdukController;



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

Route::get('/product',[UserProductController::class,'index']);
Route::get('/brand',[UserBrandController::class,'index']);
Route::get('/kategori',[UserKategoriController::class,'index']);
Route::get('/fotoproduct',[UserFotoProdukController::class,'index']);
Route::post('/brand',[UserBrandController::class,'store']);
Route::post('/product',[UserProductController::class,'store']);
Route::post('/kategori',[UserKategoriController::class,'store']);
Route::post('/fotoproduct',[UserFotoProdukController::class,'store']);
