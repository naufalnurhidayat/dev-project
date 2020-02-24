@extends('templates/template-home')

@section('title', 'Data Keranjang')

@section('content')



@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  
  <h1 class="h3 mb-2 text-gray-800">Data Keranjang</h1>
<a href="{{url('invetaris')}}" class="btn btn-danger mb-2">Kembali</a>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <div class="d-flex justify-content-end">
            <form action="{{url('/pengajuan/pinjam')}}/{{$temp[0]->id_karyawan}}" method="post">
              @csrf
            <button class="btn btn-success mb-2" type="submit">Pinjam</button>
            </form>
            {{-- <a href="{{url('/pengajuan/pinjam')}}" class="btn btn-success mb-2">Pinjam</a> --}}
            </div>
          <thead>
            <tr>
              <th>Nama Barang</th>
              <th>Nama Kategori</th>
              <th>Jumlah Pinjam</th>
              <th>Tanggal Pinjam</th> 
              <th>Keterangan</th>  
              <th>Action</th>
            </tr>
          </thead>
      
          <tbody>
        @foreach($temp as $t)
           <tr> 
           <td>{{$t->Barang['nama_barang']}}</td> 
           <td>{{$t->Kategori['nama_kategori']}}</td>
           <td>{{$t->jumlah_pinjam}}</td>
           <td>{{$t->tgl_pinjam}}</td>
           <td>{{$t->keterangan}}</td>
           <td>
           <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Ubah</a>
           <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Hapus</i></a>
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