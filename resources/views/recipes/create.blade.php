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
<form action="/recipes" method="POST" onsubmit=" return checkBoxValidation()">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="name" name="name" type="text" class="form-control" required value = "{{old('name')}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Imagen</label>
    <input id="image" name="image" type="text" class="form-control" required value = "{{old('image')}}">
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

    <table class= "table table-striped">
        <thead>
            <th style = "font-family:verdana;">Categoría</th>
            <th style = "font-family:verdana;">Agregar</th>
        </thead>
        <tbody id="body-check">
            @foreach ($categories as $category)
                <tr style="text-align:left">
                    <td>
                        {{$category -> name}}
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" name = "check_categories[]" type="checkbox" value="{{$category->id}}" id="checkbox{{$category->id}}" onchange="changeStatusButtonCategory('{{$category->id}}')">
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
    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#alert-modal" tabindex="4">Guardar</button>
</form>
@section('js')
    <script>
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

        function checkBoxValidation(){
            var form=document.getElementById("body-check");
            var checkboxs=form.querySelectorAll("input[type='checkbox']");
            var okay=false;
            for(var i=0,l=checkboxs.length;i<l;i++)
            {
                if(checkboxs[i].checked)
                {
                    okay=true;
                    break;
                }
            }
            if(!okay){
                return false;
            }else
                return true;
        }
    </script>
    @endsection
@endsection

