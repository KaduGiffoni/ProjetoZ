<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ent_produto;
use App\Ent_produto_composto;
use App\Usuario;
use App\produto;


/**não consegui completar os produtos compostos
 * preciso estudar mais um pouco.
*/

class Ent_produto_compostoController extends Controller
{
    public function create(){
        $usuarios = Usuario::all();
        $produtos = Produto::all();
        return view('entProducts.create', ['usuarios' => $usuarios])->with(['produtos' => $produtos]);
    }

    public function entComProdutoList(){
        $Ent_produtos_compostos = Ent_produto_composto::All();
        return view('entComProducts.entComProductsList', ['Ent_produtos_compostos' => $Ent_produtos_compostos]);       
    }

    
    public function store(Request $request){
        $data = $request->all();
        $Ent_produto_composto = new Ent_produto_composto;                              
        $Ent_produto_composto->name = $request->name;
        $Ent_produto_composto->data_entrada = $request->dataEntrada;
        $Ent_produto_composto->produtosNomes = $request->nameid;
        $Ent_produto_composto->produtosQnts = $request->quantidade;
        $Ent_produto_composto->funcionario = $request->funcionario;
        $produto = Produto::where('id', $request->nameid)->first();
        $Ent_produto_composto->name = $produto->name;     

        $Ent_produto_composto->save();
        
        return redirect('/products/productsList')->with('msg', 'produto cadastrado com sucesso');
    }

    public function destroy($id){
        
        Ent_produto_composto::findOrFail($id)->delete()->cascade();
        return redirect('/entProducts/entProductsList')->with('msg', 'Produto escluido com sucesso');

    } 

    public function edit($id){

        $Ent_produto_composto = Ent_produto_composto::FindOrFail($id);
        return view('entProducts.edit',['Ent_produto_composto' => $Ent_produto_composto]);
    }

    public function update(Request $request){

        Ent_produto_composto::findOrFail($request->id)->update($request->all());
        return redirect('/entProducts/productsList')->with('msg', 'Produto editado com sucesso');

    }
}
