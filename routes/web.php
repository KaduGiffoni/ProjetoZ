<?php

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
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UsuarioController;

Route::get('/', [StoreController::class, 'index']);
Route::get('/products/create', [StoreController::class, 'create']);
Route::get('/products/productsList', [StoreController::class, 'productsList']);
Route::post('/products', [StoreController::class, 'store']);
Route::delete('/produto/{id}', [StoreController::class, 'destroy']);
Route::get('/produto/edit/{id}', [StoreController::class, 'edit']);
Route::put('/produto/update/{id}', [StoreController::class, 'update']);

Route::get('/produto/{id}', function ($id) {
    return view('products.product', ['id' => $id]);
});

Route::get('/usuario/create', [UsuarioController::class, 'create']);
Route::get('/usuario/usuarioList', [UsuarioController::class, 'usuarioList']);
Route::post('/usuario', [UsuarioController::class, 'store']);
Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy']);
Route::get('/usuario/edit/{id}', [UsuarioController::class, 'edit']);
Route::put('/usuario/update/{id}', [UsuarioController::class, 'update']);
