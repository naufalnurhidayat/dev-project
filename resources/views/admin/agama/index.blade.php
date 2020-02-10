@extends('templates/template-admin')

@section('title', 'Daftar Agama')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row mb-3">
        <div class="col">
            <a href="{{url('/admin/agama/create')}}" class="btn btn-primary">Tambah Agama</a>
        </div>
    </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Data Agama</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Agama</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($agama as $a)            
                  <tr align="center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->agama }}</td>
                    <td>
                      <a href="/admin/agama/edit/{{$a->id}}" class="btn btn-success">Ubah</a>
                      <form action="{{ url('/admin/agama')}}/{{ $a->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
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