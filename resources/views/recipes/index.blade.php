@extends('template')

@section('container')
    @if ((Auth::user()->id_rol == '1') || (Auth::user()->id_rol == '2'))
        <a class = "mb-3 btn btn-success" href="recipes/create">
            Agregar receta
        </a>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                    <table class= "table table-bordered display nowrap" cellspacing="0" id="recipe-table" width="100%">
                        <thead class = "text-center">
                            <th style = "font-family:verdana;">Nombre receta</th>
                            <th style = "font-family:verdana;">Imagen ilustrativa</th>
                            <th style = "font-family:verdana;">Ingredientes</th>
                            <th style = "font-family:verdana;">Categoría/s</th>
                            @if ((Auth::user()->id_rol == '1') || Auth::user()->id_rol == '2')
                                <th style = "font-family:verdana;">Acciones</th>
                            @endif
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
                                    <td style="text-align:left; font-family:verdana;">
                                        @foreach ($recipe -> categories as $category)
                                            {{$category -> name}} <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <!-- Invocacion al Modal -->
                                        @if ((Auth::user()->id_rol == '1') || (Auth::user()->id_rol == '2'))
                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal" data-bs-id="{{$recipe->id}}">
                                                <span class="material-icons-outlined">
                                                    delete
                                                </span>
                                            </button>
                                            <a class="btn btn-primary" href="recipes/{{$recipe -> id}}/edit">
                                                <span class="material-icons-outlined">
                                                    edit
                                                </span>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade text-dark" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Eliminar receta?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form id="deleteForm" data-bs-action="/recipes/" action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type = "submit">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('js')

        <!-- script utilizado para las alertas con modales -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

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

        <!-- Alerta de confirmacion de eliminacion-->
        <script>
            var deleteModal = document.getElementById('delete-modal')
            deleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget
                var id = button.getAttribute('data-bs-id')
                var deleteForm = deleteModal.querySelector('#deleteForm')
                var action = deleteForm.getAttribute("data-bs-action")
                deleteForm.setAttribute("action",action+id)
            })
        </script>
    @endsection
@endsection

