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
    <input id="name" name="name" type="text" class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Imagen</label>
    <input id="image" name="image" type="text" class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <textarea class="form-control" name="description" style="white-space: pre-line; height: 250px" required></textarea>
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

    <a href="/recipes" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
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
                alert("Debe seleccionar al menos una categoría y al menos un ingrediente");
                return false;
            }else
                return true;
        }
    </script>
    @endsection
@endsection

