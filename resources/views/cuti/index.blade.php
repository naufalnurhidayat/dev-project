@extends('templates/template-cuti')

@section('title', 'Index')

@section('content')
<div class="table-responsive">
  <table class="table table-hover table-striped table-bordered">
    <thead class="table-light">
      <th>No</th>
      <th>NIP</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Role</th>
    </thead>
  @foreach ($karyawan as $k)
    <tbody>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $k->nip }}</td>
      <td>{{ $k->nama }}</td>
      <td>{{ $k->email }}</td>
      <td>{{ $k->role }}</td>
    </tbody>
    @endforeach
  </table>
</div>
@endsection

{{-- <td>{{ $c->id_karyawan }}</td>
<td>{{ $c->id_jenis_cuti }}</td>
<td>{{ $c->awal_cuti }}</td>
<td>{{ $c->akhir_cuti }}</td> --}}