@extends('templates/template-home')

@section('title', 'Absen')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Form Keterangan Hadir</h5>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" id="nip" value="NIP" readonly name="nip">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" value="Nama Karyawan" readonly name="nama">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <input type="text" class="form-control" id="role" value="Role Karyawan" readonly name="role">
                            </div>
                            <div class="form-group">
                                <label for="masuk_pukul">Masuk Pukul</label>
                                <input type="text" class="form-control" id="masuk_pukul" value="{{ time() }}" readonly name="masuk_pukul">
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="text" class="form-control" id="tanggal" value="{{ date('d-M-Y') }}" readonly name="tanggal">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="Masuk" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary" name="izin">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection