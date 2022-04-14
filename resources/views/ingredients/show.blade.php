@extends('template')

@section('container')
<h1>Recetas con {{$ingredient -> name}}</h1>
<table class= "table table-striped">
    <tbody>
        @foreach ($ingredient -> recipes as $ingredient)
            <tr>
                <td>
                <a href="/recipes/{{$ingredient -> id}}">{{$ingredient -> name}}</a>
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection