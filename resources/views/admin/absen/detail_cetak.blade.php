@extends('templates/template-admin')

@section('title', 'Detail Data Absen')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h1>Detail Absen</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h4>NIP</h4>
                        </div>
                        <div class="col-md-1">
                            <h4>:</h4>
                        </div>
                        <div class="col-md-5">
                            <h5>{{ $data_absen->User->nip }}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Nama</h4>
                        </div>
                        <div class="col-md-1">
                            <h4>:</h4>
                        </div>
                        <div class="col-md-5">
                            <h5>{{ $data_absen->User->nama }}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Email</h4>
                        </div>
                        <div class="col-md-1">
                            <h4>:</h4>
                        </div>
                        <div class="col-md-5">
                            <h5>{{ $data_absen->User->email }}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Telpon</h4>
                        </div>
                        <div class="col-md-1">
                            <h4>:</h4>
                        </div>
                        <div class="col-md-5">
                            <h5>{{ $data_absen->User->no_telp }}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Stream</h4>
                        </div>
                        <div class="col-md-1">
                            <h4>:</h4>
                        </div>
                        <div class="col-md-5">
                            <h5>{{ $data_absen->User->Stream->stream }}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Jam Masuk</h4>
                        </div>
                        <div class="col-md-1">
                            <h4>:</h4>
                        </div>
                        <div class="col-md-5">
                            <h5>{{ $data_absen->jam_masuk }}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Tanggal</h4>
                        </div>
                        <div class="col-md-1">
                            <h4>:</h4>
                        </div>
                        <div class="col-md-5">
                            <h5>{{ $data_absen->tanggal }}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Keterangan</h4>
                        </div>
                        <div class="col-md-1">
                            <h4>:</h4>
                        </div>
                        <div class="col-md-5">
                            <h5>{{ $data_absen->catatan }}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Status</h4>
                        </div>
                        <div class="col-md-1">
                            <h4>:</h4>
                        </div>
                        <div class="col-md-5">
                            <h5>{{ $data_absen->status }}</h5>
                        </div>
                    </div>
                    @if ($data_absen->picture)
                        <div class="row">
                            <div class="col-md-4">
                                <h4>Surat Keterangan</h4>
                            </div>
                            <div class="col-md-1">
                                <h4>:</h4>
                            </div>
                            <div class="col-md-5">
                                <img src="{{ asset('img/absen/' . $data_absen->picture) }}" width="80" class="img-thumbnail mb-3">
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-5">
                            <a href="{{ url('/admin/absen/cetak/') }}" class="btn btn-primary">Kembali</a>
                            <a href="{{ url('/admin/absen/cetak/' . $data_absen->id_karyawan) }}" class="btn btn-danger" target="_blank" onclick="return confirm('Cetak semua data atas nama {{ $data_absen->User['nama'] }}')">Cetak</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection