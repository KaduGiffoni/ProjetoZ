@extends('layouts.main')

@section('title', "Lista de usuarios")

@section('content')

<a href="/usuario/create" class="btn btn-create create-btn">Cadastrar usuario</a>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Usuarios</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($usuarios) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>                    
                    <th scope="col">Ações</th>

                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/usuario/{{ $usuario->id }}">{{ $usuario->name }}</a></td>
                        
                        <td>
                            <a href="/usuario/edit/{{ $usuario->id }}" class="btn btn-info edit-btn"><ionicon name="create-outline"></ionicon>Editar</a>
                            <form action="/usuario/{{ $usuario->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ionicon name="trash-outline"></ionicon>Deletar</button>
                            </form>
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <p>ainda não existem produtos, <a href="/usuario/create" class="btn btn-create create-btn">Cadastrar novo usuario</a></p>
    @endif



@endsection