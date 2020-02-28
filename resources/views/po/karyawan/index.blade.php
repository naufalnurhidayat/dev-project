@extends('templates/template-po')

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
                <h4 class="m-0 font-weight-bold text-primary d-inline">Data Karyawan</h4>
                <h6 class="m-0 font-weight-bold text-primary float-right mt-2">Projek: {{ $projek_karyawan->Projek['project'] }}</h6>
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
                      <th>Projek</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($projek as $k)
                    <tr align="center">
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $k->User['nip'] }}</td>
                      <td>{{ $k->User['nama'] }}</td>
                      <td>{{ $k->User['jenkel'] }}</td>
                      <td>{{ $k->User->Stream['stream'] }}</td>
                      <td>{{ $k->Projek->project }}</td>
                      <td>
                        <a href="{{ url('/po/karyawan/' . $k->User['id']) }}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> Detail</a>
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