@extends('templates/template-cuti')

@section('title', 'Halaman Cuti')

@section('content')
  <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
              <h6 class="m-0 font-weight-bold text-white">Data Cuti Karyawan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-dark text-white">
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Role</th>
                      <th>Tanggal Pengajuan Cuti</th>
                      <th>Jenis Cuti</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody class="table table-bordered">
                    @foreach ($cuti as $c)
                      <tr align="center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $c->User['nama'] }}</td>
                        <td>{{ $c->User['jenkel'] }}</td>
                        <td>{{ $c->User->Role['role'] }}</td>
                        <td>{{ $c->tgl_cuti }}</td>
                        <td>{{ $c->jenis_cuti['jenis_cuti'] }}</td>
                        <td><span class="badge badge-warning">{{ $c->status }}</span></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection