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
use App\Http\Controllers\Ent_produtoController;
use App\Http\Controllers\Saida_produtoController;

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


Route::get('/entrada/create', [Ent_produtoController::class, 'create']);
Route::get('/entrada/EntProdutoList', [Ent_produtoController::class, 'EntProdutoList']);
Route::post('/entrada', [Ent_produtoController::class, 'store']);
Route::delete('/entrada/{id}', [Ent_produtoController::class, 'destroy']);
Route::get('/entrada/edit/{id}', [Ent_produtoController::class, 'edit']);
Route::put('/entrada/update/{id}', [Ent_produtoController::class, 'update']);
Route::post('/entrada/filtro', [Ent_produtoController::class, 'filtro']);

Route::get('/saida/create', [Saida_produtoController::class, 'create']);
Route::get('/saida/SaidaProdutoList', [Saida_produtoController::class, 'SaidaProdutoList']);
Route::post('/saida', [Saida_produtoController::class, 'store']);
Route::delete('/saida/{id}', [Saida_produtoController::class, 'destroy']);
Route::get('/saida/edit/{id}', [Saida_produtoController::class, 'edit']);
Route::put('/saida/update/{id}', [Saida_produtoController::class, 'update']);
Route::post('/saida/filtro', [Saida_produtoController::class, 'filtro']);

Route::get('/entcomposto/create', [Ent_produto_composto::class, 'create']);
Route::get('/entcomposto/entPompostoProdutoList', [Ent_produto_composto::class, 'entComProdutoList']);
Route::post('/entcomposto', [Ent_produto_composto::class, 'store']);
Route::delete('/entcomposto/{id}', [Ent_produto_composto::class, 'destroy']);
Route::get('/entcomposto/edit/{id}', [Ent_produto_composto::class, 'edit']);
Route::put('/entcomposto/update/{id}', [Ent_produto_composto::class, 'update']);
