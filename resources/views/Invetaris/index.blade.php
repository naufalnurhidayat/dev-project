@extends('templates/template-invetaris')

@section('title', 'Invetaris')

@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pinjam</h1>
   
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
                <th>Kondisi</th>  
                <th>Action</th>
              </tr>
            </thead>
        
            <tbody>
              @foreach($barang as $p)
             <tr> 
             <td>{{$p->nama_barang}}</td> 
             <td>{{$p->Kategori->nama_kategori}}</td>
             <td>{{$p->stok}}</td>
             <td>{{$p->type}}</td>
             <td>{{$p->kondisi}}</td>
             <td>
             <a href="{{url('/show')}}/{{$p->id_barang}}" class="badge badge-success">Pinjam</a>
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