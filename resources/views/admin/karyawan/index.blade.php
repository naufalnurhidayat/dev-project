@extends('templates/template-admin')

@section('title', 'Daftar Karyawan')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1>Daftar Karyawan</h1>
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row mb-3">
        <div class="col">
            <a href="{{url('/createkaryawan')}}" class="btn btn-primary">Tambah Karyawan</a>
        </div>
    </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($karyawan as $k)
                      
                  <tr>
                      <td>{{ $k->nip }}</td>
                      <td>{{ $k->nama }}</td>
                      <td>{{ $k->jenkel }}</td>
                      <td>{{ $k->email }}</td>
                      <td>{{ $k->id_role }}</td>
                      <td>
                        <a href="{{url('/detailkaryawan')}}/{{$k->id}}" class="badge badge-primary">Detail</a>
                        <a href="{{url('/ubahkaryawan')}}/{{$k->id}}" class="badge badge-success">Ubah</a>
                        <form action="{{ url('/hapuskaryawan') }}/{{$k->id}}" method="POST" class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="badge badge-danger">Hapus</button>
                        </form>
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

      </div>

@endsection