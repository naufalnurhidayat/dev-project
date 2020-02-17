@extends('templates/template-home')

@section('title', 'Invetaris')

@section('content')

<div class="container">
    <div class="row mt-3">
        <div class="col">
            <div class="jumbotron mx-auto text-center">
                <h1 class="display-3">Hallo, Nama User!</h1>
                <p class="lead">Selamat datang di fitur Invetaris (Divisi Digital Service) PT Telekomunikasi Indonesia</p>
                <hr class="my-4">
                <p>Silahkan klik tombol warna Hijau untuk pengajuan pinjam barang dan Silahkan klik tombol 'i' jika ingin kembali ke home.</p>
                <a href="" class="btn btn-success btn-circle btn-lg" data-toggle="modal" data-target="#barangmodal">
                    <i class="fa fa-box"></i>
                </a>
                <a href="{{url('/')}}" class="btn btn-info btn-circle btn-lg">
                    <i class="fas fa-info-circle"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="barangmodal" tabindex="-1" role="dialog" aria-labelledby="barangmodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="barangmodal">Ingin mengajukan peminjaman barang ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik 'OK' untuk Pengajuan.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="{{url('/pinjam/create')}}">OK</a>
        </div>
      </div>
    </div>
  </div>

  

@endsection