@extends('template')

@section('container')
<h1 style = "font-family:verdana;">INGREDIENTES</h1>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table class= "table table-striped display nowrap" cellspacing="0" id="ingredients-table" width="100%">
                <thead>
                    <th style = "font-family:verdana;">  Nombre ingrediente</th>
                </thead>
                <tbody>
                    @foreach ($ingredients as $ingredient)
                        <tr>
                            <td>
                                <a style = "font-family:verdana;" href="/ingredient/{{$ingredient -> id}}">{{$ingredient -> name}}</a>
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
