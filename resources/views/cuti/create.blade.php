@extends('templates/template-cuti')

@section('title', 'Form Pengajuan Cuti')

@section('content')
    <div class="container">
      <div class="row mx-auto">
        <div class="col-6">
          <i class="fas fa-calendar-week"></i><h3 class="mb-4">Form Pengajuan Cuti</h3>
          <form action="{{ url('/cuti/store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="karyawan">Karyawan</label>
              <input type="text" class="form-control" name="karyawan" id="karyawan" readonly>
            </div>
            <div class="form-group">
              <label for="jencut">Jenis Cuti</label>
              <select  class="form-control" name="jencut" id="jencut">
                <option selected>-- Pilih Jenis Cuti --</option>
                <option value="">Cuti Melahirkan</option>
                <option value="">Cuti Tahunan</option>
                <option value="">Cuti Bulanan</option>
              </select>
            </div>
            <div class="form-group row">
              <div class="col-5">
                <label for="awal">Awal Cuti</label>
                <input type="date" class="form-control" name="awal" id="awal">
              </div>
              <div class="col-5">
                <label for="akhir">akhir Cuti</label>
                <input type="date" class="form-control" name="akhir" id="akhir">
              </div>
            </div>
            <div class="form-group">
              <label for="alasan">Alasan Cuti</label>
              <textarea class="form-control" name="alasan" id="alasan" rows="3"></textarea>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection