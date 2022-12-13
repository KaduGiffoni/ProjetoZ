@extends('layouts.main')

@section('title', "Teste")

@section('content')


<h1>Teste</h1>

@foreach($produtos as $produto)

    <p>{{ $produto->name }}</p>
    <p>{{ $produto->preco_custo }}</p>
    <p>{{ $produto->preco_venda }}</p>

@endforeach

@endsection