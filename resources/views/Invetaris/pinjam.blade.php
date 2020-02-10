@extends('templates/template-invetaris')

@section('title', 'Data Barang')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Barang Pinjam</h1>
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        Kategori
        <select name="" id="">
          <option value="">Laptop</option>
          <option value="">Layar Tv</option>
        </select>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama Barang</th>
                <th>Nama Kategori</th>
                <th>Stok</th>
                <th>Tipe</th>
                <th>Status</th>
                <th>Kondisi</th>  
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($user as $use)
             <tr> 
             <td>{{$use->nama_barang}}</td> 
             <td>{{$use->Kategori->nama_kategori}}</td>
             <td>{{$use->stok}}</td>
             <td>{{$use->type}}</td>
             <td>{{$use->status}}</td>
             <td>{{$use->kondisi}}</td>
             <td>
             <a href="{{url('/show')}}" class="badge badge-success">Pinjam</a>
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