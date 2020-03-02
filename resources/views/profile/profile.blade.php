@extends('templates/template-home')

@section('title', 'My Profile')

@section('content')

<div class="container">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('img/profile/' . auth()->user()->foto) }}" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4><strong>Nama: </strong>{{ auth()->user()->nama }}</h4>
                            <ul>
                                <li><strong>NIP: </strong>{{ auth()->user()->nip }}</li>
                                <li><strong>Tanggal Lahir: </strong>{{ auth()->user()->tgl_lahir }}</li>
                                <li><strong>Tempat Lahir: </strong>{{ auth()->user()->tmp_lahir }}</li>
                                <li><strong>Email: </strong>{{ auth()->user()->email }}</li>
                                <li><strong>Jenis Kelamin: </strong>{{ auth()->user()->jenkel }}</li>
                                <li><strong>Stream: </strong>{{ auth()->user()->stream->stream }}</li>
                                <li><strong>Pendidikan: </strong>{{ auth()->user()->pendidikan->pendidikan }}</li>
                                <li><strong>Tahun Join: </strong>{{ auth()->user()->thn_join }}</li>
                                <li><strong>Nomor Telpon: </strong>{{ auth()->user()->no_telp }}</li>
                                <li><strong>Agama: </strong>{{ auth()->user()->agama }}</li>
                                <li><strong>Alamat: </strong>{{ auth()->user()->alamat }}</li>
                            </ul>
                            <a href="{{ url('/') }}" class="btn btn-primary ml-4">Kembali</a>
                            <a href="{{ url('/profile/edit/' . auth()->user()->id) }}" class="btn btn-success">Ubah Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection