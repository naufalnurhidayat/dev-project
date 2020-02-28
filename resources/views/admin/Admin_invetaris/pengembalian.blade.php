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
              <th>Nama</th>
              <th>Nama Barang</th>
              <th>Tanggal Kembali</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
      
          <tbody>
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



@endsection