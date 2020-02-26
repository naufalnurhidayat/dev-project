@extends('templates/template-admin')

@section('title', 'Tambah Projek')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<h3>Form Tambah Projek</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<form method="post" action="{{url('/admin/projek')}}">
					@csrf
					<div class="form-group">
						<label for="project">Projek</label>
						<input type="text" class="form-control @error('project') is-invalid @enderror" id="project" name="project" value="{{ old('project') }}">
						@error('project') <div class="invalid-feedback">{{ $message }}</div> @enderror
						<button type="submit" class="btn btn-primary mt-3">Tambah</button>
					</form>
			</div>
		</div>
	</div>
@endsection