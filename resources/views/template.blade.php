<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"  rel="stylesheet">
    <title>RECETACCS</title>
  </head>
  <body>

    <div class="b-example-divider"></div>

    <div class="container">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
          <img src="https://logos-download.com/wp-content/uploads/2021/01/Sin_T.A.C.C._Logo.png" alt="" style="width:50px;">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
        </ul>

        <div class="col-md-3 text-end">
          <button type="button" class="btn btn-outline-primary me-2">Login</button>
          <button type="button" class="btn btn-primary">Sign-up</button>
        </div>
      </header>
    </div>
        {{-- <nav class="navbar navbar-expand-lg navbar-light " style= "background-color: #ffcc00">

            <div class="container">
              <a class="navbar-brand text-center" style = "font-family:verdana;" href="/recipes">
                <span class="material-icons-outlined"> menu_book </span>
                Recetas
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" style = "font-family:verdana;" aria-current="page" href="/ingredients">
                      <span class="material-icons-outlined"> egg_alt</span>
                      Ingredientes
                    </a>
                  </li>


                  <li class="nav-item">
                    <a class="nav-link active" style = "font-family:verdana;" aria-current="page" href="/categories">
                      <span class="material-icons-outlined">local_dining</span>
                      Categorías
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" style = "font-family:verdana;" aria-current="page" href="/users">
                      <span class="material-icons-outlined">people_outline</span>
                      Usuarios
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav> --}}
      </header>
    <div class="container">
        @yield('container')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @yield('js')
</body>
</html>
