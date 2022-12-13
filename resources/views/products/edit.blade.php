@extends('layouts.main')

@section('title', "editando: " . $produto->name)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Editar produto {{ $produto->name }}</h1>
        <form action="/produto/update/{{ $produto->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-goup">
                <label for="title">Nome do produto</label>
                <input type="text" class="form-control" id="title" name="name" value="{{ $produto->name }}">
            </div>
            <div class="form-goup">
                <label for="date">Data de chegada</label>
                <input type="date" class="form-control" id="date" name="data_entrada" value="">
            </div>
            <div class="form-goup">
                <label for="title">Valor de custo</label>
                <input type="number" class="form-control" step="0.01" name="preco_custo" min="0.01" value="{{ $produto->preco_custo}}">
            </div>
            <div class="form-goup">
                <label for="title">Valor de venda</label>
                <input type="number" class="form-control" step="0.01" name="preco_venda" min="0.01" value="{{ $produto->preco_venda}}">
            </div>
            <div class="form-goup">
                <label for="title">quantidade</label>
                <input type="number" class="form-control" step="1" name="quantidade" min="1" value="{{ $produto->quantidade}}">
            </div>

            
            
            <input type="submit" class = "btn btn-primary" value="Editar produto">
        </form>
   </div>

@endsection