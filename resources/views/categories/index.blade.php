@extends('template')

@section('container')
<a class = "mb-3 btn btn-success" href="categories/create">
    Agregar categoría
</a>
<table class= "table table-bordered" id= "categories-table">
    <thead>
        <th style = "font-family:verdana;">Nombre categoría</th>
        <th style = "font-family:verdana;">Acciones</th>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>
                    <a style = "font-family:verdana;" href="/category/{{$category -> id}}">{{$category -> name}}</a>
                </td>
                <td>
                    <!-- Invocacion al Modal -->
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal" data-bs-id="{{$category->id}}">
                        <span class="material-icons-outlined">
                            delete
                        </span>
                    </button>
                    <a class="btn btn-primary" href="categories/{{$category -> id}}/edit">
                        <span class="material-icons-outlined">
                            edit
                        </span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade text-dark" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Eliminar categoría?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" data-bs-action="/categories/" action="" method="POST">
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

@section('js')
        <!-- script utilizado para las alertas con modales -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <!--   Datatables-->
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
        
        <script>
        $(document).ready(function() {
            $('#categories-table').DataTable()
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
