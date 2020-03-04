@extends('templates/template-admin')

@section('title', 'Daftar Pendidikan')

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
            <a href="{{url('/admin/pendidikan/create')}}" class="btn btn-primary"><i class="fas fa-plus fa-sm"></i> Tambah Pendidikan</a>
        </div>
    </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Data Pendidikan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Pendidikan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($pendidikan as $education)            
                  <tr align="center">
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $education->pendidikan }}</td>
                      <td>
                        <a href="{{url('/admin/pendidikan/edit/'.$education->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> <b>Edit</b></a>
                        <form action="{{ url('/admin/pendidikan/'.$education->id)}}" method="POST" class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm" name="hapus" onclick="return confirm('Yakin Ingin Menghapus?');"><i class="fa fa-trash"></i> <b>Hapus</b></button>
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