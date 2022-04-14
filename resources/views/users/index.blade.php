@extends('template')

@section('container')
<h1 style = "font-family:verdana;">USUARIOS</h1>
<table class= "table table-striped">
    <thead>
        <th style = "font-family:verdana;">
            Nombre de usuario
        </th>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>
                    <a style = "font-family:verdana;" href="/user/{{$user -> id}}">{{$user -> name}}</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
