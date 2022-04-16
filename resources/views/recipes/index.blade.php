@extends('template')

@section('container')
<table class= "table table-bordered" id="recipe-table">
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
    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script>
        $(document).ready(function() {
            $('#recipe-table').DataTable();
        } );
        </script>
    @endsection
@endsection

