@extends('template')

@section('container')

<form action="/recipes" enctype="multipart/form-data" method="POST">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="name" name="name" type="text" class="form-control">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Imagen</label>
    <input id="image" name="image" type="file" class="form-control" accept = "image/*" onchange="loadImage(event)">
    <img class = "mt-3" style = "width: 150px" id="selected"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <textarea class="form-control" name="description" style="white-space: pre-line; height: 250px"></textarea>
  </div>
  <div class = "container">
    <thead>
        <th style = "font-family:verdana;">Ingredientes</th>
      </thead>
  </div>

  <div class="container" style="height: 250px">
    <table class= "table table-striped">
        <tbody>
            @foreach ($ingredients as $ingredient)
                <tr style="text-align:left">
                    <td>
                        {{$ingredient -> name}}
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" name = "check_ingredients[]" type="checkbox" value="{{$ingredient->id}}" id="checkbox{{$ingredient->id}}" onchange="changeStatusButton('{{$ingredient->id}}')">
                        </div>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="lot[]" value="" id="text{{$ingredient->id}}" disabled required>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/recipes" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  </div>
</div>

    @section('js')
    <script>
        function changeStatusButton($id){
          $text = document.getElementById("text"+$id);
          $checkbox = document.getElementById("checkbox"+$id);
          console.log($text);
          console.log($checkbox.checked);
          if($checkbox.checked)
            $text.disabled = false;
          else{
            $text.disabled = true;
            $text.value = '';
          }
        }
    </script>

    <!-- vista previa de la imagen -->
    <script>
        var loadImage = function(event) {
            var selected = document.getElementById('selected');
            selected.src = URL.createObjectURL(event.target.files[0]);
            selected.onload = function() {
                URL.revokeObjectURL(selected.src)
            }
        };
    </script>
    @endsection
@endsection

