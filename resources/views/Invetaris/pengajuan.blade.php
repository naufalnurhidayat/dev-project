@extends('templates/template-home')

@section('title', 'Data Barang')

@section('content')


@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container-fluid">
  
  <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
  <a href="{{url('/invetaris')}}" class="btn btn-warning mb-2">Kembali</a>

{{-- ----Select Option------ --}}
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Options</label>
  </div>
  <select class="custom-select" name="kategori" id="inputGroupSelect01">
    <option selected>Choose Kategori</option>
    @foreach ($kategori as $item)
    <option value={{$item->id_kategori}} id="kategori">{{$item->nama_kategori}}</option>
    @endforeach
  </select>
</div>
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
              <th>Kondisi</th>  
              <th>Action</th>
            </tr>
          </thead>
      
          <tbody id="barang">
            @foreach($barang as $b)
            @if($b->stok == 0)
            @else
           <tr align=""> 
           <td>{{$b->nama_barang}}</td> 
           <td>{{$b->Kategori['nama_kategori']}}</td>
           <td>{{$b->kondisi}}</td>
           <td>
           <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#pinjam_{{$b->id_barang}}"><i class=""></i> Pinjam</a>
      </div>
    </div>
  </div>

  {{-- @foreach($barang as $box) --}}
  <div class="modal fade" id="pinjam_{{$b->id_barang}}" tabindex="-1" role="dialog" aria-labelledby="pinjam" aria-hidden="true">
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
                
              <input type="hidden" name="id_barang" value="{{$b->id_barang}}"> 
              <input type="hidden" name="id_kategori" value="{{$b->Kategori['id_kategori']}}">     
            
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
            <button type="submit" class="btn btn-primary">Ajukan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</td>
</tr>
@endif
  @endforeach
</tbody>
</table>

</div>
<!-- /.container-fluid -->


<script type="text/javascript">
  $(document).ready(function(){
      $('#kategori').on('change', function(e){
          var id = e.target.value;
          $.get('{{ url('kategori')}}/'+id, function(data){
              console.log(id);
              console.log(data);
              $('#barang').empty();
              $.each(data, function(index, element){
                  $('#barang').append("<tr><td>"+element.nama_barang+"</td><td>"+element.nama_kategori+"</td>"+
                  "<td>"+element.kondisi+"</td></tr>");
              });
          });
      });
  });
</script>
@endsection