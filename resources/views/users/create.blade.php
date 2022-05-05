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
<h2>Agregar usuario</h2>

<form action="/users" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre de usuario</label>
    <input id="name" name="name" type="text" class="form-control" tabindex="2" required value = "{{old('name')}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">E-mail</label>
    <input id="email" name="email" type="text" class="form-control" tabindex="3" required value = "{{old('email')}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Contraseña</label>
    <input id="pass" name="pass" type="text" class="form-control" tabindex="4" required value = "{{old('pass')}}">
  </div>
  <a href="/users" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection
