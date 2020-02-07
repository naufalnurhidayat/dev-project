@extends('templates/template-admin')

@section('title', 'Daftar Pendidikan')

@section('content')


<div class="container">
    <div class="row">
      <div class="col-8">
      <h1 class="mt-3">Silahkan Isi Data Pendidikan</h1>

      <form method="post" action="/apdet/{{ $pendidikan->id }}">
        {{csrf_field()}}
      <div class="form-group">
        <label for="pendidikan">Pendidikan</label>
        <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" placeholder=" Pendidikan " name="pendidikan" value="{{ $pendidikan->pendidikan }}">
        @error('pendidikan')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Edit</button>
      <a href="/pendidikan" class="btn btn-success">Kembali</a>
      </form>
  
  </div>
  </div>
  </div>

@endsection