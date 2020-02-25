@extends('templates/template-home')

@section('title', 'My Profile')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('img/' . auth()->user()->foto) }}" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4>{{ auth()->user()->nama }}</h4>
                            <ul>
                                <li>{{ auth()->user()->nip }}</li>
                                <li>{{ auth()->user()->tgl_lahir }}</li>
                                <li>{{ auth()->user()->tmp_lahir }}</li>
                                <li>{{ auth()->user()->email }}</li>
                                <li>{{ auth()->user()->jenkel }}</li>
                                <li>{{ auth()->user()->role->role }}</li>
                                <li>{{ auth()->user()->pendidikan->pendidikan }}</li>
                                <li>{{ auth()->user()->thn_join }}</li>
                                <li>{{ auth()->user()->no_telp }}</li>
                                <li>{{ auth()->user()->agama->agama }}</li>
                                <li>{{ auth()->user()->alamat }}</li>
                            </ul>
                            <a href="{{ url('/') }}" class="btn btn-primary ml-4">Kembali</a>
                            <a href="{{ url('/profile/edit') }}" class="btn btn-success">Ubah Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection