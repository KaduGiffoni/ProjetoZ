@extends('layouts.main')

@section('title', "Teste")

@section('content')

<a href="/entrada/create" class="btn btn-create create-btn">Cadastrar entrada produto</a>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Entradas</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($Ent_produtos) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">data entrada</th>
                    <th scope="col">quantidade</th>
                    <th scope="col">Preço de custo</th>

                </tr>
            </thead>
            <tbody>
                @foreach($Ent_produtos as $Ent_produto)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/entrada/{{ $Ent_produto->id }}">{{ $Ent_produto->name }}</a></td>
                        <td>{{ $Ent_produto->data_entrada }}</td>
                        <td>{{ $Ent_produto->quantidade }}</td>
                        <td>R${{ $Ent_produto->valor_total}}</td>                                               
                    </tr>
                @endforeach
                <thead>
                    <tr>
                        <th scope="col">total</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"> R${{ $valor_total_total}}</th>                          
                    </tr>
                </thead>
                    
            </tbody>
        </table>
    @else
    <p>ainda não existem produtos, <a href="/entrada/create" class="btn btn-create create-btn">Cadastrar entrada</a></p>
    @endif



@endsection