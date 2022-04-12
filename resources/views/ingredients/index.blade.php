@extends('template')

@section('container')
<h1>INGREDIENTES</h1>
<table class= "table table-striped">
    <thead>
        <th>Nombre</th>
    </thead>
    <tbody>
        @foreach ($ingredients as $ingredient)
            <tr>
                <td>
                    {{$ingredient -> name}}
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection
