@extends('templates/template-admin')

@section('title', 'Daftar Projek')

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
            <a href="{{url('/admin/projek/create')}}" class="btn btn-primary"><i class="fas fa-plus fa-sm"></i> Tambah Projek</a>
        </div>
    </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Data Projek</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Projek</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($projek as $p)            
                  <tr align="center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->project }}</td>
                    <td>
                      <a href="{{url('/admin/projek/edit')}}/{{$p->id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> <b>Edit</b></a>
                      <form action="{{ url('/admin/projek')}}/{{ $p->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" name="hapus"><i class="fa fa-trash"></i> <b>Hapus</b></button>
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