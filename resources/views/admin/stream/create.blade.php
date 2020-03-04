@extends('templates/template-admin')

@section('title', 'Tambah Stream')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<h3>Form Tambah Stream</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<form method="post" action="{{url('/admin/stream')}}">
					@csrf
					<div class="form-group">
						<label for="stream">Stream</label>
						<input type="text" class="form-control @error('stream') is-invalid @enderror" id="stream" name="stream" value="{{ old('stream') }}" autofocus>
						@error('stream') <div class="invalid-feedback">{{ $message }}</div> @enderror
						<button type="submit" class="btn btn-primary mt-3">Tambah</button>
					</form>
			</div>
		</div>
	</div>
@endsection