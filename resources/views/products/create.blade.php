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
            
            <input type="submit" class = "btn btn-primary" value="Cadastrar produto">
        </form>
   </div>

@endsection