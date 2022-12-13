@extends('layouts.main')

@section('title', "editando: " . $usuario->name)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Editar usuario {{ $usuario->name }}</h1>
        <form action="/usuario/update/{{ $usuario->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-goup">
                <label for="title">Nome</label>
                <input type="text" class="form-control" id="title" name="name" value="{{ $usuario->name }}">
                       
            
            <input type="submit" class = "btn btn-primary" value="Editar produto">
        </form>
   </div>

@endsection