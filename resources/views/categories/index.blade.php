@extends('template')

@section('container')
<a class = "mb-3 btn btn-success" href="categories/create">
    Agregar categoría
</a>
<table class= "table table-bordered" id= "categories-table">
    <thead>
        <th style = "font-family:verdana;">ID</th>
        <th style = "font-family:verdana;">Nombre categoría</th>
        <th style = "font-family:verdana;">Acciones</th>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>
                    <a style = "font-family:verdana;">{{$category -> id}}</a>
                </td>
                <td>
                    <a style = "font-family:verdana;" href="/category/{{$category -> id}}">{{$category -> name}}</a>
                </td>
                <td>
                    <form action="{{route('categories.destroy',$category->id)}}" method = "POST">
                        <a class="btn btn-primary" href="categories/{{$category -> id}}/edit">
                            <span class="material-icons-outlined">
                                edit
                            </span>
                        </a>
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-danger" type = "submit">
                            <span class="material-icons-outlined">
                                delete
                            </span>
                        </button>
                    </form>
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
        <!--   Datatables-->
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

        <script>
        $(document).ready(function() {
            $('#categories-table').DataTable()
        });
        </script>
    @endsection
@endsection
