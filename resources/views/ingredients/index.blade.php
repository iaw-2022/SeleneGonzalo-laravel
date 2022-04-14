@extends('template')

@section('container')
<h1>INGREDIENTES</h1>
<table class= "table table-striped">
    <thead>
        <th>Nombre ingrediente</th>
    </thead>
    <tbody>
        @foreach ($ingredients as $ingredient)
            <tr>
                <td>
                    <a href="/ingredient/{{$ingredient -> id}}">{{$ingredient -> name}}</a>
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection
