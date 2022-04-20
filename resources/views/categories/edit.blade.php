@extends('template')

@section('container')
<h2>Editar categoría {{$category->name}}</h2>

<form action="/categories/{{$category->id}}" method="POST">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre de categoría</label>
    <input id="name" name="name" type="text" class="form-control" value = "{{$category->name}}">
  </div>
  <a href="/categories" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection