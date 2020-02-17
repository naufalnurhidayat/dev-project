@extends('templates/template-cuti')

@section('title', 'Halaman Cuti')

{{-- <div class="table-responsive">
  <table class="table table-hover table-striped table-bordered">
    <thead class="table-light">
      <th>No</th>
      <th>NIP</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Role</th>
    </thead>
  @foreach ($karyawan as $k)
    <tbody>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $k->nip }}</td>
      <td>{{ $k->nama }}</td>
      <td>{{ $k->email }}</td>
      <td>{{ $k->id_role }}</td>
    </tbody>
    @endforeach
  </table>
</div> --}}
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
                        <td>{{ $c->Karyawan['nama'] }}</td>
                        <td>{{ $c->Karyawan['jenkel'] }}</td>
                        <td>{{ $c->Karyawan['id_role'] }}</td>
                        <td>16-09-2020</td>
                        <td>{{ $c->JenisCuti['jenis_cuti'] }}</td>
                        <td><span class="badge badge-warning">Pending</span></td>
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
{{-- <td>{{ $c->id_karyawan }}</td>
<td>{{ $c->id_jenis_cuti }}</td>
<td>{{ $c->awal_cuti }}</td>
<td>{{ $c->akhir_cuti }}</td> --}}