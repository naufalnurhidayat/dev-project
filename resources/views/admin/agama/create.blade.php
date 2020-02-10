@extends('templates/template-admin')

@section('title', 'Create Agama')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Form Tambah Agama</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<form method="post" action="{{url('/admin/agama')}}">
					@csrf
					<div class="form-group">
						<label for="agama">Agama</label>
						<input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama" value="{{ old('agama') }}">
						@error('agama') <div class="invalid-feedback">{{ $message }}</div> @enderror
						<button type="submit" class="btn btn-primary mt-3">Tambah</button>
					</form>
			</div>
		</div>
	</div>
@endsection