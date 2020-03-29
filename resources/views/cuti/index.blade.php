@extends('templates/template-home')

@section('title', 'Halaman Cuti')

@section('content')

<div class="container">
  <!-- Page Heading -->
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif
  @if (session('jatah'))
    <div class="alert alert-danger">
      {{ session('jatah') }}
    </div>
  @endif
  <a href="{{url('/cuti/create')}}" class="btn btn-primary mb-3"><i class="fas fa-calendar-plus">&nbsp; Buat Pengajuan Cuti</i></a>
<!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary d-inline">Data Cuti Anda</h5>
      <h6 class="float-right text-info font-weight-bold mt-1">@php $user = auth()->user()->jatah_cuti; @endphp
        Sisa Cuti :
        @if ($user == 0)
            <span class="text-danger">{{$user}}</span>
        @else
            <span class="text-success">{{$user}}</span>
        @endif
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-dark text-white">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Stream</th>
              <th>Tanggal Pengajuan Cuti</th>
              <th>Jenis Cuti</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody class="table table-bordered">
            @foreach ($cuti as $c)
              <tr align="center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->User['nama'] }}</td>
                <td>{{ $c->User['jenkel'] }}</td>
                <td>{{ $c->User->Stream['stream'] }}</td>
                <td>{{ $c->tgl_cuti }}</td>
                <td>{{ $c->jenis_cuti['jenis_cuti'] }}</td>
                <td>
                  @if ($c->status == 'Diterima')
                    <span class="badge badge-success">{{ $c->status }}</span>
                  @elseif($c->status == 'Ditolak')
                    <span class="badge badge-danger">{{ $c->status }}</span>
                  @else                          
                    <span class="badge badge-warning">{{ $c->status }}</span>
                  @endif
                </td>
                <td>
                  @if ($c->status === 'Diterima')
                    <a class="btn btn-primary btn-block" href="{{url('/cuti/tambah_cuti/'.$c->id)}}" id="modalTambahCuti">
                      <i class="fas fa-calendar-plus"></i> Perpanjang Cuti
                    </a>
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
<!-- /.container-fluid -->
@endsection