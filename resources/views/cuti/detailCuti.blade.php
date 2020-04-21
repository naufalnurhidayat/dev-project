@extends('templates/template-home')

@section('title', 'Detail Cuti')

@section('content')
<div class="container">
<!-- DataTales Example -->
  <div class="card shadow">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">Detail Cuti</h5>
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
                <td>NIP</td>
                <td>:</td>
                <td><strong>{{$cuti->User['nip']}}</strong></td>
              </tr>
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
                @php $tgl = explode(' ', $cuti->tgl_cuti); @endphp
                <td><strong>{{$tgl[0]}}</strong></td>
              </tr>
              <tr>
                <td>Jenis Cuti</td>
                <td>:</td>
                <td><strong>{{$cuti->jenis_cuti['jenis_cuti']}}</strong></td>
              </tr>
              <tr>
              @if ($cuti->status == 'Diproses')
                <td>Jatah Cuti Sekarang</td>
                <td>:</td>
                <td><strong>{{$cuti->user->jatah_cuti}}</strong></td>
              @else
                <td>Jatah Cuti Saat Mengajukan</td>
                <td>:</td>
                <td><strong>{{$cuti->jatah_cuti_terakhir}}</strong></td>
              @endif
              </tr>
              <tr>
                <td>Lama Cuti</td>
                <td>:</td>
                <td><strong>{{$cuti->awal_cuti}} - {{$cuti->akhir_cuti}}</strong></td>
              </tr>
              <tr>
                <td>Total Cuti</td>
                <td>:</td>
                <td><strong>{{$cuti->total_cuti}}</strong></td>
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
            @if ($cuti->status == "Ditolak" || $cuti->status == "Diterima")
              <tr>
                <td>
                  @if ($cuti->status == "Ditolak")
                    Alasan Ditolak
                  @else
                    Alasan Diterima
                  @endif
                </td>
                <td>:</td>
                <td><strong>{{$cuti->alasan_tolak_terima}}</strong></td>
              </tr>
            @endif
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center mt-3 mb-5 pb-5">
    <a href="{{url('/cuti/')}}" class="btn btn-primary">Kembali</a>
  </div>
</div>
<!-- /.container-fluid -->
@endsection