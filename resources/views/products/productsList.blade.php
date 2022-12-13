@extends('layouts.main')

@section('title', "Teste")

@section('content')

<a href="/products/create" class="btn btn-create create-btn">Cadastrar produto</a>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($produtos) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">data entrada</th>
                    <th scope="col">Preço de custo</th>
                    <th scope="col">Preço de venda</th>
                    <th scope="col">Ações</th>

                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/produto/{{ $produto->id }}">{{ $produto->name }}</a></td>
                        <td>{{ $produto->data_entrada }}</td>
                        <td>{{ $produto->preco_custo }}</td>
                        <td>{{ $produto->preco_venda }}</td>
                        <td>
                            <a href="/produto/edit/{{ $produto->id }}" class="btn btn-info edit-btn"><ionicon name="create-outline"></ionicon>Editar</a>
                            <form action="/produto/{{ $produto->id }}" method="POST">
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
    <p>ainda não existem produtos, <a href="/products/create" class="btn btn-create create-btn">Cadastrar produto</a></p>
    @endif



@endsection