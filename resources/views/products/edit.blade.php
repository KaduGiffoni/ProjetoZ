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
                <label for="title">quantidade</label>
                <input type="number" class="form-control" step="1" name="quantidade" min="1" value="{{ $produto->quantidade}}">
            </div>           
            
            <input type="submit" class = "btn btn-primary" value="Editar produto">
        </form>
   </div>

@endsection