@extends('templates/template-po')

@section('title', 'Daftar Kehadiran')

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
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary d-inline">Data Kehadiran Karyawan</h4>
      <h6 class="m-0 font-weight-bold text-dark float-right mt-2 d-inline-block"><span class="text-info">Projek:</span> <span class="badge badge-success">{{ $projek->projek->project }}</span></h6>
      <a href="#" class="btn btn-primary btn-sm mt-2 d-block col-2" data-target="#filter" data-toggle="modal"><i class="fas fa-filter mr-1"></i>Filter Data</a>
    </div>
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
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="tampunganAbsen">
                @foreach ($data_absen as $da)
                <tr align="center">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $da->User['nip'] }}</td>
                  <td>{{ $da->User['nama'] }}</td>
                  <td>{{ $da->User->Stream['stream'] }}</td>
                  <td>{{ $da->jam_masuk }}</td>
                  <td>{{ $da->tanggal }}</td>
                  <td>{{ $da->catatan }}</td>
                  @if($da->status == 'Accepting')
                    <td><span class="badge badge-success">{{ $da->status }}</span></td>
                  @elseif($da->status == 'Rejecting')
                    <td><span class="badge badge-danger">{{ $da->status }}</span></td>
                  @else
                    <td><span class="badge badge-warning">{{ $da->status }}</span></td>
                  @endif
                  <td>
                    <form action="{{ url('/po/absen/data-kehadiran/'. $da->id_absen) }}" method="POST">
                      @method('patch')
                      @csrf
                      <a href="{{ url('/po/absen/data-kehadiran/' . $da->id_absen) }}" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a>
                      <button type="submit" class="btn btn-sm btn-success" name="prove" value="Accepting" onclick="return confirm('Accept?')"><i class="fas fa-check-circle"></i></button>
                      <button type="submit" class="btn btn-sm btn-danger" name="prove" value="Rejecting" onclick="return confirm('Reject?')"><i class="fas fa-times-circle"></i></button>
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
</div>

{{-- Modal Filter Data --}}
<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filter" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filter">Filter Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col">
              <select id="nama" class="form-control js-example-basic-single" name="nama">
                <option value="">Pilih Nama</option>
                @foreach($data_karyawan as $dk)
                <option value="{{$dk->User->id}}">{{$dk->User->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col">
              <input type="date" id="tanggalAwalAbsen" class="form-control" name="tanggalAwalAbsen">
            </div>
            <div class="col">
              <input type="date" id="tanggalAkhirAbsen" class="form-control" name="tanggalAkhirAbsen">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <button id="filter-absen" class="btn btn-primary" data-dismiss="modal">Cari</button>
        </div>
    </div>
  </div>
</div>

  @endsection

  @section('footer')
  <script>
    $(document).ready(function() {
      $('.js-example-basic-single').select2({
          placeholder: 'Pilih Nama'
        });
      $("#filter-absen").click(function() {
        const nama = $("#nama").val();
        const tanggalAwalAbsen = $("#tanggalAwalAbsen").val();
        const tanggalAkhirAbsen = $("#tanggalAkhirAbsen").val();
  
        $.ajax({
          type: 'get',
          dataType: 'html',
          url: '{{url('/po/absen/filter')}}',
          data: `nama=${nama}&tanggal_awal=${tanggalAwalAbsen}&tanggal_akhir=${tanggalAkhirAbsen}`,
          success: function(response) {
            $("#tampunganAbsen").html(response);
          }
        });
      });
    });
  </script>
  @endsection