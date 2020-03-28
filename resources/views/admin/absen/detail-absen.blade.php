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
                            <h5>{{ $user->User->nip }}</h5>
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
                            <h5>{{ $user->User->nama }}</h5>
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
                            <h5>{{ $user->User->email }}</h5>
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
                            <h5>{{ $user->User->no_telp }}</h5>
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
                            <h5>{{ $user->User->Stream->stream }}</h5>
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
                            <h5>{{ $user->jam_masuk }}</h5>
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
                            <h5>{{ $user->tanggal }}</h5>
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
                            <h5>{{ $user->catatan }}</h5>
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
                            <h5>{{ $user->status }}</h5>
                        </div>
                    </div>
                    @if ($user->picture)
                        <div class="row">
                            <div class="col-md-4">
                                <h4>Surat Keterangan</h4>
                            </div>
                            <div class="col-md-1">
                                <h4>:</h4>
                            </div>
                            <div class="col-md-5">
                                <img src="{{ asset('img/absen/' . $user->picture) }}" width="80" class="img-thumbnail mb-3">
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-5">
                            <form action="{{ url('/admin/absen/data-kehadiran/'. $user->id_absen) }}" method="POST">
                                @method('patch')
                                @csrf
                                <a href="{{ url('/admin/absen/data-kehadiran/') }}" class="btn btn-primary">Kembali</a>
                                <button type="submit" class="btn btn-success" name="prove" value="Accepting" onclick="return confirm('Accept?')">Accept</button>
                                <button type="submit" class="btn btn-danger" name="prove" value="Rejecting" onclick="return confirm('Reject?')">Reject</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection