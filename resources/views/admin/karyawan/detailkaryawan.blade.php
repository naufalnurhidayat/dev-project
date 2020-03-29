@extends('templates/template-admin')

@section('title', 'Detail Karyawan')
    
@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('img/profile/' . $user->foto) }}" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4><strong>Nama: </strong>{{ $user->nama }}</h4>
                            <ul>
                                <li><strong>NIP: </strong>{{ $user->nip }}</li>
                                <li><strong>Tanggal Lahir: </strong>{{ $user->tgl_lahir }}</li>
                                <li><strong>Tempat Lahir: </strong>{{ $user->tmp_lahir }}</li>
                                <li><strong>Email: </strong>{{ $user->email }}</li>
                                <li><strong>Jenis Kelamin: </strong>{{ $user->jenkel }}</li>
                                <li><strong>Stream: </strong>{{ $user->stream->stream }}</li>
                                <li><strong>Role: </strong>{{ $user->role->role }}</li>
                                <li><strong>Pendidikan: </strong>{{ $user->pendidikan->pendidikan }}</li>
                                <li><strong>Tahun Join: </strong>{{ $user->thn_join }}</li>
                                <li><strong>Nomor Telpon: </strong>{{ $user->no_telp }}</li>
                                <li><strong>Agama: </strong>{{ $user->agama }}</li>
                                <li><strong>Alamat: </strong>{{ $user->alamat }}</li>
                                @if( $user->is_active == 0)
                                <li><strong>Akun: </strong><span class="badge badge-danger">Tidak aktif</span></li>
                                @else
                                <li><strong>Akun: </strong><span class="badge badge-success">Aktif</span></li>
                                @endif
                            </ul>
                            <a href="{{ url('/admin/karyawan') }}" class="btn btn-primary ml-4">Kembali</a>
                            @if( $user->is_active == 0)
                            <form action="{{ url('/admin/karyawan/aktivasi/' . $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('patch')
                                <button name="aktivasi" class="btn btn-success" value="1" onclick="return confirm('Aktivasi akun ini?')">Aktivasi</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection