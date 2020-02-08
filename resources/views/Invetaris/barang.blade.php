@extends('templates/template-invetaris')

@section('title', 'Data Barang')

@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
 
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      Kategori
      <select name="" id="">
        <option value=""></option>
        <option value=""></option>
        <option value=""></option>
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
            @foreach($barang as $box)
           <tr> 
           <td>{{$box->nama_barang}}</td>
           <td>{{$box->nama_kategori}}</td>
           <td>{{$box->stok}}</td>
           <td>{{$box->type}}</td>
           <td>{{$box->kondisi}}</td>
           <td>
           <a href="{{url('/show')}}/{{$box->id_barang}}" class="badge badge-primary">Detail</a>
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