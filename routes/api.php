<?php

use App\Models\Produk;
use App\Http\Controllers;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
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

// Route::resource('produk', ProdukController::class);
// Public Routes 

Route::get('/produk/{id}', [ProdukController::class , 'show']) ; 
Route::get('/produk/search/{name}', [ProdukController::class , 'search']); 
Route::get('/produk', [ProdukController::class , 'index']) ;

// Auth 
Route::post('/register', [AuthController::class , 'register']) ; 

// Protected Routes
Route::group(['middleware'=>['auth:sanctum']], function (){

    Route::post('/produk',[ProdukController::class , 'store']); 
    Route::put('/produk/{id}',   [ProdukController::class, 'update']); 
    Route::delete('/produk/{id}',[ProdukController::class , 'destroy']); 
    // Auth
    Route::post('/logout',[AuthController::class,'logOut']); 
}
); 