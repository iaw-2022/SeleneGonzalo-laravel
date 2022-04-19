@extends('template')

@section('container')
<a class = "mb-3 btn btn-success" href="">
    Agregar categoría
</a>
<table class= "table table-bordered">
    <thead>
        <th style = "font-family:verdana;">Nombre categoría</th>
        <th style = "font-family:verdana;">Acciones</th>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>
                    <a style = "font-family:verdana;" href="/category/{{$category -> id}}">{{$category -> name}}</a>
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="material-icons-outlined">
                            edit
                        </span>
                    </a>
                    <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="material-icons-outlined">
                            delete
                        </span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection
