@extends('templates/template-admin')

@section('title', 'Edit Pendidikan')

@section('content')


<div class="container">
    <div class="row">
      <div class="col-8">
      <h3 class="mt-3"><i class="fas fa-edit"></i> Edit Pendidikan</h3>

      <form method="post" action="/admin/apdet/{{ $pendidikan->id }}">
        {{csrf_field()}}
      <div class="form-group">
        <label for="pendidikan">Pendidikan</label>
        <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" placeholder=" Pendidikan " name="pendidikan" value="{{ $pendidikan->pendidikan }}">
        @error('pendidikan')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-success">Edit</button>
      <a href="/admin/pendidikan" class="btn btn-danger">Kembali</a>
      </form>
  
  </div>
  </div>
  </div>

@endsection