@extends('templates/template-admin')

@section('title', 'Daftar Kehadiran')

@section('content')

<div class="container">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h3 class="m-0 font-weight-bold text-primary">Data Kehadiran Karyawan</h3>
    </div>
    <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Role</th>
                  <th>Pukul</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_absen as $da)
                <tr align="center">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $da->Karyawan['nip'] }}</td>
                  <td>{{ $da->Karyawan['nama'] }}</td>
                  <td>{{ $da->Karyawan->Role['role'] }}</td>
                  <td>{{ $da->jam_masuk }}</td>
                  <td>{{ $da->tanggal }}</td>
                  <td>{{ $da->catatan }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

  @endsection