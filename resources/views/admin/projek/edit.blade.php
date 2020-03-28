@extends('templates/template-admin')

@section('title', 'Edit Projek')

@section('content')

<div class="container">
	<div class="row">
		<div class="col">
			<h3><i class="fas fa-edit"></i> Edit Projek</h3>
		</div>
	</div>
  <div class="row">
		<div class="col-4">
			<form method="post" action="{{'/admin/projek'}}/{{ $projek->id }}">
				@method('patch')
				@csrf
				<div class="form-group">
					<label for="projek">Projek</label>
					<input type="text" class="form-control @error('projek') is-invalid @enderror" id="projek" name="projek" value="{{ $projek->project }}" autofocus required>
					@error('projek') <div class="invalid-feedback">{{ $message }}</div> @enderror
				<button type="submit" class="btn btn-primary mt-3" onclick="return confirm('Yakin?')">Edit</button>
			</form>
		</div>
  </div>
</div>

@endsection