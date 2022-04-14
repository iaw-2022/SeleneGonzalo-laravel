@extends('template')

@section('container')
<h1>CATEGORIAS</h1>
<table class= "table table-striped">

    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>
                    <a href="/category/{{$category -> id}}">{{$category -> name}}</a>
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection
