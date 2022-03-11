@extends('admin/dashboard')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Kategori</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Kategori</li>
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
            <a href="{{ route('add-kategori') }}"><button class="btn btn-primary">Tambahkan Data Kategori</button></a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Kategori</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $kategori)
                    
                <tr>
                  
                  <td>{{$kategori->id_kategori}}</td>
                  <td>{{$kategori->nama_kategori}}</td>
                  <td>
                  <a href="{{ route('edit-kategori',$kategori->id_kategori) }}"><button class="btn btn-success">Edit</button></a>
                  <a href="{{ route('delete-kategori',$kategori->id_kategori) }}"><button class="btn btn-danger">Delete</button></a>
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