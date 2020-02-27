@extends('templates/template-sm')

@section('title', 'Data Barang')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-8">
      <h1 class="mt-3">Data Barang</h1>
      
      <form method="POST" action="{{url('/admin/barang/update')}}/{{$barang->id_barang}}">
    {{ method_field('PATCH')}}
    {{csrf_field()}}
    <div class="form-group">
      <label for="nabar">Nama Barang </label>
    <input type="text" class="form-control @error('nabar') is-invalid @enderror" id="nabar" placeholder="" name="nama_barang" value="{{$barang->nama_barang}}">
      @error('nabar')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>

    <div class="form-group">
        <label for="kategory">Nama Kategori </label>
        <select name="id_kategori" id="kategory" class="form-control">
        {{-- <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option> --}}
        @foreach($kategori as $k)
            @if ($k->id_kategori == $barang->id_kategori)
                <option value="{{$k->id_kategori}}" selected>{{$k->nama_kategori}}</option>
            @else
                <option value="{{$k->id_kategori}}">{{$k->nama_kategori}}</option>
            @endif
        @endforeach  
        </select>
        @error('kategory')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="stok">Stok</label>
    <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="" name="stok" value="{{$barang->stok}}">
    </div>

    <div class="form-group">
        <label for="type">Type</label>
    <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" placeholder="" name="type" value="{{$barang->type}}">
    </div>

    <div class="form-group">
        <label for="kondisi">Kondisi</label>
        <select name="kondisi" id="kondisi" class="form-control">
            <option value="">--{{$barang->kondisi}}--</option>
            <option>Baru</option>
            <option>Bekas</option>
        </select>
    @error('kondisi')
        <div class="invalid-feedback">{{$message}}</div>
    @enderror
    </div>

    <div class="form-group">
        <label for="keterangan">Keterangan</label>
    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="" name="keterangan" value="{{$barang->keterangan}}">{{$barang->keterangan}}</textarea>
         @error('keterangan')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

      <button type="submit" class="btn btn-success">Ubah</button>
<a href="{{url('/barang/index')}}" class="btn btn-danger">Kembali</a>
      </form>
  
  </div>
  </div>
  </div>

@endsection