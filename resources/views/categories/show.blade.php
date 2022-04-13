@extends('template')

@section('container')
<h1>Recetas para {{$category -> name}}</h1>
<table class= "table table-striped">
    <tbody>
        @foreach ($category -> recipes as $c)
            <tr>
                <td>
                <a href="/recipes/{{$c -> id}}">{{$c -> name}}</a>
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection