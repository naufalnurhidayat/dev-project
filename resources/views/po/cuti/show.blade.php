@extends('templates/template-po')

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
  <a href="{{url('/po/cuti/create')}}" class="btn btn-primary mb-3"><i class="fas fa-calendar-plus">&nbsp; Buat Pengajuan Cuti</i></a>
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
        <div class="form-group row">
          <div class="col-md-3 mx-auto">
            <a class="btn btn-primary btn-block" href="" data-toggle="modal" data-target="#filterModalCuti">
              <i class="fas fa-filter"></i> Filter Data
            </a>
          </div>
        </div>
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-dark text-white">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Tanggal Pengajuan Cuti</th>
              <th>Jenis Cuti</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody class="table table-bordered" id="tampunganIndexCuti">
            @foreach ($cuti as $c)
              <tr align="center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->User['nama'] }}</td>
                @php $newTgl_cuti = explode(' ', $c->tgl_cuti); @endphp
                <td>{{ $newTgl_cuti[0] }}</td>
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
                  <a href="{{url('/po/cuti/'.$c->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> <b>Detail</b></a>
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

@section('footer')
<!-- Filter Data Cuti Modal-->
  <div class="modal fade" id="filterModalCuti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Filter Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="form-group">
                <select class="form-control" id="keywordStatusCuti">
                  <option value="">-- Cari Berdasarkan Status --</option>
                  <option value="Diterima">Diterima</option>
                  <option value="Diproses">Diproses</option>
                  <option value="Ditolak">Ditolak</option>
                </select>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <input type="date" id="keywordTglAwalCuti" class="form-control">
              </div>
              <div class="col-6">
                <input type="date" id="keywordTglAkhirCuti" class="form-control">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <button class="btn btn-primary" id="filterCuti" data-dismiss="modal">Filter Data</button>
          </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
    // Script Untuk Filter Data Cuti
  $("#filterCuti").click(function () {
    const status = $("#keywordStatusCuti").val();
    const tglAwal = $("#keywordTglAwalCuti").val();
    const tglakhir = $("#keywordTglAkhirCuti").val();

    $.ajax({
      type: 'get',
      dataType: 'html',
      url: '{{url('/po/cuti/filterPo')}}',
      data: 'status='+status+'&awal='+tglAwal+'&akhir='+tglakhir,
      success: function (response) {
        $("#tampunganIndexCuti").html(response);
      }
    });
  });

});
</script>
@endsection