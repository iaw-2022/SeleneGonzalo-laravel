@extends('template')

@section('container')

<div class="row">
    <div class="card mb-3 mx-auto" style="max-width: 1000px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{$recipe -> image}}" alt="imagen receta {{$recipe -> name}}" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title" style = "font-family:verdana;">{{$recipe -> name}}</h5>
              <p class="card-text">
                  <small class="text-muted" style = "font-family:verdana;">
                        @foreach ($recipe -> ingredients as $ingredient)
                                {{$ingredient -> pivot-> lot}} de {{$ingredient -> name}}<br>
                        @endforeach
                  </small>
              </p>
              <p class="card-text" style = "white-space: pre-line" style = "font-family:verdana;">{{$recipe -> description}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="card mx-auto" style="max-width: 1000px;">
  <h4 style = "font-family:verdana;">Calificaciones y comentarios:</h4>
    <ul class="list-group list-group-flush">
      @foreach ($recipe -> qualifications as $q)
        <li class="list-group-item">
          Nombre de usuario: {{$q -> name}}
        </li>
        <li class="list-group-item">
          e-mail: {{$q -> email}}
        </li>
        <li class="list-group-item">
          Calificación: {{$q -> pivot -> qualification}}
        </li>
        <li class="list-group-item">
          Comentario: {{$q -> pivot -> commentary}}
        </li>
        @if (Auth::user()->id_rol == '1')
            <button class="btn btn-danger" style="max-width: 50px;" data-bs-toggle="modal" data-bs-target="#delete-modal" data-bs-id="{{$q->pivot->id}}">
                <span class="material-icons-outlined">
                    delete
                </span>
            </button>
        @endif
      @endforeach
    </ul>
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
                    ¿Eliminar calificación?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" data-bs-action="/qualifies/" action="" method="POST">
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
