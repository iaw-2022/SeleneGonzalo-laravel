<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--  Tipografias  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"  rel="stylesheet">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>

    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

    <title>RECETACCS</title>
  </head>
  <body>
    <div class="container">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-xxl-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-2 text-dark text-decoration-none ml-auto">
            <img src="https://logos-download.com/wp-content/uploads/2021/01/Sin_T.A.C.C._Logo.png" alt="" style="width:50px;">
            <h1 style = "font-family:verdana;">RECETACCS</h1>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 mx-auto ">
                <li>
                    <a href="/recipes" class="nav-link px-2 link-dark">
                        <span class="material-icons-outlined">
                        menu_book
                        </span>
                        Recetas
                    </a>
                </li>
                @if ((Auth::user()->id_rol == '1') || (Auth::user()->id_rol == '2'))
                        <li>
                            <a href="/ingredients" class="nav-link px-2 link-dark">
                                <span class="material-icons-outlined">
                                egg_alt
                                </span>
                                Ingredientes
                            </a>
                        </li>
                        <li>
                            <a href="/categories" class="nav-link px-2 link-dark">
                                <span class="material-icons-outlined">
                                local_dining
                                </span>
                                Categorías
                            </a>
                        </li>
                @endif
                @if (Auth::user()->id_rol == '1')
                    <li>
                        <a href="/users" class="nav-link px-2 link-dark">
                            <span class="material-icons-outlined">
                            people_outline
                            </span>
                            Usuarios
                        </a>
                    </li>
                @endif
            </ul>
            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Cerrar sesión
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
      </header>
    </div>
    <div class="container">
        @yield('container')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @yield('js')
</body>
</html>
