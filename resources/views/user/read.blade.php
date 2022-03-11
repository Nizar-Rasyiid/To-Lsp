<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Laravel</title>


        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-light bg-secondary">
            <div class="container-fluid">
              <span class="navbar-brand mb-0 h1">Navbar</span>
            </div>
          </nav>
          <div class=" container justify-content-center display-flex">
              <div class="row">
                  <div class="col-6">
                    <h1 class="mb-10">{{$data->judul_artikel}}</h1>
                    <div>Penulis : {{$data->user->name}}</div>
                    <div class="text-lg">{{$data->isi_artikel}}</div>
                  </div>
              </div>

          </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
    
</html>
