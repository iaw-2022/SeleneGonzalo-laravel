@extends('template')

@section('container')

<a class = "mb-3 btn btn-success" href="">
    Agregar usuario
</a>
<table class= "table table-bordered display nowrap" cellspacing="0" id="users-table">
    <thead>
        <th style = "font-family:verdana;">Nombre de usuario</th>
        <th style = "font-family:verdana;">Acciones</th>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>
                    <a style = "font-family:verdana;" href="/user/{{$user -> id}}">{{$user -> name}}</a>
                </td>
                <td>
                    <a class="btn btn-primary" href="">
                        <span class="material-icons-outlined">
                            edit
                        </span>
                    </a>
                    <a class="btn btn-danger" href="">
                        <span class="material-icons-outlined">
                            delete
                        </span>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

        <!--   Datatables-->
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

        <!-- extension responsive -->
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

        <script>
        $(document).ready(function() {
            $('#users-table').DataTable();
                responsive :true;
        } );
        </script>
    @endsection
@endsection
