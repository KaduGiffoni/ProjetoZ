@extends('layouts.main')

@section('title', "Saida Filtro")

@section('content')

<a href="/entrada/create" class="btn btn-create create-btn">Cadastrar Saida produto</a>

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
                    <th scope="col">data Saida</th>
                    <th scope="col">quantidade</th>
                    <th scope="col">Preço de custo</th>

                </tr>
            </thead>
            <tbody>
                @foreach($Saida_produtos as $Saida_produto)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/entrada/{{ $Saida_produto->id }}">{{ $Saida_produto->name }}</a></td>
                        <td>{{ $Saida_produto->data_saida }}</td>
                        <td>{{ $Saida_produto->quantidade }}</td>
                        <td>R${{ $Saida_produto->valor_total}}</td>                                               
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
    <p>ainda não existem produtos, <a href="/saida/create" class="btn btn-create create-btn">Cadastrar entrada</a></p>
    @endif



@endsection