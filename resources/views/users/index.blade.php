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
                    <a href="/user/{{$user -> id}}">{{$user -> name}}</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
