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
  <a href="/" class="btn btn-danger mb-2">Kembali</a>
  <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#pengajuan">Pengajuan</a>
  {{-- <a href="{{url('/invetaris/keranjang')}}" class="btn btn-warning mb-2"><i class="fa fa-shopping-cart"> Keranjang</i></a> --}}
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" height="20px" cellspacing="0">
          <thead>
            <tr align="center">
              <th>Nama Barang</th>
              <th>Nama Kategori</th>
              <th>Jumlah Pinjam</th>
              <th>Tanggal Pinjam</th>
              <th>Kondisi</th>
              <th>Status</th>  
              <th>Action</th>
            </tr>
          </thead>
      
          <tbody>
            @foreach($pinjam as $box)
           <tr align="center"> 
           <td>{{$box->Barang['nama_barang']}}</td> 
           <td>{{$box->Kategori->nama_kategori}}</td>
           <td>{{$box->jumlah_pinjam}}</td>
           <td>{{$box->tgl_pinjam}}</td>
           <td>{{$box->Barang['kondisi']}}</td>
           <td>
            @if( $box->status == "Pending" )
                <span class="btn btn-warning">Pending</span>
               @elseif ( $box->status == "Accept" )
                <span class="btn btn-success btn-sm"><i class="fas fa-check"> Accept</i></span>
               @else
                <span class="btn btn-danger">Rejected</span>
               @endif
           </td>
           <td>
             <a href="" class="btn btn-primary btn-sm"><i class="fas fa-print"> Print</i></a>
             <a href="{{url('/show')}}/{{$box->id_pinjam}}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> Detail</a>
           {{-- <a href="{{url('/pinjam/create')}}/{{$box->id_barang}}" class="btn btn-success btn-sm"><i class="fa fa-book"></i> Pinjam</a> --}}
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

<div class="modal fade" id="pengajuan" tabindex="-1" role="dialog" aria-labelledby="pengajuan" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pengajuan">Pengajuan Pinjam</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <div class="container">
        <div class="row justify-content-center">
            <div class="col">
      {{-- Form Input --}}
      <form method="post" action="{{url('/pengajuan/store')}}">
        {{csrf_field()}}
    
       <input type="hidden" name="id_barang" value="">     
    
       <div class="form-group">
        <label for="kategory">Nama Kategori </label>
        <select name="id_kategori" id="kategory" class="form-control">
        <option value="">--Pilih Kategori</option>
        {{-- @foreach($kategori as $k)
            @if ($k->id_kategori == $barang->id_kategori)
                <option value="{{$k->id_kategori}}" selected>{{$k->nama_kategori}}</option>
            @else
                <option value="{{$k->id_kategori}}">{{$k->nama_kategori}}</option>
            @endif
        @endforeach   --}}
        </select>
        @error('kategory')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    
      <input type="hidden" name="id_kategori" value="">
        <div class="form-group">
        <label for="nabar">Nama Barang </label>
        <input type="text" class="form-control @error('nabar') is-invalid @enderror" id="nabar" placeholder="" name="nabar" value="">
        @error('nabar')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
        </div>
    
        <input type="hidden" name="id" value="{{auth()->user()->id}}">
    
        <div class="form-group">
        <label for="jumlah">Jumlah Pinjam </label>
        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="" name="jumlah" value="">
        @error('jumlah')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
        </div>
    
        {{-- <div class="form-group">
        <label for="tgl_pinjam">Tanggal Pinjam </label>
        <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" id="tgl_pinjam" placeholder="" name="tgl_pinjam" value="{{date('y-m-d')}}">
        @error('tgl_pinjam')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
        </div> --}}
    
        <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="" name="keterangan" value=""></textarea>
        @error('keterangan')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
        </div>
    
          </form>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
        <form action="{{ url('/logout') }}" method="GET">
          @csrf
          <button class="btn btn-success">Pinjam</button>
        </form>
</div>
</div>
</div>
      </div>
    </div>
  </div>
</div>



@endsection