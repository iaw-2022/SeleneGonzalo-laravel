@extends('template')

@section('container')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h2>Editar ingrediente {{$ingredient->name}}</h2>

<form action="/ingredients/{{$ingredient->id}}" method="POST">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre de ingrediente</label>
    <input id="name" name="name" type="text" class="form-control" value="{{$ingredient->name}}" required>
  </div>
  <a href="/ingredients" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection
