@extends('templates/template-admin')

@section('title', 'Daftar Pendidikan')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1>Daftar Data Pendidikan</h1>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <a href="{{url('/createkaryawan')}}" class="btn btn-primary">Tambah Pendidikan</a>
        </div>
    </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pendidikan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  
                      <tr>
                      <th>Pendidikan</th>
                    </tr>
                  
                  <tbody>
                  @foreach ($pendidikan as $p)
                      
                  <tr>
                      <td>{{$p->pendidikan}}</td>
                      <td>
                        <a href="{{url('/ubah')}}/{{$p->id}}" class="badge badge-success">Ubah</a>
                        <a href="{{url('/hapus')}}/{{$p->id}}" class="badge badge-danger">Hapus</a>
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