@extends('template')

@section('container')
<h1>RECETAS SIN TACC</h1>
<table class= "table table-striped">
    <thead class = "text-center">
    </thead>
    <tbody class = "text-center">
        @foreach ($recipes as $recipe)
            <tr>
                <td>
                    <a href="/recipes/{{$recipe -> id}}">{{$recipe -> name}}</a>
                </td>
                <td>
                    <img src="{{$recipe -> image}}" alt="imagen receta {{$recipe -> name}}" style = "width: 200px">
                </td>
                <td>
                    @foreach ($recipe -> ingredients as $ingredient)
                        {{$ingredient -> name}} <br>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection
