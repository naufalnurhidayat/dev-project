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
  @if (session('gagal'))
    <div class="alert alert-danger">
      {{ session('gagal') }}
    </div>
  @endif
    
    <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Data Pengajuan Cuti</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <div class="form-group row">
          <div class="col-md-3 mx-auto">
            <a class="btn btn-primary btn-block" href="" data-toggle="modal" data-target="#filterModalCuti">
              <i class="fas fa-filter"></i> Filter Data
            </a>
          </div>
        </div>
        <div>
          <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="bg-dark text-white">
              <tr>
                <th>No</th>
                <th>Karyawan</th>
                <th>Tanggal Cuti</th>
                <th>Jenis Cuti</th>
                <th>Status</th> 
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="tampungan">
              @foreach($cuti as $c)
              <tr align="center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->User['nama'] }}</td>
                @php $newTgl_cuti = explode(' ', $c->tgl_cuti); @endphp
                <td>{{ $newTgl_cuti[0] }}</td>
                <td>{{ $c->jenis_cuti['jenis_cuti'] }}</td>
                <td>
                  @if ($c->status == "Diterima")
                      <span class="badge badge-success">{{ $c->status }}</span>
                  @elseif ($c->status == "Ditolak")
                      <span class="badge badge-danger">{{ $c->status }}</span>
                  @else
                      <span class="badge badge-warning">{{ $c->status }}</span>
                  @endif
                </td>
                <td>
                  @if ($c->status == "Diterima" || $c->status == "Ditolak")
                    <a href="{{url('/admin/cuti/detail/'.$c->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> <b>Detail</b></a>    
                  @else
                    <form action="{{url('/admin/cuti/'.$c->id)}}" method="post">
                      @csrf
                      @method('patch')
                      <a href="{{url('/admin/cuti/detail/'.$c->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i></a>
                      <button class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin menerima?');" type="submit" name="status" value="Diterima"><i class="fa fa-check"></i></button>
                      <button class="btn btn-danger btn-sm tombol" onclick="return confirm('Yakin ingin menolak?');" type="submit" name="status" value="Ditolak"><i class="fa fa-times-circle"></i></button>
                    </form>
                  @endif
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
<!-- /.container-fluid -->

@endsection