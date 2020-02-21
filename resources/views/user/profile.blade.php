@extends('templates/template-home')

@section('title', 'My Profile')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('img') }}/{{ $user->foto }}" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4>{{ $user->nama }}</h4>
                            <ul>
                                <li>{{ $user->nip }}</li>
                                <li>{{ $user->tgl_lahir }}</li>
                                <li>{{ $user->tmp_lahir }}</li>
                                <li>{{ $user->email }}</li>
                                <li>{{ $user->jenkel }}</li>
                                <li>{{ $user->Role['role'] }}</li>
                                <li>{{ $user->Pendidikan['pendidikan'] }}</li>
                                <li>{{ $user->thn_join }}</li>
                                <li>{{ $user->no_telp }}</li>
                                <li>{{ $user->Agama['agama'] }}</li>
                                <li>{{ $user->alamat }}</li>
                            </ul>
                            <a href="{{ url('/') }}" class="btn btn-primary ml-4">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection