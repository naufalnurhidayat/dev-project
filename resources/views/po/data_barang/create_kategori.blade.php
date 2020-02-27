@extends('templates/template-po')

@section('title', 'Data Barang')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-8">
      <h1 class="mt-3">Kategori</h1>
      
 <form method="POST" action="/kategori/store">
    {{csrf_field()}}
    <div class="form-group">
        <label for="nama_kategori">Nama Kategori </label>
        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" placeholder="" name="nama_kategori" value="">
         @error('nama_kategori')
            <div class="invalid-feedback">{{$message}}</div>
         @enderror
    </div>

      <button type="submit" class="btn btn-primary">Tambah</button>
      <a href="{{url('/kategori/index')}}" class="btn btn-danger">Kembali</a>
      </form>
  
  </div>
  </div>
  </div>

@endsection