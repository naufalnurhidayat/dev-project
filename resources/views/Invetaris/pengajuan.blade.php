@extends('templates/template-home')

@section('title', 'Data Barang')

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
<a href="{{url('/invetaris')}}" class="btn btn-warning mb-2">Kembali</a>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" height="30px" cellspacing="0">
          <thead>
            <tr align="center">
              <th>Nama Barang</th>
              <th>Nama Kategori</th>
              <th>Kondisi</th>  
              <th>Action</th>
            </tr>
          </thead>
      
          <tbody>
        @foreach($barang as $b)
           <tr align="center"> 
           <td>{{$b->nama_barang}}</td> 
           <td>{{$b->Kategori['nama_kategori']}}</td>
           <td>{{$b->kondisi}}</td>
           <td>
           <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#pinjam"><i class=""></i> Pinjam</a>
           </td>
           </tr>
        @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="modal fade" id="pinjam" tabindex="-1" role="dialog" aria-labelledby="pinjam" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pinjam">Peminjaman</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        {{-- Form Input --}}
        <div class="container">
          <div class="row justify-content-center">
            <div class="col">
              
              <form method="post" action="{{url('/pengajuan/store')}}">
                {{csrf_field()}}
                
                @foreach ($barang as $item)
                <input type="hidden" name="id_barang" value="{{$barang->id_barang}}">     
                <input type="hidden" name="id_kategori" value="{{$barang->Kategori['id_kategori']}}">     
                @endforeach
            
                <div class="form-group">
                  <label for="keterangan">Keterangan </label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="" name="keterangan" value="">
                  @error('keterangan')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form action="{{ url('/logout') }}" method="GET">
            @csrf
            <button class="btn btn-primary">Ajukan</button>
          </form>
        </div>
      </div>
    </div>
  </div>



</div>
<!-- /.container-fluid -->



@endsection