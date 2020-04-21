@extends('templates/template-admin')

@section('title', 'Cetak Data')

@section('content')

<div class="container">
  
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h3 class="m-0 font-weight-bold text-primary mb-2">Data Kehadiran Karyawan</h3>
      <a href="{{ url('/admin/absen/exportexcel') }}" class="btn btn-success btn-sm" onclick="return confirm('Download Excel?');"><i class="fas fa-file-download mr-1"></i>Export Execel</a>
      <a href="{{ url('/admin/absen/exportpdf') }}" class="btn btn-danger btn-sm" onclick="return confirm('Download PDF?');" id="exportPdf"><i class="fas fa-file-download mr-1"></i></i>Export PDF</a>
      <a href="{{ url('/admin/absen/cetak/all') }}" class="btn btn-warning btn-sm" target="_blank" onclick="return confirm('Cetak semua data?')"><i class="fas fa-print mr-1"></i>Cetak Semua Data</a>
      <a href="{{ url('/admin/absen/cetak/bulan') }}" class="btn btn-success btn-sm" target="_blank" onclick="return confirm('Cetak data selama satu bulan?')"><i class="fas fa-print mr-1"></i>Cetak Satu Bulan Data</a>
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
                  <th>Jam Datang</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="tampunganAbsen">
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
                    <a href="{{ url('/admin/absen/cetak/detail/' . $da->id_absen) }}" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a>
                    <a href="{{ url('/admin/absen/cetak/' . $da->id_karyawan) }}" class="btn btn-sm btn-danger" target="_blank" onclick="return confirm('Cetak semua data atas nama {{ $da->User['nama'] }}')"><i class="fas fa-print"></i></a>
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