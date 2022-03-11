@extends('admin/dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Tarif</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('artikel') }}">Artikel</a></li>
                    <li class="breadcrumb-item active">Artikel</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Isi data - data dibawah ini dengan benar</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('save-artikel') }}" id="quickForm" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <input type="hidden" name="user_id" value={{auth()->user()->id}}>

                <div class="form-group">
                  <label for="kategori_id">Kategori Id</label>
                  <select type="text" name="kategori_id" class="form-control" id="kategori_id" placeholder="Masukkan Kategori Id">
                    @foreach ($kategori as $item)
                    <option value="{{$item->id_kategori}}">{{$item->nama_kategori}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="judul_artikel">Judul Artikel</label>
                  <input type="text" name="judul_artikel" class="form-control" id="judul_artikel" placeholder="Masukkan Judul">
                </div>
                <div class="form-group">
                  <label for="isi_artikel">Isi Artikel</label>
                  <textarea type="text" name="isi_artikel" class="form-control" id="isi_artikel" placeholder="Masukkan Isi"></textarea>
                </div>
                <div class="form-group">
                    <label for="gambar_artikel">Gambar</label>
                    <input type="file" class="form-control" placeholder="Gambar" id="gambar_artikel" name="gambar_artikel">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection