<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    public function create(){
        return view('users.create');
    }

    public function usuarioList(){
        $usuarios = Usuario::All();
        return view('Users.usersList', ['usuarios' => $usuarios]);       
    }

    
    public function store(Request $request){
        $usuario = new Usuario;
        
        $usuario->name = $request->name;
        

        $usuario->save();

        return redirect('/usuario/usuarioList')->with('msg', 'usuario cadastrado com sucesso');
    }

    public function destroy($id){
        
        Usuario::findOrFail($id)->delete();
        return redirect('/usuario/usuarioList')->with('msg', 'usuario escluido com sucesso');

    } 

    public function edit($id){

        $usuario = Usuario::FindOrFail($id);
        return view('users.edit',['usuario' => $usuario]);
    }

    public function update(Request $request){

        Usuario::findOrFail($request->id)->update($request->all());
        return redirect('/usuario/usuarioList')->with('msg', 'usuario editado com sucesso');

    }
}
