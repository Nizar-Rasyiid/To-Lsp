@extends('auth/template')

@section('content')
<div class="container">
  <div class="row align-items-center justify-content-center">
    <div class="col-md-7">
      <h3>Welkammen in <strong>Der Informationswelt</strong></h3>
      <p class="mb-4">Blogging about it</p>
      @include('message')
      <form action="{{ route('loginProses') }}" method="POST" class="mb-3">
        @csrf
        <div class="form-group first">
          <label for="username">Email Anda</label>
          <input type="email" class="form-control" placeholder="your-email@gmail.com" id="username" name="email">
        </div>
        <div class="form-group last mb-3">
          <label for="password">Password Anda</label>
          <input type="password" class="form-control" placeholder="Your Password" id="password" name="password">
        </div>

        <input type="submit" value="Log In" class="btn btn-block btn-primary">
      </form>

      <span class="ml-auto text-center">Belum Punya Akun ? <a href="{{ route('register') }}" class="forgot-pass">Daftar Sekarang</a></span> 
    </div>
  </div>
</div>    
@endsection