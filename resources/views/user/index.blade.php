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
              <span class="navbar-brand mb-0 h1 text-white">Navbar</span>
              <span> 
                <a href="{{ route('logout') }}" class="nav-link btn btn-rounded  bg-primary text-white">
                    Logout
                </a>
            </span>
            </div>
          </nav>
          <h3>Terfavorit</h3>
          @foreach ($data as $item)
          <div class=" container justify-content-center display-flex">
              <div class="row row-cols-2">
                  <div class="col">
                    <div class="card" style="width: 18rem;">
                       <img src="{{ asset('storage/'.$item->gambar_artikel) }}" width="200" height="auto" alt="">
                        <div class="card-body">
                          <h5 class="card-title">{{$item->judul_artikel}}</h5>
                          <p class="card-text">{{$item->isi_artikel}}</p>
                          <a href="{{route('read',$id_artikel = $item->id_artikel)}}" class="btn btn-primary">Lanjut Membaca</a>
                        </div>
                      </div>
                  </div>
              </div>

          </div>

          @endforeach
          <h3>Terbaru</h3>
          @foreach ($newest as $item)
          <div class=" container justify-content-center display-flex">
            <div class="row">
                <div class="col-6">
                  <div class="card" style="width: 18rem;">
                     <img src="{{ asset('storage/'.$item->gambar_artikel) }}" alt="">
                      <div class="card-body">
                        <h5 class="card-title">{{$item->judul_artikel}}</h5>
                        <p class="card-text">{{$item->isi_artikel}}</p>
                        <a href="{{route('read',$id_artikel = $item->id_artikel)}}" class="btn btn-primary">Lanjut Membaca</a>
                      </div>
                    </div>
                </div>
            </div>

        </div>
        @endforeach

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
    
</html>
