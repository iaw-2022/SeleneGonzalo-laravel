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
              <h5 class="card-title">{{$recipe -> name}}</h5>
              <p class="card-text">{{$recipe -> description}}</p>
              <p class="card-text">
                  <small class="text-muted">
                        @foreach ($recipe -> ingredients as $ingredient)
                                {{$ingredient -> pivot-> lot}} de {{$ingredient -> name}}<br>
                        @endforeach
                  </small>
              </p>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="card mx-auto" style="width: 62.5rem;">
  <ul class="list-group list-group-flush">
    @foreach ($recipe -> qualifications as $q)
      <li class="list-group-item">
        {{$q -> name}}  
      </li>
      <li class="list-group-item">
        {{$q -> email}}
      </li>
      <li class="list-group-item">
        {{$q -> pivot -> qualification}} 
      </li>
      <li class="list-group-item">  
        {{$q -> pivot -> commentary}} 
      </li>
    @endforeach
  </ul>
</div> 
@endsection
