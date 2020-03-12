@extends('templates/template-po')

@section('title', 'Data Barang')

@section('content')


@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  
  <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
  {{-- <a href="/" class="btn btn-danger mb-2">Kembali</a> --}}
  <a href="{{url('/po/tampil/table')}}" class="btn btn-primary mb-2">Pengajuan</a>
  {{-- <a href="{{url('/invetaris/keranjang')}}" class="btn btn-warning mb-2"><i class="fa fa-shopping-cart"> Keranjang</i></a> --}}
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" height="20px" cellspacing="0">
          <thead>
            <tr align="center">
              <th>Nama Barang</th>
              <th>Nama Kategori</th>
              <th>Jumlah Pinjam</th>
              <th>Tanggal Pinjam</th>
              <th>Kembali</th>
              <th>Status</th>  
              <th>Action</th>
            </tr>
          </thead>
      
          <tbody>
            @foreach($pinjam as $box)
           <tr align="center"> 
           <td>{{$box->Barang['nama_barang']}}</td> 
           <td>{{$box->Kategori->nama_kategori}}</td>
           <td>{{$box->jumlah_pinjam}}</td>
           <td>{{$box->tgl_pinjam}}</td>
           <td>{{$box->Kembali['status_kembali']}}</td>
           <td>
            @if( $box->status == "Pending" )
                <span class="badge badge-warning btn-sm">Pending</span>
               @elseif ( $box->status == "Accept" )
                <span class="badge badge-success btn-sm"><i class="fas fa-check"> Accept</i></span>
               @else
                <span class="badge badge-danger btn-sm">Rejected</span>
               @endif
           </td>
           <td>
             @if($box->status == "Pending")
             @else
             <a href="" class="btn btn-primary btn-sm "><i class="fas fa-print"> Print</i></a>
             <a href="" class="btn btn-secondary btn-sm" data-target="#kembali_{{$box->id_barang}}" data-toggle="modal">Pengembalian</a>
           {{-- <a href="{{url('/pinjam/create')}}/{{$box->id_barang}}" class="btn btn-success btn-sm"><i class="fa fa-book"></i> Pinjam</a> --}}
           {{-- </td>
           </tr>
           @endforeach
          </tbody>
        </table> --}}
      </div>
    </div>
  </div>

     {{-- @foreach($barang as $box) --}}
  <div class="modal fade" id="kembali_{{$box->id_barang}}" tabindex="-1" role="dialog" aria-labelledby="kembali" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="kembali">Peminjaman</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        {{-- Form Input --}}
        <div class="container">
          <div class="row justify-content-center">
            <div class="col">
              
                <form method="post" action="{{url('/po/kembali/store')}}">
                {{csrf_field()}}
                
              <input type="hidden" name="id_barang" value="{{$box->id_barang}}"> 
              <input type="hidden" name="id_kategori" value="{{$box->Kategori['id_kategori']}}">
              {{-- <input type="hidden" name="id_pinjam" value="{{$box->Pinjam['id_pinjam']}}"> --}}
              <div class="modal-body">Yakin ingin dikembalikan ?</div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Ajukan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endif
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
<!-- /.container-fluid -->

      {{-- </div>
    </div>
  </div>
</div> --}}



@endsection