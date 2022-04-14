@extends('template')

@section('container')
<h1 style = "font-family:verdana;">INGREDIENTES</h1>
<table class= "table table-striped">
    <thead>
        <th style = "font-family:verdana;">  Nombre ingrediente</th>
    </thead>
    <tbody>
        @foreach ($ingredients as $ingredient)
            <tr>
                <td>
                    <a style = "font-family:verdana;" href="/ingredient/{{$ingredient -> id}}">{{$ingredient -> name}}</a>
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection
