@extends('template')

@section('container')
<h1 style = "font-family:verdana;">Recetas para {{$category -> name}}</h1>
<table class= "table table-striped">
    <tbody>
        @foreach ($category -> recipes as $cat)
            <tr>
                <td>
                <a style = "font-family:verdana;" href="/recipes/{{$cat -> id}}">{{$cat -> name}}</a>
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection