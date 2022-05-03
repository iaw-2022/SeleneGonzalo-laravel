@extends('template')

@section('container')

<form action="/recipes/{{$recipe->id}}" enctype="multipart/form-data" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="name" name="name" type="text" class="form-control" value="{{$recipe->name}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Imagen</label>
    <input id="image" name="image" type="file" class="form-control" accept = "image/*" onchange="loadImage(event)">
    <img class = "mt-3" style = "width: 150px" src = "{{$recipe->image}}" id="selected"/>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <textarea class="form-control" name="description" style="white-space: pre-line; height: 250px">{{$recipe->description}}</textarea>
  </div>
  <div class="container" style="height: 250px">
    <table class= "table table-responsive">
        <thead>
            <th style = "font-family:verdana;">Ingrediente</th>
            <th style = "font-family:verdana;">Agregar</th>
            <th style = "font-family:verdana;">Cantidad</th>
        </thead>
        <tbody>
            @foreach ($ingredients as $ingredient)
                <tr style="text-align:left">
                    <td>
                        {{$ingredient -> name}}
                    </td>
                    <div class="form-check">
                        @php $ingredient_result = $recipe->hasIngredient($ingredient->id) @endphp
                        @if ($ingredient_result->exists())
                            @php $ingredient_id = $ingredient_result->first()->id_ingredient @endphp
                            <td>
                                <input class="form-check-input" name = "check_ingredients[]" type="checkbox" value="{{$ingredient_id}}" id="checkbox{{$ingredient_id}}" onchange="changeStatusButton('{{$ingredient_id}}')" checked>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="lot[]" value="{{$ingredient_result -> first() -> lot}}" id="text{{$ingredient_id}}" required>
                            </td>
                        @else
                            <td>
                                <input class="form-check-input" name = "check_ingredients[]" type="checkbox" value="{{$ingredient->id}}" id="checkbox{{$ingredient->id}}" onchange="changeStatusButton('{{$ingredient->id}}')">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="lot[]" value="" id="text{{$ingredient->id}}" disabled required>
                            </td>
                        @endif
                    </div>
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

</form>
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

        <!-- habilitar/deshabilitar botón según checkbox-->
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

