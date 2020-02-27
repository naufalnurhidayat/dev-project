@extends('templates/template-sm')

@section('title', 'Daftar Karyawan')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Data Karyawan</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Role</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($user as $k)
                    <tr align="center">
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $k->nip }}</td>
                      <td>{{ $k->nama }}</td>
                      <td>{{ $k->jenkel }}</td>
                      <td>{{ $k->Role['role'] }}</td>
                      <td>
                        <a href="{{url('/admin/karyawan')}}/{{$k->id}}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> Detail</a>
                        <a href="{{url('/admin/karyawan/edit')}}/{{$k->id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                        <form action="{{ url('/admin/karyawan') }}/{{$k->id}}" method="POST" class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
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