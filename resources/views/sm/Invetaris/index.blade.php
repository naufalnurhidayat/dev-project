{{-- @extends('templates/template-home')

@section('title', 'Invetaris')

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
  
  <div class="d-flex justify-content-end">
    <a href="/" class="btn btn-danger btn-sm">Kembali</a>
  </div>

  
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Barang</th>
              <th>Nama Kategori</th>
              <th>Stok</th>
              <th>Type</th>
              <th>Kondisi</th>  
              <th>Action</th>
            </tr>
          </thead>
      
          <tbody>
            @foreach($barang as $box)
           <tr> 
           <td>{{$box->nama_barang}}</td> 
           <td>{{$box->Kategori->nama_kategori}}</td>
           <td>{{$box->stok}}</td>
           <td>{{$box->type}}</td>
           <td>{{$box->kondisi}}</td>
           <td>
           <a href="{{url('/show')}}/{{$box->id_barang}}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> Detail</a>
           <a href="{{url('/pinjam/create')}}/{{$box->id_barang}}" class="btn btn-success btn-sm"><i class="fa fa-book"></i> Pinjam</a>
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

<div class="modal fade" id="barangmodal" tabindex="-1" role="dialog" aria-labelledby="barangmodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="barangmodal">Ingin mengajukan peminjaman barang ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik 'OK' untuk Pengajuan.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="{{url('/pinjam/create')}}">OK</a>
        </div>
      </div>
    </div>
  </div>

  

@endsection --}}