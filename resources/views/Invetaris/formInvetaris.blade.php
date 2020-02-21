@extends('templates/template-home')

@section('title', 'Data Pinjam')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card">
          <div class="card-body">
          <h5 class="card-title text-center">Data Pinjam</h5>

      
          <form method="post" action="{{url('/pengajuan/store')}}">
    {{csrf_field()}}

   <input type="hidden" name="id_barang" value="{{$barang->id_barang}}">     

    <div class="form-group">
      <label for="nabar">Nama Barang </label>
    <input type="text" class="form-control @error('nabar') is-invalid @enderror" id="nabar" placeholder="" name="nabar" value="{{$barang->nama_barang}}" readonly>
      @error('nabar')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>

  <input type="hidden" name="id_kategori" value="{{$kategori->id_kategori}}">
    <div class="form-group">
    <label for="kategory">Nama Kategori </label>
    <input type="text" class="form-control @error('kategory') is-invalid @enderror" id="kategory" placeholder="" name="kategory" value="{{$kategori->nama_kategori}}" readonly>
    @error('kategory')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    </div>

    <div class="form-group">
    <label for="type">Tipe </label>
    <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" placeholder="" name="type" value="{{$barang->type}}" readonly>
    @error('type')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    </div>

    <div class="form-group">
    <label for="stok">Stok</label>
    <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="" name="stok" value="{{$barang->stok}}" readonly>
    </div>

    <div class="form-group">
    <label for="jumlah">Jumlah Pinjam </label>
    <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="" name="jumlah" value="">
    @error('jumlah')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    </div>

    {{-- <div class="form-group">
    <label for="tgl_pinjam">Tanggal Pinjam </label>
    <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" id="tgl_pinjam" placeholder="" name="tgl_pinjam" value="{{date('y-m-d')}}">
    @error('tgl_pinjam')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    </div> --}}

    <div class="form-group">
    <label for="keterangan">Keterangan</label>
    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="" name="keterangan" value=""></textarea>
    @error('keterangan')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    </div>

      <button type="submit" class="btn btn-success">Pinjam</button>
      <a href="/invetaris" class="btn btn-danger">Kembali</a>
      </form>
  
  </div>
  </div>
  </div>
  </div>
  </div>

@endsection