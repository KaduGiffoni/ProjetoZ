<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class StoreController extends Controller
{
    public function index(){

        $produtos = Produto::All();
        return view('Welcome', ['produtos' => $produtos]);
    }

    public function create(){
        return view('products.create');
    }

    public function productsList(){
        $produtos = Produto::All();
        return view('products.productsList', ['produtos' => $produtos]);       
    }

    
    public function store(Request $request){
        $produto = new Produto;
        
        $produto->name = $request->name;
        $produto->data_entrada = $request->dataEntrada;
        $produto->preco_custo = $request->preco_custo;
        $produto->preco_venda = $request->preco_venda;
        $produto->quantidade = $request->quantidade;

        $produto->save();

        return redirect('/products/productsList')->with('msg', 'Produto cadastrado com sucesso');
    }

    public function destroy($id){
        
        Produto::findOrFail($id)->delete();
        return redirect('/products/productsList')->with('msg', 'Produto escluido com sucesso');

    } 

    public function edit($id){

        $produto = Produto::FindOrFail($id);
        return view('products.edit',['produto' => $produto]);
    }

    public function update(Request $request){

        Produto::findOrFail($request->id)->update($request->all());
        return redirect('/products/productsList')->with('msg', 'Produto editado com sucesso');

    }
}
