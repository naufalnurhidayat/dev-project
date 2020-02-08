@extends('templates/template-admin')

@section('title', 'Daftar Role')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1>Daftar Role</h1>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row mb-3">
        <div class="col">
            <a href="{{url('/createrole')}}" class="btn btn-primary">Tambah Role</a>
        </div>
    </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Role</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                      <th>Role</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($role as $r)            
                  <tr>
                      <td>{{ $r->role }}</td>
                      <td>
                        <a href="{{url('/ubahrole')}}/{{$r->id}}" class="btn btn-success">Ubah</a>
                        <form action="{{ url('/hapusrole')}}/{{ $r->id }}" method="POST" class="d-inline">
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