@extends('templates/template-admin')

@section('title', 'Edit Agama')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Form Edit Agama</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
				<form method="post" action="{{'/admin/agama'}}/{{ $agama->id }}">
						@method('patch')
						@csrf
						<div class="form-group">
							<label for="agama">Agama</label>
							<input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama" value="{{ $agama->agama }}">
							@error('agama') <div class="invalid-feedback">{{ $message }}</div> @enderror
						<button type="submit" class="btn btn-primary mt-3">Edit</button>
					</form>
        </div>
    </div>
</div>

@endsection