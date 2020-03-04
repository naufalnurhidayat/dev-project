@extends('templates/template-admin')

@section('title', 'My Profile')

@section('content')
<div class="container">
	@if (session('status'))
		<div class="alert alert-success">
				{{ session('status') }}
		</div>
	@endif
<!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">My Profile</h5>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-3 my-auto pb-5">
          <img src="{{asset('img/profile/'.auth()->user()->foto)}}" class="card-img-bottom rounded img-fluid shadow">	
        </div>
        <div class="col-md-9 my-auto">
          <div class="table-responsive">
            <table class="table table-striped" cellspacing="0">
							<tr>
                <td>NIP</td>
                <td>:</td>
                <td><strong>{{ auth()->user()->nip }}</strong></td>
              </tr>
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td><strong>{{ auth()->user()->nama }}</strong></td>
              </tr>
              <tr>
                <td>Tempat & Tanggal Lahir</td>
                <td>:</td>
                <td><strong>{{ auth()->user()->tmp_lahir }}, {{ auth()->user()->tgl_lahir }}</strong></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><strong>{{ auth()->user()->jenkel }}</strong></td>
							</tr>
							<tr>
                <td>Tahun Join</td>
                <td>:</td>
                <td><strong>{{ auth()->user()->thn_join }}</strong></td>
              </tr>
              <tr>
                <td>email</td>
                <td>:</td>
                <td><strong>{{ auth()->user()->email }}</strong></td>
              </tr>
              <tr>
                <td>No. Telepon</td>
                <td>:</td>
                <td><strong>{{ auth()->user()->no_telp }}</strong></td>
              </tr>
              <tr>
                <td>Pendidikan</td>
                <td>:</td>
                <td><strong>{{ auth()->user()->pendidikan->pendidikan }}</strong></td>
              </tr>
              <tr>
                <td>Agama</td>
                <td>:</td>
                <td><strong>{{ auth()->user()->agama }}</strong></td>
              </tr>
              <tr>
                <td>Stream</td>
                <td>:</td>
                <td><strong>{{ auth()->user()->stream->stream }}</strong></td>
							</tr>
							<tr>
                <td>Alamat</td>
                <td>:</td>
                <td><strong>{{ auth()->user()->alamat }}</strong></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
	</div>
	<div class="text-center mt-3 mb-5 pb-5">
		<a href="{{ url('/admin') }}" class="btn btn-primary ml-4">Kembali</a>
    <a href="{{ url('/admin/profile/edit/' . auth()->user()->id) }}" class="btn btn-warning">Edit Profile</a>
	</div>
</div>
<!-- /.container-fluid -->
@endsection