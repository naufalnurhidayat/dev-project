@extends('templates/template-admin')

@section('title', 'Edit Stream')

@section('content')

<div class="container">
	<div class="row">
		<div class="col">
			<h3><i class="fas fa-edit"></i> Edit Stream</h3>
		</div>
	</div>
  <div class="row">
		<div class="col-4">
			<form method="post" action="{{'/admin/stream'}}/{{ $stream->id }}">
				@method('patch')
				@csrf
				<div class="form-group">
					<label for="stream">Stream</label>
					<input type="text" class="form-control @error('stream') is-invalid @enderror" id="stream" name="stream" value="{{ $stream->stream }}">
					@error('stream') <div class="invalid-feedback">{{ $message }}</div> @enderror
				<button type="submit" class="btn btn-primary mt-3" onclick="return confirm('Yakin?')">Edit</button>
			</form>
		</div>
  </div>
</div>

@endsection