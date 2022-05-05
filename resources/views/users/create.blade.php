@extends('template')

@section('container')
<h2>Agregar usuario</h2>

<form action="/users" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre de usuario</label>
    <input id="name" name="name" type="text" class="form-control" tabindex="2">
  </div>
  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      Roles
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      @foreach ($rol as $r)
        <li><a class="dropdown-item" href="#">{{$r -> rol_name}}</a></li>
      @endforeach
    </ul>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">E-mail</label>
    <input id="email" name="email" type="text" class="form-control" tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Contraseña</label>
    <input id="pass" name="pass" type="text" class="form-control" tabindex="4">
  </div>
  <a href="/users" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>

@endsection
