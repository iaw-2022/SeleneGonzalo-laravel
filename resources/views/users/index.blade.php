@extends('template')

@section('container')
<h1>USUARIOS</h1>
<table class= "table table-striped">
    <thead>
        <th>
            Nombre de usuario
        </th>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>
                    <a href="{{$user -> email}}">{{$user -> name}}</a>
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection
