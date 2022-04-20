@extends('template')

@section('container')
<h2>Agregar ingrediente</h2>

<form action="/ingredients" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre de ingrediente</label>
    <input id="name" name="name" type="text" class="form-control" tabindex="2">
  </div>
  <a href="/ingredients" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection