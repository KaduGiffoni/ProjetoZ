<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Saida_produto;
use App\Usuario;
use App\produto;
use App\Ent_produto;

class Saida_produtoController extends Controller
{
    public function create(){
        $usuarios = Usuario::all();
        $produtos = Produto::all();
        return view('saiProducts.create', ['usuarios' => $usuarios])->with(['produtos' => $produtos]);
    }

    public function SaidaProdutoList(){
        $Saida_produtos = Saida_produto::All();
        $Ent_produtos = Ent_produto::all();
        return view('saiProducts.saiProductsList', ['Saida_produtos' => $Saida_produtos, 'Ent_produtos' => $Ent_produtos]);       
    }

    
    public function store(Request $request){
        $data = $request->all();
        $Saida_produto = new Saida_produto;                              
        $Saida_produto->produto_id = $request->name;
        $Saida_produto->data_entrada = $request->dataEntrada;
        $Saida_produto->preco_venda = $request->preco_venda;
        $Saida_produto->quantidade = $request->quantidade;
        $Saida_produto->funcionario = $request->funcionario;
        $Saida_produto->valor_total = $Saida_produto->quantidade*$Saida_produto->preco_venda;
        $produto = Produto::where('id', $request->name)->first();
        $produto->quantidade -= $request->get('quantidade');
        $Saida_produto->name = $produto->name;
        $produto->save();      

        $Saida_produto->save();
        
        return redirect('/products/productsList')->with('msg', 'produto cadastrado com sucesso');
    }

    public function destroy($id){
        
        Saida_produto::findOrFail($id)->delete()->cascade();
        return redirect('/SaiProducts/saiproductsList')->with('msg', 'Produto escluido com sucesso');

    } 

    public function edit($id){

        $Saida_produto = Saida_produto::FindOrFail($id);
        return view('saiProducts.edit',['Saida_produto' => $Saida_produto]);
    }

    public function update(Request $request){

        Saida_produto::findOrFail($request->id)->update($request->all());
        return redirect('/saiProducts/saiproductsList')->with('msg', 'Produto editado com sucesso');

    }

    public function filtro(Request $request){
        $Saida_produtos = Saida_produto::whereBetween('data_entrada', [$request->fdate, $request->sdate])->get();
        $valor_total_total = $Saida_produtos->sum('valor_total');      
        return view('saiProducts.listafiltrada', ['Saida_produtos' => $Saida_produtos, 'valor_total_total' => $valor_total_total]);
    }
}
