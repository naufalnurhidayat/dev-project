@extends('templates/template-admin')

@section('title', 'Detail Cuti')

@section('content')
<div class="container">
<!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">Detail Cuti {{$cuti->user['nama']}}</h5>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-3 my-auto pb-5">
          <img src="{{asset('img/profile/'.$cuti->user['foto'])}}" class="card-img-bottom rounded-pill">	
        </div>
        <div class="col-md-9 my-auto">
          <div class="table-responsive">
            <table class="table table-striped" cellspacing="0">
              <tr>
                <td>Nama Karyawan</td>
                <td>:</td>
                <td><strong>{{$cuti->User['nama']}}</strong></td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td><strong>{{$cuti->user->email}}</strong></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><strong>{{$cuti->user->jenkel}}</strong></td>
              </tr>
              <tr>
                <td>Stream</td>
                <td>:</td>
                <td><strong>{{$cuti->user->stream['stream']}}</strong></td>
              </tr>
              <tr>
                <td>Tanggal Cuti</td>
                <td>:</td>
                <td><strong>{{$cuti->tgl_cuti}}</strong></td>
              </tr>
              <tr>
                <td>Jenis Cuti</td>
                <td>:</td>
                <td><strong>{{$cuti->jenis_cuti['jenis_cuti']}}</strong></td>
              </tr>
              <tr>
                <td>Jatah Cuti</td>
                <td>:</td>
                <td><strong>{{$cuti->user['jatah_cuti']}}</strong></td>
              </tr>
              <tr>
                <td>Lama Cuti</td>
                <td>:</td>
                <td><strong>{{$cuti->awal_cuti}} - {{$cuti->akhir_cuti}}</strong></td>
              </tr>
              <tr>
                <td>Total Cuti</td>
                <td>:</td>
                @php
                    $awal = explode('-', $cuti->awal_cuti);
                    $akhir = explode('-', $cuti->akhir_cuti);
                    $total = $akhir[2]-$awal[2];
                @endphp
                <td><strong>{{$total}}</strong></td>
              </tr>
              <tr>
                <td>Alasan Cuti</td>
                <td>:</td>
                <td><strong>{{$cuti->alasan_cuti}}</strong></td>
              </tr>
              <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                  @if ($cuti->status == "Diterima")
                      <span class="badge badge-success">{{ $cuti->status }}</span>
                  @elseif ($cuti->status == "Ditolak")
                      <span class="badge badge-danger">{{ $cuti->status }}</span>
                  @else
                      <span class="badge badge-warning">{{ $cuti->status }}</span>
                  @endif 
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center mt-3 mb-5 pb-5">
    @if ($cuti->status == "Diterima" || $cuti->status == "Ditolak")
      <a href="{{url('/admin/cuti/')}}" class="btn btn-primary">Kembali</a>
    @else
      <form action="{{url('/admin/cuti/'.$cuti->id)}}" method="post">
        @csrf
        @method('patch')
        <a href="{{url('/admin/cuti/')}}" class="btn btn-primary">Kembali</a>
        <button class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin menerima?');" type="submit" name="status" value="Diterima"><i class="fa fa-check"></i> Terima</button>
        <button class="btn btn-danger btn-sm tombol" onclick="return confirm('Yakin ingin menolak?');" type="submit" name="status" value="Ditolak"><i class="fa fa-times-circle"></i> Tolak</button>
      </form>
    @endif
  </div>
</div>
<!-- /.container-fluid -->
@endsection