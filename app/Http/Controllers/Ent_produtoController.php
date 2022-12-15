<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ent_produto;
use App\Usuario;
use App\produto;
use DB;


class Ent_produtoController extends Controller
{
    public function create(){
        $usuarios = Usuario::all();
        $produtos = Produto::all();
        return view('entProducts.create', ['usuarios' => $usuarios])->with(['produtos' => $produtos]);
    }

    public function EntProdutoList(){
        $Ent_produtos = Ent_produto::All();
        return view('entProducts.entProductsList', ['Ent_produtos' => $Ent_produtos]);       
    }

    
    public function store(Request $request){
        $data = $request->all();
        $Ent_produto = new Ent_produto;                              
        $Ent_produto->produto_id = $request->name;
        $Ent_produto->data_entrada = $request->dataEntrada;
        $Ent_produto->preco_custo = $request->preco_custo;
        $Ent_produto->quantidade = $request->quantidade;
        $Ent_produto->funcionario = $request->funcionario;
        $Ent_produto->valor_total = $Ent_produto->quantidade*$Ent_produto->preco_custo;
        $produto = Produto::where('id', $request->name)->first();
        $produto->quantidade += $request->get('quantidade');
        $Ent_produto->name = $produto->name;
        $produto->save();      

        $Ent_produto->save();
        
        return redirect('/products/productsList')->with('msg', 'produto cadastrado com sucesso');
    }

    public function destroy($id){
        
        Ent_produto::findOrFail($id)->delete()->cascade();
        return redirect('/entProducts/entProductsList')->with('msg', 'Produto escluido com sucesso');

    } 

    public function edit($id){

        $Ent_produto = Ent_produto::FindOrFail($id);
        return view('entProducts.edit',['Ent_produto' => $Ent_produto]);
    }

    public function update(Request $request){

        Ent_produto::findOrFail($request->id)->update($request->all());
        return redirect('/entProducts/productsList')->with('msg', 'Produto editado com sucesso');

    }

    public function filtro(Request $request){
        $Ent_produtos = Ent_produto::whereBetween('data_entrada', [$request->fdate, $request->sdate])->get();
        $valor_total_total = $Ent_produtos->sum('valor_total');      
        return view('entProducts.listafiltrada', ['Ent_produtos' => $Ent_produtos, 'valor_total_total' => $valor_total_total]);
    }
}
