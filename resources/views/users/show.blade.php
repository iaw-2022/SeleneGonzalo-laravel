@extends('template')

@section('container')
<h1>Recetas de {{$user -> name}}</h1>
<table class= "table table-striped">
    <tbody>
        @foreach ($user -> recipes as $user)
            <tr>
                <td>
                <a href="/recipes/{{$user -> id}}">{{$user -> name}}</a>
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection