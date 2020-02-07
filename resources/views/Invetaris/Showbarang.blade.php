@extends('templates/template-invetaris')

@section('title', 'Data Barang')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
            <div class="card-body">
            <li>{{$barang->nama_barang}}</li>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection