@extends('template')

@section('container')
    <div class="text-center">
        <div class="mt-5"><img src="https://www.clarin.com/img/2019/12/04/el-logo-oficial-sin-tacc___u6xfaxi7_720x0__1.jpg" alt="not authorized" id="sintacc" style = "width: 30%"></div>

        <div class="bottom">
            <h3 class="mt-5 mb-5">Lo sentimos, no tiene permiso para acceder a esta información</h3>
            <a class="btn btn-outline-primary btn-lg " href="{{ url()->previous() }}">Volver</a>
        </div>
    </div>
@endsection
