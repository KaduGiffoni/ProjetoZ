@extends('layouts.main')

@section('title', "Lista")

@section('content')

<a href="/saida/create" class="btn btn-create create-btn">Cadastrar saida de produto</a>
<form method="POST" action="/saida/filtro">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label>Primeira data:</label>
                    <input type="date" class="form-control" name="fdate">
                </div>
                <div class="mb-3">
                    <label>Segunda data:</label>
                    <input type="date" class="form-control" name="sdate">
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Saidas</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($Saida_produtos) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">data entrada</th>
                    <th scope="col">Preço de venda</th>
                    <th scope="col">Ações</th>

                </tr>
            </thead>
            <tbody>
                @foreach($Saida_produtos as $Saida_produto)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/entrada/{{ $Saida_produto->id }}">{{ $Saida_produto->name }}</a></td>
                        <td>{{ $Saida_produto->data_entrada }}</td>
                        <td>{{ $Saida_produto->preco_venda }}</td>
                        <td>
                            <a href="/produto/edit/{{ $Saida_produto->id }}" class="btn btn-info edit-btn"><ionicon name="create-outline"></ionicon>Editar</a>
                            <form action="/produto/{{ $Saida_produto->id }}" method="POST">
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
    <p>ainda não existem produtos, <a href="/saida/create" class="btn btn-create create-btn">Cadastrar saida</a></p>
    @endif



@endsection