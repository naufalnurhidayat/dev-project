@extends('templates/template-invetaris')

@section('title', 'Data Pinjam')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-8">
      <h1 class="mt-3">Data Pinjam</h1>
  
    <form method="post" action="/">
    {{csrf_field()}}
    <div class="form-group">
    <label for="nabar">Nama Barang </label>
    <input type="text" class="form-control @error('nabar') is-invalid @enderror" id="nabar" placeholder="" name="nabar" value="">
    @error('nabar')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    </div>

    <div class="form-group">
    <label for="kategory">Nama Kategori </label>
    <input type="text" class="form-control @error('kategory') is-invalid @enderror" id="kategory" placeholder="" name="kategory" value="">
    @error('kategory')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    </div>

    <div class="form-group">
    <label for="type">Tipe </label>
    <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" placeholder="" name="type" value="">
    @error('type')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    </div>

    <div class="form-group">
    <label for="jumlah">Jumlah Pinjam </label>
    <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="" name="jumlah" value="">
    @error('jumlah')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    </div>

    <div class="form-group">
    <label for="tgl_pinjam">Tanggal Pinjam </label>
    <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" id="tgl_pinjam" placeholder="" name="tgl_pinjam" value="{{date('y-m-d')}}">
    @error('tgl_pinjam')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    </div>

    <div class="form-group">
    <label for="keterangan">Keterangan</label>
    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="" name="keterangan" value=""></textarea>
    @error('keterangan')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    </div>
  
      <button type="submit" class="btn btn-success">Pinjam</button>
      <a href="/barang" class="btn btn-danger">Kembali</a>
      </form>
  
  </div>
  </div>
  </div>

@endsection