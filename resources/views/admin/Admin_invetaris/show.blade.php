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
           <td>{{$p->Barang['nama_barang']}}</td>
           <td>{{$p->jumlah_pinjam}}</td>
           <td>{{$p->tgl_pinjam}}</td>
           <td>@if( $p->status == "Pending" )
                <span class="btn btn-warning">Pending</span>
               @elseif ( $p->status == "Accept" )
                <span class="btn btn-success">Accept</span>
               @else
                <span class="btn btn-danger">Rejected</span>
               @endif
           </td>
           <td>{{$p->keterangan}}</td>
           <td>
           <form class="d-inline" method="post" action="{{url('/admin/status/' .$p->id_pinjam)}}">
              {{ method_field('patch')}}
              {{csrf_field()  }} 
               <button type="submit" onclick="return confirm('Apakah Anda Yakin ?')" name="status" class="btn btn-success mb-2" value="Accept"><i class="fa fa-check"> Accept</i></button>
              <button type="submit" onclick="return confirm('Apakah Anda Yakin ?')" name="status" class="btn btn-danger" value="Rejected"><i class="fa fa-times-circle"> Rejected</i></button>
            {{-- <a href="{{url('/admin/detail')}}/{{$p->id}}" class="btn btn-primary mt-2"><i class="fa fa-detail">Detail</a> --}}
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