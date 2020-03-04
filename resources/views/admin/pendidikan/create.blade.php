@extends('templates/template-admin')

@section('title', 'Daftar Pendidikan')

@section('content')
<div class="container">
  <div class="row">
		<div class="col">
      <h3>Form Tambah Pendidikan</h3>
    </div>
	</div>
  <div class="row">
    <div class="col-4">
      <form method="post" action="{{url('/admin/pendidikan')}}">
        @csrf
        <div class="form-group">
          <label for="pendidikan">Pendidikan</label>
          <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" name="pendidikan" value="{{ old('pendidikan') }}" autofocus>
          @error('pendidikan')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <a href="{{ url('/admin/pendidikan')}}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>
    </div>
  </div>
</div>
@endsection