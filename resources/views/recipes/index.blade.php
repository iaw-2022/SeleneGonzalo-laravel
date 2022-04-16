@extends('template')

@section('container')
<table class= "table table-bordered">
    <thead class = "text-center">
        <th style = "font-family:verdana;">Nombre receta</th>
        <th style = "font-family:verdana;">Imagen ilustrativa</th>
        <th style = "font-family:verdana;">Ingredientes</th>
    </thead>
    <tbody class = "text-center">
        @foreach ($recipes as $recipe)
            <tr>
                <td>
                    <a style = "font-family:verdana;" href="/recipes/{{$recipe -> id}}">{{$recipe -> name}}</a>
                </td>
                <td>
                    <img src="{{$recipe -> image}}" alt="imagen receta {{$recipe -> name}}" style = "width: 200px">
                </td>
                <td style="text-align:left; font-family:verdana;">
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

    