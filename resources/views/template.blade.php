<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>RECETACCS</title>
  </head>
  <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-light justify-content-center" style= "background-color: #a3d4e6;">
            <div class="container-fluid">
              <a class="navbar-brand" style = "font-family:verdana;" href="/recipes"> 
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
                  <h2 style = "font-family:verdana;" class = "text-center">RECETACCS</h2>
                </ul>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Buscar" style = "font-family:verdana;" aria-label="Buscar">
                  <button class="btn btn-outline-success" style = "font-family:verdana;" type="submit">
                    <span class="material-icons-outlined">search</span>
                  </button>
                </form>
              </div>
            </div>
          </nav>
      </header>
    <h1></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="container">
        @yield('container')
    </div>
  </body>
</html>
