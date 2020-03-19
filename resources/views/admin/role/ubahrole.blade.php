@extends('templates/template-admin')

@section('title', 'Edit Role')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col">
            <h3><i class="fas fa-edit"></i>Edit Role</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <form method="POST" action="{{ url('/admin/role') }}/{{ $role->id }}">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" value="{{ $role->role }}" autofocus>
                    @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                <button type="submit" class="btn btn-primary mt-3" onclick="return confirm('Yakin?')">Edit</button>
            </form>
        </div>
    </div>
</div>

@endsection