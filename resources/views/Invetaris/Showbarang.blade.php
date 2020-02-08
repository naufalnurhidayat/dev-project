@extends('templates/template-invetaris')

@section('title', 'Data Barang')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
            <div class="card-body">
            <li>{{$barang->keterangan}}</li>
            </div>
            <a href="/barang" class="btn btn-primary">Kembali</a>
        </div>
        </div>
    </div>
</div>

@endsection