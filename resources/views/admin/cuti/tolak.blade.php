@extends('templates/template-admin')

@section('title', 'Data Cuti')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif
    
    <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-danger">Data Cuti Di Tolak</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-dark text-white">
            <tr>
              <th>No</th>
              <th>Karyawan</th>
              <th>Tanggal Cuti</th>
              <th>Jenis Cuti</th>
              <th>Alasan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($cuti as $c)
            <tr align="center">
              <td>{{ $loop->iteration }}</td>
              <td>{{ $c->User['nama'] }}</td>
              <td>{{ $c->tgl_cuti }}</td>
              <td>{{ $c->jenis_cuti['jenis_cuti'] }}</td>
              <td>{{ $c->alasan_cuti }}</td>
              <td>
                  <a href="{{url('/admin/cuti/tolak/'.$c->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> <b>Detail</b></a>
              </td>
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