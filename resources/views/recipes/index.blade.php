@extends('template')

@section('container')
<div class="container">
       <div class="row">
           <div class="col-lg-12">
                <table class= "table table-bordered display nowrap" cellspacing="0" id="recipe-table">
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
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script>
        $(document).ready(function() {
            $('#recipe-table').DataTable();
            responsive : true;
        } );
        </script>
    @endsection
@endsection

