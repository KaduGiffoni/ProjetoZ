@extends('layouts.main')

@section('title', "Cadastrar produto")

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Cadastrar novo Produto</h1>
        <form action="/products" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-goup">
                <label for="title">Nome do produto</label>
                <input type="text" class="form-control" id="title" name="name" placeholder="Nome do produto">
            </div>
            <div class="form-goup">
                <label for="date">Data de chegada</label>
                <input type="date" class="form-control" id="date" name="dataEntrada">
            </div>
            <div class="form-goup">
                <label for="title">Valor de custo</label>
                <input type="number" class="form-control" step="0.01" name="preco_custo" min="0.01">
            </div>
            <div class="form-goup">
                <label for="title">Valor de venda</label>
                <input type="number" class="form-control" step="0.01" name="preco_venda" min="0.01">
            </div>
            <div class="form-goup">
                <label for="title">quantidade</label>
                <input type="number" class="form-control" step="1" name="quantidade" min="1">
            </div>
            <div class="form-goup">
                <label for="title">Funcionario</label>
                <select name="funcionario" id="funcionario">
                    <option value=""></option>
                </select>
            </div>

            
            
            <input type="submit" class = "btn btn-primary" value="Cadastrar produto">
        </form>
   </div>

@endsection