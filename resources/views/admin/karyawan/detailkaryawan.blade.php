@extends('templates/template-admin')

@section('title', 'Detail Karyawan')
    
@section('content')
    
    <div class="container">
        <div class="row mb-2">
            <div class="col">
                <h1>Detail Karyawan</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <ul>
                            <li>NIP: {{ $user->nip }}</li>
                            <li>Nama: {{ $user->nama }}</li>
                            <li>Tempat Lahir: {{ $user->tmp_lahir }}</li>
                            <li>Tanggal Lahir: {{ $user->tgl_lahir }}</li>
                            <li>Email: {{ $user->email }}</li>
                            <li>Jenis Kelamin: {{ $user->jenkel }}</li>
                            <li>Role: {{ $user->Role['role'] }}</li>
                            <li>Pendidikan: {{ $user->Pendidikan['pendidikan'] }}</li>
                            <li>Tahun Join: {{ $user->thn_join }}</li>
                            <li>No. Telpon: {{ $user->no_telp }}</li>
                            <li>Agama: {{ $user->Agama['agama'] }}</li>
                            <li>Alamat: {{ $user->alamat }}</li>
                        </ul>
                        <a href="{{url('/admin/karyawan')}}" class="btn btn-primary ml-4">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection