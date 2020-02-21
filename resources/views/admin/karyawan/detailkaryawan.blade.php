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
                            <li>NIP: {{ $karyawan->nip }}</li>
                            <li>Nama: {{ $karyawan->nama }}</li>
                            <li>Tempat Lahir: {{ $karyawan->tmp_lahir }}</li>
                            <li>Tanggal Lahir: {{ $karyawan->tgl_lahir }}</li>
                            <li>Email: {{ $karyawan->email }}</li>
                            <li>Jenis Kelamin: {{ $karyawan->jenkel }}</li>
                            <li>Role: {{ $karyawan->Role['role'] }}</li>
                            <li>Pendidikan: {{ $karyawan->Pendidikan['pendidikan'] }}</li>
                            <li>Tahun Join: {{ $karyawan->thn_join }}</li>
                            <li>No. Telpon: {{ $karyawan->no_telp }}</li>
                            <li>Agama: {{ $karyawan->Agama['agama'] }}</li>
                            <li>Alamat: {{ $karyawan->alamat }}</li>
                        </ul>
                        <a href="{{url('/admin/karyawan')}}" class="btn btn-primary ml-4">Kembali</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection