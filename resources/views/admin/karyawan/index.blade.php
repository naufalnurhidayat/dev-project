@extends('templates/template-admin')

@section('title', 'Daftar Karyawan')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  @if (session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
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
                      <th>Stream</th>
                      <th>Akun</th>
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
                      <td>{{ $k->Stream['stream'] }}</td>
                      @if($k->is_active == 0)
                      <td><span class="badge badge-danger">Tidak Aktif</span></td>
                      @else
                      <td><span class="badge badge-success">Aktif</span></td>
                      @endif
                      <td>
                        <form action="{{ url('/admin/karyawan/aktivasi/' . $k->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('patch')
                          <button name="aktivasi" class="btn btn-success btn-sm" value="1" onclick="return confirm('Aktivasi akun ini?')"><i class="fa fa-check-circle"></i></button>
                        </form>
                        <a href="{{url('/admin/karyawan/' . $k->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i></a>
                        <a href="{{url('/admin/karyawan/edit/' . $k->id) }}" class="btn btn-warning btn-sm" onclick="return confirm('Yakin?')"><i class="fa fa-edit"></i></a>
                        <form action="{{ url('/admin/karyawan/' . $k->id) }}" method="POST" class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')"><i class="fa fa-trash"></i></button>
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