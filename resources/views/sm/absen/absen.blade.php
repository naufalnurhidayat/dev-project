@extends('templates/template-sm')

@section('title', 'Absen')

@section('content')


<div class="container">
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
  <div class="row mt-3">
        <div class="col">
            <div class="jumbotron mx-auto text-center">
                <h1 class="display-3">Hallo, {{ auth()->user()->nama }}!</h1>
                <p class="lead">Selamat datang di fitur absensi (Divisi Digital Service) PT Telekomunikasi Indonesia</p>
                <hr class="my-4">
                <p>Silahkan klik tombol ceklist jika anda ingin absen. Silahkan klik tanda seru jika tidak hadir. Silahkan klik tombol 'home' jika ingin kembali ke home.</p>
                <a href="" class="btn btn-success btn-circle btn-lg" data-toggle="modal" data-target="#absenmodal">
                    <i class="fas fa-check"></i>
                </a>
                <a href="" class="btn btn-warning btn-circle btn-lg" data-toggle="modal" data-target="#izinmodal">
                    <i class="fas fa-exclamation-triangle"></i>
                </a>
                <a href="{{url('/sm')}}" class="btn btn-info btn-circle btn-lg">
                    <i class="fas fa-home"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Stream</th>
                <th>Jam Masuk</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($absen as $a)
              <tr align="center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $a->User['nip'] }}</td>
                <td>{{ $a->User['nama'] }}</td>
                <td>{{ $a->User->Stream['stream'] }}</td>
                <td>{{ $a->jam_masuk }}</td>
                <td>{{ $a->tanggal }}</td>
                <td>{{ $a->catatan }}</td>
                <td>{{ $a->status }}</td>
              </tr>
            @endforeach
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="absenmodal" tabindex="-1" role="dialog" aria-labelledby="absenmodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="absenmodal">Yakin ingin absen?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik 'Absen' jika ingin absen.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <form action="{{ url('/sm/absen') }}" method="POST">
            @csrf
            <button class="btn btn-primary" type="submit" name="absen">Absen</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="izinmodal" tabindex="-1" role="dialog" aria-labelledby="izinmodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="izinmodal">Tidak masuk?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ url('/sm/absen') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <input type="text" name="catatan" placeholder="Keterangan..." class="form-control @error('catatan') is-invalid @enderror" id="izin" required>
              @error('catatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input @error('picture')is-invalid @enderror" id="picture" name="picture" required>
              <label class="custom-file-label" for="picture">Lampirkan surat keterangan</label>
              @error('picture') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <button name="izin" class="btn btn-primary" type="submit" value="izin">Izin</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection