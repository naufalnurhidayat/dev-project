@extends('templates/template-sm')

@section('title', 'Data Barang')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-8">
      <h1 class="mt-3">Data Barang</h1>
      
 <form method="POST" action="/barang/store">
    {{csrf_field()}}
    <div class="form-group">
        <label for="nabar">Nama Barang </label>
        <input type="text" class="form-control @error('nabar') is-invalid @enderror" id="nabar" placeholder="" name="nama_barang" value="">
      @error('nabar')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>

    <div class="form-group">
        <label for="kategory">Nama Kategori </label>
        <select name="id_kategori" id="kategory" class="form-control">
            <option value="">---Pilih kategori---</option>    
        @foreach($kategori as $k)
            <option value="{{$k->id_kategori}}">{{$k->nama_kategori}}</option>
        @endforeach  
        </select>
        @error('kategory')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="stok">Stok</label>
        <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="" name="stok" value="">
    </div>

    <div class="form-group">
        <label for="type">type</label>
        <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" placeholder="" name="type" value="">
    </div>

    <div class="form-group">
        <label for="kondisi">Kondisi</label>
        <select name="kondisi" id="kondisi" class="form-control">
            <option value="">--Pilih Kategori--</option>
            <option>Baru</option>
            <option>Bekas</option>
        </select>
    @error('kondisi')
        <div class="invalid-feedback">{{$message}}</div>
    @enderror
    </div>

    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="" name="keterangan"></textarea>
         @error('keterangan')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

      <button type="submit" class="btn btn-primary">Tambah</button>
      <a href="{{url('/barang/index')}}" class="btn btn-danger">Kembali</a>
      </form>
  
  </div>
  </div>
  </div>

@endsection