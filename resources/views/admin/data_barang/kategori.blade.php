@extends('templates/template-admin')

@section('title', 'Data Kategori')

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
        <a href="{{url('/kategori/create')}}" class="btn btn-primary">Tambah Kategori</a>
        <a href="{{url('/barang/index')}}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
    
    <h1 class="h3 mb-2 text-gray-800">Kategori</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Kategori</th>
              <th>Action</th>
            </tr>
          </thead>
      
          <tbody>
            @foreach($kategori as $box)
           <tr> 
           <td>{{$box->nama_kategori}}</td> 
           <td>
           <a href="{{url('/kategori/edit')}}/{{$box->id_kategori}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
           <form class="d-inline" method="post" action="{{url('/kategori/destroy')}}/{{$box->id_kategori}}">
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