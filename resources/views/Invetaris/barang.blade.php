@extends('templates/template-home')

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
  <a href="/" class="btn btn-danger mb-2">Kembali</a>
  <a href="{{url('/tampil/table')}}" class="btn btn-primary mb-2">Pengajuan</a>
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
              <th>Kondisi</th>
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
           <td>{{$box->Barang['kondisi']}}</td>
           <td>
            @if( $box->status == "Pending" )
                <span class="btn btn-warning btn-sm">Pending</span>
               @elseif ( $box->status == "Accept" )
                <span class="btn btn-success btn-sm"><i class="fas fa-check"> Accept</i></span>
               @else
                <span class="btn btn-danger btn-sm">Rejected</span>
               @endif
           </td>
           <td>
             <a href="" class="btn btn-primary btn-sm mb-2"><i class="fas fa-print"> Print</i></a>
             <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-box"></i> Pengembalian</a>
           {{-- <a href="{{url('/pinjam/create')}}/{{$box->id_barang}}" class="btn btn-success btn-sm"><i class="fa fa-book"></i> Pinjam</a> --}}
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

      </div>
    </div>
  </div>
</div>



@endsection