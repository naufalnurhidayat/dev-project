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

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th>NIP</th>
              <th>Nama Peminjam</th>
              <th>Action</th>
            </tr>
          </thead>
      
          <tbody>
            @foreach($kembali as $k)
           <tr align="center"> 
           <td>{{$k->User['nip']}}</td>
           <td>{{$k->User['nama']}}</td> 
           <td>
            <a href="{{url('/admin/detail')}}/{{$k->id}}" class="btn btn-primary mt-2"><i class="fa fa-detail">Detail</a>
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