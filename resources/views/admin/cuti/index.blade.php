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
        <h3 class="m-0 font-weight-bold text-primary">Data Pengajuan Cuti</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Karyawan</th>
              <th>Tanggal Cuti</th>
              <th>Jenis Cuti</th>
              <th>Status</th> 
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
              <td><span class="badge badge-warning">{{ $c->status }}</span></td>
              <td>
                <form action="{{url('/admin/cuti/'.$c->id)}}" method="post">
                  @csrf
                  @method('patch')
                  <a href="{{url('/admin/cuti/detail/'.$c->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i></a>
                  <button class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin menerima?');" type="submit" name="status" value="Terima"><i class="fa fa-check"></i></button>
                  <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menolak?');" type="submit" name="status" value="Tolak"><i class="fa fa-times-circle"></i></button>
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
<!-- /.container-fluid -->


@endsection