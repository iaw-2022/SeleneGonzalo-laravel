@extends('template')

@section('container')
<h1>CATEGORIAS</h1>
<table class= "table table-striped">
    <thead>
        <th>Nombre</th>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>
                    {{$category -> name}}
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection
