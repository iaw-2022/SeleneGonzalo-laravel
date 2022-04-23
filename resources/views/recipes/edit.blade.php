@extends('template')

@section('container')

<form action="/recipes/{{$recipe->id}}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="name" name="name" type="text" class="form-control" value="{{$recipe->name}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <input id="description" name="description" type="text" class="form-control" value="{{$recipe->description}}">
  </div>
  <div class="container">
        <div class="row">
            <div class="col-lg-12">
                  <table class= "table table-striped display nowrap" cellspacing="0" id="recipe-table" width="100%">
                      <thead class = "text-center">
                          <th style = "font-family:verdana;">Ingrediente</th>
                      </thead>
                      <tbody class = "text-center">
                        <tr>
                        @foreach ($recipe -> ingredients as $ingredient)
                            <td style="text-align:left; font-family:verdana;">
                                {{$ingredient -> name}} <br>
                            </td>
                            <td>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                              </div>
                            </td>
                        @endforeach
                        </tr>
                      </tbody>
                  </table>
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

        <script>
        $(document).ready(function() {
            $('#recipe-table').DataTable({
                responsive:true
            })
        });
        </script>
    @endsection
@endsection

