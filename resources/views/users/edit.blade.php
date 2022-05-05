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

<h2>Editar usuario</h2>

<form action="/users/{{$user->id}}" method="POST">
    @method('PUT')
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre de usuario</label>
    <input id="name" name="name" type="text" class="form-control" value = "{{$user->name}}" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">E-mail</label>
    <input id="email" name="email" type="text" class="form-control" value = "{{$user->email}}" required>
  </div>
  <a href="/users" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection
