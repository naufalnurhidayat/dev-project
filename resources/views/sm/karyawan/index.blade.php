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
                <h6 class="m-0 font-weight-bold text-dark mt-2 d-inline"><span class="text-info">Projek:</span>
                  @foreach($projek_karyawan as $projek)  
                  <span class="badge badge-success">{{ $projek->project }}</span></h6>
                  @endforeach
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
                      <td>
                        <a href="{{url('/sm/karyawan/' . $k->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> Detail</a>
                        <form action="{{ url('/sm/karyawan/' . $k->id)}}" method="POST" class="d-inline">
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