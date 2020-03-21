@extends('templates/template-admin')

@section('title', 'Data Pengembalian')

@section('content')


@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  
  <h1 class="h3 mb-2 text-gray-800">Data Pengembalian</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="" class="btn btn-success"  data-toggle="modal" data-target="#filterTanggal"><i class="fas fa-filter"> Filter Tanggal</i></a>
      <a href="{{ url('/kembali/exportpdf') }}" class="btn btn-danger float-right mr-2" onclick="return confirm('Cetak PDF?');" target="_blank"><i class="fas fa-print"></i></a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th>NIP</th>
              <th>Nama</th>
              <th>Nama Barang</th>
              <th>Tanggal Kembali</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
      
          <tbody id="tampungan">
            @foreach($kembali as $k)
           <tr align="center"> 
           <td>{{$k->User['nip']}}</td>
           <td>{{$k->User['nama']}}</td> 
           <td>{{$k->Barang['nama_barang']}}</td>
           <td>{{$k->tgl_kembali}}</td>
           <td>@if( $k->status_kembali == "Belum" )
            <span class="badge badge-warning btn-sm">Belum Kembali</span>
           @else
            <span class="badge badge-success btn-sm">Sudah Kembali</span>
           @endif
       </td>
           <td>
            <form action="{{url('/admin/kembali/status/'. $k->id_kembali)}}" method="post">
              @method('patch')
              @csrf
              @if ($k->status_kembali == "Belum" )
               <button class="btn btn-success rounded-circle" name="status_kembali" value="success"><i class="fas fa-check"></i></button>
              @else
              @endif  
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
<div class="modal fade" id="filterTanggal" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
  <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <div class="modal-body">
        <form role="form" action="{{url('/transaksi-filter')}}" method="get">
          <div class="box-body">
            <div class="form-group" data-provide="datepicker">
              <label for="exampleInputEmail1">Dari Tanggal</label>
            <input type="date" class="form-control datepicker" id="KeywordtglAwal" placeholder="Dari Tanggal" name="dari" autocomplete="off" value="{{ date('Y-m-d') }}">
            </div>

              <div class="form-group" data-provide="datepicker">
                <label for="exampleInputEmail1">Sampai Tanggal</label>
                <input type="date" class="form-control datepicker" id="KeywordtglAkhir" placeholder="sampai Tanggal" name="sampai" autocomplete="off" value="{{ date('Y-m-d') }}">
              </div>
            </div>
            
            <div class="box-footer">
              <button class="btn btn-primary" id="submit" data-dismiss="modal">Filter</button>
            </div>
          </form>

    </div>
  </div>
</div>


{{-- ----Javascript----- --}}
{{-- <script type="text/javascript">
$(document).ready(function(){
  $('.btn-filter').click(function(e){
    e.preventDefault();
    $('#modal-filter').modal();
  })
})

</script> --}}



@endsection