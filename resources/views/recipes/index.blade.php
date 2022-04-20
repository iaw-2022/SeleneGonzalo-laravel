@extends('template')

@section('container')
<a class = "mb-3 btn btn-success" href="">
    Agregar receta
</a>
<div class="container">
       <div class="row">
           <div class="col-lg-12">
                <table class= "table table-bordered display nowrap" cellspacing="0" id="recipe-table" width="100%">
                    <thead class = "text-center">
                        <th style = "font-family:verdana;">ID</th>
                        <th style = "font-family:verdana;">Nombre receta</th>
                        <th style = "font-family:verdana;">Imagen ilustrativa</th>
                        <th style = "font-family:verdana;">Ingredientes</th>
                        <th style = "font-family:verdana;">Acciones</th>
                    </thead>
                    <tbody class = "text-center">
                        @foreach ($recipes as $recipe)
                            <tr>
                                <td>
                                    <a style = "font-family:verdana;">{{$recipe -> id}}</a>
                                </td>
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

        <!-- extension responsive -->
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

        <script>
        $(document).ready(function() {
            $('#recipe-table').DataTable({
                responsive:true
            })
        });
        </script>
    @endsection
@endsection

