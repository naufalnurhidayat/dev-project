@extends('templates/template-admin')

@section('title', 'Daftar Kehadiran')

@section('content')

<div class="container">
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  @if (session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
  @endif
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
                  <th>Stream</th>
                  <th>Pukul</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_absen as $da)
                <tr align="center">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $da->User['nip'] }}</td>
                  <td>{{ $da->User['nama'] }}</td>
                  <td>{{ $da->User->Stream['stream'] }}</td>
                  <td>{{ $da->jam_masuk }}</td>
                  <td>{{ $da->tanggal }}</td>
                  <td>{{ $da->catatan }}</td>
                  <td>{{ $da->status }}</td>
                  <td>
                    <form action="{{ url('/admin/data-kehadiran/'. $da->id_absen) }}" method="POST">
                      @method('patch')
                      @csrf
                      <button type="submit" class="badge badge-success" name="prove" value="Accepting">Accept</button>
                      <button type="submit" class="badge badge-danger" name="prove" value="Rejecting">Reject</button>
                    </form>
                  </td>
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