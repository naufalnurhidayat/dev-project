@extends('templates/template-admin')

@section('title', 'Tambah Jenis Cuti')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<h3>Form Tambah Jenis Cuti</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<form method="post" action="{{url('/admin/jeniscuti')}}">
					@csrf
					<div class="form-group">
						<label for="jenis_cuti">Jenis Cuti</label>
						<input type="text" class="form-control @error('jenis_cuti') is-invalid @enderror" id="jenis_cuti" name="jenis_cuti" value="{{ old('jenis_cuti') }}" autofocus>
						@error('jenis_cuti') <div class="invalid-feedback">{{ $message }}</div> @enderror
						<button type="submit" class="btn btn-primary mt-3">Tambah</button>
					</form>
			</div>
		</div>
	</div>
@endsection