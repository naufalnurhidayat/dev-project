@extends('templates/template-sm')

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
      <h6 class="m-0 font-weight-bold text-dark mt-2 d-inline"><span class="text-info">Projek:</span>
        @foreach($projek_karyawan as $projek)
        <span class="badge badge-success">{{ $projek->project }}</span></h6>
        @endforeach
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
                  <th>Jam Masuk</th>
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
                  @if($da->status == 'Accepting')
                    <td><span class="badge badge-success">{{ $da->status }}</span></td>
                  @elseif($da->status == 'Rejecting')
                    <td><span class="badge badge-danger">{{ $da->status }}</span></td>
                  @else
                    <td><span class="badge badge-warning">{{ $da->status }}</span></td>
                  @endif
                  <td>
                    <form action="{{ url('/sm/absen/data-kehadiran/'. $da->id_absen) }}" method="POST">
                      @method('patch')
                      @csrf
                      <a href="{{ url('/sm/absen/data-kehadiran/' . $da->id_absen) }}" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a>
                      <button type="submit" class="btn btn-sm btn-success" name="prove" value="Accepting" onclick="return confirm('Accept?')"><i class="fas fa-check-circle"></i></button>
                      <button type="submit" class="btn btn-sm btn-danger" name="prove" value="Rejecting" onclick="return confirm('Reject?')"><i class="fas fa-times-circle"></i></button>
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