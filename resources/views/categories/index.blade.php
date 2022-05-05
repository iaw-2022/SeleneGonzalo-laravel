@extends('template')

@section('container')
<h1 style = "font-family:verdana;">CATEGORIAS</h1>
<table class= "table table-striped">

    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>
                    <a style = "font-family:verdana;" href="/category/{{$category -> id}}">{{$category -> name}}</a>
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection
