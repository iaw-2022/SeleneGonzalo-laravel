@extends('template')

@section('container')
<a class = "mb-3 btn btn-success" href="ingredients/create">
    Agregar ingrediente
</a>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table class= "table table-bordered display nowrap" cellspacing="0" id="ingredients-table" width="100%">
                <thead>
                    <th style = "font-family:verdana;">  ID </th>
                    <th style = "font-family:verdana;">  Nombre ingrediente</th>
                    <th style = "font-family:verdana;">  Acciones</th>
                </thead>
                <tbody>
                    @foreach ($ingredients as $ingredient)
                        <tr>
                            <td>
                                <a style = "font-family:verdana;">{{$ingredient -> id}}</a>
                            </td>
                            <td>
                                <a style = "font-family:verdana;" href="/ingredient/{{$ingredient -> id}}">{{$ingredient -> name}}</a>
                            </td>
                            <td>
                                <form action="{{route('ingredients.destroy',$ingredient->id)}}" method = "POST">
                                    <a class="btn btn-primary" href="ingredients/{{$ingredient -> id}}/edit">
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
        </div>
    </div>
</div>
    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <!--   Datatables-->
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

        <script>
        $(document).ready(function() {
            $('#ingredients-table').DataTable()
        });
        </script>
    @endsection
@endsection
