@extends('templates/template-admin')

@section('title', 'Data Barang')

@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

  <!-- Page Heading -->
  
  @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    
    <div class="row mb-3">
        <div class="col">
            <a href="{{url('/admin/create')}}" class="btn btn-primary">Tambah Barang</a>
        <a href="{{url('/kategori/index')}}" class="btn btn-warning">Kategori</a>
        </div>
    </div>
    
    <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
      <a href="" class="btn btn-success mb-2"><i class="fa fa-print"> Print</i></a>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
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
           <a href="{{url('/admin/barang/edit')}}/{{$box->id_barang}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
           {{-- <a href="{{url('/admin/destroy')}}/{{$box->id_barang}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a> --}}
           <form class="d-inline" method="post" action="{{url('/admin/destroy')}}/{{$box->id_barang}}">
            {{ method_field('DELETE')}}
            {{csrf_field()  }}
            <button type="submit" onclick="return confirm('Apakah Anda Yakin ?')" class="text-light btn-sm btn btn-danger btn-sm" onClick="return confirm('apakah anda yakin')"><i class="fa fa-trash mr-2"></i>Hapus</button>
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