@extends('templates/template-home')

@section('title', 'Data Barang')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mx-auto" style="width: 25rem; height: 25rem;">
            <div class="card-body">
            {{-- <li>{{$pinjam->keterangan}}</li> --}}
            </div>
            <a href="/barang" class="btn btn-primary">Kembali</a>
        </div>
        </div>
    </div>
</div>

@endsection