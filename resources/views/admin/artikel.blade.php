@extends('admin/dashboard')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Artikel</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Artikel</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('add-artikel') }}"><button class="btn btn-primary">Tambahkan Data Artikel</button></a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>UID</th>
                  <th>Kategori ID</th>
                  <th>Judul</th>
                  <th>Isi</th>
                  <th>Gambar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $artikel)
                    
                <tr>
                  
                  <td>{{$artikel->id_artikel}}</td>
                  <td>{{$artikel->user_id}}</td>
                  <td>{{$artikel->kategori_id}}</td>
                  <td>{{$artikel->judul_artikel}}</td>
                  <td>{{$artikel->isi_artikel}}</td>
                  <td><img src="{{ asset('storage/'.$artikel->gambar_artikel) }}" width="100"></td>
                  <td>
                  <a href="{{ route('edit-artikel',$artikel->id_artikel) }}"><button class="btn btn-success">Edit</button></a>
                  <a href="{{ route('delete-artikel',$artikel->id_artikel) }}"><button class="btn btn-danger">Delete</button></a>
                  </td>
                </tr>
                <tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</section>
@endsection