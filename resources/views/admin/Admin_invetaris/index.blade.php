@extends('templates/template-admin')

@section('title', 'Data Peminjam')

@section('content')


@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  
  <h1 class="h3 mb-2 text-gray-800">Data Peminjaman</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th>Nama Peminjam</th>
              <th>Nama Barang</th>
              <th>Jumlah Pinjam</th>
              <th>Tanggal Pinjam</th>
              <th>Status</th>  
              <th>Keterangan</th>  
              <th>Action</th>
            </tr>
          </thead>
      
          <tbody>
            @foreach($pinjam as $p)
           <tr align="center"> 
           <td></td> 
           <td>{{$p->Barang['nama_barang']}}</td>
           <td>{{$p->jumlah_pinjam}}</td>
           <td>{{$p->tgl_pinjam}}</td>
           <td><span class="bagde badge-warning rounded">{{$p->status}}</span></td>
           <td>{{$p->keterangan}}</td>
           <td>
            <form class="d-inline" method="post" action="">
              {{ method_field('DELETE')}}
              {{csrf_field()  }}
              <button type="submit" onclick="return confirm('Apakah Anda Yakin ?')" class="text-light btn-sm btn btn-success btn-sm mb-2"><i class="fa fa-check"></i>Accept</button>
              <button type="submit" onclick="return confirm('Apakah Anda Yakin ?')" class="text-light btn-sm btn btn-danger btn-sm"><i class="fa fa-times-circle"></i> Rejected</button>
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