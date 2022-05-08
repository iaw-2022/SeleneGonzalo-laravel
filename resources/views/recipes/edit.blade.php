@extends('template')

@section('container')


<form action="/recipes/{{$recipe->id}}" enctype="multipart/form-data" method="POST">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/recipes/{{$recipe->id}}" method="POST" onsubmit = "return checkBoxValidation('body-check-category') && checkBoxValidation('body-check-ingredient')">
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
        <tbody id = "body-check-ingredient">
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
    <table class= "table table-responsive">
        <thead>
            <th style = "font-family:verdana;">Categoría</th>
            <th style = "font-family:verdana;">Agregar</th>
        </thead>
        <tbody id = "body-check-category">
            @foreach ($categories as $category)
                <tr style="text-align:left">
                    <td>
                        {{$category -> name}}
                    </td>
                    <td>
                        <div class="form-check">
                            @php $category_result = $recipe->hasCategory($category->id) @endphp
                            @if ($category_result->exists())
                                @php $category_id = $category_result->first()->id_category @endphp
                                <input class="form-check-input" name = "check_categories[]" type="checkbox" value="{{$category_id}}" id="checkbox{{$category_id}}" onchange="changeStatusButtonCategory('{{$category_id}}')" checked>
                            @else
                                <input class="form-check-input" name = "check_categories[]" type="checkbox" value="{{$category->id}}" id="checkbox{{$category->id}}" onchange="changeStatusButtonCategory('{{$category->id}}')">
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal para alerta de checkboxes -->
    <div class="modal" tabindex="-1" id="alert-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Alerta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Debe seleccionar al menos una categoría y un ingrediente</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <a href="/recipes" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

    <!-- extension responsive -->
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

        <!-- habilitar/deshabilitar botón según checkbox-->
    <script>
    $(document).ready(function() {
        $('#recipe-table').DataTable({
            responsive:true
        })
    });

    function changeStatusButton($id){
        $text = document.getElementById("text"+$id);
        $checkbox = document.getElementById("checkbox"+$id);
        if($checkbox.checked)
        $text.disabled = false;
        else{
        $text.disabled = true;
        $text.value = '';
        }
    }

    function changeStatusButtonCategory($id){
        $text = document.getElementById("text"+$id);
        $checkbox = document.getElementById("checkbox"+$id);
    }

    function checkBoxValidation($id){
        let form=document.getElementById($id);
        let checkboxs=form.querySelectorAll("input[type='checkbox']");
        let okay=false;
        for(var i=0,l=checkboxs.length;i<l;i++)
        {
            if(checkboxs[i].checked)
            {
                okay=true;
                break;
            }
        }
        if(!okay){
            let modal = document.getElementById("alert-modal");
            $("#alert-modal").modal('toggle');
            return false;
        }else
            return true;
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

