@extends('templates/template-admin')

@section('title', 'Ubah Role')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Form Ubah Role</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <form method="POST" action="{{ url('/ubahrole') }}/{{ $role->id }}">
                @method('patch')
                @csrf
                <div class="form-group">
                  <label for="role">Role</label>
                  <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" value="{{ $role->role }}">
                  @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                <button type="submit" class="btn btn-primary mt-3">Tambah</button>
              </form>
        </div>
    </div>
</div>

@endsection