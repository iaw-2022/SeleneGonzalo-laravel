@extends('template')

@section('container')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/recipes" method="POST" enctype="multipart/form-data" onsubmit="return checkBoxValidation('body-check-category') && checkBoxValidation('body-check-ingredient')">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="name" name="name" type="text" class="form-control" required value = "{{old('name')}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Imagen</label>
    <input id="image" name="image" type="file" class="form-control" accept = "image/*" onchange="loadImage(event)">
    <img class = "mt-3" style = "width: 150px" id="selected"/>
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <textarea class="form-control" name="description" style="white-space: pre-line; height: 250px" required>{{old('description')}}</textarea>
  </div>

  <div class="container" style="height: 250px">
    <table class= "table table-striped">
        <thead>
            <th style = "font-family:verdana;">Ingrediente</th>
            <th style = "font-family:verdana;">Agregar</th>
            <th style = "font-family:verdana;">Cantidad</th>
        </thead>
        <tbody id= "body-check-ingredient">
            @foreach ($ingredients as $ingredient)
                <tr style="text-align:left">
                    <td>
                        {{$ingredient -> name}}
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" name = "check_ingredients[]" type="checkbox" value="{{$ingredient->id}}" id="checkbox{{$ingredient->id}}" onchange="changeStatusButton('{{$ingredient->id}}',true)">
                        </div>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="lot[]" value="" id="text{{$ingredient->id}}" disabled required>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class= "table table-striped">
        <thead>
            <th style = "font-family:verdana;">Categoría</th>
            <th style = "font-family:verdana;">Agregar</th>
        </thead>
        <tbody id="body-check-category">
            @foreach ($categories as $category)
                <tr style="text-align:left">
                    <td>
                        {{$category -> name}}
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" name = "check_categories[]" type="checkbox" value="{{$category->id}}" id="checkbox{{$category->id}}" onchange="changeStatusButton('{{$category->id}}',false)">
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

    <script>
        function changeStatusButton(id, ingredient){
            text = document.getElementById("text"+id);
            checkbox = document.getElementById("checkbox"+id);
            if (ingredient){
                if(checkbox.checked)
                    text.disabled = false;
                else{
                    text.disabled = true;
                    text.value = '';
                }
            }
        }

        function checkBoxValidation(id){
        let form=document.getElementById(id);
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

        <!-- vista previa de la imagen -->
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

