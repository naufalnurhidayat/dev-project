@extends('templates/template-invetaris')

@section('title', 'Data Barang')

@section('content')

<div class="container">
    <div class="row">
      <div class="col">
      <h1 class="mt-3" style="font-family:Verdana, Geneva, Tahoma, sans-serif">Daftar Barang</h1>
    
      <ul class="list-group">
        @foreach( $barang as $tyo)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        {{$tyo -> nama_barang}}
        <a href="/jenishow/{{ $tyo->id_jenis }}" class="badge badge-info">detail</a>
      </li>
      @endforeach
    </ul>  

      {{-- <table id="MyTable" class="table table-striped table-bordered col" width="100%" cellspacing="12">
        <thead class="thead-dark">
        <tr>
        <th scope="col">Nama Barang</th>
        <th scope="col">Stok</th>
        <th scope="col">Type</th>
        <th scope="col">Kondisi</th>
        <th scope="col">Keterangan</th>
        </tr>
        </thead>
        @foreach( $barang as $tyo)  
        <tbody>
        <td>{{ $tyo -> nama_barang}}</td>
        <td>{{ $tyo -> stok}}</td>
        <td>{{ $tyo -> type}}</td>
        <td>{{ $tyo -> kondisi}}</td>
        <td>{{ $tyo -> keterangan}}</td>
        
        </tbody>
        @endforeach
      </table> --}}

    </div>
    </div>
    </div>
@endsection